<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        
        $users = User::where('role', 'user')->get();
        
        return view('admin.akun', compact('users'));
    }

    public function destroy($id)
{
    // 1. Cari user
    $user = User::findOrFail($id);
    
    // 2. Hapus semua pengaduan yang dibuat oleh user ini dulu (agar tidak error constraint)
    \DB::table('pengaduans')->where('user_id', $id)->delete();
    
    // 3. Baru hapus user-nya
    $user->delete();
    
    return back()->with('success', 'Akun dan data terkait berhasil dihapus');
}
   public function edit($id)
{
    
    $user = User::findOrFail($id); 
    
   
    return view('admin.editakun', compact('user')); 
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