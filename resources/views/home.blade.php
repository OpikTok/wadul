<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Form Laporan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    <nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="{{ asset('assets/img/logo.jpg') }}" class="logo-img" alt="Logo">
            <span class="logo-text">Wadul</span>
        </div>

        <div class="nav-links">
            <a href="/home">Home</a>
            <a href="/pengaduan">Pengaduan</a>
            <a href="/tentang">Tentang Kami</a>
            <a href="/riwayat">Riwayat</a>
            <a href="/login" class="btn-login">Login \ Daftar</a>
        </div>
    </div>
</nav>

    <section class="hero">
    <img src="assets/img/background.jpg" class="hero-img" alt="Hero">
    <div class="hero-content">
        <h1>Layanan Pengaduan Masyarakat</h1>
        <p>Sampaikan laporan Anda dengan mudah, cepat, dan aman.</p>
        <a href="/pengaduan" class="hero-btn">Buat Pengaduan</a>
    </div>
</section>


</body>
</html>
