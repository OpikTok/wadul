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

    <div class="flex h-full">
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

        <main class="flex-1 p-10 flex flex-col justify-center items-center">
            </main>
    </div>

</body>
</html>