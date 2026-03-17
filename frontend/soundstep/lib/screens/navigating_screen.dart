import 'package:flutter/material.dart';
import 'package:wakelock_plus/wakelock_plus.dart';
import '../data/pois.dart';
import '../engine/audio.dart';
import '../engine/haptics.dart';
import '../engine/navigation_engine.dart';
import '../data/route_map.dart';
import 'arrived_screen.dart';
import 'signal_lost_screen.dart';
import 'destination_screen.dart';

class NavigatingScreen extends StatefulWidget {
  final Poi poi;
  final String lang;

  const NavigatingScreen({super.key, required this.poi, required this.lang});

  @override
  State<NavigatingScreen> createState() => _NavigatingScreenState();
}

class _NavigatingScreenState extends State<NavigatingScreen> {
  String _instruction = '';
  bool _isOffRoute = false;
  final NavigationEngine _engine = NavigationEngine();

  @override
  void initState() {
    super.initState();
    WakelockPlus.enable();

    _engine.onInstruction = (instruction, isOffRoute) {
      if (!mounted) return;
      setState(() {
        _instruction = instruction;
        _isOffRoute = isOffRoute;
      });
    };

    _engine.onArrived = () {
      if (!mounted) return;
      Navigator.of(context).pushReplacement(
        MaterialPageRoute(
          builder: (_) => ArrivedScreen(poi: widget.poi, lang: widget.lang),
        ),
      );
    };

    _engine.onSignalLost = () {
      if (!mounted) return;
      Navigator.of(context).push(
        MaterialPageRoute(
          builder: (_) => SignalLostScreen(lang: widget.lang),
        ),
      );
    };

    _engine.start(widget.poi.code);

    final msg = widget.lang == 'az'
        ? '${widget.poi.nameAz} istiqamətində naviqasiya başladı. Addımlamağa başlayın.'
        : 'Navigating to ${widget.poi.nameEn}. Please start walking.';
    AudioEngine().speak(msg);
  }

  @override
  void dispose() {
    _engine.stop();
    WakelockPlus.disable();
    super.dispose();
  }

  void _onHelp() {
    HapticEngine.fire(HapticType.sos);
    final msg = widget.lang == 'az'
        ? 'Yardım tələb olunur. Zəhmət olmasa gözləyin.'
        : 'Help requested. Please wait for assistance.';
    AudioEngine().speak(msg, interrupt: true);
    // TODO: notify coordinator via backend when online
  }

  @override
  Widget build(BuildContext context) {
    final repeatLabel = widget.lang == 'az' ? 'Təkrarla' : 'Repeat';
    final changeLabel = widget.lang == 'az' ? 'Məkanı Dəyiş' : 'Change Destination';
    final helpLabel = widget.lang == 'az' ? 'YARDIM' : 'HELP';

    return Scaffold(
      backgroundColor: const Color(0xFF111111),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(24),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              // Destination label
              Text(
                widget.poi.name(widget.lang),
                textAlign: TextAlign.center,
                style: const TextStyle(color: Colors.white54, fontSize: 16),
              ),
              const SizedBox(height: 24),

              // Current instruction
              Expanded(
                child: Center(
                  child: Semantics(
                    label: _instruction,
                    liveRegion: true,
                    child: Text(
                      _instruction.isEmpty
                          ? (widget.lang == 'az' ? 'Beacon axtarılır...' : 'Searching for beacons...')
                          : _instruction,
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: _isOffRoute ? Colors.orange : Colors.white,
                        fontSize: 28,
                        fontWeight: FontWeight.bold,
                        height: 1.4,
                      ),
                    ),
                  ),
                ),
              ),

              // Repeat button
              Semantics(
                label: repeatLabel,
                button: true,
                child: ElevatedButton(
                  onPressed: _engine.repeatLastInstruction,
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xFF333333),
                    minimumSize: const Size.fromHeight(64),
                    textStyle: const TextStyle(fontSize: 20),
                    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
                  ),
                  child: Text(repeatLabel, style: const TextStyle(color: Colors.white)),
                ),
              ),
              const SizedBox(height: 12),

              // Change destination button
              Semantics(
                label: changeLabel,
                button: true,
                child: OutlinedButton(
                  onPressed: () {
                    _engine.stop();
                    Navigator.of(context).pushReplacement(
                      MaterialPageRoute(
                        builder: (_) => DestinationScreen(lang: widget.lang),
                      ),
                    );
                  },
                  style: OutlinedButton.styleFrom(
                    foregroundColor: Colors.white,
                    side: const BorderSide(color: Colors.white38),
                    minimumSize: const Size.fromHeight(56),
                    textStyle: const TextStyle(fontSize: 18),
                  ),
                  child: Text(changeLabel),
                ),
              ),
              const SizedBox(height: 12),

              // Help button
              Semantics(
                label: helpLabel,
                button: true,
                child: ElevatedButton(
                  onPressed: _onHelp,
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.red,
                    minimumSize: const Size.fromHeight(72),
                    textStyle: const TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
                    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
                  ),
                  child: Text(helpLabel, style: const TextStyle(color: Colors.white)),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
