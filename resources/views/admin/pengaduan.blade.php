<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Pengaduan</title>
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
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->is('admin/dashboard') ? 'active-nav' : 'inactive-nav' }}"> Dashboard</a>
                <a href="{{ route('admin.pengaduan') }}" class="nav-item {{ request()->is('admin/pengaduan*') ? 'active-nav' : 'inactive-nav' }}"> Pengaduan</a>
                <a href="{{ route('admin.akun') }}" class="nav-item {{ request()->is('admin/akun*') ? 'active-nav' : 'inactive-nav' }}"> Akun</a>
            </nav>

            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="logout-link flex items-center gap-2">
                    <span>&larr;</span> Logout
                </button>
            </form>
        </aside>

        <main class="flex-1 ml-[280px] p-10">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Pengaduan Masyarakat</h1>
                <span class="text-sm text-gray-500 font-semibold bg-white px-4 py-2 rounded-lg shadow-sm">
                    Total: {{ $pengaduans->count() }} Laporan
                </span>
            </div>

            <div class="space-y-4">
                @forelse($pengaduans as $item)
                <div class="card-pengaduan flex justify-between items-center bg-slate-800 p-6 rounded-2xl shadow-xl hover:scale-[1.01] transition-transform duration-300">
                    <div class="flex-1 pr-10">
                        <div class="flex items-center gap-3 mb-2">
                            <a href="{{ route('admin.pengaduan.show', $item->id) }}" class="text-xl font-bold text-white hover:text-teal-400 transition">
                                {{ $item->user->name ?? 'Akun Sudah Dihapus' }}
                            </a>
                            <span class="text-[10px] text-slate-400 font-mono tracking-widest uppercase bg-slate-700 px-2 py-0.5 rounded">
                                #ID-{{ $item->id }}
                            </span>
                        </div>
                        
                        <p class="text-slate-300 line-clamp-2 text-sm leading-relaxed mb-4">
                            {{ $item->isi_laporan }}
                        </p>
                        
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider shadow-sm 
                                {{ $item->status == 'selesai' ? 'bg-emerald-500 text-white' : 'bg-amber-500 text-white' }}">
                                {{ $item->status }}
                            </span>
                            <span class="text-slate-500 text-xs">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-info text-right border-l border-slate-700 pl-8 min-w-[120px]">
                        <p class="font-bold text-[10px] opacity-50 text-white uppercase tracking-tighter">Wilayah RT/RW</p>
                        <p class="text-4xl font-black text-teal-400 tracking-tighter">{{ $item->user->rt_rw ?? '-' }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-20 bg-white/50 backdrop-blur rounded-2xl border-2 border-dashed border-gray-300">
                    <p class="text-gray-500 font-medium italic">Belum ada laporan pengaduan masuk.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>

</body>
</html>