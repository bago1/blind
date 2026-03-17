import 'package:shared_preferences/shared_preferences.dart';
import 'package:uuid/uuid.dart';
import 'dart:convert';

class Storage {
  static const _keyDeviceId = 'device_id';
  static const _keyLanguage = 'language';
  static const _keyLogQueue = 'log_queue';

  static Future<String> getDeviceId() async {
    final prefs = await SharedPreferences.getInstance();
    String? id = prefs.getString(_keyDeviceId);
    if (id == null) {
      id = const Uuid().v4();
      await prefs.setString(_keyDeviceId, id);
    }
    return id;
  }

  static Future<String?> getLanguage() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString(_keyLanguage);
  }

  static Future<void> setLanguage(String lang) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(_keyLanguage, lang);
  }

  static Future<void> addLog(Map<String, dynamic> entry) async {
    final prefs = await SharedPreferences.getInstance();
    final raw = prefs.getString(_keyLogQueue) ?? '[]';
    final List<dynamic> queue = jsonDecode(raw);
    queue.add(entry);
    // Keep max 500 entries
    final trimmed = queue.length > 500 ? queue.sublist(queue.length - 500) : queue;
    await prefs.setString(_keyLogQueue, jsonEncode(trimmed));
  }

  static Future<List<Map<String, dynamic>>> getLogs() async {
    final prefs = await SharedPreferences.getInstance();
    final raw = prefs.getString(_keyLogQueue) ?? '[]';
    final List<dynamic> queue = jsonDecode(raw);
    return queue.cast<Map<String, dynamic>>();
  }

  static Future<void> clearLogs() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(_keyLogQueue, '[]');
  }
}
