import 'package:flutter/material.dart';
import '../data/pois.dart';
import '../engine/audio.dart';
import '../engine/haptics.dart';
import '../data/route_map.dart';
import 'destination_screen.dart';

class ArrivedScreen extends StatefulWidget {
  final Poi poi;
  final String lang;

  const ArrivedScreen({super.key, required this.poi, required this.lang});

  @override
  State<ArrivedScreen> createState() => _ArrivedScreenState();
}

class _ArrivedScreenState extends State<ArrivedScreen> {
  @override
  void initState() {
    super.initState();
    WidgetsBinding.instance.addPostFrameCallback((_) {
      final msg = widget.lang == 'az'
          ? '${widget.poi.nameAz}-a çatdınız.'
          : 'You have arrived at ${widget.poi.nameEn}.';
      AudioEngine().speak(msg, interrupt: true);
      HapticEngine.fire(HapticType.arrived);
    });
  }

  @override
  Widget build(BuildContext context) {
    final arrivedText = widget.lang == 'az'
        ? '${widget.poi.nameAz}-a çatdınız'
        : 'You have arrived at\n${widget.poi.nameEn}';
    final navigateLabel = widget.lang == 'az' ? 'Başqa Məkana Get' : 'Navigate Somewhere Else';
    final exitLabel = widget.lang == 'az' ? 'Çıxış' : 'Exit Navigation';

    return Scaffold(
      backgroundColor: const Color(0xFF111111),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(32),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              const Icon(Icons.check_circle, color: Colors.green, size: 80),
              const SizedBox(height: 32),
              Semantics(
                label: arrivedText,
                liveRegion: true,
                child: Text(
                  arrivedText,
                  textAlign: TextAlign.center,
                  style: const TextStyle(
                    color: Colors.white,
                    fontSize: 28,
                    fontWeight: FontWeight.bold,
                    height: 1.4,
                  ),
                ),
              ),
              const SizedBox(height: 64),
              Semantics(
                label: navigateLabel,
                button: true,
                child: ElevatedButton(
                  onPressed: () => Navigator.of(context).pushReplacement(
                    MaterialPageRoute(
                      builder: (_) => DestinationScreen(lang: widget.lang),
                    ),
                  ),
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.green,
                    minimumSize: const Size.fromHeight(72),
                    textStyle: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
                  ),
                  child: Text(navigateLabel, style: const TextStyle(color: Colors.white)),
                ),
              ),
              const SizedBox(height: 16),
              Semantics(
                label: exitLabel,
                button: true,
                child: OutlinedButton(
                  onPressed: () => Navigator.of(context).pushReplacement(
                    MaterialPageRoute(
                      builder: (_) => DestinationScreen(lang: widget.lang),
                    ),
                  ),
                  style: OutlinedButton.styleFrom(
                    foregroundColor: Colors.white,
                    side: const BorderSide(color: Colors.white38),
                    minimumSize: const Size.fromHeight(56),
                    textStyle: const TextStyle(fontSize: 18),
                  ),
                  child: Text(exitLabel),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
