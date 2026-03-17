import 'dart:async';
import 'package:flutter/material.dart';
import '../data/pois.dart';
import '../engine/audio.dart';
import '../engine/storage.dart';
import 'navigating_screen.dart';

class DestinationScreen extends StatefulWidget {
  final String lang;
  const DestinationScreen({super.key, required this.lang});

  @override
  State<DestinationScreen> createState() => _DestinationScreenState();
}

class _DestinationScreenState extends State<DestinationScreen> {
  final TextEditingController _controller = TextEditingController();
  List<Poi> _filtered = kPois;
  int _selectedIndex = -1;
  Timer? _debounce;

  @override
  void initState() {
    super.initState();
    _controller.addListener(_onTextChanged);
    // Welcome message
    WidgetsBinding.instance.addPostFrameCallback((_) {
      final msg = widget.lang == 'az'
          ? 'Getmək istədiyiniz yeri daxil edin.'
          : 'Enter your destination.';
      AudioEngine().speak(msg);
    });
  }

  void _onTextChanged() {
    _debounce?.cancel();
    _debounce = Timer(const Duration(milliseconds: 600), () {
      final query = _controller.text.trim().toLowerCase();
      setState(() {
        _filtered = query.isEmpty
            ? kPois
            : kPois
                .where((p) =>
                    p.nameEn.toLowerCase().contains(query) ||
                    p.nameAz.toLowerCase().contains(query) ||
                    p.code.toLowerCase().contains(query))
                .toList();
        _selectedIndex = _filtered.length == 1 ? 0 : -1;
      });

      if (_filtered.isEmpty) {
        final msg = widget.lang == 'az'
            ? 'Heç bir nəticə tapılmadı. Yenidən cəhd edin.'
            : 'No results found. Please try again.';
        AudioEngine().speak(msg, interrupt: true);
      } else {
        final count = _filtered.length;
        final msg = widget.lang == 'az'
            ? '$count nəticə tapıldı.'
            : '$count result${count == 1 ? '' : 's'} found.';
        AudioEngine().speak(msg, interrupt: true);
      }
    });
  }

  void _moveSelection(int delta) {
    if (_filtered.isEmpty) return;
    setState(() {
      _selectedIndex = (_selectedIndex + delta).clamp(0, _filtered.length - 1);
    });
    AudioEngine().speak(_filtered[_selectedIndex].name(widget.lang), interrupt: true);
  }

  void _readAllDestinations() {
    final names = kPois.map((p) => p.name(widget.lang)).join('. ');
    final msg = widget.lang == 'az'
        ? 'Mövcud məkanlar: $names'
        : 'Available destinations: $names';
    AudioEngine().speak(msg, interrupt: true);
  }

  Future<void> _confirm() async {
    if (_selectedIndex < 0 || _filtered.isEmpty) {
      final msg = widget.lang == 'az'
          ? 'Zəhmət olmasa bir məkan seçin.'
          : 'Please select a destination.';
      AudioEngine().speak(msg, interrupt: true);
      return;
    }

    final poi = _filtered[_selectedIndex];
    final deviceId = await Storage.getDeviceId();
    await Storage.addLog({
      'device_id': deviceId,
      'poi_code': poi.code,
      'happened_at': DateTime.now().toIso8601String(),
      'event': 'destination_selected',
    });

    if (!mounted) return;
    Navigator.of(context).push(
      MaterialPageRoute(
        builder: (_) => NavigatingScreen(poi: poi, lang: widget.lang),
      ),
    );
  }

