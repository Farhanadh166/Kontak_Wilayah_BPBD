<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitalisasi BPBD Sumbar 1.0</title>
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
            padding: 4rem 0 2.75rem;
        }
        .hero-title {
            font-size: clamp(2rem, 3vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.03em;
        }
        .hero-subtitle {
            color: rgba(229, 231, 235, 0.82);
            max-width: 56ch;
        }
        .section-title {
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: rgba(156, 163, 175, 0.95);
        }
        .hub-card {
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.22);
            background:
                radial-gradient(circle at top left, rgba(34, 211, 238, 0.14), transparent 55%),
                radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.12), transparent 55%),
                linear-gradient(180deg, rgba(2, 6, 23, 0.7), rgba(15, 23, 42, 0.92));
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.55);
            padding: 1.75rem;
            height: 100%;
            transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease;
        }
        .hub-card:hover {
            transform: translateY(-4px);
            border-color: rgba(56, 189, 248, 0.65);
            box-shadow: 0 28px 70px rgba(2, 6, 23, 0.75);
        }
        .hub-icon {
            width: 58px;
            height: 58px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(2, 6, 23, 0.4);
            margin-bottom: 1rem;
        }
        .hub-card h3 {
            color: #f8fafc;
            font-weight: 800;
            font-size: 1.25rem;
            margin-bottom: .55rem;
        }
        .hub-card p {
            color: rgba(229, 231, 235, 0.82);
            margin-bottom: 1.1rem;
        }
        .btn-primary-soft {
            background: linear-gradient(to right, #22c55e, #16a34a);
            border: none;
            font-weight: 700;
            border-radius: 999px;
            padding-inline: 1.3rem;
        }
        .btn-primary-soft:hover {
            background: linear-gradient(to right, #16a34a, #15803d);
        }
        .btn-outline-light-soft {
            border-radius: 999px;
            font-weight: 700;
            border-color: rgba(148, 163, 184, 0.7);
            color: #e5e7eb;
        }
        .btn-outline-light-soft:hover {
            background-color: rgba(148, 163, 184, 0.15);
            color: #ffffff;
        }
        footer {
            border-top: 1px solid rgba(31, 41, 55, 1);
            color: rgba(229, 231, 235, 0.7);
            font-size: .85rem;
            padding: 1.25rem 0;
        }
        @media (max-width: 768px) {
            .hero { padding-top: 3rem; padding-bottom: 2rem; }
            .hub-card { padding: 1.35rem; }
        }
    </style>
</head>
<body>
<header class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            
            <div class="col-lg-7">
                <span class="badge bg-slate-900 border border-info-subtle text-info badge-pill mb-3 px-3 py-2">
                    Digitalisasi BPBD Sumbar 1.0
                </span>
                <h1 class="hero-title mb-3">
                    Pusat Navigasi Proyek Digital BPBD
                </h1>
                <p class="hero-subtitle mb-4">
                    Platform untuk <b>mendigitalkan proyek-proyek</b> yang ada di Sumatera Barat.
                    Gunakan menu di bawah untuk membuka layanan yang tersedia.
                </p>
<div class="d-flex flex-wrap gap-2">
    <a href="/kontak-wilayah" class="btn btn-primary-soft">Direktori Kontak Wilayah</a>
    <a href="/sirine" class="btn btn-outline-light-soft">Monitoring &amp; Kontrol Sirine</a>
    <a href="/login" class="btn btn-outline-info">Login Admin</a>
</div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex justify-content-lg-end">
                    <img
                        src="{{ url('/assets/bpbd.png') }}"
                        alt="Logo BPBD"
                        style="width: min(380px, 90%); height:auto; filter: drop-shadow(0 22px 38px rgba(2, 6, 23, 0.75)); opacity: .95;"
                    >
                </div>
            </div>
        </div>
    </div>
</header>

<main class="pb-5">
    <section class="mb-4">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="section-title mb-0">Proyek Digital</div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="hub-card">
                        <div class="hub-icon">
                            <img src="{{ url('/assets/bpbd.png') }}" alt="Ikon" style="width:44px;height:44px;object-fit:contain;">
                        </div>
                        <h3>Direktori Kontak Wilayah</h3>
                        <p>
                            Direktori kontak pejabat dan petugas BPBD per wilayah dan jabatan.
                            Cocok untuk kebutuhan koordinasi dan komunikasi cepat.
                        </p>
                        <a href="/kontak-wilayah" class="btn btn-primary-soft">Buka Halaman</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="hub-card">
                        <div class="hub-icon">
                            <div style="width:44px;height:44px;border-radius:.9rem;background:rgba(34,211,238,0.15);border:1px solid rgba(34,211,238,0.35);display:flex;align-items:center;justify-content:center;color:#e0f2fe;font-weight:800;">
                                !
                            </div>
                        </div>
                        <h3>Monitoring &amp; Kontrol Sirine</h3>
                        <p>
                            Sistem Monitoring dan Kontrol Sirine Peringatan Dini untuk mendukung penyampaian informasi peringatan.
                            Jika masih tahap persiapan, halaman akan menampilkan status “Coming Soon”.
                        </p>
                        <a href="/sirine" class="btn btn-outline-light-soft">Lihat Status</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div>
                &copy; {{ date('Y') }} Digitalisasi BPBD Sumbar 1.0
            </div>
            <div>
                Platform digital untuk koordinasi. Dalam kondisi darurat, ikuti prosedur resmi yang ditetapkan.
            </div>
        </div>
    </div>
</footer>
</body>
</html>

