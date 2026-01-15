<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Data Akun</title>
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
            <div class="table-container">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Data Pengguna</h1>
                
                <table class="w-full text-left">
                    <thead>
    <tr class="border-b-2 border-gray-200">
        <th class="py-3 px-2">No</th>
        <th class="py-3 px-2">Nama Lengkap</th>
        <th class="py-3 px-2">NIK</th>
        <th class="py-3 px-2">Nomor HP</th> <th class="py-3 px-2">RT/RW</th>
        <th class="py-3 px-2 text-center">Aksi</th>
    </tr>
</thead>
                   <tbody class="divide-y divide-gray-100">
    @foreach($users as $index => $user)
    <tr class="hover:bg-gray-50/50 transition">
        <td class="py-4 px-2 text-gray-700">{{ $index + 1 }}</td>
        <td class="py-4 px-2 font-semibold text-gray-800">{{ $user->name }}</td>
        <td class="py-4 px-2 text-gray-600">{{ $user->nik ?? '-' }}</td>
        <td class="py-4 px-2 text-gray-600">{{ $user->no_telp ?? '-' }}</td>
        <td class="py-4 px-2 text-gray-600">{{ $user->rt_rw ?? '-' }}</td>
        
        <td class="py-4 px-2">
            <div class="flex justify-center items-center gap-2">
                <a href="{{ route('akun.edit', $user->id) }}" 
                   class="bg-blue-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-blue-700 transition">
                    Edit
                </a>

                <form action="{{ route('akun.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-red-700 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>