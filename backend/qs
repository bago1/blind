- yolda qerarini deisse ne olacaq
- internetsiz olacaq, ona gore de biz calisaq bun lari frontda tutaq. backend mehz data tutmaq ucundu. biz access pointleri ve s backendde saxlayiriq, ilk defe user proqrami acanda her sey yuklenmis olur ve qalir frontda.
- biz frontda her defe sonuncu beakon datasini ve  hara getmek istediyini saxlayaq. evvelki hereketler mehz loggin ucundur. backende gerek yoxdur her defe gondermek
- en yaxin olan beaconu teyin elemeliyik ki uzaqdaki bekonun siqnalini esas goturmesin, faktiki hansidirsa onub gotursun
- case: user necese oldu next beaconu gormedi. meselen o kecmelidir b1,b2,b3,b4 amma b1,b2 kecdi ve b4 e catdi b3-u kecmedi. bu halda b4 son goturulur yene.
- user b1,b2,b3,b4 kecmelidir, b1,b2 kecdi, sonra sehven c5-e getdi, biz onu o zaman yeniden c5-b4 routuna qaytarmaliyuq
- be cms vermiyek, ozumuz manual kodda duzel



--
  Screen 2 — Destination Input

  The main screen. User lands here every time they open the app.
  - Single large text field: "Enter your destination" (Apple's voiceover says the text in azeri?
  - Keyboard opens immediately (auto-focus)
  - As user types → live voice readback of what they typed ( will he should type all text (poi name) - or he types and we filter out and loudly says current;y 3 found and he press something we say what have found)
  - Side button double-press → speaks full list of available POIs
  - Large "Start Navigation" confirm button (what if he pressed whong dstinations wants to cancel)
  - Validation: if POI not found → speaks error, stays on this screen

user basdi destinationu - tesdiq istesin. onu ui-da nezere almaq. (ekrana 2 defe toxunun )n cancel ucun - claudea give idea




Based on everything we have, the app needs exactly these screens:

  ---
  Screen 1 — Language Selection

  First launch only.
  - Two large buttons: English / Azərbaycanca
  - Tapped → spoken aloud in that language
  - Saved, never shown again

  ---
  Screen 2 — Destination Input

  The main screen. User lands here every time they open the app.
  - Single large text field: "Enter your destination"
  - Keyboard opens immediately (auto-focus)
  - As user types → live voice readback of what they typed
  - Side button double-press → speaks full list of available POIs
  - Large "Start Navigation" confirm button
  - Validation: if POI not found → speaks error, stays on this screen

  ---
  Screen 3 — Navigating (Active Navigation)

  Shown after destination confirmed. This is the main use screen.
  - Large text showing current instruction (for partial-vision users)
  - One big "Repeat" button (shake also triggers this)
  - One big "Change Destination" button → goes back to Screen 2
  - One always-visible red panic/help button (bottom, full width)
  - Screen stays always-on

  ---
  Screen 4 — Arrived

  Shown when user reaches destination beacon (ARRIVED haptic).
  - Speaks: "You have arrived at [destination]"
  - Large "Navigate Somewhere Else" button → back to Screen 2
  - Large "Exit" button

  ---
  Screen 5 — Signal Lost

  Shown automatically after 30s no beacon.
  - Loud tone plays
  - Text: "Signal lost. Please stop and wait."
  - Large "Call for Help" button (triggers coordinator alert)
  - Dismisses automatically when beacon is detected again

  ---
  That's it. 5 screens total.

  Language Select (once)
         ↓
  Destination Input  ←──────────────────┐
         ↓                              │
    Navigating  ── Signal Lost          │
         ↓                              │
     Arrived  ──────────────────────────┘

  No maps, no menus, no settings, no login. Every element must have a VoiceOver/TalkBack label.

