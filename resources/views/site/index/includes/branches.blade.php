<section id="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-headline text-center">
        <h2>@lang('settings.branches')</h2>
    </div>
    <div class="row contact-info">
      @if(!empty(getSetting('contact_address')))
      <div class="col-md-4">
        <a href="https://goo.gl/maps/apooc6Vpd4by24MP6" class="contact-address">
          <i class="bi bi-geo-alt"></i>
          <h3>@lang('site.address')</h3>
          <address>
            {{ getSetting('contact_address') }}
          </address>
        </a>
      </div>
      @endif
      @if(!empty(getSetting('contact_address')))
      <div class="col-md-4 mb-md-0 mb-3">
        <a href="https://wa.me/{{ getSetting('contact_fax') }}" class="contact-phone">
          <i class="bi bi-telephone"></i>
          <h3>@lang('site.fax')</h3>
          <p>{{ getSetting('contact_fax') }}</p>
        </a>
      </div>
      @endif
      @if(!empty(getSetting('contact_address')))
      <div class="col-md-4 mb-md-0 mb-3">
        <a href="tel:{{ getSetting('contact_phone') }}" class="contact-phone">
          <i class="bi bi-telephone"></i>
          <h3>@lang('site.phone')</h3>
          <p>{{ getSetting('contact_phone') }}</p>
        </a>
      </div>
      @endif
      @if(!empty(getSetting('contact_address')))
      <div class="col-md-4">
        <a href="mailto:{{ getSetting('contact_email') }}" class="contact-email">
          <i class="bi bi-envelope"></i>
          <h3>@lang('site.email')</h3>
          <p>{{ getSetting('contact_email') }}</p>
        </a>
      </div>
    </div>
    @endif
     @if(!empty(getSetting('contact_address')))
      <div class="col-md-4">
        <a href="mailto:{{ getSetting('contact_email') }}" class="b-5">
          <i class="bi bi-envelope"></i>
          <h3>@lang('site.email')</h3>
          <p>{{ getSetting('contact_email') }}</p>
        </a>
      </div>
    </div>
    @endif
     @if(!empty(getSetting('contact_address')))
      <div class="col-md-4">
        <a href="mailto:{{ getSetting('contact_email') }}" class="b-6">
          <i class="bi bi-envelope"></i>
          <h3>@lang('site.email')</h3>
          <p>{{ getSetting('contact_email') }}</p>
        </a>
      </div>
    </div>
    @endif
    
  </div>
</section><!-- End Contact Section -->