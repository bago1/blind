# WUF Blind Navigation — Project Brief

## What This Is

Accessibility navigation solution for **blind and visually impaired attendees** at the
**World Urban Forum (WUF)** — a UN-Habitat conference.

The system guides users from their transport drop-off points through the venue along
pre-defined accessible paths, using audio and haptic feedback on their own smartphones.

---

## Venue

**Reference file:** `venue.pdf` (Masterplan, Scale 1:2000, single-page PDF, 44MB)
**Preview images:** `venue_hires.png`, `venue_center.png`, `venue_top_left.png`, etc. (generated from PDF)

### What the Venue Contains
- Large **circular main arena / convention hall** (center of plan)
- Smaller **oval stadium** (bottom-right of plan)
- **Exhibition / pavilion halls** (rectangular, left side)
- Large **outdoor plazas, roads, and parking areas**
- Multiple **transport drop-off zones** at the perimeter

### Accessibility Paths
Marked on the PDF as **green double lines**. These are the dedicated accessible corridors
connecting all transport drop-off points around the venue perimeter to:
- Main arena entrance
- Registration
- Exhibition halls
- Stadium entrance
- Accessible toilets, first aid, prayer rooms

### Key Constraint
We do **not** have GIS/coordinate data for the venue. The PDF is the only spatial reference.
We do **not** have confirmed site access before the event. A pre-event site visit (minimum
2 days) must be formally requested from WUF/venue organizers — this is the single biggest
project risk.

---

## Project Constraints

| Constraint | Detail |
|---|---|
| **Timeline** | 1 month total preparation. Event runs 1 week. |
| **Venue data** | PDF only (venue.pdf). No GIS, no CAD export, no WiFi infrastructure info. |
| **Site access** | Not confirmed. Must be requested urgently. |
| **Users' devices** | Attendees' own smartphones (iOS + Android). No venue-provided hardware. |
| **Users** | ~25,000–30,000 attendees. Unknown proportion visually impaired. |
| **WiFi/connectivity** | No shared venue WiFi infrastructure available to us. App must work offline. |
| **Budget** | Flexible. 400–600 beacons is acceptable. |

---

## Chosen Technology: BLE Beacons Only

After evaluating GPS hybrid, UWB, NFC, and BLE-only approaches, the decision is:

**BLE beacons deployed along all green accessibility paths, app on users' phones.**

### Why Beacons Only (given flexible budget)
- No 220v / power cables needed — beacons run on AA or coin cell batteries
- Battery life: 1–3 years at normal intervals. A 1-week event is zero battery risk.
- 400–500 beacons at 8–10m spacing covers the full green path network
- Mounting at **2.5–3m height** mitigates crowd signal absorption (30,000 people)
- Dense grid + low TX power eliminates the "far beacon reads closer" problem

### Known Drawbacks of Beacons-Only
- Outdoor RSSI fluctuation (signal bounce, scatter) — mitigated by RSSI smoothing + low TX power
- Crowd absorption at 2.4GHz — mitigated by elevated mounting (2.5–3m)
- No fallback if beacon fails — mitigated by dense grid (if one fails, neighbors cover)
- Requires physical site installation — cannot be done remotely
- Requires at minimum 1–2 days on site for install + calibration before event opens

### Rejected Alternatives (and Why)
- **GPS alone** — good for outdoor but useless indoors, no infrastructure cost but path data needed
- **GPS + BLE hybrid** — best technical solution but adds complexity; budget allows full BLE grid
- **UWB** — excellent precision indoors but expensive anchors, requires power, complex install
- **NFC tags** — good supplement at decision points, not a standalone navigation system
- **WiFi positioning** — no shared venue WiFi available

---

## Beacon Hardware Recommendation

### Recommended Brands for Outdoor Deployment

| Brand | Model | Price/unit | Why |
|---|---|---|---|
| **Kontakt.io** | Tough Beacon | ~$30–45 | IP67 waterproof, adjustable TX power, best fleet dashboard — see which beacons are offline remotely |
| **Teltonika** | EYE Beacon | ~$15–25 | IP67, industrial grade, lower cost |
| **Estimote** | Location Beacon | ~$30–40 | Best developer SDK, easiest app integration |
| MOKOSmart | H2/H4 | ~$5–10 | Budget only — not weatherproof, no remote monitoring. Avoid outdoors. |
| Minew | E8/I3 | ~$8–15 | Budget only — same concerns as above |

### Recommended Choice
**Kontakt.io Tough Beacon** — IP67, remote monitoring dashboard, adjustable TX power.
If budget is tighter: **Teltonika EYE Beacon**.

### Estimated Cost (400 units)
| Option | Total |
|---|---|
| Teltonika | ~$8,000 |
| Kontakt.io Tough | ~$14,000 |
| + Mounting hardware (brackets, poles, zip ties) | ~$500–1,000 |

---

## Solving the "Wrong Distance" Problem

BLE RSSI is unreliable by nature. Four combined mitigations:

