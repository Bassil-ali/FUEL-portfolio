@if(json_decode(getSetting('feature_title'), true))
<section id="features" class="features">
      <div class="container" data-aos="fade-up">

     <div class="row align-items-stretch ">
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <ul class="nav nav-tabs row g-2 d-flex">


        @foreach(json_decode(getSetting('feature_title'), true) as $indexName=>$title)

          <li class="nav-item col-3">
            <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $loop->index }}">
              <h4>{{ json_decode(getSetting('feature_title'), true)[$indexName][app()->getLocale()] ?? '' }}</h4>
            </a>
          </li>

        @endforeach

        </ul>

        <div class="tab-content">

        @foreach(json_decode(getSetting('feature_title'), true) as $indexName=>$title)

        <div class="tab-pane {{ $loop->first ? 'active show' : '' }}" id="tab-{{ $loop->index }}">
            <div class="row">
              <div class="col-lg-12 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <p>
                  {!! json_decode(getSetting('feature_description'), true)[$indexName][app()->getLocale()] ?? '' !!}
                </p>
              </div>
          
            </div>
          </div>

        @endforeach

        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="250">
        <img src="{{ asset('storage/' . getSetting('feature_image')) }}" alt="" class="img-fluid pt-md-5">
      </div>
     </div>

      </div>
    </section>
  @endif