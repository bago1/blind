import 'dart:async';
import 'package:flutter/material.dart';
import '../engine/audio.dart';
import '../engine/haptics.dart';
import '../data/route_map.dart';

class SignalLostScreen extends StatefulWidget {
  final String lang;
  const SignalLostScreen({super.key, required this.lang});

  @override
  State<SignalLostScreen> createState() => _SignalLostScreenState();
}

class _SignalLostScreenState extends State<SignalLostScreen> {
  Timer? _repeatTimer;

  @override
  void initState() {
    super.initState();
    _repeatTimer = Timer.periodic(const Duration(seconds: 10), (_) {
      HapticEngine.fire(HapticType.sos);
    });
  }

  @override
  void dispose() {
    _repeatTimer?.cancel();
    super.dispose();
  }

  void _onHelp() {
    HapticEngine.fire(HapticType.sos);
    final msg = widget.lang == 'az'
        ? 'Yardım tələb olunur. Zəhmət olmasa gözləyin.'
        : 'Help requested. Please wait for assistance.';
    AudioEngine().speak(msg, interrupt: true);
  }

  @override
  Widget build(BuildContext context) {
    final title = widget.lang == 'az'
        ? 'Siqnal İtirildi'
        : 'Signal Lost';
    final body = widget.lang == 'az'
        ? 'Zəhmət olmasa dayanın və gözləyin.\nBir işçi sizə kömək etməyə gələcək.'
        : 'Please stop and wait.\nA staff member will come to assist you.';
    final helpLabel = widget.lang == 'az' ? 'YARDIM ÇAĞIR' : 'CALL FOR HELP';

    return Scaffold(
      backgroundColor: const Color(0xFF1a0000),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(32),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              const Icon(Icons.signal_wifi_off, color: Colors.red, size: 80),
              const SizedBox(height: 32),
              Semantics(
                label: '$title. $body',
                liveRegion: true,
                child: Column(
                  children: [
                    Text(
                      title,
                      textAlign: TextAlign.center,
                      style: const TextStyle(
                        color: Colors.red,
                        fontSize: 32,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    const SizedBox(height: 16),
                    Text(
                      body,
                      textAlign: TextAlign.center,
                      style: const TextStyle(color: Colors.white, fontSize: 22, height: 1.5),
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 64),
              Semantics(
                label: helpLabel,
                button: true,
                child: ElevatedButton(
                  onPressed: _onHelp,
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.red,
                    minimumSize: const Size.fromHeight(80),
                    textStyle: const TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
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
