<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->is('admin/dashboard') ? 'active-nav' : 'inactive-nav' }}">Dashboard</a>
                <a href="{{ route('admin.pengaduan') }}" class="nav-item {{ request()->is('admin/pengaduan*') ? 'active-nav' : 'inactive-nav' }}">Pengaduan</a>
                <a href="{{ route('admin.akun') }}" class="nav-item {{ request()->is('admin/akun*') ? 'active-nav' : 'inactive-nav' }}">Akun</a>
            </nav>

            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="logout-link flex items-center gap-2">
                    <span>&larr;</span> Logout
                </button>
            </form>
        </aside>

        <main class="flex-1 ml-[280px] p-10">
            <div class="table-container">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Data Pengguna</h1>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="py-3 px-4 text-sm font-bold text-gray-600 uppercase">No</th>
                                <th class="py-3 px-4 text-sm font-bold text-gray-600 uppercase">Nama Lengkap</th>
                                <th class="py-3 px-4 text-sm font-bold text-gray-600 uppercase">NIK</th>
                                <th class="py-3 px-4 text-sm font-bold text-gray-600 uppercase">Nomor HP</th>
                                <th class="py-3 px-4 text-sm font-bold text-gray-600 uppercase">RT/RW</th>
                                <th class="py-3 px-4 text-sm font-bold text-gray-600 uppercase text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($users as $index => $user)
                            <tr class="hover:bg-gray-50/80 transition">
                                <td class="py-4 px-4 text-gray-700">{{ $index + 1 }}</td>
                                <td class="py-4 px-4 font-semibold text-gray-800">{{ $user->name }}</td>
                                <td class="py-4 px-4 text-gray-600">{{ $user->nik ?? '-' }}</td>
                                <td class="py-4 px-4 text-gray-600">{{ $user->no_telp ?? '-' }}</td>
                                <td class="py-4 px-4 text-gray-600">{{ $user->rt_rw ?? '-' }}</td>
                                <td class="py-4 px-4">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('admin.akun.editakun', $user->id) }}" 
                                           class="bg-blue-600 text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-blue-800 transition shadow-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.akun.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-red-700 transition shadow-sm">
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

                @if($users->isEmpty())
                    <div class="text-center py-10 text-gray-500 italic">
                        Belum ada data pengguna.
                    </div>
                @endif
            </div>
        </main>
    </div>

</body>
</html>