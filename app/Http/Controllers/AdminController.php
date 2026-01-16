<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan; 

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    
   public function pengaduan()
{
    
    $pengaduans = Pengaduan::with('user')->latest()->get();
    return view('admin.pengaduan', compact('pengaduans'));
}
 public function akun()
{
    
    $users = \App\Models\User::all(); 
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
    
    $pengaduan = \App\Models\Pengaduan::with('user')->findOrFail($id);
    return view('admin.show_pengaduan', compact('pengaduan'));
}
public function tanggapi(Request $request, $id)
{
    
    \App\Models\Tanggapan::create([
        'pengaduan_id' => $id, 
        'tanggapan' => $request->tanggapan,
        'tgl_tanggapan' => now(),
    ]);

  
    \App\Models\Pengaduan::where('id', $id)->update(['status' => 'selesai']);

    return redirect()->back()->with('success', 'Tanggapan berhasil dikirim!');
}

}