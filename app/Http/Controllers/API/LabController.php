<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index(){
        $labs = Lab::all();
        return response()->json([
            'status' => true,
            'data' => $labs,
        ]);
    }

    public function Barang($barang){
        $lab = Lab::where('lab', $barang)
            ->with('barang')
            ->first();
        // dd($lab->items);
        if(!$lab){
            return response()->json([
                'status' => false,
                'message' => 'lab not found',
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $lab,
        ]);
    }
}
