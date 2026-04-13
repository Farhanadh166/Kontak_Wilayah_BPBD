<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Sirine - Digitalisasi BPBD Sumbar 1.0</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css">
   <style>
html, body { height: 100%; margin: 0; }
body { font-family: 'Inter', sans-serif; background: #0f172a; color: #e5e7eb; }

.panel {
    background: linear-gradient(180deg, rgba(2, 6, 23, 0.7), rgba(15, 23, 42, 0.93));
    border: 1px solid rgba(148, 163, 184, 0.25);
    border-radius: 1rem;
    box-shadow: 0 16px 38px rgba(2, 6, 23, 0.6);
}

#map { height: calc(100vh - 210px); border-radius: .9rem; min-height: 640px; }

.stat-box {
    border-radius: .85rem;
    padding: .8rem .95rem;
    background: rgba(15,23,42,.6);
    border:1px solid rgba(148,163,184,.2);
}

.stat-box .label {
    font-size:.72rem;
    text-transform: uppercase;
    letter-spacing: .1em;
    color:#cbd5e1;
}

.stat-box .value {
    font-size:1.15rem;
    font-weight:800;
    color:#fff;
}

.small-muted { color: rgba(229,231,235,.72); font-size:.82rem; }

/* 🔥 ANIMASI PULSE */
.pulse {
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}

/* 🔥 ANIMASI RADAR */
.radar {
    position: relative;
}
.radar::after {
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(34, 197, 94, 0.4);
    top: -6px;
    left: -6px;
    animation: radar 2s infinite;
}
@keyframes radar {
    0% { transform: scale(0.5); opacity: 1; }
    100% { transform: scale(2.5); opacity: 0; }
}

/* popup */
.leaflet-popup-content-wrapper,
.leaflet-popup-tip {
    background: #0b1220;
    color: #e5e7eb;
    border:1px solid rgba(148,163,184,.2);
}
</style>
</head>
<body>

    
<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <div class="badge bg-dark border border-info-subtle text-info px-3 py-2">Digitalisasi BPBD Sumbar 1.0</div>
            <h1 class="h3 mt-2 mb-1">Monitoring Sirine Peringatan Dini</h1>
            <div class="small-muted">Visualisasi peta sirine untuk monitoring petugas, lokasi, status aktif, dan kondisi alat.</div>
        </div>
        <div class="d-flex gap-2">
            <a href="/" class="btn btn-outline-light btn-sm">Home</a>
            <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Total</div><div class="value">{{ $stats['total'] }}</div></div></div>
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Aktif</div><div class="value text-success">{{ $stats['aktif'] }}</div></div></div>
        <div class="col-6 col-md-2"><div class="stat-box"><div class="label">Nonaktif</div><div class="value text-secondary">{{ $stats['nonaktif'] }}</div></div></div>
    </div>

    <div class="panel p-3 mb-3">
        <form method="GET" action="/sirine" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="small-muted">Filter Lokasi</label>
                <select name="lokasi" class="form-select form-select-sm">
                    <option value="">Semua lokasi</option>
                    @foreach($lokasiList as $itemLokasi)
                        <option value="{{ $itemLokasi }}" @selected($lokasi === $itemLokasi)>{{ $itemLokasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="small-muted">Status Aktif</label>
                <select name="status_aktif" class="form-select form-select-sm">
                    <option value="">Semua</option>
                    <option value="aktif" @selected($statusAktif === 'aktif')>Aktif</option>
                    <option value="nonaktif" @selected($statusAktif === 'nonaktif')>Nonaktif</option>
                </select>
            </div>
            <div class="col-md-3 d-grid">
                <button class="btn btn-info btn-sm">Terapkan Filter</button>
            </div>
            <div class="col-md-2 d-grid">
                <a href="/sirine" class="btn btn-outline-light btn-sm">Reset</a>
            </div>
        </form>
    </div>

    <div class="panel p-3">
        <div class="fw-bold mb-2">Peta Sirine Sumatera Barat</div>
        <div id="map"></div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
<script>
const sirines = @json($sirinesForMap);

const sumbarBounds = L.latLngBounds(
    L.latLng(-2.60, 98.65),
    L.latLng(0.55, 101.55)
);

const map = L.map('map', {
    maxBounds: sumbarBounds,
    maxBoundsViscosity: 1.0,
    minZoom: 10,
    zoomAnimation: true,
    fadeAnimation: true
});

map.fitBounds(sumbarBounds);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

/* 🔥 CUSTOM MARKER */
function createPin(statusAktif) {
    const isActive = statusAktif === 'aktif';
    const color = isActive ? '#22c55e' : '#6b7280';
    const label = isActive ? 'A' : 'N';

    return L.divIcon({
        className: '',
        html: `
            <div class="${isActive ? 'radar pulse' : ''}">
                <svg width="28" height="40" viewBox="0 0 28 40">
                    <path d="M14 1C7 1 1.5 6.5 1.5 13.5C1.5 22.5 14 39 14 39C14 39 26.5 22.5 26.5 13.5C26.5 6.5 21 1 14 1Z"
                          fill="${color}" stroke="#ffffff" stroke-width="2"/>
                    <circle cx="14" cy="14" r="7.5" fill="#0b1220"/>
                    <text x="14" y="17.2" text-anchor="middle"
                          font-size="9.5" font-weight="700"
                          fill="#ffffff">${label}</text>
                </svg>
            </div>
        `,
        iconSize: [28, 40],
        iconAnchor: [14, 38],
        popupAnchor: [0, -34]
    });
}

/* 🔥 CLUSTER */
const clusterGroup = L.markerClusterGroup({
    disableClusteringAtZoom: 13,
    spiderfyOnMaxZoom: true,
    showCoverageOnHover: false,
    maxClusterRadius: 45
});

/* 🔥 LOAD MARKER DENGAN ANIMASI */
sirines.forEach((s, index) => {

    const popup = `
        <div style="min-width: 240px;">
            <div style="font-weight:700;">Petugas: ${s.nama_petugas}</div>
            <div style="font-size:12px;">Lokasi: ${s.lokasi}</div>
            <div style="font-size:12px;">Koordinat: ${s.lat}, ${s.lng}</div>
            <div style="font-size:12px;">Status: <b>${s.status_aktif.toUpperCase()}</b></div>
            <div style="font-size:12px;">Kondisi: ${s.kondisi_alat || '-'}</div>
        </div>
    `;

    setTimeout(() => {
        clusterGroup.addLayer(
            L.marker([s.lat, s.lng], {
                icon: createPin(s.status_aktif)
            }).bindPopup(popup)
        );
    }, index * 200); // delay muncul
});

map.addLayer(clusterGroup);
</script>
</body>
</html>

