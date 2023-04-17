  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 col-md-6 footer-info text-center ">
            <img src="assets/img/logo2.png" width="150px" alt="logo">
            <p class="mt-3">
              {!! getTransSetting('system_description', app()->getLocale()) !!}
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
      <div class="row align-items-end">
        <div class="col-md-4 mb-mb-0 mb-2">
          <div class="copyright text-md-end text-center">
            {!! trans('site.copyright') !!}
          </div>
        </div>
        <div class="col-md-8 text-md-start text-center">
          @if(!empty(getSetting('contact_commercial_record')))
            <p class="mb-0 d-inline-block">
              <strong>@lang('site.commercial_record') </strong> 
              {{ getSetting('contact_commercial_record') }}
            </p>
          @endif

          @if(!empty(getSetting('contact_tax_number')))

            <p class="mb-0 d-inline-block">
              <strong>@lang('site.tax_number') </strong>
              {{ getSetting('contact_tax_number') }}
            </p>
          
          @endif
        </div>
      </div>
     
    </div>
  </footer><!-- End Footer -->
<!--   <a href="https://wa.me/+" target="_blank" class="whats-icon"><i class="bi bi-whatsapp"></i></a>
 -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  	<i class="bi bi-arrow-up-short"></i>
  </a>

  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{ asset('site_assets/img/icon.png') }}" alt="logo"/>
        </div>
      </div>
    </div>
  </div>
