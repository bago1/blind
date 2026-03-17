import 'package:flutter/material.dart';
import 'engine/audio.dart';
import 'engine/storage.dart';
import 'screens/language_screen.dart';
import 'screens/destination_screen.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  runApp(const SoundStepApp());
}

class SoundStepApp extends StatelessWidget {
  const SoundStepApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'SoundStep',
      debugShowCheckedModeBanner: false,
      theme: ThemeData.dark().copyWith(
        scaffoldBackgroundColor: const Color(0xFF111111),
        textTheme: ThemeData.dark().textTheme.apply(fontSizeFactor: 1.1),
      ),
      home: const _Loader(),
    );
  }
}

class _Loader extends StatefulWidget {
  const _Loader();

  @override
  State<_Loader> createState() => _LoaderState();
}

class _LoaderState extends State<_Loader> {
  @override
  void initState() {
    super.initState();
    _init();
  }

  Future<void> _init() async {
    await Storage.getDeviceId(); // ensure UUID is generated
    final lang = await Storage.getLanguage();

    if (!mounted) return;

    if (lang == null) {
      Navigator.of(context).pushReplacement(
        MaterialPageRoute(builder: (_) => const LanguageScreen()),
      );
    } else {
      await AudioEngine().init(lang);
      if (!mounted) return;
      Navigator.of(context).pushReplacement(
        MaterialPageRoute(builder: (_) => DestinationScreen(lang: lang)),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      backgroundColor: Color(0xFF111111),
      body: Center(child: CircularProgressIndicator(color: Colors.white)),
    );
  }
}
