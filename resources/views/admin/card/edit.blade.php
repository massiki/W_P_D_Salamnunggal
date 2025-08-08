@extends('layout.admin')
@section('title', 'Cards')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>Card</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.card') }}" class="btn btn-primary">
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
                <h3 class="card-title">Edit Card</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.card.update', $data->id) }}" method="post">
                  @method('put')
                  @csrf
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
                    <label for="link">Link*</label>
                    <input type="text" name="link" class="form-control" id="link"
                      placeholder="Masukan link . . ." value="{{ old('link', $data->link) }}">
                    @error('link')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Card</button>
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
