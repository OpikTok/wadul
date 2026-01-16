<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Riwayat Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="navbar sticky top-0 z-50 bg-white shadow-sm">
        <div class="nav-container max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="nav-logo flex items-center gap-3">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="w-10 h-10 rounded-lg object-cover" alt="Logo">
                <span class="text-2xl font-black tracking-tighter text-slate-800">Wadul</span>
            </div>

            <div class="nav-links flex items-center gap-8 font-medium text-slate-600">
                <a href="/home" class="hover:text-teal-600 transition">Home</a>
                <a href="/pengaduan" class="hover:text-teal-600 transition">Pengaduan</a>
                <a href="/tentang" class="hover:text-teal-600 transition">Tentang Kami</a>
                <a href="/riwayat" class="text-teal-600 font-bold">Riwayat</a>
                
                @auth
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-slate-800 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition">Logout</button>
                    </form>
                @else
                    <a href="/login" class="bg-teal-600 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-teal-700 transition">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-12 px-6">
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-4xl font-black text-slate-800 tracking-tighter italic uppercase">Riwayat Pengaduan</h1>
            <p class="text-slate-500 mt-2">Pantau perkembangan dan tanggapan laporan yang telah Anda kirim.</p>
        </div>

        @if($pengaduans->isEmpty())
            <div class="bg-white p-16 rounded-[2.5rem] shadow-xl shadow-slate-200 border border-slate-100 text-center">
                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl text-slate-400">📄</span>
                </div>
                <p class="text-slate-600 font-medium text-lg">Anda belum pernah mengirim pengaduan.</p>
                <a href="/pengaduan" class="mt-6 inline-block bg-teal-600 text-white font-bold px-8 py-3 rounded-2xl hover:bg-teal-700 transition shadow-lg shadow-teal-100">
                    Buat Laporan Sekarang
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($pengaduans as $item)
                    <div class="bg-white rounded-[2rem] shadow-lg shadow-slate-100 border border-slate-100 overflow-hidden transition-all hover:border-teal-200">
                        <div class="p-6 border-b border-slate-50 flex flex-wrap justify-between items-center gap-4 bg-slate-50/50">
                            <div class="flex items-center gap-4">
                                <span class="bg-slate-800 text-white text-[10px] font-black px-3 py-1 rounded-full tracking-widest uppercase">
                                    #ID-{{ $item->id }}
                                </span>
                                <span class="text-slate-400 text-sm font-medium">{{ $item->created_at->format('d F Y') }}</span>
                            </div>
                            <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest border
                                {{ $item->status == 'selesai' 
                                    ? 'bg-emerald-50 text-emerald-600 border-emerald-200' 
                                    : 'bg-amber-50 text-amber-600 border-amber-200' }}">
                                {{ $item->status }}
                            </span>
                        </div>

                        <div class="p-8">
                            <p class="text-slate-700 leading-relaxed text-lg italic mb-6">"{{ $item->isi_laporan }}"</p>
                            
                            @if($item->foto)
                                <div class="relative w-full md:w-1/2 rounded-2xl overflow-hidden border border-slate-100 shadow-sm">
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-48 object-cover" alt="Bukti Laporan">
                                </div>
                            @endif
                        </div>

                        <div class="px-8 pb-8">
                            @if($item->tanggapan)
                                <div class="bg-teal-50/50 rounded-2xl p-6 border border-teal-100 relative">
                                    <div class="absolute -top-3 left-6 bg-teal-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter">
                                        Tanggapan Petugas
                                    </div>
                                    <p class="text-slate-700 leading-relaxed font-medium">
                                        {{ $item->tanggapan->tanggapan }}
                                    </p>
                                    <p class="text-[10px] text-teal-600 mt-3 uppercase font-bold tracking-widest">
                                        Dibalas pada {{ $item->tanggapan->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                            @else
                                <div class="flex items-center gap-3 text-slate-400 italic text-sm bg-slate-50 p-4 rounded-2xl border border-dashed border-slate-200">
                                    <span class="animate-pulse">⏳</span>
                                    <span>Laporan sedang diverifikasi oleh petugas...</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

</body>
</html>