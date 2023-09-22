<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Barang;
use App\Models\Lab;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function dashboard(){
        return view('superadmin.dashboard');
    }

    // MAHASISWA
    public function mahasiswa(){
        $usersWithMahasiswa = User::where('role','mahasiswa')->with('mahasiswa')->get();    
        return view('superadmin.mahasiswa.mahasiswa',[
            'mahasiswa' => $usersWithMahasiswa
        ]);
    }
    public function tambah_mhs(){
        return view('superadmin.mahasiswa.tambah_mahasiswa');
    }
    public function simpan_mhs(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',

        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'role' => 'mahasiswa'
        ]);      
        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $attrs['nim'],
            'jurusan' => $attrs['jurusan'],
            'kelas' => $attrs['kelas']
        ]);
        
        return redirect()->route('tampil_mahasiswa');
    }
    public function edit_mhs($id){
        $user = User::find($id);
        return view('superadmin.mahasiswa.edit_mahasiswa',[
          'mahasiswa' => $user
        ]);
    }
    public function simpan_edit(Request $request, $id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('tampil_mahasiswa')->with('alert', 'User tidak ditemukan');
        }

        $attrs = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
        ]);
        if($request->input('password')){
            $user->password = $request->input('password');
        }
        $user->name = $attrs['name'];
        $user->email = $attrs['email'];
        $user->mahasiswa->nim = $attrs['nim'];
        $user->mahasiswa->kelas = $attrs['kelas'];
        $user->mahasiswa->jurusan = $attrs['jurusan'];
        $user->save();
        $user->mahasiswa->save();
        return redirect()->route('tampil_mahasiswa')->with('alert', 'Berhasil memperbarui user');
    }
    public function hapus_mhs($id){
        $user  = User::find($id);
        if(!$user){
            return "not found";
        }
        $user->mahasiswa->delete();
        $user->delete();

        return redirect()->route('tampil_mahasiswa');
    }
    

    // ADMIN
    public function admin(){
        $usersWithAdmin = User::where('role','admin')->with('admin')->get();
        return view('superadmin.admin.admin',[
            'admin' => $usersWithAdmin,
        ]);
    }
    public function tambah_admin(){
        $labs = Lab::all();
        return view('superadmin.admin.tambah_admin', compact('labs'));      
    }
    public function simpan_admin(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'lab' => 'required',
            'jabatan' => 'required',

        ]);

        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => $attrs['password'],
            'role' => 'admin'
        ]);      
        Admin::create([
            'user_id' => $user->id,
            'lab_id' => $attrs['lab'],
            'jabatan' => $attrs['jabatan']
        ]);
        
        return redirect()->route('tampil_admin');
    }
    public function edit_admin($id){
        $lab = Lab::all();
        $user = User::find($id);
        return view('superadmin.admin.edit_admin',[
            'lab' => $lab,
          'admin' => $user
        ]);
    }
    public function simpan_edit_admin(Request $request, $id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('tampil_admin')->with('alert', 'User tidak ditemukan');
        }

        $attrs = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'lab' => 'required',
        ]);
        if($request->input('password')){
            $user->password = $request->input('password');
        }
        $user->name = $attrs['name'];
        $user->email = $attrs['email'];
        $user->admin->jabatan = $attrs['jabatan'];
        $user->admin->lab_id = $attrs['lab'];
        $user->save();
        $user->admin->save();
        
        return redirect()->route('tampil_admin')->with('alert', 'Berhasil memperbarui user');
    }
    public function hapus_admin($id){
        $user  = User::find($id);
        if(!$user){
            return "not found";
        }
        $user->admin->delete();
        $user->delete();
        return redirect()->route('tampil_admin');
    }

}