  @override
  void dispose() {
    _controller.dispose();
    _debounce?.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    final hint = widget.lang == 'az' ? 'Məkanı daxil edin...' : 'Enter destination...';
    final confirmLabel = widget.lang == 'az' ? 'Naviqasiyanı Başlat' : 'Start Navigation';
    final readAllLabel = widget.lang == 'az' ? 'Bütün Məkanları Oxu' : 'Read All Destinations';

    return Scaffold(
      backgroundColor: const Color(0xFF111111),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(24),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              const SizedBox(height: 16),
              Semantics(
                label: hint,
                textField: true,
                child: TextField(
                  controller: _controller,
                  autofocus: true,
                  style: const TextStyle(color: Colors.white, fontSize: 22),
                  decoration: InputDecoration(
                    hintText: hint,
                    hintStyle: const TextStyle(color: Colors.white54),
                    filled: true,
                    fillColor: const Color(0xFF222222),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(12),
                      borderSide: BorderSide.none,
                    ),
                    contentPadding: const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                  ),
                ),
              ),
              const SizedBox(height: 16),

              // UP / DOWN navigation
              Row(
                children: [
                  Expanded(
                    child: Semantics(
                      label: widget.lang == 'az' ? 'Yuxarı' : 'Previous result',
                      button: true,
                      child: ElevatedButton(
                        onPressed: () => _moveSelection(-1),
                        style: _arrowStyle(),
                        child: const Text('▲', style: TextStyle(fontSize: 24)),
                      ),
                    ),
                  ),
                  const SizedBox(width: 16),
                  Expanded(
                    child: Semantics(
                      label: widget.lang == 'az' ? 'Aşağı' : 'Next result',
                      button: true,
                      child: ElevatedButton(
                        onPressed: () => _moveSelection(1),
                        style: _arrowStyle(),
                        child: const Text('▼', style: TextStyle(fontSize: 24)),
                      ),
                    ),
                  ),
                ],
              ),

              const SizedBox(height: 12),

              // Filtered POI list
              Expanded(
                child: ListView.builder(
                  itemCount: _filtered.length,
                  itemBuilder: (_, i) {
                    final poi = _filtered[i];
                    final isSelected = i == _selectedIndex;
                    return Semantics(
                      label: poi.name(widget.lang),
                      button: true,
                      selected: isSelected,
                      child: GestureDetector(
                        onTap: () {
                          setState(() => _selectedIndex = i);
                          AudioEngine().speak(poi.name(widget.lang), interrupt: true);
                        },
                        child: Container(
                          margin: const EdgeInsets.only(bottom: 8),
                          padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 18),
                          decoration: BoxDecoration(
                            color: isSelected ? Colors.white : const Color(0xFF222222),
                            borderRadius: BorderRadius.circular(10),
                          ),
                          child: Text(
                            poi.name(widget.lang),
                            style: TextStyle(
                              color: isSelected ? Colors.black : Colors.white,
                              fontSize: 18,
                              fontWeight: isSelected ? FontWeight.bold : FontWeight.normal,
                            ),
                          ),
                        ),
                      ),
                    );
                  },
                ),
              ),

              const SizedBox(height: 12),

              // Read all button
              Semantics(
                label: readAllLabel,
                button: true,
                child: OutlinedButton(
                  onPressed: _readAllDestinations,
                  style: OutlinedButton.styleFrom(
                    foregroundColor: Colors.white54,
                    side: const BorderSide(color: Colors.white24),
                    minimumSize: const Size.fromHeight(56),
                    textStyle: const TextStyle(fontSize: 16),
                  ),
                  child: Text(readAllLabel),
                ),
              ),

              const SizedBox(height: 12),

              // Confirm button
              Semantics(
                label: confirmLabel,
                button: true,
                child: ElevatedButton(
                  onPressed: _selectedIndex >= 0 ? _confirm : null,
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.green,
                    disabledBackgroundColor: Colors.green.withValues(alpha: 0.3),
                    minimumSize: const Size.fromHeight(72),
                    textStyle: const TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
                    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
                  ),
                  child: Text(confirmLabel, style: const TextStyle(color: Colors.white)),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }

  ButtonStyle _arrowStyle() => ElevatedButton.styleFrom(
        backgroundColor: const Color(0xFF333333),
        foregroundColor: Colors.white,
        minimumSize: const Size.fromHeight(64),
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
      );
}
