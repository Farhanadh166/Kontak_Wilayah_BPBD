<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak BPBD Sumatera Barat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0f172a;
            color: #e5e7eb;
        }
        .hero {
            background: radial-gradient(circle at top left, #22d3ee55, transparent 60%),
                        radial-gradient(circle at bottom right, #f9731655, transparent 55%);
            padding: 4rem 0 3rem;
        }
        .hero-title {
            font-size: clamp(2.2rem, 3vw, 2.8rem);
            font-weight: 700;
            letter-spacing: -0.03em;
        }
        .hero-subtitle {
            font-size: 0.98rem;
            color: rgba(229, 231, 235, 0.82);
        }
        .badge-pill {
            border-radius: 999px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: .12em;
        }
        .glass-panel {
            background: rgba(15, 23, 42, 0.9);
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.35);
            box-shadow:
                0 22px 45px rgba(15, 23, 42, 0.85),
                0 0 0 1px rgba(15, 23, 42, 1);
        }
        .filter-label {
            font-size: 0.78rem;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: .16em;
            font-weight: 600;
        }
        .filter-control {
            background-color: #020617;
            border-radius: .85rem;
            border: 1px solid #1f2937;
            color: #e5e7eb;
            font-size: 0.9rem;
        }
        .filter-control:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 0 1px rgba(34, 211, 238, 0.4);
            background-color: #020617;
            color: #e5e7eb;
        }
        .filter-control option {
            background-color: #020617;
            color: #e5e7eb;
        }
        .filter-input {
            background-color: #020617;
            border-radius: .85rem;
            border: 1px solid #1f2937;
            color: #e5e7eb;
            font-size: 0.9rem;
        }
        .filter-input::placeholder {
            color: #6b7280;
        }
        .filter-input:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 0 1px rgba(34, 211, 238, 0.4);
            background-color: #020617;
            color: #e5e7eb;
        }
        .btn-primary-soft {
            background: linear-gradient(to right, #22c55e, #16a34a);
            border: none;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 999px;
            padding-inline: 1.3rem;
        }
        .btn-primary-soft:hover {
            background: linear-gradient(to right, #16a34a, #15803d);
        }
        .btn-outline-light-soft {
            border-radius: 999px;
            font-size: 0.88rem;
            border-color: rgba(148, 163, 184, 0.6);
            color: #e5e7eb;
        }
        .btn-outline-light-soft:hover {
            background-color: rgba(148, 163, 184, 0.15);
            color: #f9fafb;
        }
        .section-title {
            font-size: 1.05rem;
            font-weight: 600;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: #9ca3af;
        }
        .wilayah-card {
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.22);
            background:
                radial-gradient(circle at top left, rgba(34, 211, 238, 0.14), transparent 55%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.12), transparent 55%),
                linear-gradient(180deg, rgba(2, 6, 23, 0.82), rgba(15, 23, 42, 0.94));
            transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease, background .16s ease;
            position: relative;
            overflow: hidden;
        }
        .wilayah-card:hover {
            transform: translateY(-3px);
            border-color: rgba(56, 189, 248, 0.85);
            box-shadow:
                0 28px 65px rgba(2, 6, 23, 0.75),
                0 0 0 1px rgba(56, 189, 248, 0.12);
        }
        /* Aksen warna cerah berbeda per card */
        .wilayah-card::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: radial-gradient(circle at top left, rgba(var(--accent-rgb), 0.45), transparent 60%);
            pointer-events: none;
            opacity: 0.9;
        }
        .wilayah-card::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 6px;
            background: linear-gradient(90deg,
                rgba(var(--accent-rgb), 0.95),
                rgba(255, 255, 255, 0.10));
            pointer-events: none;
        }
        .kontak-card:nth-child(6n + 1) .wilayah-card { --accent-rgb: 34, 211, 238; } /* cyan */
        .kontak-card:nth-child(6n + 2) .wilayah-card { --accent-rgb: 34, 197, 94; }  /* green */
        .kontak-card:nth-child(6n + 3) .wilayah-card { --accent-rgb: 59, 130, 246; } /* blue */
        .kontak-card:nth-child(6n + 4) .wilayah-card { --accent-rgb: 168, 85, 247; } /* purple */
        .kontak-card:nth-child(6n + 5) .wilayah-card { --accent-rgb: 249, 115, 22; } /* orange */
        .kontak-card:nth-child(6n + 6) .wilayah-card { --accent-rgb: 236, 72, 153; } /* pink */
        .wilayah-title {
            font-size: 1.12rem;
            font-weight: 700;
            color: #f9fafb;
            letter-spacing: -0.02em;
        }
        .wilayah-meta {
            font-size: 0.86rem;
            color: rgba(229, 231, 235, 0.78);
        }
        .region-header {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            margin-bottom: 1rem;
        }
        .region-logo {
            width: 52px;
            height: 52px;
            object-fit: contain;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.5);
            box-shadow: 0 8px 20px rgba(2, 6, 23, 0.45);
            flex-shrink: 0;
            padding: 2px;
        }
        .hierarchy-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        .hierarchy-item {
            border: 1px solid rgba(148, 163, 184, 0.3);
            border-radius: 0.85rem;
            background: rgba(15, 23, 42, 0.58);
            padding: 0.75rem 0.9rem;
        }
        .hierarchy-item .role-label {
            display: inline-block;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            color: #a5f3fc;
            margin-bottom: 0.4rem;
            font-weight: 700;
        }
        .person-name {
            color: #f8fafc;
            font-weight: 600;
            font-size: 0.97rem;
            line-height: 1.25;
            word-break: break-word;
        }
        .person-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .person-photo {
            width: 68px;
            height: 68px;
            object-fit: cover;
            border-radius: 0.55rem;
            border: 2px solid rgba(148, 163, 184, 0.65);
            background: rgba(15, 23, 42, 0.7);
            flex-shrink: 0;
            padding: 2px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.06);
        }
        .person-content {
            min-width: 0;
            flex: 1;
        }
        .person-phone {
            margin-top: 0.28rem;
            font-size: 0.87rem;
            color: #dbeafe;
            text-decoration: none;
            display: inline-block;
        }
        .person-phone:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .operator-section {
            margin-top: 1rem;
            border-top: 1px dashed rgba(148, 163, 184, 0.35);
            padding-top: 0.95rem;
        }
        .operator-title {
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            color: rgba(229, 231, 235, 0.84);
            font-weight: 700;
            margin-bottom: 0.65rem;
        }
        .operator-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }
        .operator-item {
            border: 1px solid rgba(148, 163, 184, 0.25);
            border-radius: 0.8rem;
            background: rgba(15, 23, 42, 0.42);
            padding: 0.65rem 0.75rem;
        }
        .operator-role {
            display: inline-block;
            font-size: 0.67rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #bae6fd;
            margin-bottom: 0.35rem;
            font-weight: 700;
        }
        .operator-empty {
            color: rgba(226, 232, 240, 0.72);
            font-size: 0.9rem;
        }
        .table-dark-custom {
            --bs-table-bg: transparent;
            --bs-table-striped-bg: rgba(15, 23, 42, 0.9);
            --bs-table-striped-color: #e5e7eb;
            --bs-table-hover-bg: rgba(15, 23, 42, 0.95);
            --bs-table-hover-color: #f9fafb;
            color: #f3f4f6;
            border-color: #111827;
        }
        .table-dark-custom thead {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: .14em;
            color: rgba(229, 231, 235, 0.78);
        }
        .table-dark-custom tbody td {
            vertical-align: middle;
            font-size: 0.92rem;
            border-color: #111827;
            color: #f3f4f6;
        }
        .table-dark-custom tbody th {
            color: #f3f4f6;
        }
        .table-dark-custom a {
            color: #e0f2fe;
        }
        .table-dark-custom a:hover {
            color: #ffffff;
        }
        .badge-jabatan {
            border-radius: 999px;
            font-size: 0.76rem;
            padding-inline: .7rem;
            padding-block: .22rem;
            background: rgba(59, 130, 246, 0.16);
            border: 1px solid rgba(59, 130, 246, 0.45);
            color: #bfdbfe;
        }
        .text-muted-soft {
            color: rgba(229, 231, 235, 0.72);
        }
        footer {
            border-top: 1px solid rgba(31, 41, 55, 1);
            font-size: 0.8rem;
            color: rgba(229, 231, 235, 0.75);
        }
        .footer-title {
            font-weight: 600;
            color: rgba(249, 250, 251, 0.92);
        }
        .footer-text {
            color: rgba(229, 231, 235, 0.76);
        }
        .footer-subtext {
            color: rgba(229, 231, 235, 0.62);
        }
        .footer-link {
            color: rgba(125, 211, 252, 0.95);
            text-decoration: none;
        }
        .footer-link:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .hero-logo-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hero-logo {
            width: min(420px, 80%);
            height: auto;
            filter: drop-shadow(0 22px 38px rgba(2, 6, 23, 0.75));
            opacity: 0.95;
        }
        @media (max-width: 768px) {
            .hero {
                padding-top: 3rem;
                padding-bottom: 2.25rem;
            }
            .hero-logo {
                width: min(280px, 85%);
            }
            .operator-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge bg-slate-900 border border-info-subtle text-info badge-pill mb-3 px-3 py-2">
                        Direktori Kontak Resmi BPBD
                    </span>
                    <h1 class="hero-title mb-3">
                        Kontak BPBD <span class="text-info">Sumatera Barat</span>
                        Kedaruratan &amp; Logistik
                    </h1>
                    <p class="hero-subtitle mb-4">
                        Halaman ini memuat nomor kontak pejabat dan petugas BPBD di seluruh wilayah
                        Provinsi Sumatera Barat. Gunakan dengan bijak untuk kebutuhan penanggulangan
                        bencana, koordinasi kedaruratan, dan dukungan logistik.
                    </p>
                    <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                        <a href="#daftar-kontak" class="btn btn-primary-soft">
                            Lihat Daftar Kontak
                        </a>
                        <a href="/dashboard" class="btn btn-outline-light-soft">
                            Masuk Dashboard Admin
                        </a>
                    </div>
                    <p class="text-muted-soft mb-0" style="font-size: 0.82rem;">
                        Data diambil langsung dari basis data internal aplikasi ini. Pastikan selalu
                        mengikuti arahan resmi BPBD dan instansi terkait saat menghadapi keadaan darurat.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="hero-logo-wrap">
                        <img class="hero-logo"
                             src="{{ url('/assets/bpbd.png') }}"
                             alt="Logo BPBD Provinsi Sumatera Barat">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pb-5">
        <section class="mb-4">
            <div class="container">
                <div class="glass-panel p-3 p-md-4">
                    <div class="d-flex flex-column flex-md-row align-items-md-end gap-3">
                        <div class="flex-grow-1">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="filter-label mb-1">Filter Wilayah</label>
                                    <select id="filter-wilayah" class="form-select filter-control">
                                        <option value="">Semua wilayah</option>
                                        @foreach($wilayahList as $w)
                                            <option value="{{ $w->id }}">{{ $w->nama_wilayah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="filter-label mb-1">Filter Jabatan</label>
                                    <select id="filter-jabatan" class="form-select filter-control">
                                        <option value="">Semua jabatan</option>
                                        @foreach($jabatanList as $j)
                                            <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="filter-label mb-1">Pencarian Cepat</label>
                                    <input id="filter-search"
                                           type="text"
                                           class="form-control filter-input"
                                           placeholder="Cari nama atau nomor HP">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-md-end">
                            <span class="filter-label mb-1">Ringkasan</span>
                            <div class="d-flex flex-wrap gap-2" style="font-size: 0.8rem;">
                                <span class="badge bg-dark border border-slate-700 text-slate-200">
                                    {{ $wilayahList->count() }} Wilayah
                                </span>
                                <span class="badge bg-dark border border-slate-700 text-slate-200">
                                    {{ $jabatanList->count() }} Jabatan
                                </span>
                                <span class="badge bg-dark border border-slate-700 text-slate-200">
                                    {{ $kontak->count() }} Kontak
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="daftar-kontak">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="section-title mb-0">Daftar Kontak per Wilayah</h2>
                </div>

                @php
                    $grouped = $kontak->groupBy(function ($k) {
                        return optional($k->wilayah)->id ?: 'tanpa-wilayah';
                    });
                @endphp

                <div class="row g-4 g-md-4">
                    @foreach($grouped as $wilayahId => $items)
                        @php
                            $wilayahNama = optional($items->first()->wilayah)->nama_wilayah ?? 'Tanpa Wilayah';
                            $normalized = $items->map(function ($item) {
                                $role = \Illuminate\Support\Str::lower(trim(optional($item->jabatan)->nama_jabatan ?? ''));
                                if (in_array($role, ['kabid kl', 'kabid kedaruratan & logistik', 'kepala bidang kedaruratan & logistik'])) {
                                    $role = 'kepala bidang kedaruratan & logistik';
                                } elseif (in_array($role, ['kalaksa', 'kepala pelaksana'])) {
                                    $role = 'kepala pelaksana';
                                } elseif ($role === 'kasi kedarutan') {
                                    $role = 'kasi kedaruratan';
                                }
                                $item->role_normalized = $role;
                                return $item;
                            });

                            $singleRoles = [
                                'kepala pelaksana' => 'Kepala Pelaksana',
                                'kepala bidang kedaruratan & logistik' => 'Kepala Bidang Kedaruratan & Logistik',
                                'kasi kedaruratan' => 'Kasi Kedaruratan',
                                'kasi logistik' => 'Kasi Logistik',
                            ];

                            $singleData = collect($singleRoles)->mapWithKeys(function ($label, $key) use ($normalized) {
                                return [$key => [
                                    'label' => $label,
                                    'item' => $normalized->firstWhere('role_normalized', $key),
                                ]];
                            });

                            $operators = $normalized->filter(function ($item) {
                                return in_array($item->role_normalized, ['operator pusdalops', 'operator database']);
                            })->values();
                        @endphp
                        <div class="col-12 kontak-card"
                             data-wilayah-id="{{ $wilayahId !== 'tanpa-wilayah' ? $wilayahId : '' }}">
                            <div class="wilayah-card h-100 p-4 p-md-4">
                                <div class="region-header">
                                    <img class="region-logo" src="{{ optional($items->first()->wilayah)->foto ? \Illuminate\Support\Facades\Storage::url(optional($items->first()->wilayah)->foto) : url('/assets/bpbd.png') }}" alt="Logo BPBD {{ $wilayahNama }}">
                                    <div>
                                        <div class="wilayah-title">
                                            {{ $wilayahNama }}
                                        </div>
                                        <div class="wilayah-meta">
                                            {{ $items->count() }} kontak terdaftar
                                        </div>
                                    </div>
                                </div>

                                <div class="hierarchy-grid">
                                    @foreach($singleData as $roleKey => $roleInfo)
                                        @php $person = $roleInfo['item']; @endphp
                                        <div class="hierarchy-item">
                                            <div class="role-label">{{ $roleInfo['label'] }}</div>
                                            @if($person)
                                                <div class="person-item"
                                                     data-wilayah-id="{{ optional($person->wilayah)->id }}"
                                                     data-jabatan-id="{{ optional($person->jabatan)->id }}"
                                                     data-nama="{{ \Illuminate\Support\Str::lower($person->nama) }}"
                                                     data-hp="{{ \Illuminate\Support\Str::lower($person->no_hp) }}">
                                                    <div class="person-head">
                                                        <div class="person-content">
                                                            <div class="person-name">{{ $person->nama }}</div>
                                                            <a href="tel:{{ $person->no_hp }}" class="person-phone">{{ $person->no_hp }}</a>
                                                        </div>
                                                        <img class="person-photo" src="{{ $person->foto ? \Illuminate\Support\Facades\Storage::url($person->foto) : url('/assets/bpbd.png') }}" alt="Foto {{ $person->nama }}">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="operator-empty">Belum ada data.</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="operator-section">
                                    <div class="operator-title">Operator Pusdalops &amp; Operator Database</div>
                                    <div class="operator-list">
                                        @forelse($operators as $op)
                                            <div class="operator-item person-item"
                                                 data-wilayah-id="{{ optional($op->wilayah)->id }}"
                                                 data-jabatan-id="{{ optional($op->jabatan)->id }}"
                                                 data-nama="{{ \Illuminate\Support\Str::lower($op->nama) }}"
                                                 data-hp="{{ \Illuminate\Support\Str::lower($op->no_hp) }}">
                                                <div class="operator-role">{{ optional($op->jabatan)->nama_jabatan ?? '-' }}</div>
                                                <div class="person-head">
                                                    <div class="person-content">
                                                        <div class="person-name">{{ $op->nama }}</div>
                                                        <a href="tel:{{ $op->no_hp }}" class="person-phone">{{ $op->no_hp }}</a>
                                                    </div>
                                                    <img class="person-photo" src="{{ $op->foto ? \Illuminate\Support\Facades\Storage::url($op->foto) : url('/assets/bpbd.png') }}" alt="Foto {{ $op->nama }}">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="operator-empty">Belum ada data operator.</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($grouped->isEmpty())
                        <div class="col-12">
                            <div class="text-center py-5 text-muted-soft">
                                Belum ada data kontak yang tersimpan.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <footer class="py-4 mt-4">
        <div class="container">
            <div class="row g-3 align-items-start">
                <div class="col-md-6">
                    <div class="footer-title mb-1">
                        BPBD Provinsi Sumatera Barat
                    </div>
                    <div class="footer-text">
                        &copy; {{ date('Y') }} Direktori Kontak Kedaruratan &amp; Logistik.
                    </div>
                    <div class="footer-subtext mt-1">
                        Akses admin: <a class="footer-link" href="/dashboard">Dashboard</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-title mb-1">Catatan</div>
                    <div class="footer-text">
                        Data pada halaman ini bersifat informatif untuk koordinasi.
                    </div>
                    <div class="footer-subtext mt-1">
                        Untuk keadaan darurat, ikuti prosedur dan hubungi layanan resmi yang ditetapkan pemerintah daerah.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        (function () {
            const wilayahSelect = document.getElementById('filter-wilayah');
            const jabatanSelect = document.getElementById('filter-jabatan');
            const searchInput = document.getElementById('filter-search');

            const cards = Array.from(document.querySelectorAll('.kontak-card'));
            const personItems = Array.from(document.querySelectorAll('.person-item'));

            function applyFilter() {
                const wilayahVal = wilayahSelect.value;
                const jabatanVal = jabatanSelect.value;
                const keyword = (searchInput.value || '').toLowerCase().trim();

                personItems.forEach(item => {
                    const rwWilayah = item.getAttribute('data-wilayah-id') || '';
                    const rwJabatan = item.getAttribute('data-jabatan-id') || '';
                    const nama = item.getAttribute('data-nama') || '';
                    const hp = item.getAttribute('data-hp') || '';

                    let visible = true;

                    if (wilayahVal && rwWilayah !== wilayahVal) {
                        visible = false;
                    }
                    if (jabatanVal && rwJabatan !== jabatanVal) {
                        visible = false;
                    }
                    if (keyword) {
                        const text = (nama + ' ' + hp).toLowerCase();
                        if (!text.includes(keyword)) {
                            visible = false;
                        }
                    }

                    item.style.display = visible ? '' : 'none';
                });

                // Tampilkan/sembunyikan kotak jabatan tunggal jika person tersembunyi
                document.querySelectorAll('.hierarchy-item').forEach(section => {
                    const person = section.querySelector('.person-item');
                    if (!person) {
                        return;
                    }
                    section.style.display = person.style.display === 'none' ? 'none' : '';
                });

                // Tampilkan/sembunyikan operator item berdasarkan filter
                document.querySelectorAll('.operator-item').forEach(section => {
                    const person = section.querySelector('.person-item');
                    if (!person) {
                        return;
                    }
                    section.style.display = person.style.display === 'none' ? 'none' : '';
                });

                cards.forEach(card => {
                    const hasVisiblePerson = !!card.querySelector('.person-item:not([style*="display: none"])');
                    card.style.display = hasVisiblePerson ? '' : 'none';
                });
            }

            wilayahSelect.addEventListener('change', applyFilter);
            jabatanSelect.addEventListener('change', applyFilter);
            searchInput.addEventListener('input', applyFilter);
        })();
    </script>
</body>
</html>

