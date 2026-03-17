const noble = require('@abandonware/noble');

// iBeacon manufacturer data layout (Apple):
// [0-1]  Company ID: 0x004C
// [2]    Beacon type: 0x02
// [3]    Length: 0x15 (21 bytes)
// [4-19] UUID (16 bytes)
// [20-21] Major (2 bytes)
// [22-23] Minor (2 bytes)
// [24]   TX Power (1 byte, signed)

function parseIBeacon(manufacturerData) {
  if (!manufacturerData || manufacturerData.length < 25) return null;

  // Apple company ID is 0x004C (little-endian: 0x4C, 0x00)
  if (manufacturerData[0] !== 0x4c || manufacturerData[1] !== 0x00) return null;
  // iBeacon subtype
  if (manufacturerData[2] !== 0x02 || manufacturerData[3] !== 0x15) return null;

  const uuidBytes = manufacturerData.slice(4, 20);
  const uuid = [
    uuidBytes.slice(0, 4).toString('hex'),
    uuidBytes.slice(4, 6).toString('hex'),
    uuidBytes.slice(6, 8).toString('hex'),
    uuidBytes.slice(8, 10).toString('hex'),
    uuidBytes.slice(10, 16).toString('hex'),
  ].join('-');

  const major = manufacturerData.readUInt16BE(20);
  const minor = manufacturerData.readUInt16BE(22);
  const txPower = manufacturerData.readInt8(24);

  return { uuid, major, minor, txPower };
}

console.log('Starting BLE scan for iBeacons...\n');

noble.on('stateChange', (state) => {
  if (state === 'poweredOn') {
    noble.startScanning([], true); // scan all, allow duplicates for RSSI updates
    console.log('Scanning... (press Ctrl+C to stop)\n');
  } else {
    noble.stopScanning();
    console.log(`BLE state: ${state}`);
  }
});

noble.on('discover', (peripheral) => {
  const { advertisement, rssi, id } = peripheral;
  const mfData = advertisement.manufacturerData;

  const beacon = parseIBeacon(mfData);
  if (!beacon) return; // skip non-iBeacon devices

  console.log('--- iBeacon detected ---');
  console.log(`  Device ID : ${id}`);
  console.log(`  UUID      : ${beacon.uuid}`);
  console.log(`  Major     : ${beacon.major}`);
  console.log(`  Minor     : ${beacon.minor}`);
  console.log(`  TX Power  : ${beacon.txPower} dBm`);
  console.log(`  RSSI      : ${rssi} dBm`);
  console.log(`  Distance  : ~${estimateDistance(beacon.txPower, rssi).toFixed(2)} m`);
  console.log('');
});

function estimateDistance(txPower, rssi) {
  if (rssi === 0) return -1;
  const ratio = rssi / txPower;
  if (ratio < 1.0) return Math.pow(ratio, 10);
  return 0.89976 * Math.pow(ratio, 7.7095) + 0.111;
}
