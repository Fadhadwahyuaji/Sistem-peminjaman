@extends('layouts.theme')
@section('content')
@php
use Illuminate\Support\Str;
@endphp

    @if(Auth::user()->role == 'admin')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">DASHBOARD ADMIN</h3>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- @foreach ($lab as $item) --}}
                
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Permintaan Pinjam</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $permintaanPinjam }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Barang</p>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Sedang Dipinjam</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalSedangPinjam }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Barang</p>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Selesai Pinjam</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $selesaiPinjam }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Barang</p>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Jumlah Barang Tersedia</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalBarang }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Barang</p>
                            </div>
                        </div>
                    </div>            
                </div>
        </div>
    </div>
                        
    @endif


    @if(Auth::user()->role == 'superadmin')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">DASHBOARD SUPERADMIN</h3>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- @foreach ($lab as $item) --}}
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Jumlah Admin</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalAdmin }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Admin</p>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Jumlah Mahasiswa</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalMahasiswa }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Mahasiswa</p>
                            </div>
                        </div>
                    </div>            
                </div>
        </div>
    </div>
                        
    @endif



    @if(Auth::user()->role == 'mahasiswa')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">Barang Lab</h3>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            @foreach ($lab as $item)
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
            <a href="{{ route('tampil_barang', [ 'barang' => Str::lower($item->lab) ]) }}">

                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">{{ $item->lab }}</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $item->barang_count }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Barang</p>
                            </div>
                        </div>
                    </div>            
            </a>    
                </div>
                
            @endforeach
        </div>
    </div>
    {{-- @foreach ($keranjangku as $item)
    <div class="col-md-12 col-12">
        <!-- card  -->
        <div class="card">
            <div class="table-responsive">
                <table class="table text-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="400px">Lab</th>
                            <th>Nama Barang</th> 
                            <th>Kuantitas</th>
                        </tr>
                    </thead>
                    <tbody>       
                        <tr>
                            <td class="align-middle"><h5 class=" mb-1">{{ $item->barang->lab->lab }}</h5></td>
                            <td class="align-middle"><h5 class=" mb-1">{{ $item->barang->nama_barang }}</h5></td>
                            <td class="align-middle"><div class="d-flex">
                                <form method="POST"
                                    action="{{ route('tambah_keranjangku', ['id' => $item->id]) }}">
                                    @csrf
                                    <button class="btn btn-primary btn-sm"> + </button>

                                </form>
                                <span class="text-dark mx-2"> {{ $item->kuantitas }} </span>
                                <form method="POST"
                                    action="{{ route('hapus_keranjangku', ['id' => $item->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">-</button>
                                </form>
                            </div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- card footer  -->
            <div class="card-footer bg-white text-center">
                {{-- <a href="#" class="link-primary">Lihat Semua</a> --}}
{{-- 
            </div>
        </div>

    </div>
    @endforeach                --}}
    @endif


@endsection