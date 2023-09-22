<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Lab;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['mahasiswa.lab', 'superadmin.dashboard'], function ($view) {
            $lab = Lab::withCount('barang')->get();
            $view->with('lab', $lab);
        });
        view()->composer(['superadmin.dashboard'], function ($view) {
            $permintaanPinjam = Transaksi::where('status','proses')->count();
            $totalSedangPinjam = Transaksi::where('status','setuju')->count();
            $selesaiPinjam = Transaksi::where('status','selesai')->count();
            $totalBarang = Barang::sum('tersedia');
            $totalAdmin = Admin::count();
            $totalMahasiswa = Mahasiswa::count();

            $data = [
                'permintaanPinjam' => $permintaanPinjam,
                'selesaiPinjam' => $selesaiPinjam,
                'totalSedangPinjam' => $totalSedangPinjam,
                'totalBarang' => $totalBarang,
                'totalAdmin' => $totalAdmin,
                'totalMahasiswa' => $totalMahasiswa,
            ];
            
            $view->with($data);
        });
    }
}
