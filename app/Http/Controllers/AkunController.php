<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        // Mengambil semua user dengan role 'user' (masyarakat)
        $users = User::where('role', 'user')->get();
        
        return view('admin.akun', compact('users'));
    }

    public function destroy($id)
    {
        // Fungsi untuk menghapus akun
        User::findOrFail($id)->delete();
        return back()->with('success', 'Akun berhasil dihapus');
    }
   public function edit($id)
{
    // Mengambil data user berdasarkan ID yang diklik, bukan yang terbaru
    $user = User::findOrFail($id); 
    
    // Pastikan nama view sesuai dengan saran sistem 'admin\editakun' atau 'admin.edit_akun'
    return view('admin.edit_akun', compact('user')); 
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update([
        'name'   => $request->name,
        'nik'    => $request->nik,
        'no_telp'=> $request->no_telp,
        'rt_rw'  => $request->rt_rw,
    ]);

    return redirect('/admin/akun')->with('success', 'Data berhasil diperbarui');
}
}