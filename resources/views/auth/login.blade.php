<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ========== Meta Tags ========== -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Learna - Education and LMS Template">

  <!-- ========== Page Title ========== -->
  <title>{{ env('APP_NAME') }} | @yield('title')</title>

  <!-- ========== Favicon Icon ========== -->
  <link rel="shortcut icon" href="{{ asset(App\Models\Image::where('kategori', 'logo')->first()->gambar) }}"
    type="image/x-icon">

  <!-- ========== Start Stylesheet ========== -->
  <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/themify-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/flaticon-set.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/elegant-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/owl.carousel.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/owl.theme.default.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/bootsnav.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet" />
  <!-- ========== End Stylesheet ========== -->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->



</head>

<body class="">

  <!-- Start Login
    ============================================= -->
  <div class="login-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="login-box">
            <div class="login">
              <div class="content">
                <img src="{{ asset(App\Models\Image::where('kategori', 'logo')->first()->gambar) }}" alt="Logo"
                  width="50">
                <form action="{{ route('auth') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                        <i class="fas fa-envelope-open"></i> <input class="form-control" placeholder="Email*"
                          type="email" name="email" value="{{ old('email') }}">
                      </div>
                      @error('email')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                        <i class="fas fa-lock"></i> <input class="form-control" placeholder="Password*" type="password"
                          name="password">
                      </div>
                      @error('password')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="row">
                      <button type="submit">
                        Login
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Login -->

  <!-- jQuery Frameworks
    ============================================= -->
  <script src="{{ asset('assets/front/js/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.appear.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/modernizr.custom.13711.js') }}"></script>
  <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/progress-bar.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/count-to.js') }}"></script>
  <script src="{{ asset('assets/front/js/YTPlayer.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('assets/front/js/loopcounter.js') }}"></script>
  <script src="{{ asset('assets/front/js/bootsnav.js') }}"></script>
  <script src="{{ asset('assets/front/js/main.js') }}"></script>

</body>

</html>
