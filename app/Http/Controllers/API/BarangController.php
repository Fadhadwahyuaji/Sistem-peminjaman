<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show()
    {
        $items = Barang::all();

        if ($items->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada item'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'data' => $items
        ], 200);
    }

    public function showById($id)
    {
        $item = Barang::find($id);

        if (!$item) {
            return response()->json([
                'status' => false,
                'message' => 'Item tidak ditemukan'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'data' => $item
        ], 200);
    }

    public function searchByName(Request $request)
    {
        if (!$request->name) {
            return response()->json([
                'status' => false,
                'message' => 'Parameter `name` tidak ditemukan'
            ], 400);
        }

        $search = $request->name;
        $items = Barang::where("name", "LIKE", "%{$search}%")->get();
        if ($items->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada item `'.$search.'` ditemukan'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'data' => $items
        ], 200);
    }

    public function store(Request $request){
        $attrs = $request->validate([
            'name' => 'required',
            'lab' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
        ]);
        $data = Barang::create([
            'name' => $attrs['name'],
            'lab_id' => $attrs['lab'],
            'type' => $attrs['jenis'],
            'stock' => $attrs['stock'],
            'borrowed' => 0,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request,$id){

        $item = Barang::find($id);

        if(!$item){
            return response()->json([
                'message' => 'gada datanya',
            ]);
        }
        $attrs = $request->validate([
            'name' => 'required',
            'lab' => 'required',
            'jenis' => 'required',
            'stock' => 'required',
            'borrowed' => 'required'
        ]);

         $item->name = $attrs['name'];
         $item->lab_id =  $attrs['lab'];
         $item->jenis = $attrs['jenis'];
         $item->stock = $attrs['stock'];
         $item->borrowed = $attrs['borrowed'];

        return response()->json([
            'message' => 'berhasil',
            'data' => $item
        ]);
    }
    // public function destroy($id){

    //     $item = Items::find($id);

    //     if(!$item){
    //         return response()->json([
    //             'message' => 'gada datanya',
    //         ]);
    //     }
    //      $item->delete();

    //     return response()->json([
    //         'message' => 'berhasil dihaps',
    //     ]);
    // }
    function delete($id)  {
        $item = Barang::find($id);

        if (!$item){
            return response()->json([
                'status'=> false,
                'message' => 'Item Tidak Ditemukan'
            ]);

        }
        $item->delete();
        return response()->json([
            'message' => 'Item Berhasil Dihapus'
        ]);
    }
}