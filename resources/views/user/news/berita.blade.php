@extends('layout.app')
@section('title', 'News')
@section('content')
  <!-- Start Breadcrumb  -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>News</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="active">News</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start berita -->
  <div class="blog-area full-blog right-sidebar full-blog default-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Berita</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="blog-items">
        <div class="row">
          <div class="blog-content col-lg-8 col-md-12">
            <div class="blog-item-box">
              <!-- Single Item -->
              @forelse ($news as $data)
                <div class="single-item">
                  <div class="item">
                    <div class="thumb">
                      <a href="{{ route('user.berita.detail', $data->slug) }}"><img src="{{ asset($data->gambar) }}"
                          alt="Gambar Berita" class="w-100"></a>
                    </div>
                    <div class="content">
                      <div class="top-info">
                        <ul>
                          <li>
                            <img src="{{ asset($data->user->gambar) }}" alt="admin">{{ ucfirst($data->user->name) }}
                          </li>
                          <li>
                            <i class="fas fa-calendar-alt"></i> {{ $data->created_at->format('d M Y') }}
                          </li>
                          <li>
                            <i class="fas fa-clock"></i>{{ $data->created_at->diffForHumans() }}
                          </li>
                        </ul>
                      </div>
                      <h3>
                        <a href="{{ route('user.berita.detail', $data->slug) }}">{{ $data->judul }}</a>
                      </h3>
                      <p>
                        {!! Str::limit($data->deskripsi, 100) !!}
                      </p>
                      <a class="btn circle btn-sm btn-theme effect"
                        href="{{ route('user.berita.detail', $data->slug) }}">Lihat Detail</a>
                    </div>
                  </div>
                </div>
              @empty
                <div class="single-item">
                  <div class="item">
                    <div class="content text-center">
                      <h3>
                        <a href="#">Tidak ada berita</a>
                      </h3>
                    </div>
                  </div>
                </div>
              @endforelse

              <!-- End Single Item -->

            </div>

            <!-- Pagination -->
            {{ $news->links('pagination::costum') }}

          </div>
          <!-- Start Sidebar -->
          <div class="sidebar col-lg-4 col-md-12">
            <aside>
              <div class="sidebar-item search">
                <div class="sidebar-info">
                  <form>
                    <input type="text" name="cari" class="form-control" value="{{ request('cari') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                  </form>
                </div>
              </div>
              @include('components.user-sidebar-berita')
            </aside>
          </div>
          <!-- End Start Sidebar -->
        </div>
      </div>
    </div>
  </div>
  <!-- End berita -->
@endsection
