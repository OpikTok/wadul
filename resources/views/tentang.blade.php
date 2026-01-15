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

<section class="about-section">
    <h2>- Tentang Kami -</h2>

    <p>
        Wadul adalah platform layanan pengaduan masyarakat digital yang lahir dari
        keinginan untuk menciptakan lingkungan yang lebih responsif dan transparan.
        Nama "Wadul" diambil dari istilah lokal yang berarti mengadu, mencerminkan misi 
        utama kami sebagai wadah resmi bagi setiap warga untuk menyuarakan keluhan, aspirasi,
        maupun laporan mengenai berbagai permasalahan infrastruktur dan pelayanan publik di sekitar
        mereka.
    </p>
    <br>
    <p>Kami percaya bahwa komunikasi yang baik adalah kunci utama kemajuan sebuah komunitas. 
        Oleh karena itu, platform ini hadir untuk meruntuhkan batasan birokrasi yang rumit, 
        memberikan kemudahan bagi masyarakat untuk melapor hanya melalui genggaman ponsel. 
        Setiap laporan yang masuk melalui Wadul akan didokumentasikan secara sistematis, 
        diverifikasi oleh tim terkait, dan dipastikan mendapatkan tanggapan yang jelas serta
         tindak lanjut yang nyata.
        </p>
        <br>
        <p>Keamanan dan kenyamanan pengguna adalah prioritas kami. Melalui fitur riwayat
             pengaduan, setiap pelapor dapat memantau perkembangan status laporannya secara
              mandiri dan terbuka, mulai dari tahap verifikasi hingga laporan dinyatakan
               selesai. Hal ini merupakan bentuk komitmen kami dalam membangun kepercayaan 
               publik dan mendorong partisipasi aktif warga untuk bersama-sama menjaga fasilitas
                serta kenyamanan lingkungan tempat tinggal kita.
            </p>
            <br>
            <p>Mari menjadi bagian dari perubahan positif. Dengan melaporkan masalah yang Anda
                 temui, Anda telah berkontribusi nyata dalam membantu petugas bekerja lebih 
                 efektif dan tepat sasaran. Jangan biarkan kendala di sekitar Anda tetap diam 
                 tanpa solusi sampaikan suara Anda melalui Wadul, karena setiap laporan Anda 
                 sangat berarti bagi perbaikan kualitas hidup kita bersama.</p>

    <img src="{{ asset('assets/img/background.jpg') }}" class="about-bg">
</section>

</body>
</html>
