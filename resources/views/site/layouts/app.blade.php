
<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> شركة فيول | لقطع غيار السيارات </title>
  <meta content="شركة ذات مسؤولية محدودة (ذ) م م مقرها الرئيس مدينة جدة بالمملكة العربية السعودية لها فروع عدة في كل من الرياض، الدمام، خميس مشيط وتبوك. وهي شركة رائدة في مجال استيراد وتصدير قطع غيار السيارات."
    name="description">
  <meta content="شركة ذات مسؤولية محدودة (ذ) م م مقرها الرئيس مدينة جدة بالمملكة العربية السعودية لها فروع عدة في كل من الرياض، الدمام، خميس مشيط وتبوك. وهي شركة رائدة في مجال استيراد وتصدير قطع غيار السيارات.
  " name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('site_assets/img/icon.png') }}" rel="icon">
  <link href="{{ asset('site_assets/img/icon.png') }}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('site_assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site_assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('site_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site_assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('site_assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site_assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;700;800;900&display=swap" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{ asset('site_assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  @include('site.layouts.includes._navbar')


  @yield('content')

  <!-- ======= Footer ======= -->
  @include('site.layouts.includes._footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('site_assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('site_assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('site_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('site_assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('site_assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('site_assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('site_assets/js/main.js') }}"></script>

</body>

</html>