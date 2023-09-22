@extends('layouts.theme')

@section('content')
    <!-- Container fluid -->
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">DATA BARANG</h3>
                        </div>
                        <div>
                            <a href="{{route('tambah_barang')}}"><button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Tambah</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row  -->
        <div class="row mt-6">
            <div class="col-md-12 col-12">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header bg-white  py-4">
                        <h4 class="mb-0">Data Barang</h4>
                    </div>
                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>LAB</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Tersedia</th>
                                    <th>Dipinjam</th>
                                    <th>Edit/Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $brg)
                                    
                                <tr>
                                    <td class="align-middle"><h5 class=" mb-1">{{ $lab->lab }}</h5></td>
                                    <td class="align-middle"><h5 class=" mb-1">{{ $brg->nama_barang }}</h5></td>
                                    <td class="align-middle"><h5 class=" mb-1">{{ $brg->jenis }}</h5></td>
                                    <td class="align-middle"><h5 class=" mb-1">{{ $brg->tersedia }}</h5></td>
                                    <td class="align-middle"><h5 class=" mb-1">{{ $brg->dipinjam }}</h5></td>
                                    <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <div>
                                            <a href="{{route('edit_barang', [ 'id' => $brg->id ])}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                            {{-- @component('components.mahasiswa.edit_mahasiswa')    
                                            @endcomponent --}}
                                        </div>
                                        <div><a href="{{ route('hapus_barang', ['id' => $brg->id]) }}"><button type="button" class="btn btn-danger" >Hapus</button></a>
                                        {{-- @component('components.mahasiswa.hapus_mahasiswa')    
                                        @endcomponent</div> --}}
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
                <!-- End Card -->
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
