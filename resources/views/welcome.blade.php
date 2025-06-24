<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGIS Pendidikan Kota Sabang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background-color: #f8f9fa;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Merriweather', serif;
            color: #212529;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            color: #007bff !important;
            font-size: 1.8rem;
        }
        .nav-link {
            font-weight: 500;
            color: #495057 !important;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #007bff !important;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 123, 255, 0.8), rgba(0, 86, 179, 0.8)), url('https://via.placeholder.com/1920x800/007bff/FFFFFF?text=Peta+Sabang+Pendidikan'); /* Placeholder gambar latar belakang Sabang */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 25px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .hero-section p {
            font-size: 1.4rem;
            margin-bottom: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        .btn-primary-custom {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            padding: 14px 35px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255,193,7,0.4);
        }
        .btn-primary-custom:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255,193,7,0.6);
        }
        .section-padding {
            padding: 80px 0;
        }
        .info-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
            transition: all 0.4s ease;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
        }
        .info-card i {
            font-size: 3.5rem;
            color: #007bff;
            margin-bottom: 25px;
            display: block;
        }
        .info-card h3 {
            font-size: 1.7rem;
            margin-bottom: 15px;
        }
        .footer {
            background-color: #212529;
            color: #dee2e6;
            padding: 60px 0;
            font-size: 0.95rem;
        }
        .footer h5 {
            color: #ffffff;
            margin-bottom: 25px;
        }
        .footer ul {
            list-style: none;
            padding: 0;
        }
        .footer ul li a {
            color: #dee2e6;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer ul li a:hover {
            color: #007bff;
        }
        .social-icons a {
            color: #dee2e6;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">SabangGIS Pendidikan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#peta">Peta Persebaran <i class="fas fa-map-marked-alt ms-1"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabel">Data Tabel <i class="fas fa-table ms-1"></i></a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-primary" href="/login">Login <i class="fas fa-sign-in-alt ms-1"></i></a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary-custom" href="/register">Register <i class="fas fa-user-plus ms-1"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero-section">
        <div class="container">
            <h1>Jelajahi Lokasi Pendidikan di Kota Sabang</h1>
            <p class="lead">Temukan persebaran sekolah, fasilitas, dan informasi pendidikan lainnya melalui antarmuka peta interaktif kami.</p>
            <a href="#peta" class="btn btn-primary-custom">Lihat Peta Sekarang <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>

    <section id="about-webgis" class="section-padding">
        <div class="container text-center">
            <h2 class="mb-5 pb-3 fw-bold">Tentang WebGIS Pendidikan Kota Sabang</h2>
            <p class="lead mb-5">Platform ini dirancang untuk mempermudah akses informasi geografis mengenai fasilitas pendidikan di Kota Sabang. Dengan data yang terintegrasi dari **SekolahSeeder**, Anda dapat visualisasikan lokasi sekolah, melihat detail, dan menganalisis persebaran data secara spasial.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card">
                        <i class="fas fa-globe"></i>
                        <h3>Peta Interaktif</h3>
                        <p>Visualisasikan data lokasi sekolah dengan mudah di peta digital.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <i class="fas fa-database"></i>
                        <h3>Data Terpadu</h3>
                        <p>Akses informasi detail pendidikan dari basis data yang komprehensif.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <i class="fas fa-search-location"></i>
                        <h3>Analisis Spasial</h3>
                        <p>Membantu dalam perencanaan dan pengambilan keputusan terkait pendidikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="peta" class="section-padding bg-light">
        <div class="container text-center">
            <h2 class="mb-5 pb-3 fw-bold">Peta Persebaran Sekolah</h2>
            <p class="lead mb-4">Temukan lokasi setiap institusi pendidikan di Kota Sabang.</p>
            <div class="card p-4 shadow-sm" style="min-height: 500px; display: flex; align-items: center; justify-content: center; background-color: #e2e6ea;">
                <p class="text-muted fst-italic">Peta interaktif akan ditampilkan di sini.<br>Anda bisa mengintegrasikan Leaflet.js atau Google Maps API.</p>
                <i class="fas fa-map-marked-alt text-secondary" style="font-size: 5rem;"></i>
            </div>
            {{-- Tombol ini akan mengarahkan ke halaman peta sebenarnya --}}
            <a href="/peta" class="btn btn-primary-custom mt-4">Buka Peta dalam Halaman Baru <i class="fas fa-external-link-alt ms-2"></i></a>
        </div>
    </section>

    <section id="tabel" class="section-padding">
        <div class="container text-center">
            <h2 class="mb-5 pb-3 fw-bold">Data Lengkap Institusi Pendidikan</h2>
            <p class="lead mb-4">Lihat informasi detail seluruh sekolah dalam format tabel yang mudah dibaca.</p>
            <div class="card p-4 shadow-sm" style="min-height: 300px; display: flex; align-items: center; justify-content: center; background-color: #e2e6ea;">
                <p class="text-muted fst-italic">Tabel data sekolah akan ditampilkan di sini.<br>Data akan diisi dari **SekolahSeeder**.</p>
                <i class="fas fa-table text-secondary" style="font-size: 4rem;"></i>
            </div>
            {{-- Tombol ini akan mengarahkan ke halaman tabel sebenarnya --}}
            <a href="/data-tabel" class="btn btn-primary-custom mt-4">Lihat Tabel Lengkap <i class="fas fa-external-link-alt ms-2"></i></a>
        </div>
    </section>

    <section id="daftar" class="cta-section">
        <div class="container">
            <h2>Ingin Kontribusi atau Akses Penuh?</h2>
            <p class="lead mb-4">Login atau daftar untuk fitur manajemen data yang lebih luas.</p>
            <a href="/login" class="btn btn-light btn-lg me-3">Login <i class="fas fa-sign-in-alt ms-2"></i></a>
            <a href="/register" class="btn btn-primary-custom btn-lg">Register <i class="fas fa-user-plus ms-2"></i></a>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>SabangGIS Pendidikan</h5>
                    <p>Platform WebGIS untuk visualisasi dan analisis data pendidikan di Kota Sabang.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#peta">Peta Persebaran</a></li>
                        <li><a href="#tabel">Data Tabel</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Merdeka No. 1, Kota Sabang</li>
                        <li><i class="fas fa-phone-alt me-2"></i> (0652) 789123</li>
                        <li><i class="fas fa-envelope me-2"></i> info@sabanggis.id</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <p class="text-center mb-0">&copy; {{ date('Y') }} SabangGIS Pendidikan. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
