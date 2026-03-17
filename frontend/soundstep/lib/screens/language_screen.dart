import 'package:flutter/material.dart';
import '../engine/audio.dart';
import '../engine/storage.dart';
import 'destination_screen.dart';

class LanguageScreen extends StatelessWidget {
  const LanguageScreen({super.key});

  Future<void> _select(BuildContext context, String lang) async {
    await Storage.setLanguage(lang);
    await AudioEngine().init(lang);
    final msg = lang == 'az'
        ? 'Azərbaycan dili seçildi. Naviqasiyaya başlamaq üçün hazırsınız.'
        : 'English selected. You are ready to start navigation.';
    await AudioEngine().speak(msg, interrupt: true);
    if (!context.mounted) return;
    Navigator.of(context).pushReplacement(
      MaterialPageRoute(builder: (_) => DestinationScreen(lang: lang)),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFF111111),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(32),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              const Text(
                'WUF13\nSoundStep',
                textAlign: TextAlign.center,
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 36,
                  fontWeight: FontWeight.bold,
                ),
              ),
              const SizedBox(height: 64),
              _LangButton(
                label: 'English',
                semantics: 'Select English language',
                onTap: () => _select(context, 'en'),
              ),
              const SizedBox(height: 24),
              _LangButton(
                label: 'Azərbaycanca',
                semantics: 'Azərbaycan dilini seçin',
                onTap: () => _select(context, 'az'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class _LangButton extends StatelessWidget {
  final String label;
  final String semantics;
  final VoidCallback onTap;

  const _LangButton({
    required this.label,
    required this.semantics,
    required this.onTap,
  });

  @override
  Widget build(BuildContext context) {
    return Semantics(
      label: semantics,
      button: true,
      child: ElevatedButton(
        onPressed: onTap,
        style: ElevatedButton.styleFrom(
          backgroundColor: Colors.white,
          foregroundColor: Colors.black,
          minimumSize: const Size.fromHeight(80),
          textStyle: const TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
        ),
        child: Text(label),
      ),
    );
  }
}
