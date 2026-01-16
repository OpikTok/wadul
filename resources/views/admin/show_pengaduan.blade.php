<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - {{ $pengaduan->user->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a; 
            color: #f1f5f9;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar {
            background: #1e293b;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <aside class="sidebar w-64 fixed h-full p-6 flex flex-col">
            <div class="mb-10">
                <h1 class="text-2xl font-bold text-teal-400 tracking-wider">WADUL</h1>
                <p class="text-[10px] text-slate-500 uppercase tracking-widest mt-1">Admin Panel</p>
            </div>
            
            <nav class="flex-1 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-xl text-slate-400 hover:bg-white/5 transition">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.pengaduan') }}" class="flex items-center space-x-3 p-3 rounded-xl bg-teal-500/10 text-teal-400 border border-teal-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>
            </nav>

            <form action="{{ route('logout') }}" method="POST" class="mt-auto pt-10">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-2 p-3 rounded-xl bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition font-bold">
                    <span>Logout</span>
                </button>
            </form>
        </aside>

        <main class="flex-1 ml-64 p-12">
            <div class="max-w-4xl mx-auto">
                <div class="mb-8 flex justify-between items-end">
                    <div>
                        <h2 class="text-sm font-semibold text-teal-500 uppercase tracking-widest">Detail Laporan</h2>
                        <h3 class="text-3xl font-bold mt-1 tracking-tight">Laporan #{{ $pengaduan->id }}</h3>
                    </div>
                    <div class="text-right">
                        <p class="text-slate-500 text-sm">Dikirim pada</p>
                        <p class="font-semibold">{{ $pengaduan->created_at->format('d F Y') }}</p>
                    </div>
                </div>

                <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
                    <div class="p-8 border-b border-white/10 flex justify-between items-center bg-white/5">
                        <div class="flex items-center space-x-4">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-teal-400 to-blue-500 flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                {{ substr($pengaduan->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-xl font-bold leading-none">{{ $pengaduan->user->name }}</p>
                                <p class="text-sm text-teal-500 mt-1 font-medium">Wilayah RT/RW {{ $pengaduan->user->rt_rw ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="px-4 py-1.5 {{ $pengaduan->status == 'selesai' ? 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30' : 'bg-amber-500/20 text-amber-400 border-amber-500/30' }} rounded-full text-xs font-black uppercase tracking-widest border">
                                {{ $pengaduan->status }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8 space-y-10">
                        <section>
                            <h4 class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-4 flex items-center">
                                <span class="w-8 h-[1px] bg-teal-500 mr-3"></span> Isi Pengaduan
                            </h4>
                            <div class="bg-slate-900/50 p-6 rounded-2xl border border-white/5 text-slate-200 leading-relaxed text-lg italic">
                                "{{ $pengaduan->isi_laporan }}"
                            </div>
                        </section>

                        <section>
                            <h4 class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-4 flex items-center">
                                <span class="w-8 h-[1px] bg-teal-500 mr-3"></span> Lampiran Foto
                            </h4>
                            @if($pengaduan->foto)
                            <div class="relative group max-w-2xl mx-auto">
                                <div class="absolute -inset-1 bg-gradient-to-r from-teal-500 to-blue-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                                <img src="{{ asset('storage/' . $pengaduan->foto) }}" 
                                     alt="Foto Pengaduan" 
                                     class="relative rounded-2xl shadow-2xl w-full object-cover max-h-[500px] border border-white/10">
                            </div>
                            @else
                            <div class="p-12 border-2 border-dashed border-white/5 rounded-3xl text-center text-slate-600">
                                <p class="text-sm tracking-wide">Tidak ada lampiran foto dokumen</p>
                            </div>
                            @endif
                        </section>
                    </div>
                    
                    <div id="tanggapan-section" class="p-8 bg-teal-500/5 border-t border-teal-500/20">
                        <div class="mb-6">
                            <h4 class="text-white font-bold text-xl flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                Berikan Tanggapan
                            </h4>
                            <p class="text-slate-400 text-sm mt-1">Tanggapan Anda akan langsung terlihat oleh masyarakat yang melapor.</p>
                        </div>

                        <form action="{{ route('admin.tanggapi', $pengaduan->id) }}" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <textarea name="tanggapan" rows="4" required
                                        class="w-full bg-slate-950 border border-white/10 rounded-2xl p-5 text-white focus:ring-2 focus:ring-teal-500 focus:border-transparent transition outline-none placeholder:text-slate-600"
                                        placeholder="Ketikkan langkah tindak lanjut atau solusi di sini..."></textarea>
                                </div>

                                <div class="flex flex-col md:flex-row gap-6 items-center">
                                    <div class="w-full md:w-1/2">
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Update Status</label>
                                        <select name="status" class="w-full bg-slate-950 border border-white/10 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-teal-500 outline-none appearance-none cursor-pointer">
                                            <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>🟡 Sedang Diproses</option>
                                            <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>🟢 Selesai / Tuntas</option>
                                        </select>
                                    </div>
                                    <div class="w-full md:w-1/2 self-end">
                                        <button type="submit" class="w-full bg-teal-500 hover:bg-teal-400 text-slate-900 font-black py-4 rounded-xl transition-all shadow-xl shadow-teal-500/10 transform hover:-translate-y-1 uppercase tracking-widest text-sm">
                                            Kirim Tanggapan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>