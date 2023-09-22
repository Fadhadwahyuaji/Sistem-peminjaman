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
                            <h3 class="mb-0  text-white">UPDATE BARANG</h3>
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
                        <h4 class="mb-0">Edit Data Barang</h4>
                    </div>
                    <!-- table  -->
        <form class="container-fluid" action="{{route('simpan_edit_barang',[ 'id' => $barang->id ])}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">LAB</label>
            <select name="lab_id" class="form-select" aria-label="Default select example">
              @foreach ($lab as $labs)
                    <option value="{{ $labs->id }}" {{ $labs->id == $barang->lab_id ? 'selected' : '' }}> {{ $labs->lab }}</option>
                  @endforeach
            </select>
          </div>
  
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input  value="{{ $barang->nama_barang }}" class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Barang">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis</label>
                <select name="jenis" class="form-select" aria-label="Default select example">
                  <option selected>Pilih Tipe</option>
                  <option value="Habis Pakai" {{ "Habis Pakai" == $barang->jenis ? 'selected' : '' }}>Habis Pakai</option>
                  <option value="Non Habis Pakai" {{ "Non Habis Pakai" == $barang->jenis ? 'selected' : '' }}>Non Habis Pakai</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tersedia</label>
                <input value="{{ $barang->tersedia }}"  class="form-control @error('tersedia') is-invalid @enderror" type="text" name="tersedia" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Barang Tersedia">
              </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Dipinjam</label>
                <input value="{{ $barang->dipinjam }}"  class="form-control @error('dipinjam') is-invalid @enderror" type="text" name="dipinjam" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Jumlah Barang Dipinjam">
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