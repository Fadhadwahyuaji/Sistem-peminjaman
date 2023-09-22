<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Lab;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $lab = Lab::withCount('barang')->get();
        // dd($lab);
        return view('mahasiswa.lab',[
            'lab' => $lab,
        ]);
    }
    public function Barang($Barang)
    {
        $lab = Lab::where('lab', $Barang)
            ->with('barang')
            ->first();
        // dd($lab->Barang);
        return view('mahasiswa.Barang', [
            'data' => $lab,
        ]);
    }

    public function tambah_keranjang(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('tampil_lab');
        }

        // Cek apakah item sudah ada dalam keranjang
        $existingKeranjang = Keranjang::where('user_id', Auth::user()->id)
            ->where('barang_id', $id)
            ->first();

        if ($existingKeranjang) {
            // Jika item sudah ada dalam keranjang, tambahkan jumlahnya
            $existingKeranjang->increment('kuantitas');
        } else {
            // Jika item belum ada dalam keranjang, tambahkan item baru
            Keranjang::create([
                'user_id' => Auth::user()->id,
                'barang_id' => $id,
                'kuantitas' => 1,
            ]);
        }

        return redirect()->route('keranjangku');
    }

    public function keranjangku()
    {
        $myKeranjang = Keranjang::with('barang.lab')
            ->where('user_id', Auth::user()->id)
            ->get();
        // dd($myKeranjang);
        return view('mahasiswa.keranjang', ['keranjangku' => $myKeranjang]);
    }
    
    public function hapus_keranjangku($id)
    {
        $myKeranjang = Keranjang::find($id);
        if (!$myKeranjang) {
            return 'kosong';
        }
        if ($myKeranjang->kuantitas > 1) {
            $myKeranjang->kuantitas = $myKeranjang->kuantitas - 1;
            $myKeranjang->save();
            return redirect()->route('keranjangku');
        }
        $myKeranjang->delete();
        return redirect()->route('keranjangku');
    }
    public function tambah_keranjangku($id)
    {
        $myKeranjang = Keranjang::find($id);
        if (!$myKeranjang) {
            return 'kosong';
        }

        $myKeranjang->kuantitas = $myKeranjang->kuantitas + 1;
        $myKeranjang->save();

        $myKeranjang->save();
        return redirect()->route('keranjangku');
    }

    public function checkout()
    {
        $user = Auth::user();
        $myKeranjang = keranjang::where('user_id', $user->id)->get();

        foreach ($myKeranjang as $KeranjangItem) {
            // Dapatkan data dari item dalam Keranjang
            $itemName = $KeranjangItem->barang->nama_barang; // Contoh: Mendapatkan nama item
            $itemPrice = $KeranjangItem->barang->price; // Contoh: Mendapatkan harga item
            // Dan sebagainya, sesuai dengan atribut yang ada dalam model Item
            if ($KeranjangItem->kuantitas > 1) {
                for ($i = 0; $i < $KeranjangItem->kuantitas; $i++) {
                    Transaksi::create([
                        'user_id' => $user->id,
                        'barang_id' => $KeranjangItem->barang_id,
                        'status' => 'proses',
                        'keterangan' => 'proses'
                    ]);
                }
            }else{
                Transaksi::create([
                    'user_id' => $user->id,
                    'barang_id' => $KeranjangItem->barang_id,
                    'status' => 'proses',
                    'keterangan' => 'proses'
                ]);
            }
            $KeranjangItem->delete();
        }
        // dd('data pindah ke Transaksi');
        return redirect()->route('mhs_peminjaman');
    }

    public function peminjaman(){
        $Transaksi = Transaksi::with(['barang','user'])->where('user_id',Auth::user()->id)->get();
        // dd($Transaksi);
        return view('mahasiswa.peminjaman',[
            'data' => $Transaksi
        ]);
    }
}