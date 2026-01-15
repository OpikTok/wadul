<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="admin-body">

    <div class="flex">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo">
                <span>Wadul</span>
            </div>

            <nav class="nav-menu">
                <a href="/admin/dashboard" class="nav-item active-nav">Dashboard</a>
                <a href="/admin/pengaduan" class="nav-item inactive-nav">Pengaduan</a>
                <a href="/admin/akun" class="nav-item inactive-nav">Akun</a>
            </nav>

            <form action="/logout" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="logout-link">
                    <span>&larr;</span> Logout
                </button>
            </form>
        </aside>

       <main class="flex-1 ml-[280px] p-10">
    <h1 class="text-3xl font-bold mb-8">Daftar Pengaduan Masyarakat</h1>

    @foreach($pengaduans as $item)
    <div class="card-pengaduan flex justify-between items-center bg-slate-800 p-6 rounded-2xl mb-4 shadow-lg">
        <div>
            <div class="card-title mb-1">
                <a href="{{ route('admin.pengaduan.show', $item->id) }}" class="text-2xl font-bold text-white hover:text-teal-400 transition">
                    {{ $item->user->name ?? 'Akun Sudah Dihapus' }}
                </a>
            </div>
            <p class="text-slate-300 mt-2">{{ $item->isi_laporan }}</p>
            
            <span class="badge {{ $item->status == 'selesai' ? 'bg-green-500' : 'bg-yellow-500' }} text-xs px-2 py-1 rounded mt-3 inline-block font-bold">
                {{ strtoupper($item->status) }}
            </span>
        </div>
        
        <div class="card-info text-right text-white">
            <p class="font-bold text-sm opacity-70">RT/RW</p>
            <p class="text-3xl font-bold">{{ $item->user->rt_rw ?? '-' }}</p>
        </div>
    </div>
    @endforeach 
</main>
    </div>

</body>
</html>