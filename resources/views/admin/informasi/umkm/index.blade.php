@extends('layout.admin')
@section('title', 'UMKM')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-between">
          <div class="">
            <h1>UMKM</h1>
          </div>
          <div class="">
            <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">
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
                <h3 class="card-title">Data UMKM</h3>
                <div class="card-tools">
                  <form action="">
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
                      <th>Gambar</th>
                      <th>Nama Pemilik</th>
                      <th>Jenis UMKM</th>
                      <th>Alamat</th>
                      <th>Link Sosial Media</th>
                      <th>No Whatsapp</th>
                      <th>Harga</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($umkm as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($data->gambar) }}" alt="gambar" width="200"></td>
                        <td>{{ $data->nama_pemilik }}</td>
                        <td>{{ $data->jenis_umkm }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                          <div>
                            Instagram:
                            @if ($data->instagram)
                              <a href="{{ $data->instagram }}" class="btn btn-info my-1" target="_blank">
                                <i class="fab fa-instagram"></i>
                              </a>
                            @endif
                          </div>
                          <div>
                            Shopee:
                            @if ($data->shopee)
                              <a href="{{ $data->shopee }}" class="btn btn-info my-1" target="_blank">
                                <i class="fas fa-shopping-cart"></i>
                              </a>
                            @endif
                          </div>
                          <div>
                            TikTok:
                            @if ($data->tiktok)
                              <a href="{{ $data->tiktok }}" class="btn btn-info my-1" target="_blank">
                                <i class="fab fa-tiktok"></i>
                              </a>
                            @endif
                          </div>
                        </td>
                        <div>
                          <td>
                            Whatsapp:
                            @if ($data->no_whatsapp)
                              <a href="https://wa.me/62{{ $data->no_whatsapp }}" class="btn btn-info my-1"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i>
                              </a>
                            @endif
                          </td>
                        </div>
                        </td>
                        <td>Rp. {{ $data->harga == 0 ? '-' : $data->harga }}</td>
                        <td>
                          <a href="{{ route('admin.umkm.edit', $data->id) }}" class="btn btn-warning my-1"><i
                              class="fas fa-pencil-alt"></i></a>
                          <form action="{{ route('admin.umkm.destroy', $data->id) }}" method="post"
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
                        <td colspan="7" class="text-center">UMKM tidak ditemukan</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $umkm->links('pagination::bootstrap-5') }}
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
