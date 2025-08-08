@extends('layout.admin')
@section('title', 'Info Kontak')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>Info Kontak</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.info-kontak') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Info Kontak</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.info-kontak.update', $data->id) }}" method="post">
                  @csrf
                  @method('put')
                  <div class="form-group">
                    <label for="icon">Icon* <a href="https://fontawesome.com/v5/search" target="_black">lihat
                        disini</a></label>
                    <input type="text" name="icon" class="form-control" id="icon"
                      placeholder="Masukan icon . . ." value="{{ old('icon', $data->icon) }}">
                    @error('icon')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama*</label>
                    <input type="text" name="nama" class="form-control" id="nama"
                      placeholder="Masukan nama . . ." value="{{ old('nama', $data->nama) }}">
                    @error('nama')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="informasi">Informasi*</label>
                    <input type="text" name="informasi" class="form-control" id="informasi"
                      placeholder="Masukan informasi . . ." value="{{ old('informasi', $data->informasi) }}">
                    @error('informasi')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Info Kontak</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
@endsection
