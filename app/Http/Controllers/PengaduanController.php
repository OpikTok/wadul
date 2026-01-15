<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // UBAH: Karena file pengaduan.blade.php sudah dipindah ke folder user
        return view('pengaduan'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048' 
        ]);

        $nama_foto = null;
        if ($request->hasFile('foto')) {
            $nama_foto = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'isi_laporan' => $request->isi_laporan,
            'foto' => $nama_foto,
            'status' => 'proses',
        ]);

        // UBAH: Redirect ke halaman riwayat agar user bisa langsung melihat laporannya
        return redirect()->route('pengaduan.riwayat')->with('success_laporan', 'Laporan berhasil terkirim!');
    }

public function riwayat()
{
    // auth()->id() mengambil ID user yang sedang login saat ini
    // Jadi jika Sahrul yang login, yang ditarik hanya data dengan user_id milik Sahrul
    $pengaduans = Pengaduan::with('tanggapan')
                            ->where('user_id', auth()->id()) 
                            ->latest()
                            ->get();

   return view('riwayat', [
    'pengaduans' => Pengaduan::where('user_id', auth()->id())->with('tanggapan')->latest()->get()
]);
}
    }   