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
                            <h3 class="mb-0  text-white">TAMBAH ADMIN LAB</h3>
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
                        <h4 class="mb-0">Tambah Admin</h4>
                    </div>
                    <!-- table  -->
        <form class="container-fluid" action="{{route('simpan_admin')}}" method="POST" enctype="multipart/form-data">
          @csrf
  
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Admin</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Admin">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kata Sandi</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="****">
              </div>
  
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">LAB</label>
              <select name="lab" class="form-select" aria-label="Default select example">
                @foreach ($labs as $lab)
                  <option value="{{ $lab->id }}">{{ $lab->lab }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">jabatan</label>
              <select name="jabatan" id="jabatan" class="form-select" aria-label="Default select example">
                <option value="Admin">Admin</option>
                <option value="KA Lab">KA LAB</option>
              </select>
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