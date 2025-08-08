@extends('layout.app')
@section('title', 'Struktur Pemerintahan')
@section('content')
  <!-- Start Breadcrumb   -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>About Desa Salamnunggal</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="">About</li>
            <li class="active">Struktur Pemerintahan</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start struktur pemerintahan -->
  <div class="advisor-area default-padding bottom-less">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Struktur Pemerintahan Desa {{ env('APP_NAME') }}</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="advisor-items text-center">
        <div class="row">
          <!-- Single Item -->
          @foreach ($structures as $data)
            <div class="single-item col-lg-3 col-md-6">
              <div class="item">
                <div class="thumb">
                  <img src="{{ asset($data->gambar) }}" alt="Thumb">
                  <ul>
                    @if ($data->facebook)
                      <li class="facebook">
                        <a href="{{ $data->facebook }}" target="_black">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                    @endif
                    @if ($data->whatsapp)
                      <li class="whatsapp">
                        <a href="https://wa.me/62{{ substr($data->whatsapp, 1) }}" target="_black">
                          <i class="fab fa-whatsapp"></i>
                        </a>
                      </li>
                    @endif
                    @if ($data->tiktok)
                      <li class="tiktok">
                        <a href="{{ $data->tiktok }}" target="_black">
                          <i class="fab fa-tiktok"></i>
                        </a>
                      </li>
                    @endif
                  </ul>
                </div>
                <div class="info">
                  <h4><a>{{ $data->nama }}</a></h4>
                  <span>{{ $data->jabatan }}</span>
                </div>
              </div>
            </div>
          @endforeach
          <!-- End Single Item -->
        </div>
      </div>
    </div>
  </div>
  <!-- End struktur pemerintahan -->

@endsection
