// Points of Interest — WUF13 Venue
// Extracted from venue Masterplan (Scale 1:2000)
// Individual meeting room numbers inside Area A must be confirmed on-site.

const POIS = [
  // ─── Entrances / Exits ───────────────────────────────────────────────────
  { code: 'ENTRANCE_MAIN',          name_en: 'Main Entrance',                   name_az: 'Əsas Giriş' },
  { code: 'ENTRANCE_WUF',           name_en: 'WUF Entrance',                    name_az: 'WUF Girişi' },
  { code: 'ENTRANCE_STAFF',         name_en: 'Staff Entrance / Exit',           name_az: 'Personal Giriş/Çıxışı' },
  { code: 'ENTRANCE_INTL_SERVICE',  name_en: 'International Services Entrance', name_az: 'Beynəlxalq Xidmət Girişi' },
  { code: 'EXIT_NORTH',             name_en: 'Exit (North)',                    name_az: 'Çıxış (Şimal)' },
  { code: 'EXIT_SOUTH',             name_en: 'Exit (South)',                    name_az: 'Çıxış (Cənub)' },

  // ─── Area A — Registration & Meeting Rooms ───────────────────────────────
  { code: 'AREA_A_REGISTRATION',    name_en: 'Registration Area',               name_az: 'Qeydiyyat Zonası' },
  { code: 'AREA_A_MEETING_ROOMS',   name_en: 'Meeting Rooms',                   name_az: 'Konfrans Zalları' },
  { code: 'AREA_A_BILATERAL_HUB',   name_en: 'Bilateral Hub',                   name_az: 'Konfrans Mərkəzi' },

  // ─── Area B — Main Arena ─────────────────────────────────────────────────
  { code: 'AREA_B_MEDIA_HUB',       name_en: 'Media Hub',                       name_az: 'Media Mərkəzi' },
  { code: 'AREA_B_ROUND_TABLE',     name_en: 'Round Table Rooms',               name_az: 'Dairəvi Masa Otaqları' },
  { code: 'AREA_B_SPECIAL_SESSIONS',name_en: 'Special Sessions',                name_az: 'Xüsusi Sessiyalar' },
  { code: 'AREA_B_DIALOGUE_ROOMS',  name_en: 'Dialogue Rooms',                  name_az: 'Dialoq Otaqları' },

  // ─── Area C — Expo ───────────────────────────────────────────────────────
  { code: 'AREA_C_EXPO',            name_en: 'Expo Centre',                     name_az: 'Ekspo Mərkəzi' },

  // ─── Area D — Ceremony & VIP ─────────────────────────────────────────────
  { code: 'AREA_D_CEREMONY_HALL',   name_en: 'Ceremony Hall',                   name_az: 'Tədbir Zalı' },
  { code: 'AREA_D_VVIP_HALL',       name_en: 'VVIP Hall',                       name_az: 'VVİP Zalı' },

  // ─── Transport / Drop-off ────────────────────────────────────────────────
  { code: 'TRANSPORT_DROPOFF_NORTH',name_en: 'Drop-off Zone North',             name_az: 'Minmə/Düşmə Zonası Şimal' },
  { code: 'TRANSPORT_DROPOFF_SOUTH',name_en: 'Drop-off Zone South',             name_az: 'Minmə/Düşmə Zonası Cənub' },
  { code: 'TRANSPORT_BUS_STAGING',  name_en: 'Bus Staging Area',                name_az: 'Ehtiyat Avtobus Yeri' },
  { code: 'TRANSPORT_EV_CHARGING',  name_en: 'EV Charging Area',                name_az: 'Elektromobil Şarj Zonası' },
  { code: 'PARKING_VVIP',           name_en: 'V/VIP Parking',                   name_az: 'V/VİP Dayanacaq' },

  // ─── Services ────────────────────────────────────────────────────────────
  { code: 'SERVICE_WC',             name_en: 'Toilets',                         name_az: 'Sanitar Qovşağı' },
  { code: 'SERVICE_DOG_RELIEF',     name_en: 'Dog Relief Area',                 name_az: 'İt üçün Tualet Sahəsi' },
  { code: 'SERVICE_AMBULANCE',      name_en: 'Ambulance / First Aid',           name_az: 'Təcil Yardım' },
  { code: 'STADIUM',                name_en: 'Stadium',                         name_az: 'Stadion' },
];

module.exports = POIS;
