@extends('layout.admin')
@section('title', 'Struktur Pemerintah')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-between">
          <div class="">
            <h1>Struktur Pemerintah</h1>
          </div>
          <div class="">
            <a href="{{ route('admin.struktur-pemerintahan.create') }}" class="btn btn-primary">
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
                <h3 class="card-title">Data Struktur Pemerintah</h3>
                <div class="card-tools">
                  <form action="{{ route('admin.struktur-pemerintahan') }}">
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
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Sosial Media</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($structures as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($data->gambar) }}" alt="gambar" width="200"></td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>
                          <p>Facebook:
                            @if ($data->facebook)
                              <a href="{{ $data->facebook }}" class="btn btn-info my-1" target="_blank">
                                <i class="fab fa-facebook"></i>
                              </a>
                            @endif
                          </p>
                          <p>Whatsapp:
                            @if ($data->whatsapp)
                              <a href="https://wa.me/62{{ $data->whatsapp }}" class="btn btn-info my-1" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                              </a>
                            @endif
                          </p>
                          <p>Tiktok:
                            @if ($data->tiktok)
                              <a href="{{ $data->tiktok }}" class="btn btn-info my-1" target="_blank">
                                <i class="fab fa-tiktok"></i>
                              </a>
                            @endif
                          </p>
                        </td>
                        <td>
                          <a href="{{ route('admin.struktur-pemerintahan.edit', $data->id) }}"
                            class="btn btn-warning my-1"><i class="fas fa-pencil-alt"></i></a>
                          <form action="{{ route('admin.struktur-pemerintahan.destroy', $data->id) }}" method="post"
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
                        <td colspan="5" class="text-center">Struktur Pemerintahan tidak ditemukan</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{-- {{ $structures->links('pagination::bootstrap-5') }} --}}
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
