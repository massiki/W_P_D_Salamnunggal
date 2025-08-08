@extends('layout.app')
@section('title', 'Produk UMKM')
@section('content')
  <!-- Start Breadcrumb  -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>Produk UMKM</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="active">Produk UMKM</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Star UMKM  -->
  <div class="course-area default-padding bottom-less">

    <!-- Fixed Shape -->
    <div class="fixed-shape">
      <img src="{{ asset('assets/front/img/shape/7.png') }}" alt="Shape">
    </div>
    <!-- End Fixed Shape -->

    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Produk UMKM</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="courses-box">
        <div class="row">
          <!-- Single item -->
          @foreach ($umkm as $data)
            <div class="single-item col-lg-4 col-md-6">
              <div class="item">
                <div class="thumb">
                  <img src="{{ asset($data->gambar) }}" alt="produk umkm" class="w-100">
                  <div class="price">
                    <h5>Rp. {{ $data->harga == 0 ? '-' : $data->harga }}</h5>
                  </div>
                </div>
                <div class="info">
                  {{-- <div class="top-info">
                    <div class="top-meta">
                      <ul>
                        <li><i class="fas fa-clock"></i> 45 Hours</li>
                        <li><i class="fas fa-list-ul"></i> 345</li>
                      </ul>
                    </div>
                  </div> --}}
                  <h4>
                    <a>{{ $data->jenis_umkm }}</a>
                  </h4>
                  <div class="meta">
                    <div class="author">
                      <span>Alamat: {{ $data->alamat }}</strong></span>
                    </div>
                  </div>
                  <div class="bottom-info">
                    <div class="course-info">
                      <span>Penjual: <strong>{{ $data->nama_pemilik }}</strong></span>
                    </div>
                    <div class="rating">
                      @if ($data->no_whatsapp != null)
                        <a href="https://wa.me/62{{ $data->no_whatsapp }}" target="_blank">
                          <span class="mr-2"><i class="fab fa-whatsapp fa-2x text-success"></i></span>
                        </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          <!-- End Single item -->
        </div>
        {{ $umkm->links('pagination::costum') }}
      </div>
    </div>
  </div>
  <!-- End UMKM -->
@endsection
