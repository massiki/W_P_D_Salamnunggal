@extends('layout.app')
@section('title', 'Welcome')
@section('content')
  <!-- Start Banner -->
  <div class="banner-area bg-gray text-center multi-heading">
    <div id="bootcarousel" class="carousel text-light slide carousel-fade animate_text" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner carousel-zoom">
        @foreach (App\Models\Image::where('kategori', 'banner')->latest()->get() as $data)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div class="slider-thumb bg-cover" style="background-image: url({{ asset($data->gambar) }});"></div>
            <div class="box-table shadow dark">
              <div class="box-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                      <div class="content">
                        <h3 data-animation="animated slideInDown">DESA {{ env('APP_NAME') }}</h3>
                        <h2 data-animation="animated fadeInRight">{{ env('APP_SLOGAN') }}</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        {{-- <div class="carousel-item active">
          <div class="slider-thumb bg-cover"
            style="background-image: url({{ asset('assets/upload/gambar/1750044004-struktur organisasi desa salamnunggal.jpeg') }});">
          </div>
          <div class="box-table shadow dark">
            <div class="box-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-10 offset-lg-1">
                    <div class="content">
                      <h3 data-animation="animated slideInDown">DESA SALAMNUNGGAL</h3>
                      <h2 data-animation="animated fadeInRight">Sauyunan, Agamis, Dan Unggul</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      <!-- End Wrapper for slides -->

      <!-- Left and right controls -->
      <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
        <i class="ti-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
        <i class="ti-angle-right"></i>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
  <!-- End Banner -->

  <!-- Star layanan  -->
  <div class="default-features-area default-design relative bottom-less text-center">
    <div class="container">
      <div class="item-box">
        <div class="row">
          @foreach ($cards as $data)
            <div class="col-lg-3 col-md-6 single-item">
              <div class="item">
                <a href="{{ $data->link }}">
                  {!! $data->icon !!}
                  <h4>{{ $data->nama }}</h4>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End layanan -->

  <!-- Star Sambutan Kepala Desa -->
  <div class="scholarship-area default-padding">
    <div class="container">
      <div class="item-box">
        <div class="row align-center">
          <div class="col-lg-6 thumb">
            <div class="thumb-box">
              <img src="{{ asset($sambutan->foto) }}" alt="Thumb" class="w-100">
            </div>
          </div>
          <div class="col-lg-6 info">
            <h2>Sambutan Kepala Desa</h2>
            <p>
              {!! $sambutan->sambutan !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Sambutan Kepala Desa -->

  <!-- Star kepengurusan  -->
  <div class="advisor-area carousel-shadow default-padding bg-gray">
    <div class="container">
      <div class="heading-left">
        <div class="row align-items-end">
          <div class="col-lg-7">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Struktur Pemerintahan</h2>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <a class="btn btn-sm btn-dark border" href="{{ route('user.about.structure') }}">Lihat</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="advisor-items text-center">
        <div class="advisor-carousel owl-carousel owl-theme">
          <!-- Single Item -->
          @foreach ($structures as $data)
            <div class="item">
              <div class="thumb">
                <img src="{{ asset($data->gambar) }}" alt="gambar">
                <ul>
                  <li class="facebook">
                    @if ($data->facebook)
                      <a href="{{ $data->facebook }}" target="_black">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    @endif
                  </li>
                  <li class="whatsapp">
                    @if ($data->whatsapp)
                      <a href="https://wa.me/62{{ substr($data->whatsapp, 1) }}" target="_black">
                        <i class="fab fa-whatsapp"></i>
                      </a>
                    @endif
                  </li>
                  <li class="tiktok">
                    @if ($data->tiktok)
                      <a href="{{ $data->tiktok }}" target="_black">
                        <i class="fab fa-tiktok"></i>
                      </a>
                    @endif
                  </li>
                </ul>
              </div>
              <div class="info">
                <h5><a href="#">{{ $data->nama }}</a></h5>
                <span>{{ $data->jabatan }}</span>
              </div>
            </div>
          @endforeach
          <!-- End Single Item -->
        </div>
      </div>
    </div>
  </div>
  <!-- End kepengurusan -->

  <!-- Star UMKM  -->
  <div class="course-area default-padding bottom-less">
    <!-- Fixed Shape -->
    <div class="fixed-shape">
      <img src="{{ asset('assets/front/img/shape/7.png') }}" alt="Shape">
    </div>
    <!-- End Fixed Shape -->

    <div class="container">
      <div class="heading-left">
        <div class="row align-items-end">
          <div class="col-lg-7">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Produk UMKM</h2>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <a class="btn btn-sm btn-dark border" href="{{ route('user.informasi.umkm') }}">Lihat</a>
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
                      @if ($data->no_whatsapp)
                        <a href="https://wa.me/62{{ $data->no_whatsapp }}" target="_blank">
                          <span class="mr-2"><i class="fab fa-whatsapp fa-2x text-success"></i></span>
                        </a>
                      @endif
                      @if ($data->instagram)
                        <a href="{{ $data->instagram }}" target="_blank">
                          <span class="mr-2"><i class="fab fa-instagram fa-2x text-danger"></i></span>
                        </a>
                      @endif
                      @if ($data->shopee)
                        <a href="{{ $data->shopee }}" target="_blank">
                          <span class="mr-2"><i class="fab fa-shopify fa-2x text-primary"></i></span>
                        </a>
                      @endif
                      @if ($data->tiktok)
                        <a href="{{ $data->tiktok }}" target="_blank">
                          <span class="mr-2"><i class="fab fa-tiktok fa-2x text-secondary"></i></span>
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
      </div>
    </div>
  </div>
  <!-- End UMKM  -->

  <!-- Star Potensi -->
  <div class="categories-area default-padding bottom-less bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Potensi Desa</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="category-box text-light">
        <div class="row">
          <!-- Single Item -->
          @foreach ($potensi as $data)
            <div class="single-item col-lg-4 col-md-6">
              <div class="item" style="background-image: url({{ asset($data->gambar) }});">
                <a>
                  <span>{{ env('APP_NAME') }}</span>
                  <div class="title">
                    <i class="flaticon-science"></i>
                    <h4>{{ $data->judul }}</h4>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
          <!-- End Single Item -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Potensi -->

  <!-- Start penduduk  -->
  <div class="fun-factor-area overflow-hidden bg-gradient text-light default-padding">
    <div class="container">
      <div class="fun-fact-items text-center">
        <!-- Fixed BG -->
        <div class="fixed-bg contain" style="background-image: url({{ asset('assets/front/img/map.svg') }});"></div>
        <!-- Fixed BG -->
        <div class="row">
          <div class="col-lg-3 col-md-6 item">
            <div class="fun-fact">
              <div class="counter">
                <div class="timer" data-to="{{ $penduduk->jumlah_penduduk }}" data-speed="5000">0</div>
                <div class="operator"></div>
              </div>
              <span class="medium">Jumlah Penduduk</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 item">
            <div class="fun-fact">
              <div class="counter">
                <div class="timer" data-to="{{ $penduduk->jumlah_rt }}" data-speed="5000">0</div>
                <div class="operator"></div>
              </div>
              <span class="medium">Jumlah RT</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 item">
            <div class="fun-fact">
              <div class="counter">
                <div class="timer" data-to="{{ $penduduk->jumlah_rw }}" data-speed="5000">0</div>
                <div class="operator"></div>
              </div>
              <span class="medium">Jumlah RW</span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 item">
            <div class="fun-fact">
              <div class="counter">
                <div class="timer" data-to="{{ $penduduk->jumlah_dusun }}" data-speed="5000">0</div>
                <div class="operator"></div>
              </div>
              <span class="medium">Jumlah Dusun</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End penduduk -->

  <!-- Star News atau berita  -->
  <div class="blog-area default-padding bottom-less">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Berita Terbaru</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="blog-items">
        <div class="row">
          <!-- Single Item -->
          @foreach ($news as $data)
            <div class="col-lg-4 col-md-6 single-item">
              <div class="item">
                <div class="thumb">
                  <a href="{{ route('user.berita.detail', $data->slug) }}"><img src="{{ asset($data->gambar) }}"
                      alt="gambar berita" class="w-100"></a>
                  <div class="date">
                    <strong>{{ $data->created_at->format('d') }} </strong> {{ $data->created_at->format('M Y') }}
                  </div>
                </div>
                <div class="content">
                  <h4><a href="{{ route('user.berita.detail', $data->slug) }}">{{ $data->judul }}</a></h4>
                  {!! Str::limit($data->deskripsi, 100) !!}
                </div>
                <div class="bottom-info">
                  <span><i class="fas fa-user"></i> {{ $data->user->name }}</span>
                  <a class="btn-more" href="{{ route('user.berita.detail', $data->slug) }}">Read More <i
                      class="arrow_right"></i></a>
                </div>
              </div>
            </div>
          @endforeach
          <!-- End Single Item -->
        </div>
      </div>
    </div>
  </div>
  <!-- End News atau berita -->
@endsection
