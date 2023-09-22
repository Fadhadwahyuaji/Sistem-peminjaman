<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LabController;
use App\Http\Controllers\API\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:api'])->group(function () {

    Route::get('/mahasiswa/lab', [LabController::class, 'index']);
    Route::get('/mahasiswa/lab/{lab}', [LabController::class, 'barang']);
    Route::post('/mahasiswa/tambah-ke-keranjang/{id}', [MahasiswaController::class, 'tambah_keranjang']);
    Route::get('/mahasiswa/akanpinjam', [MahasiswaController::class, 'keranjangku']);
    Route::delete('/mahasiswa/akanpinjam/{id}', [MahasiswaController::class, 'hapus_keranjangku']);
    Route::post('/mahasiswa/akanpinjam/{id}/tambah', [MahasiswaController::class, 'tambah_brg_keranjang']);

    Route::post('/mahasiswa/proses-barang', [MahasiswaController::class, 'checkout']);
    Route::get('/mahasiswa/peminjaman', [MahasiswaController::class, 'peminjaman']);



});
