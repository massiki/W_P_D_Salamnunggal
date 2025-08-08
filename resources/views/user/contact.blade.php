@extends('layout.app')
@section('title', 'Contact')
@section('content')
  <!-- Start Breadcrumb ============================================= -->
  <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover"
    style="background-image: url({{ asset(App\Models\Image::where('kategori', 'banner')->latest()->first()->gambar) }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h1>Contact Us</h1>
          <ul class="breadcrumb">
            <li><a><i class="fas fa-home"></i> Home</a></li>
            <li class="active">Contact</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start Contact Area ============================================= -->
  <div class="contact-area default-padding-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="site-heading text-center">
            <h5>{{ env('APP_NAME') }}</h5>
            <h2>Contact</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="contact-items">
        <div class="row align-center">
          <div class="col-lg-4 left-item">
            <div class="info-items">
              <!-- Single Item -->
              @foreach ($infoKontak as $data)
                <div class="item">
                  <div class="icon">
                    {!! $data->icon !!}
                  </div>
                  <div class="info">
                    <h5>{{ $data->nama }}</h5>
                    <p>
                      {{ $data->informasi }}
                    </p>
                  </div>
                </div>
              @endforeach
              <!-- End Single Item -->
              <!-- Single Item -->
              {{-- <div class="item">
                <div class="icon">
                  <i class="fas fa-phone"></i>
                </div>
                <div class="info">
                  <h5>Phone</h5>
                  <p>
                    +44-20-7328-4499
                  </p>
                </div>
              </div> --}}
              <!-- End Single Item -->
              <!-- Single Item -->
              {{-- <div class="item">
                <div class="icon">
                  <i class="fas fa-envelope-open"></i>
                </div>
                <div class="info">
                  <h5>Email</h5>
                  <p>
                    info@yourdomain.com
                  </p>
                </div>
              </div> --}}
              <!-- End Single Item -->
            </div>
          </div>
          <div class="col-lg-8 right-item">
            <h5>Need Help?</h5>
            <h2>Give Feedback</h2>
            <form action="{{ route('user.contact.store') }}" method="post" class="contact-form">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control @error('nama') border-danger @enderror" id="nama" name="nama"
                      placeholder="Nama" type="text" value="{{ old('nama') }}">
                    @error('nama')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control @error('email') border-danger @enderror" id="email" name="email"
                      placeholder="Email*" type="email" value="{{ old('email') }}">
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control @error('telepon') border-danger @enderror" id="telepon" name="telepon"
                      placeholder="Telepon*" type="text" inputmode="numeric" oninput="inputPhone()"
                      value="{{ old('telepon') }}">
                    @error('telepon')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group comments">
                    <textarea class="form-control @error('saran') border-danger @enderror" id="saran" name="saran"
                      placeholder="Feedback and Suggestions*">{{ old('saran') }}</textarea>
                    @error('saran')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <button type="button" onclick="document.querySelector('.contact-form').submit();">
                    Kirim <i class="fa fa-paper-plane"></i>
                  </button>
                </div>
              </div>
              <!-- Alert Message -->
              <div class="col-lg-12 alert-notification">
                <div id="message" class="alert-msg"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact -->

  <!-- Star Google Maps  ============================================= -->
  <div class="maps-area">
    <div class="google-maps">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6838.820090184142!2d107.20439173094623!3d-6.897113583855034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68577efc9dc53d%3A0x8000112561689736!2sKantor%20Desa%20Salam%20nunggal!5e1!3m2!1sen!2sid!4v1749381145122!5m2!1sen!2sid"></iframe>
    </div>
  </div>
  <!-- End Google Maps -->
@endsection
@section('script')
  <script>
    // cek ketika input yang diperbolehkan hanya nomor
    function inputPhone() {
      document.getElementById('telepon').addEventListener('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '')
      })
    }
  </script>
@endsection
