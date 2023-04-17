@if(!empty(json_decode(getSetting('achievement_name'), true)))
<section id="facts"  class="section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-headline text-center">
      <h2>@lang('settings.achievement')</h2>
    </div>

    <div class="row counters">

      @foreach(json_decode(getSetting('achievement_name'), true) as $index=>$name)

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ json_decode(getSetting('achievement_count'), true)[$index][app()->getLocale()] ?? '' }}" data-purecounter-duration="1" class="purecounter"></span>
          <p>{{ json_decode(getSetting('achievement_name'), true)[$index][app()->getLocale()] ?? '' }}</p>
        </div>

      @endforeach

    </div>
  </div>
</section>
@endif