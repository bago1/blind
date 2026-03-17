import 'package:app_settings/app_settings.dart';
import 'package:flutter/material.dart';
import 'package:flutter_blue_plus/flutter_blue_plus.dart';
import '../data/pois.dart';
import '../engine/audio.dart';
import 'destination_screen.dart';
import 'navigating_screen.dart';

/// Screen shown when device Bluetooth is turned off.
class BluetoothOffScreen extends StatefulWidget {
  final Poi poi;
  final String lang;

  const BluetoothOffScreen({
    super.key,
    required this.poi,
    required this.lang,
  });

  @override
  State<BluetoothOffScreen> createState() => _BluetoothOffScreenState();
}

class _BluetoothOffScreenState extends State<BluetoothOffScreen>
    with WidgetsBindingObserver {
  @override
  void initState() {
    super.initState();
    WidgetsBinding.instance.addObserver(this);

    WidgetsBinding.instance.addPostFrameCallback((_) {
      final isAz = widget.lang == 'az';
      final msg = isAz
          ? 'Naviqasiya üçün telefonunuzda Bluetooth aktiv olmalıdır. Zəhmət olmasa Bluetoothu yandırın.'
          : 'To navigate, Bluetooth on your phone must be turned on. Please turn Bluetooth on.';
      AudioEngine().speak(msg, interrupt: true);
    });
  }

  @override
  void didChangeAppLifecycleState(AppLifecycleState state) {
    super.didChangeAppLifecycleState(state);
    if (state == AppLifecycleState.resumed) {
      _checkIfOn();
    }
  }

  Future<void> _checkIfOn() async {
    final adapterState = await FlutterBluePlus.adapterState.first;
    if (!mounted) return;

    if (adapterState == BluetoothAdapterState.on) {
      Navigator.of(context).pushReplacement(
        MaterialPageRoute(
          builder: (_) => NavigatingScreen(poi: widget.poi, lang: widget.lang),
        ),
      );
    }
  }

  @override
  void dispose() {
    WidgetsBinding.instance.removeObserver(this);
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    final isAz = widget.lang == 'az';
    final title = isAz ? 'Bluetooth söndürülüb' : 'Bluetooth is Off';
    final body = isAz
        ? 'Məkan boyu bələdçilik etmək üçün telefonunuzun Bluetooth funksiyasından istifadə edirik. Zəhmət olmasa parametrlərdən və ya idarə mərkəzindən Bluetoothu yandırın. Bu ekrana qayıtdıqda naviqasiya avtomatik davam edəcək.'
        : 'We use your phone’s Bluetooth to detect guidance beacons around the venue. Please turn Bluetooth on from Settings or Control Center. When you return to the app, navigation will continue automatically.';
    final openSettings = isAz ? 'Parametrləri Aç' : 'Open Settings';
    final changeDestination = isAz ? 'Məkanı Dəyiş' : 'Change Destination';

    return Scaffold(
      backgroundColor: const Color(0xFF111111),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(24),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              const SizedBox(height: 24),
              Text(
                title,
                textAlign: TextAlign.center,
                style: const TextStyle(
                  color: Colors.white,
                  fontSize: 24,
                  fontWeight: FontWeight.bold,
                ),
              ),
              const SizedBox(height: 24),
              Expanded(
                child: Center(
                  child: Text(
                    body,
                    textAlign: TextAlign.center,
                    style: const TextStyle(
                      color: Colors.white70,
                      fontSize: 18,
                      height: 1.5,
                    ),
                  ),
                ),
              ),
              const SizedBox(height: 12),
              Semantics(
                label: openSettings,
                button: true,
                child: ElevatedButton(
                  onPressed: () {
                    AppSettings.openAppSettings();
                  },
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.blue,
                    minimumSize: const Size.fromHeight(64),
                    textStyle: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
                  ),
                  child: Text(openSettings, style: const TextStyle(color: Colors.white)),
                ),
              ),
              const SizedBox(height: 12),
              Semantics(
                label: changeDestination,
                button: true,
                child: TextButton(
                  onPressed: () {
                    Navigator.of(context).pushAndRemoveUntil(
                      MaterialPageRoute(
                        builder: (_) => DestinationScreen(lang: widget.lang),
                      ),
                      (route) => false,
                    );
                  },
                  style: TextButton.styleFrom(
                    foregroundColor: Colors.white70,
                    minimumSize: const Size.fromHeight(48),
                    textStyle: const TextStyle(fontSize: 16),
                  ),
                  child: Text(changeDestination),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

