<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .text-gradient {
            background: linear-gradient(to right, #0d9488, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-white">

    <nav class="navbar sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="nav-container max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="nav-logo flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="w-10 h-10 rounded-lg object-cover shadow-sm" alt="Logo">
                <span class="text-2xl font-black tracking-tighter text-slate-800">Wadul</span>
            </div>

            <div class="nav-links flex items-center gap-8 font-medium text-slate-600">
                <a href="/home" class="hover:text-teal-600 transition">Home</a>
                <a href="/pengaduan" class="hover:text-teal-600 transition">Pengaduan</a>
                <a href="/tentang" class="text-teal-600 font-bold border-b-2 border-teal-600 pb-1">Tentang Kami</a>
                <a href="/riwayat" class="hover:text-teal-600 transition">Riwayat</a>
                <a href="/login" class="bg-slate-800 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition">Login</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="relative py-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative z-10">
                    <span class="inline-block px-4 py-1.5 bg-teal-50 text-teal-700 rounded-full text-xs font-bold uppercase tracking-widest mb-6">Mengenal Lebih Dekat</span>
                    <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-tight mb-8 tracking-tighter">
                        Menjadi Jembatan <span class="text-gradient">Aspirasi Rakyat</span>
                    </h1>
                    <div class="space-y-6 text-slate-600 leading-relaxed text-lg text-justify">
                        <p>
                            <strong class="text-slate-900 font-bold">Wadul</strong> adalah platform layanan pengaduan masyarakat digital yang lahir dari keinginan untuk menciptakan lingkungan yang lebih responsif dan transparan. Nama "Wadul" diambil dari istilah lokal yang berarti mengadu, mencerminkan misi utama kami sebagai wadah resmi bagi setiap warga.
                        </p>
                        <p>
                            Kami percaya bahwa komunikasi yang baik adalah kunci utama kemajuan sebuah komunitas. Wadul hadir untuk meruntuhkan batasan birokrasi yang rumit, memberikan kemudahan bagi masyarakat untuk melapor hanya melalui genggaman ponsel.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-4 bg-teal-100/50 rounded-[3rem] -rotate-3 blur-sm"></div>
                    <img src="{{ asset('assets/img/background.jpg') }}" class="relative rounded-[2.5rem] shadow-2xl w-full h-[500px] object-cover" alt="Suasana Kota">
                </div>
            </div>
        </section>

        <section class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-4">Mengapa Wadul Ada?</h2>
                    <p class="text-slate-500 max-w-2xl mx-auto italic">Membangun kepercayaan publik melalui teknologi yang inklusif.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-shadow duration-300">
                        <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-inner">🛡️</div>
                        <h4 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Transparansi</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Pantau status laporan secara real-time. Setiap tahap verifikasi hingga selesai dapat diakses secara mandiri melalui riwayat pengaduan.</p>
                    </div>

                    <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-shadow duration-300">
                        <div class="w-14 h-14 bg-sky-50 text-sky-600 rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-inner">⚡</div>
                        <h4 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Respons Cepat</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Menghilangkan hambatan birokrasi tradisional. Laporan dikirim langsung ke tim terkait untuk diproses secara sistematis.</p>
                    </div>

                    <div class="bg-white p-10 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl transition-shadow duration-300">
                        <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-6 text-2xl shadow-inner">🤝</div>
                        <h4 class="text-xl font-bold text-slate-900 mb-4 tracking-tight">Partisipasi Aktif</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Setiap suara Anda berkontribusi nyata dalam membantu petugas bekerja lebih efektif dan tepat sasaran demi kenyamanan bersama.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 text-center px-6">
            <h3 class="text-4xl font-black text-slate-900 tracking-tight mb-8 leading-tight">
                Mari menjadi bagian dari <br> <span class="text-teal-600 italic">perubahan positif hari ini.</span>
            </h3>
            <p class="text-slate-500 max-w-2xl mx-auto mb-12 text-lg">
                Jangan biarkan kendala di sekitar Anda tetap diam tanpa solusi. Sampaikan suara Anda melalui Wadul, karena setiap laporan Anda sangat berarti.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/pengaduan" class="bg-teal-600 text-white font-bold px-10 py-4 rounded-2xl hover:bg-teal-700 transition shadow-lg shadow-teal-100">Buat Laporan Sekarang</a>
                <a href="/login" class="bg-slate-100 text-slate-800 font-bold px-10 py-4 rounded-2xl hover:bg-slate-200 transition">Masuk ke Akun</a>
            </div>
        </section>
    </main>

    <footer class="py-12 border-t border-slate-100 text-center">
        <p class="text-slate-400 text-sm">© 2024 Wadul - Sistem Informasi Pengaduan Masyarakat. All rights reserved.</p>
    </footer>

</body>
</html>