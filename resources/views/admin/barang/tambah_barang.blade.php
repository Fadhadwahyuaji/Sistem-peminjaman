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
                            <h3 class="mb-0  text-white">TAMBAH DATA BARANG</h3>
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
                        <h4 class="mb-0">Tambah Barang</h4>
                    </div>
                    <!-- table  -->
        <form class="container-fluid" action="{{route('simpan_barang')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">LAB</label>
            <select name="lab" class="form-select" aria-label="Default select example">
              @foreach ($lab as $labs)
                    <option value="{{ $labs->id }}"> {{ $labs->lab }}</option>
                  @endforeach
            </select>
          </div>
  
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Barang">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis</label>
                <select name="jenis" class="form-select" aria-label="Default select example">
                  <option selected>Pilih Tipe</option>
                  <option value="Habis Pakai">Habis Pakai</option>
                  <option value="Non Habis Pakai">Non Habis Pakai</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tersedia</label>
                <input class="form-control @error('tersedia') is-invalid @enderror" type="text" name="tersedia" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Barang Tersedia">
              </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Dipinjam</label>
                <input class="form-control @error('dipinjam') is-invalid @enderror" type="text" name="dipinjam" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Jumlah Barang Dipinjam">
              </div>
  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary">batal</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
          
          
        </form>
                </div>

            </div>
        </div>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection