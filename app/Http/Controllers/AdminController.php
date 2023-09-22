<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Barang;
use App\Models\Lab;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // BARANG
    public function barang(){   
        // $barang = Barang::with('admin')->get();
        $user = Auth::user();
    
        // Periksa apakah pengguna adalah admin
        if ($user->role != 'admin') {
            return abort(403);
        }

        // Dapatkan lab terkait dengan admin
        $lab = $user->admin->lab;

        if (!$lab) {
            return abort(403);
        }

        // Dapatkan data barang yang terkait dengan lab
        $barang = Barang::where('lab_id', $lab->id)->get();

        return view('admin.barang.barang', [
            'barang' => $barang,
            'lab' => $lab,
        ]);
    }

    public function tambah_barang(){
        $user = Auth::user()->load('admin.lab');
        $lab = Lab::all()->where('id', $user->admin->lab->id);
        return view('admin.barang.tambah_barang', [
            'lab' => $lab,
        ]);
    }
    public function simpan_barang(Request $request)
    {
        $attrs = $request->validate([
            'lab' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'tersedia' => 'required',
            'dipinjam' => 'required',

        ]);    
        Barang::create([
            'lab_id' =>  $attrs['lab'],
            'nama_barang'=> $attrs['nama_barang'],
            'jenis'=> $attrs['jenis'],
            'tersedia'=> $attrs['tersedia'],
            'dipinjam'=> $attrs['dipinjam'],
        ]);
        
        return redirect()->route('admin_tampil_barang');
    }
    public function edit_barang($id){
        $lab = Lab::all();
        $barang = Barang::find($id);
        return view('admin.barang.edit_barang',[
            'lab' => $lab,
          'barang' => $barang
        ]);
    }
    public function simpan_edit_barang(Request $request, $id){
        
        $barang = Barang::find($id);
        if (!$barang) {
            return redirect()->route('tampil_barang')->with('alert', 'User tidak dbarangukan');
        }

        $attrs = $request->validate([
            'lab_id' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'tersedia' => 'required',
            'dipinjam' => 'required',
        ]);

        $barang->lab_id = $attrs['lab_id'];
        $barang->nama_barang = $attrs['nama_barang'];
        $barang->jenis = $attrs['jenis'];
        $barang->tersedia = $attrs['tersedia'];
        $barang->dipinjam = $attrs['dipinjam'];
        $barang->save();
        return redirect()->route('admin_tampil_barang')->with('alert', 'Berhasil memperbarui barang');
    }
    public function hapus_barang($id){
        $barang  = Barang::find($id);
        if(!$barang){
            return "not found";
        }
        $barang->delete();
        return redirect()->route('admin_tampil_barang');
    }

    public function permintaan_pinjaman()
    {
        $admin = User::with('admin.lab')
            ->where('id', Auth::user()->id)
            ->first();
        // $transaksi = transaksi::with(['barang.lab','user'])->get();
        $labId = $admin->admin->lab->id;
        $transaksi = Transaksi::with(['barang.lab', 'user'])
            ->where('status', 'proses')
            ->whereHas('barang.lab', function ($query) use ($labId) {
                $query->where('id', $labId);
            })
            ->get();
        return view('admin.peminjaman.permintaan_peminjaman', [
            'data' => $transaksi,
            'lab' => $admin->admin->lab->lab,
        ]);
    }

    public function peminjaman()
    {
        $admin = User::with('admin.lab')
            ->where('id', Auth::user()->id)
            ->first();
        // $transaksi = transaksi::with(['barang.lab','user'])->get();
        $labId = $admin->admin->lab->id;
        $transaksi = Transaksi::with(['barang.lab', 'user'])
            ->where('status', 'setuju')
            ->whereHas('barang.lab', function ($query) use ($labId) {
                $query->where('id', $labId);
            })
            ->get();
        return view('admin.peminjaman.peminjaman', [
            'data' => $transaksi,
            'lab' => $admin->admin->lab->lab,
        ]);
    }

    public function setuju_pinjaman($id)
    {
        $transaksi = Transaksi::with('barang')->find($id);
    
        if ($transaksi) {
            // Pastikan stok mencukupi sebelum mengurangkan
            if ($transaksi->barang->tersedia > 0) {
                $transaksi->status = 'setuju';
    
                // Mengurangkan stok barang
                $transaksi->barang->tersedia = $transaksi->barang->tersedia - 1;
                $transaksi->barang->dipinjam = $transaksi->barang->dipinjam + 1;

    
                // Simpan perubahan dalam transaksi dan barang
                try {
                    $transaksi->save();
                    $transaksi->barang->save();
                } catch (\Exception $e) {
                    // Tangani kesalahan jika gagal menyimpan
                    return redirect()->route('adm_permintaan_pinjaman')->with('error', 'Gagal menyimpan perubahan.');
                }
    
                return redirect()->route('adm_permintaan_pinjaman')->with('success', 'Transaksi diterima.');
            } else {
                return redirect()->route('adm_permintaan_pinjaman')->with('error', 'Stok tidak mencukupi.');
            }
        } else {
            return redirect()->route('adm_permintaan_pinjaman')->with('error', 'Transaksi tidak dbarangukan.');
        }
    }
    
    public function tolak_pinjaman($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'ditolak';
        $transaksi->save();
        return redirect()->route('adm_permintaan_pinjaman');
    }

    public function selesai_pinjaman($id)
    {
        $transaksi = Transaksi::with('barang')->find($id);
    
        if ($transaksi) {
            // Pastikan stok mencukupi sebelum mengurangkan
            if ($transaksi->barang) {
                $transaksi->status = 'selesai';
    
                // Mengurangkan stok barang
                $transaksi->barang->tersedia = $transaksi->barang->tersedia + 1;
                $transaksi->barang->dipinjam = $transaksi->barang->dipinjam - 1;

    
                // Simpan perubahan dalam transaksi dan barang
                try {
                    $transaksi->save();
                    $transaksi->barang->save();
                } catch (\Exception $e) {
                    // Tangani kesalahan jika gagal menyimpan
                    return redirect()->route('adm_peminjaman')->with('error', 'Gagal menyimpan perubahan.');
                }
    
                return redirect()->route('adm_peminjaman')->with('success', 'Transaksi diterima.');
            } else {
                return redirect()->route('adm_peminjaman')->with('error', 'Stok tidak mencukupi.');
            }
        } else {
            return redirect()->route('adm_peminjaman')->with('error', 'Transaksi tidak dbarangukan.');
        }
    }
    public function pengembalian()
    {
        $admin = User::with('admin.lab')
            ->where('id', Auth::user()->id)
            ->first();
        // $transaksi = transaksi::with(['barang.lab','user'])->get();
        $labId = $admin->admin->lab->id;
        $status = ['tolak', 'selesai']; // Daftar status yang ingin Anda ambil

        $transaksi = Transaksi::with(['barang.lab', 'user'])
            ->whereIn('status', $status)
            ->whereHas('barang.lab', function ($query) use ($labId) {
                $query->where('id', $labId);
            })
            ->get();

        // dd($admin);
        return view('admin.pengembalian.pengembalian', [
            'data' => $transaksi,
            'lab' => $admin->admin->lab->lab,
        ]);
    }
}
