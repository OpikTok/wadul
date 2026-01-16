<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Buat Laporan Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="navbar sticky top-0 z-50 bg-white shadow-sm">
        <div class="nav-container max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="nav-logo flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="w-10 h-10 rounded-lg object-cover" alt="Logo">
                <span class="text-2xl font-black tracking-tighter text-slate-800">Wadul</span>
            </div>

            <div class="nav-links flex items-center gap-8 font-medium text-slate-600">
                <a href="/home" class="hover:text-teal-600 transition">Home</a>
                <a href="/pengaduan" class="text-teal-600 font-bold">Pengaduan</a>
                <a href="/tentang" class="hover:text-teal-600 transition">Tentang Kami</a>
                <a href="/riwayat" class="hover:text-teal-600 transition">Riwayat</a>
                
                @auth
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-slate-800 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition">Logout</button>
                    </form>
                @else
                    <a href="/login" class="btn-login bg-teal-600 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-teal-700 transition">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex justify-center items-center py-12 px-6">
        <div class="w-full max-w-2xl bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-slate-200 border border-slate-100">
            
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-black text-slate-800 tracking-tighter italic uppercase">BUAT LAPORAN</h2>
                <p class="text-slate-500 mt-2">Sampaikan keluhan Anda secara rinci agar segera kami tindak lanjuti.</p>
            </div>
            
            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Tanggal Kejadian</label>
                    <input type="date" name="tanggal" required 
                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-teal-500 outline-none transition"
                        value="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Isi Pengaduan</label>
                    <textarea name="isi_laporan" rows="6" required 
                        class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-teal-500 outline-none transition placeholder:text-slate-300" 
                        placeholder="Ceritakan kronologi atau keluhan Anda di sini secara lengkap..."></textarea>
                </div>

                <div class="form-group">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Unggah Lampiran (Foto)</label>
                    <div class="relative group">
                        <input type="file" name="foto" accept="image/*"
                            class="w-full p-4 bg-slate-50 border border-slate-200 border-dashed border-2 rounded-2xl cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition">
                    </div>
                    <p class="text-[10px] text-slate-400 mt-2 ml-1 italic">*Format file: JPG, PNG, JPEG. Maksimal 2MB.</p>
                </div>

                <div class="pt-6">
                    <button type="submit" 
                        class="w-full bg-slate-800 text-white font-black py-4 rounded-2xl hover:bg-teal-600 transform active:scale-95 transition shadow-xl shadow-slate-200 uppercase tracking-widest text-sm">
                        Kirim Laporan Saya
                    </button>
                    <a href="/home" class="block text-center mt-4 text-sm text-slate-400 hover:text-slate-600 transition">Batal dan Kembali</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>