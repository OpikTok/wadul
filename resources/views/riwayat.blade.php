<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadul - Riwayat Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-light">

    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="logo-img" alt="Logo">
                <span class="logo-text">Wadul</span>
            </div>
            <div class="nav-links">
                <a href="/home">Home</a>
                <a href="/pengaduan">Pengaduan</a>
                <a href="/tentang">Tentang Kami</a>
                <a href="/riwayat">Riwayat</a>
                <a href="/login" class="btn-login">Login \ Daftar</a>
            </div>
        </div>
    </nav>

    <main class="history-container">
        <div class="history-header">
            <h1 class="history-title">Riwayat Pengaduan Saya</h1>
            <p class="history-subtitle">Pantau status laporan Anda di sini</p>
        </div>

        @if($pengaduans->isEmpty())
            <div class="empty-state">
                <p>Anda belum pernah mengirim pengaduan.</p>
                <a href="/pengaduan" class="btn-submit-login" style="max-width: 200px; margin-top: 20px; text-decoration: none; display: inline-block;">Buat Laporan</a>
            </div>
        @else
            <div class="history-list">
                @foreach($pengaduans as $item)
                    <div class="history-card">
                        <div class="card-top">
                            <div class="report-info">
                                <span class="report-id">LAPORAN #{{ $item->id }}</span>
                                <span class="report-date">{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                            <span class="status-badge {{ $item->status == 'selesai' ? 'status-done' : 'status-pending' }}">
                                {{ strtoupper($item->status) }}
                            </span>
                        </div>

                        <div class="card-body">
                            <p class="report-text">{{ $item->isi_laporan }}</p>
                            
                           @if($item->foto)
    <div class="report-photo" style="margin-top: 15px;">
        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Laporan" style="width: 100%; max-width: 300px; border-radius: 8px; border: 1px solid #ddd;">
    </div>
@endif
                        </div>

                        <div class="card-footer">
                            @if($item->tanggapan)
                                <div class="response-box">
                                    <p class="response-label">Tanggapan Admin:</p>
                                    <p class="response-text">"{{ $item->tanggapan->tanggapan }}"</p>
                                </div>
                            @else
                                <div class="no-response">
                                    <p>Menunggu tanggapan dari petugas...</p>
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