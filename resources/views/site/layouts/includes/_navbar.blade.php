<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <a href="{{ url('/') }}" class="logo">
          	<img src="{{ asset('site_assets/img/logo.png') }}" alt="" class="img-fluid">
          </a>
          <nav id="navbar" class="navbar order-2 order-lg-1">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">@lang('home.home')</a></li>
              <li><a class="nav-link scrollto" href="#about">@lang('home.about_us')</a></li>
              <li><a class="nav-link scrollto" href="#testimonials">@lang('home.testimonials')</a></li>
              <li><a class="nav-link scrollto " href="#facts">@lang('home.facts')</a></li>
              <li><a class="nav-link scrollto" href="#contact">@lang('home.contact')</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

          </nav><!-- .navbar -->
          @if(app()->getLocale() == 'ar')
			<a href="{{ route('changeLanguage', 'en') }}" class="btn-get-started scrollto order-1 order-lg-2">
          		@lang('home.english')
          	</a>
          @else
          	<a href="{{ route('changeLanguage', 'ar') }}" class="btn-get-started scrollto order-1 order-lg-2">
          		@lang('home.arabic')
          	</a>
          @endif
        </div>
      </div>

    </div>
  </header><!-- End Header -->