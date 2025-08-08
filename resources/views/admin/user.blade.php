@extends('layout.admin')
@section('title', 'User')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>User</h1>
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
                <h3 class="card-title">Pengaturan User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
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
                    <img id="preview_gambar" src="{{ asset($user->gambar) }}" alt="Preview"
                      style="max-width:200px; margin-top:10px;">
                    @error('gambar')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama*</label>
                    <input type="text" name="name" class="form-control" id="name"
                      placeholder="Masukan name . . ." value="{{ old('name', $user->name) }}">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukan email . . ."
                      value="{{ old('email', $user->email) }}" disabled>
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah User</button>
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
