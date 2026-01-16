<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Daftar Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-slate-50">

    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="logo-img" alt="Logo">
                <span class="logo-text">Wadul</span>
            </div>

            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/pengaduan">Pengaduan</a>
                <a href="/tentang">Tentang Kami</a>
                @auth
                    <a href="/riwayat">Riwayat</a>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn-login">Logout</button>
                    </form>
                @else
                    <a href="/login" class="btn-login">Login / Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="login-main flex justify-center items-center min-h-[calc(100vh-80px)] p-6">
        <div class="login-card w-full max-w-md bg-white p-8 rounded-3xl shadow-xl border border-slate-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-slate-800 tracking-tighter italic">DAFTAR AKUN</h2>
                <p class="text-slate-500 text-sm mt-2">Lengkapi data diri Anda untuk mulai melapor.</p>
            </div>
            
            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1 ml-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="input-field w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 outline-none transition"
                        placeholder="Contoh: Budi Santoso">
                    @error('name') <span class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1 ml-1">NIK (16 Digit)</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" required 
                        class="input-field w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 outline-none transition" 
                        placeholder="Masukkan 16 digit NIK">
                    @error('nik') <span class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1 ml-1">No. Telp</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp') }}" required 
                            class="input-field w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 outline-none transition"
                            placeholder="0812...">
                    </div>
                    <div class="form-group">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1 ml-1">RT / RW</label>
                        <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" required 
                            class="input-field w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 outline-none transition"
                            placeholder="001/002">
                    </div>
                </div>

                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1 ml-1">Password</label>
                    <input type="password" name="password" required 
                        class="input-field w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 outline-none transition"
                        placeholder="Minimal 8 karakter">
                    @error('password') <span class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions pt-4">
                    <button type="submit" class="btn-submit-login w-full bg-slate-800 text-white font-black py-4 rounded-2xl hover:bg-teal-600 transform active:scale-95 transition shadow-lg shadow-slate-200 uppercase tracking-widest text-sm mb-4">
                        Daftar Sekarang
                    </button>
                    <p class="text-center text-sm text-slate-500">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-teal-600 font-bold hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </main>

</body>
</html>