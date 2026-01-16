<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Masuk ke Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-slate-50">

    <nav class="navbar sticky top-0 z-50 bg-white shadow-sm">
        <div class="nav-container max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="nav-logo flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="w-10 h-10 rounded-lg object-cover" alt="Logo">
                <span class="text-2xl font-black tracking-tighter text-slate-800">Wadul</span>
            </div>

            <div class="nav-links flex items-center gap-8 font-medium text-slate-600">
                <a href="/" class="hover:text-teal-600 transition">Home</a>
                <a href="/pengaduan" class="hover:text-teal-600 transition">Pengaduan</a>
                <a href="/tentang" class="hover:text-teal-600 transition">Tentang Kami</a>
                <a href="{{ route('register') }}" class="btn-login bg-slate-100 text-slate-800 px-6 py-2 rounded-full text-sm font-bold hover:bg-slate-200 transition">Daftar</a>
            </div>
        </div>
    </nav>

    <main class="flex justify-center items-center min-h-[calc(100vh-100px)] p-6">
        <div class="login-card w-full max-w-md bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-slate-200 border border-slate-100">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-black text-slate-800 tracking-tighter italic uppercase">LOGIN</h2>
                <p class="text-slate-500 text-sm mt-2">Silakan masuk untuk menyampaikan laporan Anda.</p>
            </div>
            
            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm mb-6 flex items-center gap-2">
                <span>⚠️</span> {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                    <input type="text" name="name" required 
                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition placeholder:text-slate-300"
                        placeholder="Masukkan nama terdaftar">
                </div>

                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                    <input type="password" name="password" required 
                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition"
                        placeholder="••••••••">
                </div>

                <div class="form-actions pt-4 space-y-4">
                    <button type="submit" class="w-full bg-slate-800 text-white font-black py-4 rounded-2xl hover:bg-teal-600 transform active:scale-95 transition shadow-xl shadow-slate-200 uppercase tracking-widest text-sm">
                        Masuk Sekarang
                    </button>
                    
                    <div class="text-center">
                        <span class="text-sm text-slate-400">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="text-sm text-teal-600 font-bold hover:underline ml-1">Daftar Akun Baru</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>
</html>