# WUF SoundStep — Project Reference

## What This Is

**SoundStep** — an audio navigation system for blind and visually impaired attendees at
**World Urban Forum 13 (WUF13)**, a UN-Habitat conference in Baku, Azerbaijan.
Reference number: **05925-WUF-SUS**
Organizer: "Qayğıya Ehtiyacı Olan Şəxslərə Sosial Dəstək" İctimai Birliyi

The system guides users from transport drop-off points through the venue along accessible
paths using BLE beacons, audio (TTS), and haptic feedback on their own smartphones.

**Event dates:** May 17–22, 2026
**System must be fully installed and tested:** by May 3, 2026 (2 weeks before opening)

---

## Venue

**File:** `documents/venue.pdf` — Masterplan, Scale 1:2000
**Rendered tiles:** `documents/venue_hires.png` + individual quadrant PNGs

### Structure
- **Area A** — Registration pavilion + 28 meeting rooms + bilateral hub (north side)
- **Area B** — Main circular arena: media hub, round table rooms, special sessions, dialogue rooms
- **Area C** — Expo Centre (34,200m², rectangular halls, left/west side)
- **Area D** — Ceremony Hall + VVIP Hall
- **Stadium** — oval stadium (bottom/south)
- Outdoor roads: North Stadium Road, West Stadium Road, South Stadium Road, Heydar Aliyev Ave

### Accessibility Paths
Green double lines on the PDF = dedicated accessible corridors.
Beacons are placed along these paths and at all key decision points.

### Constraint
No GIS/coordinate data. PDF is the only spatial reference.
Site access must be formally requested — minimum 2 days on-site before event.

---

## Points of Interest (POIs)

Full list is in `pois.js`. Summary:

| Code | EN | AZ |
|---|---|---|
| ENTRANCE_MAIN | Main Entrance | Əsas Giriş |
| ENTRANCE_WUF | WUF Entrance | WUF Girişi |
| ENTRANCE_STAFF | Staff Entrance/Exit | Personal Giriş/Çıxışı |
| ENTRANCE_INTL_SERVICE | International Services Entrance | Beynəlxalq Xidmət Girişi |
| EXIT_NORTH | Exit (North) | Çıxış (Şimal) |
| EXIT_SOUTH | Exit (South) | Çıxış (Cənub) |
| AREA_A_REGISTRATION | Registration Area | Qeydiyyat Zonası |
| AREA_A_MEETING_ROOMS | Meeting Rooms | Konfrans Zalları |
| AREA_A_BILATERAL_HUB | Bilateral Hub | Konfrans Mərkəzi |
| AREA_B_MEDIA_HUB | Media Hub | Media Mərkəzi |
| AREA_B_ROUND_TABLE | Round Table Rooms | Dairəvi Masa Otaqları |
| AREA_B_SPECIAL_SESSIONS | Special Sessions | Xüsusi Sessiyalar |
| AREA_B_DIALOGUE_ROOMS | Dialogue Rooms | Dialoq Otaqları |
| AREA_C_EXPO | Expo Centre | Ekspo Mərkəzi |
| AREA_D_CEREMONY_HALL | Ceremony Hall | Tədbir Zalı |
| AREA_D_VVIP_HALL | VVIP Hall | VVİP Zalı |
| TRANSPORT_DROPOFF_NORTH | Drop-off Zone North | Minmə Zonası Şimal |
| TRANSPORT_DROPOFF_SOUTH | Drop-off Zone South | Minmə Zonası Cənub |
| TRANSPORT_BUS_STAGING | Bus Staging Area | Ehtiyat Avtobus Yeri |
| TRANSPORT_EV_CHARGING | EV Charging Area | Elektromobil Şarj Zonası |
| PARKING_VVIP | V/VIP Parking | V/VİP Dayanacaq |
| SERVICE_WC | Toilets | Sanitar Qovşağı |
| SERVICE_DOG_RELIEF | Dog Relief Area | İt üçün Tualet Sahəsi |
| SERVICE_AMBULANCE | Ambulance / First Aid | Təcil Yardım |
| STADIUM | Stadium | Stadion |

Individual meeting room numbers inside Area A (×28) confirmed on-site only.

---

## Technology Stack

| Layer | Choice | Reason |
|---|---|---|
| Mobile app | **Flutter** | Best BLE + TTS + accessibility on iOS+Android from one codebase |
| BLE scanning | `flutter_blue_plus` | Most stable, actively maintained, works background iOS+Android |
| TTS | `flutter_tts` | Supports `az-AZ` and `en-US` natively |
| Haptics | `flutter_haptic_feedback` | Native patterns on both platforms |
| Local storage | `hive` or `shared_preferences` | Offline-first |
| Backend API | Node.js + Express + SQLite | Simple, lightweight |
| Admin panel | React (web) | Separate web app, no BLE needed |

**Why not web app:** Web Bluetooth is blocked on iOS Safari entirely. Browser tabs pause
when phone is pocketed — BLE scanning stops. Not viable for a navigation system.

