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
            <li class="active">Detail</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start Blog -->
  <div class="blog-area single full-blog right-sidebar full-blog default-padding">
    <div class="container">
      <div class="blog-items">
        <div class="row">
          <div class="blog-content col-lg-8 col-md-12">
            <div class="item">

              <div class="blog-item-box">
                <!-- Start Post Thumb -->
                <div class="thumb">
                  <img src="{{ asset($data->gambar) }}" alt="Thumb" class="w-100">
                </div>
                <!-- Start Post Thumb -->

                <div class="content">
                  <div class="top-info">
                    <ul>
                      <li>
                        <a href="#"><img src="{{ asset($data->user->gambar) }}"
                            alt="Author">{{ ucfirst($data->user->name) }}</a>
                      </li>
                      <li>
                        <i class="fas fa-calendar-alt"></i> {{ $data->created_at->format('d M Y') }}
                      </li>
                    </ul>
                  </div>
                  <h3>{{ $data->judul }}</h3>
                  <p>{!! $data->deskripsi !!}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="sidebar col-lg-4 col-md-12">
            <aside>
              <div class="sidebar-item search">
                <div class="sidebar-info">
                  <form action="{{ route('user.berita') }}">
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
  <!-- End Blog -->
@endsection
