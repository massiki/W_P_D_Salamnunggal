@extends('layout.admin')
@section('title', 'Histori')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>Histori</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.histori') }}" class="btn btn-primary">
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
                <h3 class="card-title">Buat Histori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.histori.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="gambar">Gambar*</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" id="gambar"
                          accept=".jpg, .jpeg, .png" onchange="previewImage(this, 'preview_gambar')">
                        <label class="custom-file-label" for="gambar">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <img id="preview_gambar" src="#" alt="Preview"
                      style="display:none; max-width:200px; margin-top:10px;">
                    @error('gambar')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama*</label>
                    <input type="text" name="nama" class="form-control" id="nama"
                      placeholder="Masukan nama . . ." value="{{ old('nama') }}">
                    @error('nama')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="periode_awal">Periode Awal*</label>
                    <select class="custom-select rounded-0" id="periode_awal" name="periode_awal">
                      <option></option>
                      @for ($year = 2000; $year <= date('Y'); $year++)
                        @if ($year == date('Y'))
                          <option value="sekarang" @selected(old('periode_awal') == 'sekarang')>Sekarang</option>
                        @else
                          <option value="{{ $year }}" @selected(old('periode_awal') == $year)>{{ $year }}</option>
                        @endif
                      @endfor
                    </select>
                    @error('periode_awal')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="periode_akhir">Periode Akhir*</label>
                    <select class="custom-select rounded-0" id="periode_akhir" name="periode_akhir">
                      <option></option>
                      @for ($year = 2000; $year <= date('Y'); $year++)
                        @if ($year == date('Y'))
                          <option value="sekarang" @selected(old('periode_akhir') == 'sekarang')>Sekarang</option>
                        @else
                          <option value="{{ $year }}" @selected(old('periode_akhir') == $year)>{{ $year }}</option>
                        @endif
                      @endfor
                    </select>
                    @error('periode_akhir')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buat Histori</button>
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
@section('script')
  <!-- form input type file -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    // image preview
    function previewImage(input, previewId) {
      const file = input.files[0];
      const preview = document.getElementById(previewId);

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = '#';
        preview.style.display = 'none';
      }
    }
  </script>
@endsection
