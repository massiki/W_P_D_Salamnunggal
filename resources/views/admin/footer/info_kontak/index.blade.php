@extends('layout.admin')
@section('title', 'Info Kontak')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-between">
          <div class="">
            <h1>Info Kontak</h1>
          </div>
          <div class="">
            <a href="{{ route('admin.info-kontak.create') }}" class="btn btn-primary">
              <i class="fas fa-plus"></i>
            </a>
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
                <h3 class="card-title">Data Info Kontak</h3>
                <div class="card-tools">
                  <form>
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" name="cari" class="form-control float-right" placeholder="Search"
                        value="{{ request('cari') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Icon</th>
                      <th>Nama</th>
                      <th>Informasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($infoKontak as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! $data->icon !!}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->informasi }}</td>
                        <td>
                          <a href="{{ route('admin.info-kontak.edit', $data->id) }}" class="btn btn-warning my-1"><i
                              class="fas fa-pencil-alt"></i></a>
                          <form action="{{ route('admin.info-kontak.destroy', $data->id) }}" method="post"
                            id="delete-form-{{ $data->id }}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" onclick="alertConfirm({{ $data->id }})">
                              <i class="nav-icon fas fa-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="5" class="text-center">Info kontak tidak ditemukan</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $infoKontak->links('pagination::bootstrap-5') }}
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
