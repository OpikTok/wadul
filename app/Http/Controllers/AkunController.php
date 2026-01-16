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
        
        User::findOrFail($id)->delete();
        return back()->with('success', 'Akun berhasil dihapus');
    }
   public function edit($id)
{
    
    $user = User::findOrFail($id); 
    
   
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