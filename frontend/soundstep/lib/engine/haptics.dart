import 'package:vibration/vibration.dart';
import '../data/route_map.dart';

class HapticEngine {
  static Future<void> fire(HapticType type) async {
    final hasVibrator = await Vibration.hasVibrator();
    if (!hasVibrator) return;

    switch (type) {
      case HapticType.straight:
        Vibration.vibrate(duration: 400);
        break;
      case HapticType.right:
        Vibration.vibrate(pattern: [0, 100, 100, 100]);
        break;
      case HapticType.left:
        Vibration.vibrate(pattern: [0, 100, 100, 100, 100, 100]);
        break;
      case HapticType.arrived:
        Vibration.vibrate(duration: 3000);
        break;
      case HapticType.sos:
        Vibration.vibrate(
          pattern: [0, 100, 100, 100, 100, 100, 100, 300, 100, 300, 100, 300, 100, 100, 100, 100, 100, 100],
        );
        break;
    }
  }
}
