@extends('layout.admin')
@section('title', 'Image')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-between">
          <div class="">
            <h1>Image</h1>
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
                <h3 class="card-title">Galeri Desa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($images as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($data->gambar) }}" alt="gambar" width="200"></td>
                        <td>{{ $data->kategori }}</td>
                        <td>
                          <a href="{{ route('admin.image.edit', $data->id) }}" class="btn btn-warning my-1"><i
                              class="fas fa-pencil-alt"></i></a>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="3" class="text-center">Galeri tidak ditemukan</td>
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
