@extends('layouts.theme')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="col-lg-12 col-md-12 col-12 my-2">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Barang Akan Dipinjam</h3>
                    </div>
                </div>
            </div>
        </div>
            {{-- @php
                use Illuminate\Support\Str;
            @endphp --}}
            @foreach ($keranjangku as $item)
                    <div class="card ">
                        <div class="card-body">
                            <div class="col-md-12 col-12">
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
                    
                                    </div>
                                </div>
                    
                            </div>


                            {{-- <div>
                                <h1 class="fw-bold">{{ $item->barang->nama_barang }}</h1>
                                <div class="d-flex">
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
                                </div>
                            </div> --}}
                        </div>
                    </div>

                {{-- </div> --}}
            @endforeach
            @if (!$keranjangku->isEmpty())
            <form method="POST" action="{{ route('pinjamsekarang') }}">
                @csrf
                <button class="btn btn-primary my-2" > Pinjam Sekarang </button>
            </form>
            @endif
            
        </div>
    </div>
@endsection