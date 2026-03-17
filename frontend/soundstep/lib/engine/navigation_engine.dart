import 'dart:async';
import 'package:flutter_blue_plus/flutter_blue_plus.dart';
import '../data/route_map.dart';
import 'audio.dart';
import 'haptics.dart';
import 'storage.dart';

class NavigationEngine {
  static final NavigationEngine _instance = NavigationEngine._internal();
  factory NavigationEngine() => _instance;
  NavigationEngine._internal();

  String? _destination;
  String? _currentBeaconKey;
  String? _candidateBeaconKey;
  DateTime? _candidateFirstSeen;
  DateTime _lastBeaconSeen = DateTime.now();
  DateTime _lastInstructionTime = DateTime.now().subtract(const Duration(minutes: 1));
  bool _arrived = false;

  // RSSI smoothing buffers: beaconKey → list of recent RSSI values
  final Map<String, List<int>> _rssiBuffers = {};
  final Map<String, DateTime> _rssiTimestamps = {};

  StreamSubscription? _scanSubscription;
  Timer? _signalLostTimer;
  Timer? _repeatTimer;

  // Callbacks for UI
  Function(String instruction, bool isOffRoute)? onInstruction;
  Function()? onArrived;
  Function()? onSignalLost;
  Function()? onSignalRestored;

  static const _hysteresisMs = 2000;
  static const _beaconExpiryMs = 5000;
  static const _signalLostMs = 30000;
  static const _repeatAfterMs = 15000;

  Future<void> start(String destination) async {
    _destination = destination;
    _currentBeaconKey = null;
    _candidateBeaconKey = null;
    _arrived = false;
    _lastBeaconSeen = DateTime.now();

    final deviceId = await Storage.getDeviceId();
    await Storage.addLog({
      'device_id': deviceId,
      'poi_code': destination,
      'beacon_id': null,
      'happened_at': DateTime.now().toIso8601String(),
      'event': 'navigation_started',
    });

    await FlutterBluePlus.startScan(continuousUpdates: true);

    _scanSubscription = FlutterBluePlus.scanResults.listen((results) {
      _processScanResults(results);
    });

    _signalLostTimer = Timer.periodic(const Duration(seconds: 5), (_) {
      _checkSignalLost();
    });

    _repeatTimer = Timer.periodic(const Duration(seconds: 5), (_) {
      _checkRepeat();
    });
  }

  void stop() {
    FlutterBluePlus.stopScan();
    _scanSubscription?.cancel();
    _signalLostTimer?.cancel();
    _repeatTimer?.cancel();
    _destination = null;
    _rssiBuffers.clear();
    _rssiTimestamps.clear();
  }

  void _processScanResults(List<ScanResult> results) {
    final now = DateTime.now();

    for (final result in results) {
      final beacon = _parseIBeacon(result.advertisementData.manufacturerData);
      if (beacon == null) continue;

      final key = '${beacon['major']}:${beacon['minor']}';
      _rssiTimestamps[key] = now;
      _smoothRssi(key, result.rssi);
    }

    // Expire stale beacons
    _rssiTimestamps.removeWhere((key, ts) {
      final expired = now.difference(ts).inMilliseconds > _beaconExpiryMs;
      if (expired) _rssiBuffers.remove(key);
      return expired;
    });

    if (_rssiTimestamps.isEmpty) return;

    _lastBeaconSeen = now;

    // Find nearest beacon by highest smoothed RSSI
    final nearest = _rssiBuffers.entries
        .where((e) => _rssiTimestamps.containsKey(e.key))
        .map((e) => MapEntry(e.key, _average(e.value)))
        .reduce((a, b) => a.value > b.value ? a : b);

    _onNearestBeacon(nearest.key);
  }

  void _onNearestBeacon(String key) {
    if (key == _currentBeaconKey) {
      return; // handled by repeat timer
    }

    // Hysteresis: confirm new beacon after 2s
    if (_candidateBeaconKey != key) {
      _candidateBeaconKey = key;
      _candidateFirstSeen = DateTime.now();
      return;
    }

    final elapsed = DateTime.now().difference(_candidateFirstSeen!).inMilliseconds;
    if (elapsed < _hysteresisMs) return;

    // Confirmed — switch to new beacon
    _currentBeaconKey = key;
    _candidateBeaconKey = null;
    _triggerInstruction(key);
  }

  void _triggerInstruction(String key) {
    if (_destination == null || _arrived) return;

    final point = kRouteMap[key];
    if (point == null) {
      // Beacon not in route map at all — generic fallback
      final lang = AudioEngine().lang;
      final msg = lang == 'az' ? 'Yolunuzda davam edin.' : 'Continue along the path.';
      AudioEngine().speak(msg);
      HapticEngine.fire(HapticType.straight);
      onInstruction?.call(msg, false);
      return;
    }

    final nav = point[_destination!];
    if (nav == null) {
      final lang = AudioEngine().lang;
      final msg = lang == 'az' ? 'Yolunuzda davam edin.' : 'Continue along the path.';
      AudioEngine().speak(msg);
      HapticEngine.fire(HapticType.straight);
      onInstruction?.call(msg, false);
      return;
    }

    final instruction = nav.instruction(AudioEngine().lang);
    AudioEngine().speak(instruction);
    HapticEngine.fire(nav.haptic);
    _lastInstructionTime = DateTime.now();
    onInstruction?.call(instruction, nav.isOffRoute);

    if (nav.haptic == HapticType.arrived) {
      _arrived = true;
      onArrived?.call();
    }
  }

  void _checkRepeat() {
    if (_currentBeaconKey == null || _destination == null || _arrived) return;
    final elapsed = DateTime.now().difference(_lastInstructionTime).inMilliseconds;
    if (elapsed > _repeatAfterMs) {
      _triggerInstruction(_currentBeaconKey!);
    }
  }

  void _checkSignalLost() {
    if (_destination == null || _arrived) return;
    final elapsed = DateTime.now().difference(_lastBeaconSeen).inMilliseconds;
    if (elapsed > _signalLostMs) {
      final lang = AudioEngine().lang;
      final msg = lang == 'az'
          ? 'Siqnal itirildi. Zəhmət olmasa dayanın və gözləyin.'
          : 'Signal lost. Please stop and wait.';
      AudioEngine().speak(msg, interrupt: true);
      HapticEngine.fire(HapticType.sos);
      onSignalLost?.call();
    }
  }

  void repeatLastInstruction() {
    AudioEngine().repeatLast();
  }

  // ─── iBeacon Parser ─────────────────────────────────────────────────────────
  Map<String, int>? _parseIBeacon(Map<int, List<int>> manufacturerData) {
    final data = manufacturerData[0x004C];
    if (data == null || data.length < 23) return null;
    if (data[0] != 0x02 || data[1] != 0x15) return null;

    final major = (data[17] << 8) | data[18];
    final minor = (data[19] << 8) | data[20];
    return {'major': major, 'minor': minor};
  }

  // ─── RSSI Smoothing ──────────────────────────────────────────────────────────
  void _smoothRssi(String key, int rssi) {
    _rssiBuffers.putIfAbsent(key, () => []);
    final buf = _rssiBuffers[key]!;
    buf.add(rssi);
    if (buf.length > 5) buf.removeAt(0);
  }

  double _average(List<int> values) {
    if (values.length < 3) return values.last.toDouble();
    final sorted = List<int>.from(values)..sort();
    final trimmed = sorted.sublist(1, sorted.length - 1);
    return trimmed.reduce((a, b) => a + b) / trimmed.length;
  }
}
