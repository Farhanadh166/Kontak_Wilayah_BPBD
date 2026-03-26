<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring & Kontrol Sirine - Digitalisasi BPBD Sumbar 1.0</title>
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
        .panel {
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.22);
            background: linear-gradient(180deg, rgba(2, 6, 23, 0.65), rgba(15, 23, 42, 0.92));
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.55);
        }
        .muted {
            color: rgba(229, 231, 235, 0.78);
        }
        .hero {
            padding: 3rem 0 2.25rem;
        }
        a.btn-linkish {
            color: #7dd3fc;
            text-decoration: none;
            font-weight: 700;
        }
        a.btn-linkish:hover { color: #ffffff; text-decoration: underline; }
    </style>
</head>
<body>
<header class="hero">
    <div class="container">
        <div class="panel p-4 p-md-5">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <div class="badge bg-slate-900 border border-info-subtle text-info mb-3 px-3 py-2" style="border-radius:999px;">
                        Digitalisasi BPBD Sumbar 1.0
                    </div>
                    <h1 class="mb-2">Monitoring &amp; Kontrol Sirine Peringatan Dini</h1>
                    <p class="muted mb-0">
                        Halaman ini saat ini masih dalam tahap persiapan.
                        Ketika sistem sudah siap, halaman akan menampilkan status perangkat dan kontrol sirine sesuai skenario peringatan.
                    </p>
                </div>
                <div>
                    <img
                        src="{{ url('/assets/bpbd.png') }}"
                        alt="Logo BPBD"
                        style="width: 120px; height:auto; filter: drop-shadow(0 18px 35px rgba(2,6,23,.6)); opacity:.95;"
                    >
                </div>
            </div>

            <div class="mt-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: rgba(2,6,23,0.35); border:1px solid rgba(148,163,184,0.2);">
                            <div class="fw-bold mb-2">Yang akan tersedia</div>
                            <div class="muted">Status perangkat, skenario peringatan, dan panel kontrol sesuai prosedur.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: rgba(2,6,23,0.35); border:1px solid rgba(148,163,184,0.2);">
                            <div class="fw-bold mb-2">Sifat Informasi</div>
                            <div class="muted">Konten ini bersifat informatif untuk koordinasi; detail operasional mengikuti kebijakan resmi.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex flex-wrap gap-2 align-items-center">
                <a href="/kontak-wilayah" class="btn btn-outline-light-soft">Kembali ke Direktori Kontak</a>
                <a href="/" class="btn btn-primary-soft">Kembali ke Home</a>
            </div>
        </div>
    </div>
</header>

<footer class="py-4 mt-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
        <div>&copy; {{ date('Y') }} Digitalisasi BPBD Sumbar 1.0</div>
        <div class="muted">Untuk keadaan darurat, ikuti prosedur resmi yang ditetapkan.</div>
    </div>
</footer>
</body>
</html>

