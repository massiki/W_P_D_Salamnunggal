@extends('layout.admin')
@section('title', 'Sosial Media')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>Sosial Media</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.sosmed') }}" class="btn btn-primary">
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
                <h3 class="card-title">Edit Sosial Media</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.sosmed.update', $data->id) }}" method="post">
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
                    <label for="nama">Nama Sosial Media*</label>
                    <input type="text" name="nama" class="form-control" id="nama"
                      placeholder="Masukan nama . . ." value="{{ old('nama', $data->nama) }}">
                    @error('nama')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="type">Type*</label>
                    <select class="custom-select rounded-0" id="type" name="type">
                      <option></option>
                      <option value="url" @selected(old('type') == 'url') @selected($data->type == 'url')>URL</option>
                      <option value="phone" @selected(old('type') == 'phone') @selected($data->type == 'phone')>Phone</option>
                    </select>
                    @error('type')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="value">Value (masukan link jika typenya URL, masuk telepon jika typenya phone)</label>
                    <input type="text" name="value" class="form-control" id="value"
                      placeholder="Masukan value . . ." value="{{ old('value', $data->value) }}">
                    @error('value')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Sosmed</button>
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
