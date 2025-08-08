@extends('layout.admin')
@section('title', 'Penduduk')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-between">
          <div class="">
            <h1>Penduduk</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penduduk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jumlah Penduduk</th>
                      <th>Jumlah RT</th>
                      <th>Jumlah RW</th>
                      <th>Jumlah Dusun</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($penduduk as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->jumlah_penduduk }}</td>
                        <td>{{ $data->jumlah_rt }}</td>
                        <td>{{ $data->jumlah_rw }}</td>
                        <td>{{ $data->jumlah_dusun }}</td>
                        <td>
                          <a href="{{ route('admin.penduduk.edit', $data->id) }}" class="btn btn-warning my-1"><i
                              class="fas fa-pencil-alt"></i></a>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="6" class="text-center">Tidak ada data penduduk.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
  <script>
    const alertConfirm = (productId) => {
      Swal.fire({
        // title: "Apakah yakin ingin menghapus data ini?",
        text: "Apakah yakin ingin menghapus data ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal"
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + productId).submit();
        }
      });
    }
  </script>
@endsection
