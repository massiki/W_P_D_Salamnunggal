@extends('layout.app')
@section('title', 'Profile Desa')
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
            <li class="active">Profile</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start foto, visi dan misi -->
  <div class="advisor-details-area default-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Profile Desa {{ env('APP_NAME') }}</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 basic-info">
          <img src="{{ asset($visiMisi->gambar) }}" alt="Foto Desa" class="w-100">
        </div>
        <div class="col-lg-7 info">
          <h2>Profile</h2>
          <span>Desa Salamnunggal</span>
          <h3 class="mt-3 font-weight-bold">Visi</h3>
          <p>{!! $visiMisi->visi !!}</p>
          <h3 class="mt-3 font-weight-bold">Misi</h3>
          <p>{!! $visiMisi->misi !!}</p>
        </div>
      </div>
    </div>
  </div>
  <!-- End foto, visi and misi -->

  <!-- Star Struktur  -->
  <div class="why-choseus-area bg-gray default-padding bottom-less">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>Desa Salamnunggal</h5>
            <h2>Struktur Pemerintah</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- End Fixed BG -->
    <div class="container">
      <img src="{{ asset($struktur->gambar) }}" alt="struktur pemerintah" class="w-100">
    </div>
  </div>
  <!-- End Struktur -->

@endsection
