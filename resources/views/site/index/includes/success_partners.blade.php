<section id="success_partners" class="section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-headline text-center">
      <h2 class="text-white">@lang('site.success_partners')</h2>
    </div>


    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        @foreach($success_partners as $success_partner)

        <div class="swiper-slide">
          <div class="testimonial-item">
            <h3>{{ $success_partner->title }}</h3>
            <img src="{{ $success_partner->image_path }}" width="9%" alt="">
            <p>
              {!! $success_partner->description !!}
            </p>
          </div>
        </div><!-- End testimonial item -->

        @endforeach

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->