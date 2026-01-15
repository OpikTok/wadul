<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
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
                <a href="/admin/dashboard" class="nav-item inactive-nav">Dashboard</a>
                <a href="/admin/pengaduan" class="nav-item inactive-nav">Pengaduan</a>
                <a href="/admin/akun" class="nav-item active-nav">Akun</a>
            </nav>
            <form action="/logout" method="POST" class="px-8 pb-10 mt-auto">
                @csrf
                <button type="submit" class="font-bold text-slate-800 text-xl flex items-center gap-2">
                    <span>&larr;</span> Logout
                </button>
            </form>
        </aside>

        <main class="flex-1 ml-[280px] p-10 flex justify-center items-center">
            <div class="bg-white/80 backdrop-blur p-8 rounded-2xl shadow-xl w-full max-w-lg">
                <h2 class="text-2xl font-bold mb-6 text-slate-800 border-b pb-4">Edit Data Pengguna</h2>
                
                <form action="{{ route('akun.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-teal-400 outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-2">NIK</label>
                        <input type="text" name="nik" value="{{ $user->nik }}" class="w-full p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-teal-400 outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor HP</label>
                        <input type="text" name="no_telp" value="{{ $user->no_telp }}" class="w-full p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-teal-400 outline-none">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-slate-700 mb-2">RT/RW</label>
                        <input type="text" name="rt_rw" value="{{ $user->rt_rw }}" class="w-full p-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-teal-400 outline-none">
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 bg-teal-600 text-white font-bold py-3 rounded-lg hover:bg-teal-700 transition shadow-lg">
                            Simpan Perubahan
                        </button>
                        <a href="/admin/akun" class="px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-bold hover:bg-slate-300 transition">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>z
</body>
</html>