1. **Low TX power** (-20 to -12 dBm): beacon range reduced to 5–8m. Phone cannot detect beacons 20m away. Problem mostly eliminated physically.
2. **Dense placement** (every 8–10m): phone sees maximum 2–3 beacons at any time.
3. **RSSI smoothing in app**: take 5 consecutive readings, drop highest and lowest, average the rest. ~50 lines of code.
4. **Hysteresis rule**: only switch to a new "nearest beacon" if it is consistently stronger for 2 full seconds. Prevents flickering.

---

## App: What Must Be Built

### Platform
**Flutter** recommended — one codebase for iOS + Android, good accessibility support,
fast development. Decision depends on team's existing stack.

### Languages
Minimum: **English, Arabic, French, Spanish** (UN official languages for WUF audience).

### Must-Have Features

#### Onboarding
- Language selection (spoken aloud)
- Single large "Start Navigation" button
- Bluetooth permission request with audio explanation
- Zero login, zero registration

#### Destination Selection
- Fully VoiceOver (iOS) / TalkBack (Android) compatible
- Destinations read aloud, selected by double-tap
- Destinations: Main Entrance, Registration, Hall A/B/C, Accessible Toilets, Prayer Room, First Aid, Exit/Transport Pickup
- Confirmation spoken back before navigation starts

#### Core Navigation Engine
- Continuous BLE scan
- RSSI smoothing + hysteresis (see above)
- Each beacon UUID maps to a plain-language instruction per destination
- Instruction fires once on entering beacon range
- Repeats after 15s if user has not moved
- Signal lost after 30s → audio warning + optional staff notification

#### Audio Output
- Text-to-speech (not pre-recorded) so instructions can be updated without app release
- Spoken at slightly slower than normal pace
- Shake phone = repeat last instruction
- Auto-maximize volume on navigation start (with user confirmation)
- Earphone detection: output to earphones if connected
- Never interrupt a playing instruction

#### Haptic Feedback
| Pattern | Meaning |
|---|---|
| 1 long pulse | Continue straight |
| 2 short pulses | Turn right |
| 3 short pulses | Turn left |
| Continuous 3 sec | Arrived |
| SOS pattern | Signal lost / needs help |

#### Emergency / Help
- Hold volume-down 3 seconds → contacts venue accessibility coordinator
- Plays loud tone if no connectivity (so nearby staff can locate user)
- Signal-lost state → auto-notify coordinator if online
- Always-visible large panic button on screen

#### Accessibility Compliance
- Full VoiceOver + TalkBack support (every element labeled)
- High contrast mode (many users have partial vision, not total blindness)
- Respects OS font size / display settings
- No precision gestures (no swipes, pinch, etc.)
- Screen stays always-on during navigation

#### Offline Operation
- Full beacon ID → instruction map downloaded at app open
- Works with no internet during navigation (Bluetooth does not require WiFi/data)

### Admin Panel (Separate Web App)
- Edit beacon instructions without releasing new app version
- View beacon online/offline status
- Push route updates to all users if path changes during event
- Anonymous usage logs per route (for WUF reporting)

### Out of Scope (Do Not Build)
- User accounts or profiles
- Visual maps on screen
- QR codes
- AR features
- Social or feedback features during event
- Push notifications beyond navigation alerts

---

## Risk Register

| Risk | Severity | Mitigation |
|---|---|---|
| No site access before event | **Critical** | Request formally from WUF organizers immediately |
| Beacon installation day-of | **High** | Pre-configure all beacons before travel. Dedicated install team. |
| Radio interference at 30,000 people | **High** | Mount beacons at 2.5–3m height |
| Beacon failure during event | **Medium** | Dense grid so neighbors provide coverage. Kontakt.io dashboard for monitoring. |
| App not working on cheap Android devices | **Medium** | Test on low-end Android (€80–100 range) during development |
| Path instructions wrong (no site walkthrough) | **High** | Mandatory pre-event site visit. Cannot skip. |
| 4-language TTS quality | **Low** | Use Google TTS or Apple TTS — both support all 4 UN languages natively |

---

## Timeline (4 Weeks)

| Week | Activity |
|---|---|
| **Week 1** | Order beacons. Start app development. Request site access from WUF. Define all beacon IDs and instruction texts (can be done from PDF). |
| **Week 2** | App core navigation engine + audio. Configure all beacons (UUID, TX power, broadcast interval). |
| **Week 3** | App admin panel. Multi-language TTS. Haptics. Accessibility compliance testing. |
| **Week 4** | Site installation (2 days minimum on site). Full path walkthrough test with a team member simulating blind navigation. Bug fixes. |
| **Event week** | Monitor beacon dashboard. Accessibility coordinator on call. Rapid response for any reported issues. |

---

## Open Decisions

- [ ] What is the team's tech stack? (determines Flutter vs React Native vs native)
- [ ] Has site access been formally requested from WUF organizers?
- [ ] Which beacon brand to order? (order immediately — delivery time matters)
- [ ] Who is the venue accessibility coordinator during the event?
- [ ] Will the app be published to App Store / Play Store or distributed via QR/link (MDM)?
- [ ] Are tactile paving strips physically being installed along the green paths, or is it pavement only?
