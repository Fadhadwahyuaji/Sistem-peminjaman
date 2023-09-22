@extends('layouts.theme')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="col-lg-12 col-md-12 col-12 my-2">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Data Barang</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <!-- card  -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Lab</th>
                                <th>Nama</th> 
                                <th>Jenis</th>
                                <th>Stock</th>
                                <th>Dipinjam</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->barang as $brg)
                                    
                            <tr>
                                <td class="align-middle"><h5 class=" mb-1">{{ $data->lab }}</h5></td>
                                <td class="align-middle"><h5 class=" mb-1">{{ $brg->nama_barang }}</h5></td>
                                <td class="align-middle"><h5 class=" mb-1">{{ $brg->jenis }}</h5></td>
                                <td class="align-middle"><h5 class=" mb-1">{{ $brg->tersedia }}</h5></td>
                                <td class="align-middle"><h5 class=" mb-1">{{ $brg->dipinjam }}</h5></td>
                                <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <form method="POST" action="{{ route('tambah_keranjang', ['id' => $brg->id]) }}">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">Pinjam</button>
                                    </form>
                                  </div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- card footer  -->
                <div class="card-footer bg-white text-center">
                    <a href="#" class="link-primary">Lihat Semua</a>

                </div>
            </div>

        </div>
    </div>
@endsection