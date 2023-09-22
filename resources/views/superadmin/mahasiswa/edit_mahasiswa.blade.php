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
                            <h3 class="mb-0  text-white">UPDATE DATA MAHASISWA</h3>
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
                        <h4 class="mb-0">Tambah Mahasiswa</h4>
                    </div>
                    <!-- table  -->
        <form class="container-fluid" action="{{route('simpan_edit',[ 'id' => $mahasiswa->id ])}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">NIM Mahasiswa</label>
              <input value="{{ $mahasiswa->mahasiswa->nim }}" class="form-control @error('nim') is-invalid @enderror" type="text" name="nim" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan NIM">
            </div>
  
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Mahasiswa</label>
                <input value="{{ $mahasiswa->name }}" class="form-control @error('name') is-invalid @enderror" type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Mahasiswa">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input  value="{{ $mahasiswa->email }}" class="form-control @error('email') is-invalid @enderror" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kata Sandi</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="******">
              </div>
  
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
              <select name="jurusan" class="form-select" aria-label="Default select example">
                <option selected>{{ $mahasiswa->mahasiswa->jurusan }}</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Pendingin dan Tata Udara">Teknik Pendingin dan Tata Udara</option>
                <option value="Keperawatan">Keperawatan</option>
              </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <input  value="{{ $mahasiswa->mahasiswa->kelas }}"  class="form-control @error('kelas') is-invalid @enderror" type="text" name="kelas" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Kelas Mahasiswa">
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