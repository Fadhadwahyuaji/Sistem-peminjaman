<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuperadminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware'=>['auth']], function(){
    Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['CheckUserRole:superadmin'])->group(function(){
        Route::get('/superadmin/mahasiswa', [SuperAdminController::class, 'mahasiswa'])->name('tampil_mahasiswa');
        Route::get('/superadmin/mahasiswa/tambah', [SuperAdminController::class, 'tambah_mhs'])->name('tambah_mahasiswa');
        Route::post('/superadmin/mahasiswa/simpan', [SuperAdminController::class, 'simpan_mhs'])->name('simpan_mahasiswa');
        Route::get('/superadmin/mahasiswa/edit/{id}', [SuperAdminController::class, 'edit_mhs'])->name('edit_mahasiswa');
        Route::put('/superadmin/mahasiswa/simpan/{id}', [SuperAdminController::class, 'simpan_edit'])->name('simpan_edit');
        Route::get('/superadmin/mahasiswa/hapus/{id}', [SuperAdminController::class, 'hapus_mhs'])->name('hapus_mahasiswa');

        Route::get('/superadmin/admin', [SuperAdminController::class, 'admin'])->name('tampil_admin');
        Route::get('/superadmin/admin/tambah', [SuperAdminController::class, 'tambah_admin'])->name('tambah_admin');
        Route::post('/superadmin/admin/simpan', [SuperAdminController::class, 'simpan_admin'])->name('simpan_admin');
        Route::get('/superadmin/admin/edit/{id}', [SuperAdminController::class, 'edit_admin'])->name('edit_admin');
        Route::put('/superadmin/admin/simpan/{id}', [SuperAdminController::class, 'simpan_edit_admin'])->name('simpan_edit_admin');
        Route::get('/superadmin/admin/hapus/{id}', [SuperAdminController::class, 'hapus_admin'])->name('hapus_admin');
    });

    Route::middleware(['CheckUserRole:admin'])->group(function(){
        Route::get('/admin/barang', [AdminController::class, 'barang'])->name('admin_tampil_barang');
        Route::get('/admin/barang/tambah', [AdminController::class, 'tambah_barang'])->name('tambah_barang');
        Route::post('/admin/barang/simpan', [AdminController::class, 'simpan_barang'])->name('simpan_barang');
        Route::get('/admin/barang/edit/{id}', [AdminController::class, 'edit_barang'])->name('edit_barang');
        Route::put('/admin/barang/simpan/{id}', [AdminController::class, 'simpan_edit_barang'])->name('simpan_edit_barang');
        Route::get('/admin/barang/hapus/{id}', [AdminController::class, 'hapus_barang'])->name('hapus_barang');

        Route::get('/admin/peminjaman', [AdminController::class, 'peminjaman'])->name('adm_peminjaman');
        Route::get('/admin/peminjaman/permintaan', [AdminController::class, 'permintaan_pinjaman'])->name('adm_permintaan_pinjaman');
        Route::post('/admin/peminjaman/{id}/ditolak}', [AdminController::class, 'tolak_pinjaman'])->name('adm_tolak_pinjaman');
        Route::post('/admin/peminjaman/{id}/disetujui}', [AdminController::class, 'setuju_pinjaman'])->name('adm_setuju_pinjaman');
        Route::post('/admin/peminjaman/{id}/selesai}', [AdminController::class, 'selesai_pinjaman'])->name('adm_selesai_pinjaman');

        Route::get('/admin/pengembalian', [AdminController::class, 'pengembalian'])->name('adm_pengembalian');
    });

    Route::middleware(['CheckUserRole:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/lab', [MahasiswaController::class, 'index'])->name('tampil_lab');
        Route::get('/mahasiswa/barang/{barang}', [MahasiswaController::class, 'barang'])->name('tampil_barang');
        Route::post('/mahasiswa/tambah-ke-keranjang/{id}', [MahasiswaController::class, 'tambah_keranjang'])->name('tambah_keranjang');
        Route::get('/mahasiswa/keranjangku', [MahasiswaController::class, 'keranjangku'])->name('keranjangku');
        Route::delete('/mahasiswa/keranjangku/{id}', [MahasiswaController::class, 'hapus_keranjangku'])->name('hapus_keranjangku');
        Route::post('/mahasiswa/keranjangku/{id}/tambah', [MahasiswaController::class, 'tambah_keranjangku'])->name('tambah_keranjangku');

        Route::post('/mahasiswa/proses-barang', [MahasiswaController::class, 'checkout'])->name('pinjamsekarang');
        Route::get('/mahasiswa/peminjaman', [MahasiswaController::class, 'peminjaman'])->name('mhs_peminjaman');

    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

