// Route map: beaconKey (major:minor) × poiCode → instruction + haptic
// sequence_order: int = on route in order, null = off-route (reroute instruction)
//
// SAMPLE DATA — replace with real beacon IDs after site survey.

enum HapticType { straight, left, right, arrived, sos }

class RouteInstruction {
  final String instructionEn;
  final String instructionAz;
  final HapticType haptic;
  final int? sequenceOrder; // null = off-route

  const RouteInstruction({
    required this.instructionEn,
    required this.instructionAz,
    required this.haptic,
    this.sequenceOrder,
  });

  String instruction(String lang) =>
      lang == 'az' ? instructionAz : instructionEn;

  bool get isOffRoute => sequenceOrder == null;
}

// key: 'major:minor'
// value: map of poiCode → RouteInstruction
const Map<String, Map<String, RouteInstruction>> kRouteMap = {
  '1:1': {
    'ENTRANCE_MAIN': RouteInstruction(
      instructionEn: 'Welcome. You are at the drop-off zone. Continue straight toward the main entrance. It is 60 meters ahead.',
      instructionAz: 'Xoş gəldiniz. Siz düşmə zonasındasınız. Əsas girişə doğru düz gedin. O, 60 metr irəlidədir.',
      haptic: HapticType.straight,
      sequenceOrder: 1,
    ),
    'AREA_A_REGISTRATION': RouteInstruction(
      instructionEn: 'Welcome. Turn left toward the registration pavilion. It is 80 meters ahead.',
      instructionAz: 'Xoş gəldiniz. Qeydiyyat pavilyonuna doğru sola dönün. O, 80 metr irəlidədir.',
      haptic: HapticType.left,
      sequenceOrder: 1,
    ),
  },
  '1:2': {
    'ENTRANCE_MAIN': RouteInstruction(
      instructionEn: 'Continue straight. Main entrance is 30 meters ahead.',
      instructionAz: 'Düz gedin. Əsas giriş 30 metr irəlidədir.',
      haptic: HapticType.straight,
      sequenceOrder: 2,
    ),
    'AREA_A_REGISTRATION': RouteInstruction(
      instructionEn: 'Turn right. Registration area is 20 meters ahead.',
      instructionAz: 'Sağa dönün. Qeydiyyat zonası 20 metr irəlidədir.',
      haptic: HapticType.right,
      sequenceOrder: 2,
    ),
  },
  // Off-route beacon example — user strayed from path
  '9:9': {
    'ENTRANCE_MAIN': RouteInstruction(
      instructionEn: 'Wrong direction. Turn around and go back to the main path.',
      instructionAz: 'Yanlış istiqamət. Geri dönün və əsas yola qayıdın.',
      haptic: HapticType.sos,
      sequenceOrder: null,
    ),
  },
  '1:3': {
    'ENTRANCE_MAIN': RouteInstruction(
      instructionEn: 'You have arrived at the Main Entrance. The door is directly ahead.',
      instructionAz: 'Əsas Girişə çatdınız. Qapı birbaşa qarşınızdadır.',
      haptic: HapticType.arrived,
      sequenceOrder: 3,
    ),
    'AREA_A_REGISTRATION': RouteInstruction(
      instructionEn: 'You have arrived at the Registration Area.',
      instructionAz: 'Qeydiyyat Zonasına çatdınız.',
      haptic: HapticType.arrived,
      sequenceOrder: 3,
    ),
  },
};