**Why Flutter over React Native:** Better accessibility engine (VoiceOver/TalkBack parity),
compiles to native ARM (better on low-end Android), BLE library more stable on iOS.

---

## Beacon Hardware

**Chosen:** Kontakt.io Tough Beacon (IP67, outdoor, remote dashboard, adjustable TX power)
**Fallback:** Teltonika EYE Beacon (IP67, cheaper)
**Avoid:** MOKOSmart / Minew budget beacons — not weatherproof, no remote monitoring

| Option | 400 units | Notes |
|---|---|---|
| Teltonika EYE | ~$8,000 | |
| Kontakt.io Tough | ~$14,000 | Preferred |
| Mounting hardware | ~$500–1,000 | Brackets, poles, zip ties |

**Placement:**
- Indoor: every 6–8m
- Outdoor: every 10m at critical points
- Mount height: **2.5–3m** (above crowd head level — prevents signal absorption)
- TX power: **-12 to -20 dBm** (limits range to 5–8m, prevents reading far beacons)

---

## BLE Nearest-Beacon Logic

Four combined mitigations for RSSI unreliability:

1. **Low TX power** (-20 to -12 dBm) — phone physically cannot detect beacons >8m away
2. **Dense placement** (6–10m) — phone sees max 2–3 beacons at a time
3. **RSSI smoothing** — keep last 5 readings per beacon, drop min+max, average middle 3
4. **Hysteresis** — only switch to new nearest beacon after it is consistently strongest for 2s

Beacon identified by **major:minor** pair (not full UUID — all venue beacons share UUID prefix).
Stale beacons expire after **5s** of no signal — removed from nearest-beacon calculation.

---

## Database Schema

Full SQL in `schema.sql`. Four tables:

**poi** — navigable destinations (code, name_en, name_az)

**beacon** — physical beacons (major, minor, label, location_note, last_seen_at)
- unique constraint on (major, minor)

**route_instruction** — core table: beacon × destination → instruction + haptic
- `sequence_order` INT nullable:
  - Integer = on correct route for this destination, in this order
  - NULL = off-route beacon → reroute instruction fires
- unique constraint on (beacon_id, poi_id)

**usage_log** — anonymous: poi_id, beacon_id, happened_at
- written locally on device, batch-synced to backend when online

---

## Navigation Business Logic

### Happy Path
```
User opens app
  → Language selection (EN / AZ) — first launch only
  → Types destination (e.g. "Registration")
  → App filters POIs live, speaks result count ("2 results found")
  → User navigates list with UP/DOWN buttons, TTS reads each
  → User confirms → navigation starts → usage_log entry created
  → BLE scan runs continuously in background
  → Nearest beacon detected → lookup route_instruction[beacon][destination]
  → Instruction spoken + haptic fired
  → Next beacon → next instruction → ... → ARRIVED
```

### Destination Change Mid-Route
User taps "Change Destination" → returns to input screen → types new destination →
app immediately re-looks up `newDestination × currentBeacon` → plays new instruction.
No restart. No re-download.

### Skipped Beacon
User passes b1, b2, then jumps to b4 (skipped b3). No problem.
Always use nearest currently detected beacon. Sequence gaps are ignored.

### Wrong Path / Off-Route
User should go b1→b2→b3→b4 but ends up at c5.
c5 has a route_instruction for the destination with `sequence_order = NULL`.
Instruction text: "Wrong direction. Turn around and return to the main corridor."
Every beacon in the venue has an instruction for every destination.
On-route = forward guidance. Off-route (NULL) = reroute instruction.

### Signal Lost
No beacon detected for **30 seconds** → speak "Signal lost. Please stop and wait."
→ SOS haptic pattern → help button prominently shown.
Auto-resumes when beacon detected again.

### Instruction Repeat
Same beacon for **15 seconds** without movement → repeat last instruction automatically.
Shake phone → repeat last instruction on demand.

---

## App Screens

### Screen 1 — Language Selection
First launch only. Two large buttons: English / Azərbaycanca.
Tap → spoken aloud in that language. Saved to local storage. Never shown again.

### Screen 2 — Destination Input
- Large text field, auto-focused, large font (24px+)
- Live filter as user types — debounced 600ms — TTS speaks result count
- UP/DOWN large buttons to cycle filtered results — TTS reads each
- "Read all destinations" button — speaks full POI list with pauses
- Large "Start Navigation" confirm button (enabled only when result selected)
- Side button double-press → speaks full POI list

### Screen 3 — Navigating (main use screen)
- Current instruction in large text (28px+), high contrast, dark background
- Large "Repeat" button (shake also triggers)
- Large "Change Destination" button → back to Screen 2
- Full-width red "Help" button at bottom (always visible, 72px height)
- Screen stays always-on (wake lock)

