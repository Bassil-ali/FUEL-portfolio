<section id="testimonials" class="section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-headline text-center">
      <h2 class="text-white">@lang('site.partners')</h2>
    </div>


    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        @foreach($partners as $partner)

        <div class="swiper-slide">
          <div class="testimonial-item">
            <h3>{{ $partner->name }}</h3>
            <img src="{{ $partner->image_path }}" width="9%" alt="">
            <p>
              {!! $partner->description !!}
            </p>
          </div>
        </div><!-- End testimonial item -->

        @endforeach

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->