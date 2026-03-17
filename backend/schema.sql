-- WUF SoundStep — Database Schema
-- ER Diagram (text):
--
--  poi ──< route_instruction >── beacon
--  poi ──< usage_log
--
-- ─────────────────────────────────────────────────────────────────────────────

CREATE TABLE poi (
  id         INTEGER PRIMARY KEY AUTOINCREMENT,
  code       VARCHAR(64)  NOT NULL UNIQUE,  -- e.g. AREA_A_REGISTRATION
  name_en    VARCHAR(255) NOT NULL,
  name_az    VARCHAR(255) NOT NULL
);

-- ─────────────────────────────────────────────────────────────────────────────

CREATE TABLE beacon (
  id            INTEGER PRIMARY KEY AUTOINCREMENT,
  major         INTEGER      NOT NULL,
  minor         INTEGER      NOT NULL,
  label         VARCHAR(255) NOT NULL,       -- human name, e.g. "Corridor Fork B2"
  location_note TEXT,                        -- install note, e.g. "Pole left of door 3"
  last_seen_at  DATETIME,                    -- updated by beacon dashboard
  UNIQUE (major, minor)
);

-- ─────────────────────────────────────────────────────────────────────────────
-- Core table: beacon × destination → what to say + haptic pattern
--
-- sequence_order:
--   INTEGER  → beacon is on the correct route for this POI, in this order
--   NULL     → beacon is off-route for this POI (reroute instruction fires)
-- ─────────────────────────────────────────────────────────────────────────────

CREATE TABLE route_instruction (
  id              INTEGER PRIMARY KEY AUTOINCREMENT,
  beacon_id       INTEGER      NOT NULL REFERENCES beacon(id),
  poi_id          INTEGER      NOT NULL REFERENCES poi(id),
  instruction_en  TEXT         NOT NULL,
  instruction_az  TEXT         NOT NULL,
  haptic          VARCHAR(16)  NOT NULL CHECK (haptic IN ('STRAIGHT','LEFT','RIGHT','ARRIVED','SOS')),
  sequence_order  INTEGER,                   -- NULL = off-route / reroute instruction
  UNIQUE (beacon_id, poi_id)
);

-- ─────────────────────────────────────────────────────────────────────────────
-- Anonymous usage log — written locally on device, batch-synced when online
-- ─────────────────────────────────────────────────────────────────────────────

CREATE TABLE usage_log (
  id           INTEGER PRIMARY KEY AUTOINCREMENT,
  poi_id       INTEGER  NOT NULL REFERENCES poi(id),
  beacon_id    INTEGER  NOT NULL REFERENCES beacon(id),  -- step that was logged
  happened_at  DATETIME NOT NULL
);

-- ─────────────────────────────────────────────────────────────────────────────
-- Indexes
-- ─────────────────────────────────────────────────────────────────────────────

CREATE INDEX idx_route_beacon_poi ON route_instruction (beacon_id, poi_id);
CREATE INDEX idx_usage_log_poi    ON usage_log (poi_id);
