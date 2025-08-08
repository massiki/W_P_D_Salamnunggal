<footer class="bg-dark text-light">
  <div class="container">
    <div class="f-items default-padding">
      <div class="row">
        <div class="col-lg-4 col-md-6 item">
          <div class="f-item about">
            <img src="{{ asset(App\Models\Image::where('kategori', 'logo')->first()->gambar) }}" alt="Logo"
              width="100">
            <p>{{ env('APP_SLOGAN') }}</p>
            <div class="d-flex">
              @foreach (App\Models\Sosmed::latest()->get() as $data)
                @if ($data->type == 'url')
                  <a href="{{ $data->value ?? '#' }}" class="social-icon" target="_black">{!! $data->icon !!}</a>
                @elseif($data->type == 'phone')
                  <a href="https://wa.me/62{{ substr($data->value, 1) ?? '#' }}" class="social-icon"
                    target="_black">{!! $data->icon !!}</a>
                @endif
              @endforeach
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 item">
          <div class="f-item link">
            <h4 class="widget-title">Quick Links</h4>
            <ul>
              <li>
                <a href="{{ route('user.welcome') }}">Home</a>
              </li>
              <li>
                <a href="{{ route('user.about.history') }}">History</a>
              </li>
              <li>
                <a href="{{ route('user.about.profile') }}">Profile</a>
              </li>
              <li>
                <a href="{{ route('user.about.structure') }}">Struktur</a>
              </li>
              <li>
                <a href="{{ route('user.galeri') }}">Gallery</a>
              </li>
              <li>
                <a href="{{ route('user.contact') }}">Contact</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 item">
          <div class="f-item link">
            <h4 class="widget-title">Informasi</h4>
            <ul>
              <li>
                <a href="{{ route('user.informasi.potensi') }}">Potensi Desa</a>
              </li>
              <li>
                <a href="{{ route('user.informasi.umkm') }}">Produk UMKM</a>
              </li>
              <li>
                <a href="{{ route('user.berita') }}">Berita</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 item">
          <div class="f-item contact">
            <h4 class="widget-title">Contact Info</h4>
            <div class="address">
              <ul>
                @foreach (App\Models\InfoKontak::latest()->get() as $data)
                  <li>
                    <span class="mr-2">{!! $data->icon !!}</span> {{ $data->informasi }}
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container">
      <div class="text-center">
        <p>&copy; {{ date('Y') }} Desa {{ env('APP_NAME') }}. All Rights Reserved</p>
      </div>
    </div>
  </div>
  <!-- End Footer Bottom -->
</footer>
