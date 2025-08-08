@extends('layout.admin')
@section('title', 'Potensi')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>Potensi</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.potensi') }}" class="btn btn-primary">
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
                <h3 class="card-title">Edit Potensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.potensi.update', $data->id) }}" method="post"
                  enctype="multipart/form-data">
                  @method('put')
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
                    <img id="preview_gambar" src="{{ asset($data->gambar) }}" alt="Preview"
                      style="max-width:200px; margin-top:10px;">
                    @error('gambar')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="judul">Judul Potensi*</label>
                    <input type="text" name="judul" class="form-control" id="judul"
                      placeholder="Masukan nama pemilik . . ." value="{{ old('judul', $data->judul) }}">
                    @error('judul')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Potensi*</label>
                    <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                      placeholder="Masukan deskripsi . . ." value="{{ old('deskripsi', $data->deskripsi) }}">
                    @error('deskripsi')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Potensi</button>
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
  <script>
    // cek ketika input yang diperbolehkan hanya nomor dengan 13 digit 
    function inputNomorHandphone() {
      document.getElementById('no_whatsapp').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
        if (this.value.length > 13) {
          this.value = this.value.slice(0, 13)
        }
      })
    }

    // cek ketika input yang diperbolehkan hanya nomor
    function inputHarga() {
      document.getElementById('harga').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
      })
    }
  </script>

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
