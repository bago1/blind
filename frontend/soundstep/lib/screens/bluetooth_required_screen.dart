import 'package:app_settings/app_settings.dart';
import 'package:flutter/material.dart';
import '../data/pois.dart';
import '../engine/audio.dart';
import 'destination_screen.dart';

/// Screen shown when Bluetooth permission for the app is blocked.
class BluetoothRequiredScreen extends StatefulWidget {
  final Poi poi;
  final String lang;

  const BluetoothRequiredScreen({
    super.key,
    required this.poi,
    required this.lang,
  });

  @override
  State<BluetoothRequiredScreen> createState() => _BluetoothRequiredScreenState();
}

class _BluetoothRequiredScreenState extends State<BluetoothRequiredScreen> {
  @override
  void initState() {
    super.initState();
    WidgetsBinding.instance.addPostFrameCallback((_) {
      final msg = widget.lang == 'az'
          ? 'SoundStep üçün Bluetooth icazəsi bloklanıb. Naviqasiya üçün parametrlərdə bu tətbiq üçün Bluetooth icazəsini aktiv edin.'
          : 'Bluetooth permission for SoundStep is blocked. To navigate, please enable Bluetooth access for this app in Settings.';
      AudioEngine().speak(msg, interrupt: true);
    });
  }

  @override
  Widget build(BuildContext context) {
    final isAz = widget.lang == 'az';
    final title = isAz ? 'Bluetooth icazəsi tələb olunur' : 'Bluetooth Permission Required';

    final body = isAz
        ? 'Məkan boyu bələdçilik etmək üçün SoundStep tətbiqinə Bluetooth icazəsi verilməlidir. Parametrlərdə SoundStep üçün Bluetooth icazəsini aktiv edin, sonra tətbiqi tam bağlayıb yenidən açın.'
        : 'To guide you around the venue, SoundStep needs permission to use Bluetooth. Enable Bluetooth for SoundStep in Settings, then fully close this app and reopen it.';
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

