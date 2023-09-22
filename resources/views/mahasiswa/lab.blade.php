@extends('layouts.theme')
@section('content')
@php
                use Illuminate\Support\Str;
            @endphp
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
@endsection