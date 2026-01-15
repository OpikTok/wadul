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
            background: #0f172a; /* Warna dark deep blue */
            color: #f1f5f9;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .sidebar {
            background: #1e293b;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background: rgba(45, 212, 191, 0.1);
            color: #2dd4bf;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <aside class="sidebar w-64 fixed h-full p-6">
            <div class="mb-10">
                <h1 class="text-2xl font-bold text-teal-400 tracking-wider">WADUL</h1>
            </div>
            <nav>
                <a href="/admin/pengaduan" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 ml-64 p-12">
            <div class="max-w-4xl mx-auto">
                <div class="mb-8">
                    <h2 class="text-sm font-semibold text-teal-500 uppercase tracking-widest">Detail Laporan</h2>
                    <h3 class="text-3xl font-bold mt-1">Laporan dari {{ $pengaduan->user->name }}</h3>
                </div>

                <div class="glass-card rounded-3xl overflow-hidden">
                    <div class="p-8 border-b border-white/10 flex justify-between items-center bg-white/5">
                        <div class="flex items-center space-x-4">
                            <div class="h-12 w-12 rounded-full bg-teal-500/20 flex items-center justify-center text-teal-400 font-bold text-xl">
                                {{ substr($pengaduan->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-lg font-semibold leading-none">{{ $pengaduan->user->name }}</p>
                                <p class="text-sm text-slate-400 mt-1 italic">RT {{ $pengaduan->user->rt_rw ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 bg-teal-500/10 text-teal-400 rounded-full text-xs font-bold uppercase tracking-wider border border-teal-500/20">
                                {{ $pengaduan->status }}
                            </span>
                            <p class="text-xs text-slate-500 mt-2">{{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="p-8">
                        <h4 class="text-teal-400 font-semibold mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Isi Pengaduan
                        </h4>
                        <div class="bg-white/5 p-6 rounded-2xl border border-white/5 text-slate-200 leading-relaxed text-lg">
                            {{ $pengaduan->isi_laporan }}
                        </div>

                        <div class="mt-8">
                            <h4 class="text-teal-400 font-semibold mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Lampiran Foto
                            </h4>
                            
                            @if($pengaduan->foto)
                            <div class="relative group">
                                <div class="absolute -inset-1 bg-gradient-to-r from-teal-500 to-blue-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                                <img src="{{ asset('storage/' . $pengaduan->foto) }}" 
                                     alt="Foto Pengaduan" 
                                     class="relative rounded-2xl shadow-2xl w-full object-cover max-h-[500px] border border-white/10">
                            </div>
                            @else
                            <div class="p-10 border-2 border-dashed border-white/10 rounded-2xl text-center text-slate-500">
                                <p class="italic">Masyarakat tidak melampirkan foto dokumen.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div id="tanggapan-section" class="p-8 bg-white/5 border-t border-white/10">
                        <h4 class="text-teal-400 font-semibold mb-6 flex items-center text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            Tanggapi Laporan Ini
                        </h4>

                        <form action="{{ route('admin.tanggapi', $pengaduan->id) }}" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-400 mb-2">Pesan Tanggapan Admin</label>
                                    <textarea name="tanggapan" rows="4" required
                                        class="w-full bg-slate-900/50 border border-white/10 rounded-2xl p-4 text-white focus:ring-2 focus:ring-teal-500 focus:border-transparent transition outline-none"
                                        placeholder="Tuliskan solusi atau keterangan tindak lanjut..."></textarea>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-400 mb-2">Update Status Laporan</label>
                                        <select name="status" class="w-full bg-slate-900/50 border border-white/10 rounded-xl p-3 text-white focus:ring-2 focus:ring-teal-500 outline-none">
                                            <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                                            <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai / Tuntas</option>
                                        </select>
                                    </div>
                                    <div class="flex items-end">
                                        <button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-teal-500/20 transform hover:-translate-y-1">
                                            Kirim & Simpan Tanggapan
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