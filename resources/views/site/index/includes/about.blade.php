@if(!empty(json_decode(getSetting('about_title'), true)))
<section id="about" class="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-12">
        <div class="section-headline text-center">
          <h2>@lang('settings.about')</h2>
          <br>
        </div>
      </div>
    </div>
    <div class="row d-flex align-items-center">
      <div class="col-md-5 col-12" data-aos="fade-up" data-aos-delay="100">
        <div class="img-sec position-relative ">
          <img src="{{ asset('storage/app/public/' . getSetting('about_image')) }}" class="img-fluid " height="200px" alt="">
        </div>
      </div>
      <div class="col-md-7 col-12 text-right">

        @foreach(json_decode(getSetting('about_title'), true) as $index=>$title)

          <h4 class="sec-head mt-4" data-aos="fade-up" data-aos-delay="200">
            {{ json_decode(getSetting('about_title'), true)[$index][app()->getLocale()] ?? '' }}
          </h4>
          <p data-aos="fade-up" data-aos-delay="250">
            {!! json_decode(getSetting('about_description'), true)[$index][app()->getLocale()] ?? '' !!}
          </p>

        @endforeach
      </div>
      <!-- End col-->
    </div>

  </div>

</section>
@endif