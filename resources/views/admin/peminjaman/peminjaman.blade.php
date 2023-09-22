@extends('layouts.theme')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="col-lg-12 col-md-12 col-12 my-2">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">DATA PEMINJAMAN {{ $lab }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <!-- card  -->
            <div class="card">
                <!-- card header  -->
                {{-- <div class="card-header bg-white  py-4">
                <h4 class="mb-0">Active Projects</h4>
            </div> --}}
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Waktu</th>
                                <th>Jenis</th>
                                <th>Mahasiswa</th>
                                <th>Progres</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="align-middle">
                                        <h3>

                                            {{ $item->barang->nama_barang }}

                                        </h3>
                                    </td>
                                    <td class="align-middle">{{ $item->created_at }}</td>
                                    <td class="align-middle">
                                        @if ($item->barang->jenis == 'Non Habis Pakai')
                                            <button class="btn btn-danger btn-sm">{{ $item->barang->jenis }}</button>
                                        @else
                                            <button class="btn btn-primary btn-sm">{{ $item->barang->jenis }}</button>
                                        @endif

                                    </td>
                                    <td class="align-middle">{{ $item->user->name }}</td>
                                    <td class="align-middle">
                                        <form method="POST" action="{{ route('adm_selesai_pinjaman', ['id' => $item->id]) }}">
                                            @csrf
                                            <button class="btn btn-success btn-sm">sudah dikembalikan</button>

                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- card footer  -->
                <div class="card-footer bg-white text-center">
                    <a href="#" class="link-primary">View All Projects</a>

                </div>
            </div>

        </div>
    </div>
@endsection