@extends('layout.app')
@section('title', 'Gallery')
@section('content')
  <!-- Start Breadcrumb
                                              ============================================= -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>Gallery</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="active">Gallery</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Star Gallery -->
  <div class="gallery-area default-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Gallery</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="magnific-mix-gallery masonary">
        <div id="portfolio-grid" class="gallery-items colums-3">
          @forelse ($galeries as $data)
            <!-- Single Item -->
            <div class="pf-item">
              <div class="item-inner">
                <img src="{{ asset($data->gambar) }}" alt="gambar" class="w-100">
                <div class="effect-info">
                  <a href="{{ asset($data->gambar) }}" class="item popup-link">
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- End Single Item -->
          @empty
            <div class="text-center">
              <p>Tidak ada galeri.</p>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  <!-- End Gallery -->
@endsection
