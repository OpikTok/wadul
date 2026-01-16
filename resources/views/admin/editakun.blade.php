<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="admin-body">
    <div class="flex">
        <aside class="sidebar flex flex-col h-screen fixed w-[280px]">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo">
                <span>Wadul</span>
            </div>
            <nav class="nav-menu flex-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-item inactive-nav">Dashboard</a>
                <a href="{{ route('admin.pengaduan') }}" class="nav-item inactive-nav">Pengaduan</a>
                <a href="{{ route('admin.akun') }}" class="nav-item active-nav">Akun</a>
            </nav>
            <form action="{{ route('logout') }}" method="POST" class="px-8 pb-10 mt-auto">
                @csrf
                <button type="submit" class="logout-link flex items-center gap-2">
                    <span>&larr;</span> Logout
                </button>
            </form>
        </aside>

        <main class="flex-1 ml-[280px] p-10 flex justify-center items-center min-h-screen">
            <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl w-full max-w-lg border border-white/20">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-slate-800">Edit Data Pengguna</h2>
                    <p class="text-slate-500 text-sm">Pastikan data yang diubah sudah benar.</p>
                </div>
                
                <form action="{{ route('admin.akun.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full p-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">NIK</label>
                            <input type="text" name="nik" value="{{ old('nik', $user->nik) }}" required
                                class="w-full p-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Nomor HP</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" required
                                class="w-full p-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">RT/RW</label>
                            <input type="text" name="rt_rw" value="{{ old('rt_rw', $user->rt_rw) }}" required
                                class="w-full p-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition">
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mt-8">
                        <button type="submit" class="flex-1 bg-teal-600 text-white font-bold py-3 rounded-xl hover:bg-teal-700 transform active:scale-95 transition shadow-lg shadow-teal-200">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.akun') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>