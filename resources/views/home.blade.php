<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Layanan Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">

    <nav class="navbar sticky top-0 z-50 bg-white shadow-sm">
        <div class="nav-container max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="nav-logo flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="w-10 h-10 rounded-lg object-cover" alt="Logo">
                <span class="text-2xl font-black tracking-tighter text-slate-800">Wadul</span>
            </div>

            <div class="nav-links hidden md:flex items-center gap-8 font-medium text-slate-600">
                <a href="/" class="hover:text-teal-600 transition">Home</a>
                <a href="/pengaduan" class="hover:text-teal-600 transition">Pengaduan</a>
                <a href="/tentang" class="hover:text-teal-600 transition">Tentang Kami</a>
                @auth
                    <a href="/riwayat" class="hover:text-teal-600 transition">Riwayat</a>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-slate-800 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition">Logout</button>
                    </form>
                @else
                    <a href="/login" class="bg-teal-600 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-teal-700 transition shadow-lg shadow-teal-200">Login / Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="relative h-[85vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/background.jpg') }}" class="w-full h-full object-cover" alt="Background">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px]"></div>
        </div>

        <div class="relative z-10 text-center px-6 max-w-4xl">
            <span class="inline-block px-4 py-1.5 bg-teal-500/20 text-teal-300 rounded-full text-xs font-bold uppercase tracking-[0.2em] mb-6 border border-teal-500/30">
                Suaramu, Perubahan Kami
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6 tracking-tight">
                Layanan Pengaduan <br> <span class="text-teal-400">Masyarakat Online</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl mx-auto leading-relaxed opacity-90">
                Sampaikan aspirasi, keluhan, dan laporan Anda dengan mudah, cepat, dan aman untuk lingkungan yang lebih baik.
            </p>
            
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <a href="/pengaduan" class="w-full md:w-auto px-10 py-4 bg-teal-500 hover:bg-teal-400 text-slate-900 font-bold rounded-2xl transition-all transform hover:-translate-y-1 shadow-xl shadow-teal-500/20">
                    Buat Pengaduan Sekarang
                </a>
                <a href="/tentang" class="w-full md:w-auto px-10 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-2xl backdrop-blur-md transition-all border border-white/10">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <div class="p-8 rounded-3xl bg-white shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="w-16 h-16 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold">1</div>
                <h4 class="text-xl font-bold text-slate-800 mb-2">Tulis Laporan</h4>
                <p class="text-slate-500 text-sm leading-relaxed">Laporkan keluhan atau aspirasi Anda dengan detail dan lampirkan bukti foto.</p>
            </div>
            <div class="p-8 rounded-3xl bg-white shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="w-16 h-16 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold">2</div>
                <h4 class="text-xl font-bold text-slate-800 mb-2">Proses Verifikasi</h4>
                <p class="text-slate-500 text-sm leading-relaxed">Laporan Anda akan segera diproses dan diverifikasi oleh admin kami.</p>
            </div>
            <div class="p-8 rounded-3xl bg-white shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="w-16 h-16 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold">3</div>
                <h4 class="text-xl font-bold text-slate-800 mb-2">Tindak Lanjut</h4>
                <p class="text-slate-500 text-sm leading-relaxed">Dapatkan tanggapan dan pantau status penyelesaian laporan Anda.</p>
            </div>
        </div>
    </section>

</body>
</html>