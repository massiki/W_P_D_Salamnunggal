<header id="home">

  <!-- Start Navigation -->
  <nav class="navbar navbar-default inc-top-bar attr-border navbar-fixed white no-background bootsnav">

    <div class="container">

      <!-- Start logo -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand">
          <img src="{{ asset(App\Models\Image::where('kategori', 'logo')->first()->gambar) }}" class="logo logo-display"
            alt="Logo">
          <img src="{{ asset(App\Models\Image::where('kategori', 'logo')->first()->gambar) }}"
            class="logo logo-scrolled" alt="Logo">
        </a>
      </div>
      <!-- End logo -->

      <!-- start nav link -->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
          <li>
            <a href="{{ route('user.welcome') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle {{ request()->is('tentang/*') ? 'active' : '' }}" data-toggle="dropdown">About</a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('user.about.history') }}">History</a></li>
              <li><a href="{{ route('user.about.profile') }}">Profile</a></li>
              <li><a href="{{ route('user.about.structure') }}">Struktur Pemerintahan</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle {{ request()->is('berita') || request()->is('berita/*') || request()->is('informasi/produk-umkm') ? 'active' : '' }}"
              data-toggle="dropdown">Informasi</a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('user.informasi.potensi') }}">Potensi Desa</a></li>
              <li><a href="{{ route('user.informasi.umkm') }}">Produk UMKM</a></li>
              <li><a href="{{ route('user.berita') }}" ">Berita</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ route('user.galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}">Gallery</a>
          </li>
          <li>
            <a href="{{ route('user.contact') }}"
              class="{{ request()->is('kontak-kami') || request()->is('kontak-kami/*') ? 'active' : '' }}">Contact</a>
          </li>
        </ul>
      </div>
      <!-- end nav link -->
    </div>

  </nav>
  <!-- End Navigation -->

</header>
