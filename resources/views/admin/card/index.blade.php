@extends('layout.admin')
@section('title', 'Cards')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-between">
          <div class="">
            <h1>Cards</h1>
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
                <h3 class="card-title">Data Cards</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Icon</th>
                      <th>Nama</th>
                      <th>Link</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cards as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! $data->icon !!}</td>
                        <td>{{ $data->nama }}</td>
                        <td>
                          <a href="{{ $data->link }}" class="btn btn-info my-1" target="_blank">
                            <i class="fas fa-eye"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('admin.card.edit', $data->id) }}" class="btn btn-warning my-1">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
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
