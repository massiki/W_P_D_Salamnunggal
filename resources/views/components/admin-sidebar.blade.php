<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset(App\Models\Image::where('kategori', 'logo')->first()->gambar) }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Salamnunggal</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset(Auth::user()->gambar) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}"
            class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li
          class="nav-item {{ request()->is('admin/visi-misi') || request()->is('admin/visi-misi/*') || request()->is('admin/sambutan') || request()->is('admin/sambutan/*') || request()->is('admin/gambar-struktur') || request()->is('admin/gambar-struktur/*') || request()->is('admin/struktur-pemerintahan') || request()->is('admin/struktur-pemerintahan/*') || request()->is('admin/histori') || request()->is('admin/histori/*') ? 'menu-open' : '' }}">
          <a href="#"
            class="nav-link {{ request()->is('admin/visi-misi') || request()->is('admin/visi-misi/*') || request()->is('admin/sambutan') || request()->is('admin/sambutan/*') || request()->is('admin/gambar-struktur') || request()->is('admin/gambar-struktur/*') || request()->is('admin/struktur-pemerintahan') || request()->is('admin/struktur-pemerintahan/*') || request()->is('admin/histori') || request()->is('admin/histori/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Profil Desa
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.sambutan') }}"
                class="nav-link {{ request()->is('admin/sambutan') || request()->is('admin/sambutan/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sambutan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.visi-misi') }}"
                class="nav-link {{ request()->is('admin/visi-misi') || request()->is('admin/visi-misi/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Visi Misi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.gambar-struktur') }}"
                class="nav-link {{ request()->is('admin/gambar-struktur') || request()->is('admin/gambar-struktur/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Foto Struktur</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.struktur-pemerintahan') }}"
                class="nav-link {{ request()->is('admin/struktur-pemerintahan') || request()->is('admin/struktur-pemerintahan/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Struktur Pemerintahan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.histori') }}"
                class="nav-link {{ request()->is('admin/histori') || request()->is('admin/histori/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Histori</p>
              </a>
            </li>
          </ul>
        </li>
        <li
          class="nav-item {{ request()->is('admin/berita') || request()->is('admin/berita/*') || request()->is('admin/umkm') || request()->is('admin/umkm/*') || request()->is('admin/potensi') || request()->is('admin/potensi/*') ? 'menu-open' : '' }}">
          <a href="#"
            class="nav-link {{ request()->is('admin/berita') || request()->is('admin/berita/*') || request()->is('admin/umkm') || request()->is('admin/umkm/*') || request()->is('admin/potensi') || request()->is('admin/potensi/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              Informasi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.potensi') }}"
                class="nav-link {{ request()->is('admin/potensi') || request()->is('admin/potensi/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Potensi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.umkm') }}"
                class="nav-link {{ request()->is('admin/umkm') || request()->is('admin/umkm/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>UMKM</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.berita') }}"
                class="nav-link {{ request()->is('admin/berita') || request()->is('admin/berita/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Berita</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.galeri') }}"
            class="nav-link {{ request()->is('admin/galeri') || request()->is('admin/galeri/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-camera"></i>
            <p>
              Galeri
            </p>
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.image') }}"
            class="nav-link {{ request()->is('admin/image') || request()->is('admin/image/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Banner dan Logo
            </p>
          </a>
        </li>
        <li
          class="nav-item {{ request()->is('admin/sosmed') || request()->is('admin/sosmed/*') || request()->is('admin/info-kontak') || request()->is('admin/info-kontak/*') ? 'menu-open' : '' }}">
          <a href="#"
            class="nav-link {{ request()->is('admin/sosmed') || request()->is('admin/sosmed/*') || request()->is('admin/info-kontak') || request()->is('admin/info-kontak/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              Footer
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.sosmed') }}"
                class="nav-link {{ request()->is('admin/sosmed') || request()->is('admin/sosmed/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sosmed</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.info-kontak') }}"
                class="nav-link {{ request()->is('admin/info-kontak') || request()->is('admin/info-kontak/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Info Kontak</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.kontak') }}"
            class="nav-link {{ request()->is('admin/kontak') || request()->is('admin/kontak/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-phone"></i>
            <p>
              Kontak Saran
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.penduduk') }}"
            class="nav-link {{ request()->is('admin/penduduk') || request()->is('admin/penduduk/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Jumlah Penduduk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.card') }}"
            class="nav-link {{ request()->is('admin/card') || request()->is('admin/card/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-square"></i>
            <p>
              Cards
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.user') }}"
            class="nav-link {{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
