<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wadul</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="admin-body">

    <div class="flex min-h-screen">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo">
                <span>Wadul</span>
            </div>

            <nav class="nav-menu">
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->is('admin/dashboard') ? 'active-nav' : 'inactive-nav' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.pengaduan') }}" class="nav-item {{ request()->is('admin/pengaduan*') ? 'active-nav' : 'inactive-nav' }}">
                    Pengaduan
                </a>
                <a href="{{ route('admin.akun') }}" class="nav-item {{ request()->is('admin/akun*') ? 'active-nav' : 'inactive-nav' }}">
                    Akun
                </a>
            </nav>

            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="logout-link flex items-center gap-2">
                    <span>&larr;</span> Logout
                </button>
            </form>
        </aside>

        <main class="flex-1 ml-[280px] p-10">
            <header class="mb-10">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, Admin</h1>
                <p class="text-gray-600">Pantau laporan dan manajemen pengguna dalam satu panel.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card-pengaduan">
                    <div>
                        <p class="text-sm opacity-80 uppercase font-bold tracking-wider">Total Pengaduan</p>
                        <h2 class="card-title text-4xl mt-2">{{ $totalPengaduan ?? 0 }}</h2>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-white/20">
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Total Akun</p>
                    <h2 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalUsers ?? 0 }}</h2>
                </div>
            </div>
        </main>
    </div>

</body>
</html>