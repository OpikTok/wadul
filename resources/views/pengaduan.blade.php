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

    <main class="main-content">
        <div class="report-card">
            <h2 class="form-title">Form Laporan</h2>
            
            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Pengaduan</label>
                    <textarea name="isi_laporan" rows="8" class="form-control" placeholder="Tuliskan laporan Anda..."></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Dokumen</label>
                    <input type="file" name="foto" class="form-control file-input">
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn-submit">Kirim</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>