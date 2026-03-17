import 'package:flutter_tts/flutter_tts.dart';

class AudioEngine {
  static final AudioEngine _instance = AudioEngine._internal();
  factory AudioEngine() => _instance;
  AudioEngine._internal();

  final FlutterTts _tts = FlutterTts();
  String _lang = 'en';
  String? _lastInstruction;
  bool _speaking = false;

  Future<void> init(String lang) async {
    _lang = lang;
    await _tts.setLanguage(lang == 'az' ? 'az-AZ' : 'en-US');
    await _tts.setSpeechRate(0.4); // slightly slower for clarity
    await _tts.setVolume(1.0);
    _tts.setCompletionHandler(() => _speaking = false);
  }

  Future<void> setLanguage(String lang) async {
    _lang = lang;
    await _tts.setLanguage(lang == 'az' ? 'az-AZ' : 'en-US');
  }

  Future<void> speak(String text, {bool interrupt = false}) async {
    if (_speaking && !interrupt) return;
    _lastInstruction = text;
    _speaking = true;
    await _tts.stop();
    await _tts.speak(text);
  }

  Future<void> repeatLast() async {
    if (_lastInstruction != null) {
      await speak(_lastInstruction!, interrupt: true);
    }
  }

  Future<void> stop() async {
    await _tts.stop();
    _speaking = false;
  }

  String get lang => _lang;
}
