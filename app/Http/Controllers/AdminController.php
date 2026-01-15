<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan; // Pastikan memanggil model Pengaduan

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    // TAMBAHKAN FUNGSI INI
   public function pengaduan()
{
    // Mengambil data pengaduan terbaru beserta nama pengirimnya
    $pengaduans = Pengaduan::with('user')->latest()->get();
    return view('admin.pengaduan', compact('pengaduans'));
}
    public function akun()
{
    // Mengambil semua user yang memiliki role 'user' (masyarakat)
    $users = \App\Models\User::where('role', 'user')->get(); 
    
    // Mengirim data $users ke halaman blade admin/akun
    return view('admin.akun', compact('users'));
}
    public function destroy($id)
{
    $user = \App\Models\User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.akun')->with('success', 'User berhasil dihapus');
}
public function show($id)
{
    // Mengambil data pengaduan beserta user-nya
    $pengaduan = \App\Models\Pengaduan::with('user')->findOrFail($id);
    return view('admin.show_pengaduan', compact('pengaduan'));
}
public function tanggapi(Request $request, $id)
{
    // Simpan tanggapan berdasarkan ID pengaduan yang sedang dibuka admin
    \App\Models\Tanggapan::create([
        'pengaduan_id' => $id, // ID ini otomatis menghubungkan ke laporan user terkait (misal Sahrul)
        'tanggapan' => $request->tanggapan,
        'tgl_tanggapan' => now(),
    ]);

    // Update status pengaduan menjadi selesai
    \App\Models\Pengaduan::where('id', $id)->update(['status' => 'selesai']);

    return redirect()->back()->with('success', 'Tanggapan berhasil dikirim!');
}

}