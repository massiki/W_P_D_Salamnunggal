@extends('layout.app')
@section('title', 'History')
@section('content')
  <!-- Start Breadcrumb   -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>About History</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="">About</li>
            <li class="active">History</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start History -->
  <div class="event-area default-padding bottom-less">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Histori Kepala Desa Salamnunggal</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="event-box">
        <div class="row">
          <!-- Single Event -->
          @foreach ($histories as $data)
            <div class="single-item col-lg-6">
              <div class="item">
                <div class="thumb">
                  <img src="{{ asset($data->gambar) }}" alt="gambar" class="w-100">
                </div>
                <div class="info">
                  <div class="content">
                    <h4 style="font-weight: bold">{{ $data->nama }}</h4>
                    <div class="bottom-info">
                      <div class="location">
                        <h4 style="font-weight: bold">{{ $data->periode_awal }} - {{ $data->periode_akhir }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          <!-- End Single Event -->
        </div>
      </div>
    </div>
  </div>
  <!-- End History -->

@endsection
