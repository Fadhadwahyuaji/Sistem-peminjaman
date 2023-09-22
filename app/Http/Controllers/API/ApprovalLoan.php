<?php

namespace App\Http\Controllers\API;
use App\Models\Items;

// namespace App\Http\Controllers\API;


// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

// use Illuminate\Http\Request;

class ApprovalLoan extends Controller
{
    public function persetujuan($id){

        $items = Items::all();
        $item = Items::find($id);
        if(!$item){
            return response()->json([

            ]);
        }
        $IdPeminjaman = request()->input('IdPeminjaman');
        $tanggalPeminjaman = request()->input('tanggal_peminjaman');

        $response = Http::get('10.0.160.80:8000/api/item', [
            'IdPeminjaman' => $IdPeminjaman,
            'tanggal_peminjaman' => $tanggalPeminjaman,
          ]);

          if ($response->status() === 200 && $response->json('status') === 'Disetujui') {
            return;
          }
          else if ($response->status() === 200 && $response->json('status') === 'Ditolak') {
            return;
          }

    }
}
