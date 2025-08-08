@extends('layout.admin')
@section('title', 'Penduduk')
@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 d-flex justify-content-between">
            <div class="">
              <h1>Penduduk</h1>
            </div>
            <div class="">
              <a href="{{ route('admin.penduduk') }}" class="btn btn-primary">
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
                <h3 class="card-title">Edit Penduduk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.penduduk.update', $data->id) }}" method="post"
                  enctype="multipart/form-data">
                  @method('put')
                  @csrf
                  <div class="form-group">
                    <label for="jumlah_penduduk">Jumlah Penduduk*</label>
                    <input type="text" name="jumlah_penduduk" class="form-control" id="jumlah_penduduk"
                      inputmode="numeric" oninput="inputJumlahPenduduk()" placeholder="Masukan jumlah penduduk . . ."
                      value="{{ old('jumlah_penduduk', $data->jumlah_penduduk) }}">
                    @error('jumlah_penduduk')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jumlah_rt">Jumlah RT*</label>
                    <input type="text" name="jumlah_rt" class="form-control" id="jumlah_rt" inputmode="numeric"
                      oninput="inputJumlahRt()" placeholder="Masukan jumlah rt . . ."
                      value="{{ old('jumlah_rt', $data->jumlah_rt) }}">
                    @error('jumlah_rt')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jumlah_rw">Jumlah RW*</label>
                    <input type="text" name="jumlah_rw" class="form-control" id="jumlah_rw" inputmode="numeric"
                      oninput="inputJumlahRw()" placeholder="Masukan jumlah rt . . ."
                      value="{{ old('jumlah_rw', $data->jumlah_rw) }}">
                    @error('jumlah_rw')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jumlah_dusun">Jumlah Dusun*</label>
                    <input type="text" name="jumlah_dusun" class="form-control" id="jumlah_dusun" inputmode="numeric"
                      oninput="inputJumlahDusun()" placeholder="Masukan jumlah rt . . ."
                      value="{{ old('jumlah_dusun', $data->jumlah_dusun) }}">
                    @error('jumlah_dusun')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Penduduk</button>
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
    function inputJumlahPenduduk() {
      document.getElementById('jumlah_penduduk').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
        if (this.value.length > 13) {
          this.value = this.value.slice(0, 13)
        }
      })
    }

    function inputJumlahRt() {
      document.getElementById('jumlah_rt').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
        if (this.value.length > 13) {
          this.value = this.value.slice(0, 13)
        }
      })
    }

    function inputJumlahRw() {
      document.getElementById('jumlah_rw').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
        if (this.value.length > 13) {
          this.value = this.value.slice(0, 13)
        }
      })
    }

    function inputJumlahDusun() {
      document.getElementById('jumlah_dusun').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
        if (this.value.length > 13) {
          this.value = this.value.slice(0, 13)
        }
      })
    }
  </script>
@endsection
