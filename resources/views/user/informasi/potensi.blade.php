@extends('layout.app')
@section('title', 'Potensi')
@section('content')
  <!-- Start Breadcrumb  -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>Potensi Desa</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="active">Potensi</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Star potensi  -->
  <div class="courses-area default-padding bottom-less">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Potensi Desa {{ env('APP_NAME') }}</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="courses-box">
        <div class="row">
          <!-- Single item -->
          @foreach ($potensi as $data)
            <div class="single-item col-lg-4 col-md-6">
              <div class="item">
                <div class="thumb">
                  <a>
                    <img src="{{ asset($data->gambar) }}" alt="potensi">
                  </a>
                </div>
                <div class="info">
                  <h4 style="font-weight: bold;">
                    {{ $data->judul }}
                  </h4>
                  <p>
                    {{ $data->deskripsi }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
          <!-- End Single item -->
        </div>
      </div>
    </div>
  </div>

  <!-- End potensi -->
@endsection
