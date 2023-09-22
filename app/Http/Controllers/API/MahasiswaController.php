<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class MahasiswaController extends Controller
{
    public function tambah_keranjang(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ada',
            ]);
        }

        // Cek apakah item sudah ada dalam keranjang
        $existingKeranjang = Keranjang::where('user_id', $user->id)
            ->where('barang_id', $id)
            ->first();

        if ($existingKeranjang) {
            // Jika item sudah ada dalam keranjang, tambahkan jumlahnya
            $existingKeranjang->increment('kuantitas');
        } else {
            // Jika item belum ada dalam keranjang, tambahkan item baru
            Keranjang::create([
                'user_id' => $user->id,
                'barang_id' => $id,
                'kuantitas' => 1,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'berhasil',
        ]);
    }

    public function keranjangku(){
        $user = JWTAuth::parseToken()->authenticate();

        $keranjangku = Keranjang::with('barang.lab')
            ->where('user_id', $user->id)
            ->get();
            return response()->json([
                'status' => true,
                'message' => $keranjangku
            ]);
    }

    public function hapus_keranjangku($id){
        $keranjangku = Keranjang::find($id);
        if (!$keranjangku) {
            return response()->json([
                'status' => false,
                'message' => 'not found'
            ]);
        }
        if ($keranjangku->kuantitas > 1) {
            $keranjangku->kuantitas = $keranjangku->kuantitas - 1;
            $keranjangku->save();
            return response()->json([
                'status' => true,
                'message' => 'berhasil mengurangi'
            ]);
        }
        $keranjangku->delete();
        return response()->json([
            'status' => true,
            'message' => 'berhasil menghapus'
        ]);
    }
    
    public function tambah_brg_keranjang($id){
        $keranjangku = Keranjang::find($id);
        if (!$keranjangku) {
            return response()->json([
                'status' => false,
                'message' => 'cart is empty'
            ]);
        }

        $keranjangku->kuantitas = $keranjangku->kuantitas + 1;
        $keranjangku->save();

        $keranjangku->save();
        return response()->json([
            'status' => true,
            'message' => 'berhasil menambahkan ke cart'
        ]);
    }

    public function checkout()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $myCart = Keranjang::where('user_id', $user->id)->get();

        foreach ($myCart as $cartItem) {

            if ($cartItem->kuantitas > 1) {
                for ($i = 0; $i < $cartItem->kuantitas; $i++) {
                    Transaksi::create([
                        'user_id' => $user->id,
                        'barang_id' => $cartItem->barang_id,
                        'status' => 'proses',
                        'keterangan' => 'proses'
                    ]);
                }
            }else{
                Transaksi::create([
                    'user_id' => $user->id,
                    'barang_id' => $cartItem->barang_id,
                    'status' => 'proses',
                    'keterangan' => 'proses'
                ]);
            }
            $cartItem->delete();
        }
        // dd('data pindah ke transaction');
        return response()->json([
            'status' => true,
            'message' => 'berhasil checkout'
        ]);
    }

    public function peminjaman(){
        $user = JWTAuth::parseToken()->authenticate();
        $transaction = Transaksi::with(['barang','user'])->where('user_id',$user->id)->get();
        // dd($transaction);
        return response()->json([
            'status' => true,
            'data' => $transaction
        ]);
    }
    
    // public function add_to_cart(){
    //     $item = Items::find($id);

    //     if (!$item) {
    //         return redirect()->route('itemslab.index');
    //     }

    //     // Cek apakah item sudah ada dalam keranjang
    //     $existingCart = Cart::where('user_id', Auth::user()->id)
    //         ->where('items_id', $id)
    //         ->first();

    //     if ($existingCart) {
    //         // Jika item sudah ada dalam keranjang, tambahkan jumlahnya
    //         $existingCart->increment('quantity');
    //     } else {
    //         // Jika item belum ada dalam keranjang, tambahkan item baru
    //         Cart::create([
    //             'user_id' => Auth::user()->id,
    //             'items_id' => $id,
    //             'quantity' => 1,
    //         ]);
    //     }

    //     return redirect()->route('itemslab.index');
    //     return response()->json([
    //         'message' => 'my cart'
    //     ]);
    // }
}
