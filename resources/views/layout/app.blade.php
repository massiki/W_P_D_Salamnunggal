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

  <!-- ========== Google Fonts ========== -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&display=swap"
    rel="stylesheet">

  {{-- cdn fontawesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <!-- Preloader Start -->
  <div class="se-pre-con"></div>
  <!-- Preloader Ends -->

  <!-- Start Header Top
    ============================================= -->
  {{-- <div class="top-bar-area bg-dark text-light inline inc-border">
    <div class="container">
      <div class="row align-center">

        <div class="col-lg-7 col-md-12 left-info">
          <div class="item-flex">
            <ul class="list">
              <li>
                <i class="fas fa-phone"></i> Have any question? +123 456 7890
              </li>
              <li>
                <i class="fas fa-bullhorn"></i> <a href="#">Become an Instructor</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-5 col-md-12 right-info">
          <div class="item-flex">
            <div class="social">
              <ul>
                <li>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
            <div class="button">
              <a href="#">Register</a>
              <a href="#"><i class="fa fa-sign-in-alt"></i>Login</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div> --}}
  <!-- End Header Top -->

  <!-- Header
    ============================================= -->
  @include('components.user-navbar')
  <!-- End Header -->

  @yield('content')

  <!-- Star Footer
    ============================================= -->
  @include('components.user-footer')
  <!-- End Footer-->

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
  @yield('script')
  {{-- sweet alert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session('success'))
    <script>
      Swal.fire({
        title: "{{ session('success') }}",
        // text: "{{ session('success') }}",
        icon: "success"
      });
    </script>
  @endif

</body>

</html>