### Screen 4 — Arrived
- TTS speaks "You have arrived at [name]" automatically on mount
- 3s continuous vibration
- "Navigate Somewhere Else" → Screen 2
- "Exit" → Screen 2

### Screen 5 — Signal Lost
- Auto-shown after 30s no beacon
- TTS + SOS haptic every 10s
- "Call for Help" button
- Auto-dismisses when beacon detected

---

## Offline-First Architecture

- On app open: download full POI list + full route_instruction map from backend API
- Stored locally (hive/shared_preferences)
- All navigation runs from local data — no internet needed during event
- Usage logs queued locally, batch-synced to backend when internet available
- If backend unreachable on open: use cached data from last successful download

### Local State (persisted)
```
device_id         → UUID generated on first install, never changes
selected_language → 'en' or 'az'
cached_pois       → full POI list
cached_route_map  → full beacon × destination → instruction table
current_destination → poi_code
last_beacon_id    → beacon.id
log_queue         → [ { device_id, poi_code, beacon_id, happened_at } ]
```

---

## Haptic Patterns

| Pattern | Meaning | Vibration |
|---|---|---|
| STRAIGHT | Continue straight | 1 long pulse [400ms] |
| RIGHT | Turn right | 2 short pulses [100,100,100,100] |
| LEFT | Turn left | 3 short pulses [100,100,100,100,100,100] |
| ARRIVED | You have arrived | 3s continuous [3000] |
| SOS | Signal lost / help | [100,100,100,100,100,100,300,100,300,100,300,100,100,100,100,100,100] |

---

## Accessibility Requirements

- Full VoiceOver (iOS) + TalkBack (Android) — every element has semantic label
- High contrast UI — dark background (#111), white text
- Font minimum 18px everywhere, buttons minimum 64px height
- No precision gestures — tap only (no swipe, pinch, drag)
- TTS language matches selected app language (az-AZ or en-US)
- TTS never interrupted mid-sentence
- Volume auto-maximized on navigation start (with user confirmation)
- Earphone detection — route audio to earphones if connected
- Screen always-on during navigation

---

## Backend API (minimal)

```
GET  /api/pois          → full POI list
GET  /api/map           → full route_instruction map (beacon × destination)
POST /api/logs          → receive batch usage logs from devices
GET  /api/beacons       → beacon list with last_seen_at (admin panel)
PUT  /api/map/:id       → update a single route_instruction (admin panel)
```

No CMS. Instructions edited directly in the database via admin panel or SQL.
Backend is only needed at app open (download) and for admin operations.
Navigation itself is 100% offline.

---

## Admin Panel (Web — React)

- Table of all route_instructions — edit instruction_en / instruction_az inline
- Beacon status list (online/offline based on last_seen_at)
- Usage log viewer — anonymous, per POI, per day (for WUF reporting)
- No user accounts needed — internal tool, single password protection sufficient

---

## Risk Register

| Risk | Severity | Mitigation |
|---|---|---|
| No site access before event | **Critical** | Request formally from WUF now. Minimum 2 days needed. |
| Beacon installation without site walkthrough | **High** | Pre-configure all beacons before travel. Install team of 3+. |
| Crowd signal absorption (30,000 people) | **High** | Mount at 2.5–3m height |
| Beacon failure during event | **Medium** | Dense grid (neighbor covers). Kontakt.io dashboard monitors remotely. |
| App on low-end Android (€80–100) | **Medium** | Test on cheapest available Android during dev. Flutter handles this better than RN. |
| Wrong instructions (no site walkthrough) | **High** | Mandatory pre-event walkthrough with visually impaired tester. |
| Meeting room numbers not on PDF | **Low** | Confirm individual room numbers on-site during installation. |

---

## Timeline

| Milestone | Date |
|---|---|
| Order beacons | Immediately |
| App core (BLE + TTS + navigation engine) | Week 1–2 |
| App screens + accessibility compliance | Week 2–3 |
| Admin panel | Week 3 |
| Beacon pre-configuration | Week 3 |
| Site access + installation | Week 4 (min 2 days on-site) |
| Full walkthrough test with blind user | Week 4 |
| System go-live deadline | May 3, 2026 |
| Event | May 17–22, 2026 |

---

## Out of Scope

- User accounts / profiles / login
- Visual maps on screen
- QR codes
- AR features
- Social / feedback features
- Push notifications beyond navigation
- Indoor precise room-level positioning (handled by beacon density)
- Web app for navigation (iOS Safari blocks Web Bluetooth — must be native)

---

## Key Files

| File | Purpose |
|---|---|
| `pois.js` | Full POI list with codes, EN and AZ names |
| `schema.sql` | Full database schema (4 tables) |
| `scan.js` | Node.js BLE iBeacon scanner (dev/testing tool) |
| `documents/venue.pdf` | Venue masterplan (Scale 1:2000) |
| `documents/business_requirements.txt` | Original RFP requirements |
| `documents/Texniki təklif (3).pdf` | Submitted technical proposal |
