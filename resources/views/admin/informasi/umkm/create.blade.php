@extends('layout.admin')
@section('title', 'UMKM')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>UMKM</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.umkm') }}" class="btn btn-primary">
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
                <h3 class="card-title">Buat UMKM</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.umkm.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="nama_pemilik">Nama Pemilik*</label>
                    <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik"
                      placeholder="Masukan nama pemilik . . ." value="{{ old('nama_pemilik') }}">
                    @error('nama_pemilik')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jenis_umkm">Jenis UMKM*</label>
                    <input type="text" name="jenis_umkm" class="form-control" id="jenis_umkm"
                      placeholder="Masukan jenis UMKM . . ." value="{{ old('jenis_umkm') }}">
                    @error('jenis_umkm')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="no_whatsapp">No Whatsapp</label>
                    <input type="text" name="no_whatsapp" class="form-control" id="no_whatsapp" inputmode="numeric"
                      oninput="inputNomorHandphone()" placeholder="Masukan no whatsapp . . ."
                      value="{{ old('no_whatsapp') }}">
                    @error('no_whatsapp')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga" inputmode="numeric"
                      oninput="inputHarga()" placeholder="Masukan harga . . ." value="{{ old('harga') }}">
                    @error('harga')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="instagram">Link Instagram</label>
                    <input type="text" name="instagram" class="form-control" id="instagram"
                      placeholder="Masukan link instagarm . . ." value="{{ old('instagram') }}">
                    @error('instagram')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="shopee">Link Shopee</label>
                    <input type="text" name="shopee" class="form-control" id="shopee"
                      placeholder="Masukan link shopee . . ." value="{{ old('shopee') }}">
                    @error('shopee')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tiktok">Link Tiktok</label>
                    <input type="text" name="tiktok" class="form-control" id="tiktok"
                      placeholder="Masukan link tiktok . . ." value="{{ old('tiktok') }}">
                    @error('tiktok')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat*</label>
                    <input type="text" name="alamat" class="form-control" id="alamat"
                      placeholder="Masukan alamat . . ." value="{{ old('alamat') }}">
                    @error('alamat')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buat UMKM</button>
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
