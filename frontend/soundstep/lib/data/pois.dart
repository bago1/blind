class Poi {
  final String code;
  final String nameEn;
  final String nameAz;

  const Poi({required this.code, required this.nameEn, required this.nameAz});

  String name(String lang) => lang == 'az' ? nameAz : nameEn;
}

const List<Poi> kPois = [
  Poi(code: 'ENTRANCE_MAIN',          nameEn: 'Main Entrance',                   nameAz: 'Əsas Giriş'),
  Poi(code: 'ENTRANCE_WUF',           nameEn: 'WUF Entrance',                    nameAz: 'WUF Girişi'),
  Poi(code: 'ENTRANCE_STAFF',         nameEn: 'Staff Entrance / Exit',           nameAz: 'Personal Giriş/Çıxışı'),
  Poi(code: 'ENTRANCE_INTL_SERVICE',  nameEn: 'International Services Entrance', nameAz: 'Beynəlxalq Xidmət Girişi'),
  Poi(code: 'EXIT_NORTH',             nameEn: 'Exit (North)',                    nameAz: 'Çıxış (Şimal)'),
  Poi(code: 'EXIT_SOUTH',             nameEn: 'Exit (South)',                    nameAz: 'Çıxış (Cənub)'),
  Poi(code: 'AREA_A_REGISTRATION',    nameEn: 'Registration Area',               nameAz: 'Qeydiyyat Zonası'),
  Poi(code: 'AREA_A_MEETING_ROOMS',   nameEn: 'Meeting Rooms',                   nameAz: 'Konfrans Zalları'),
  Poi(code: 'AREA_A_BILATERAL_HUB',   nameEn: 'Bilateral Hub',                   nameAz: 'Konfrans Mərkəzi'),
  Poi(code: 'AREA_B_MEDIA_HUB',       nameEn: 'Media Hub',                       nameAz: 'Media Mərkəzi'),
  Poi(code: 'AREA_B_ROUND_TABLE',     nameEn: 'Round Table Rooms',               nameAz: 'Dairəvi Masa Otaqları'),
  Poi(code: 'AREA_B_SPECIAL_SESSIONS',nameEn: 'Special Sessions',                nameAz: 'Xüsusi Sessiyalar'),
  Poi(code: 'AREA_B_DIALOGUE_ROOMS',  nameEn: 'Dialogue Rooms',                  nameAz: 'Dialoq Otaqları'),
  Poi(code: 'AREA_C_EXPO',            nameEn: 'Expo Centre',                     nameAz: 'Ekspo Mərkəzi'),
  Poi(code: 'AREA_D_CEREMONY_HALL',   nameEn: 'Ceremony Hall',                   nameAz: 'Tədbir Zalı'),
  Poi(code: 'AREA_D_VVIP_HALL',       nameEn: 'VVIP Hall',                       nameAz: 'VVİP Zalı'),
  Poi(code: 'TRANSPORT_DROPOFF_NORTH',nameEn: 'Drop-off Zone North',             nameAz: 'Minmə Zonası Şimal'),
  Poi(code: 'TRANSPORT_DROPOFF_SOUTH',nameEn: 'Drop-off Zone South',             nameAz: 'Minmə Zonası Cənub'),
  Poi(code: 'TRANSPORT_BUS_STAGING',  nameEn: 'Bus Staging Area',                nameAz: 'Ehtiyat Avtobus Yeri'),
  Poi(code: 'TRANSPORT_EV_CHARGING',  nameEn: 'EV Charging Area',                nameAz: 'Elektromobil Şarj Zonası'),
  Poi(code: 'PARKING_VVIP',           nameEn: 'V/VIP Parking',                   nameAz: 'V/VİP Dayanacaq'),
  Poi(code: 'SERVICE_WC',             nameEn: 'Toilets',                         nameAz: 'Sanitar Qovşağı'),
  Poi(code: 'SERVICE_DOG_RELIEF',     nameEn: 'Dog Relief Area',                 nameAz: 'İt üçün Tualet Sahəsi'),
  Poi(code: 'SERVICE_AMBULANCE',      nameEn: 'Ambulance / First Aid',           nameAz: 'Təcil Yardım'),
  Poi(code: 'STADIUM',                nameEn: 'Stadium',                         nameAz: 'Stadion'),
];
