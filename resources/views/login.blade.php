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

    <main class="login-main">
        <div class="login-card">
            <h2 class="login-title">LOGIN</h2>
            
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label-upper">Nama Lengkap</label>
                    <input type="text" name="name" class="input-field">
                </div>

                <div class="form-group mb-large">
                    <label class="label-upper">Password</label>
                    <input type="password" name="password" class="input-field">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit-login">
                        Login
                    </button>
                    <a href="{{ route('register') }}" class="register-link">Daftar Akun</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>