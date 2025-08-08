<div class="sidebar-item recent-post">
  <div class="title">
    <h4>Berita Terpopuler</h4>
  </div>
  <ul>
    @foreach (App\Models\News::orderBy('views', 'desc')->limit(6)->get() as $data)
      <li>
        <div class="thumb">
          <a href="{{ route('user.berita.detail', $data->slug) }}">
            <img src="{{ asset($data->gambar) }}" alt="Gambar">
          </a>
        </div>
        <div class="info">
          <a href="{{ route('user.berita.detail', $data->slug) }}">{{ $data->judul }}</a>
          <div class="meta-title">
            <span class="post-date">
              <i class="fas fa-calendar-alt"></i>
              {{ $data->created_at->format('d M Y') }}
            </span>
            <span class="post-date">
              <i class="fas fa-clock"></i>
              {{ $data->created_at->diffForHumans() }}
            </span>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
</div>
<div class="sidebar-item gallery">
  <div class="title">
    <h4>Gallery</h4>
  </div>
  <div class="sidebar-info">
    <ul>
      @foreach (App\Models\Image::where('kategori', 'galeri')->latest()->limit(6)->get() as $data)
        <li>
          {{-- <a href="#"> --}}
          <img src="{{ asset($data->gambar) }}" alt="galeri">
          {{-- </a> --}}
        </li>
      @endforeach
    </ul>
  </div>
</div>
{{-- <div class="sidebar-item social-sidebar">
  <div class="title">
    <h4>follow us</h4>
  </div>
  <div class="sidebar-info">
    <ul>
      <li class="facebook">
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="twitter">
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="pinterest">
        <a href="#">
          <i class="fab fa-pinterest"></i>
        </a>
      </li>
      <li class="g-plus">
        <a href="#">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li class="linkedin">
        <a href="#">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </li>
    </ul>
  </div>
</div> --}}
