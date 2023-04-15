@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('site.sliders')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.index') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.sliders.index') }}">@lang('site.sliders')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>


    <form method="post" action="{{ route('admin.sliders.update', $slider->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('partials._errors')

        <div class="row">

            <div class="col-12 col-md-4">

                <div class="tile shadow">

                    @include('admin.dataTables.image_privew', ['imagePath' => $slider->image_path])

                </div><!-- end of tile -->

            </div><!-- end of col -->

            <div class="col-12 col-md-8">

                <div class="tile shadow">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        @foreach(getLanguages() as $language)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $language->code }}-tab" data-toggle="tab" data-target="#{{ $language->code }}" type="button" role="tab" aria-controls="{{ $language->code }}" aria-selected="{{ $loop->first ? true : false }}">
                                {{ $language->name }}
                            </button>
                        </li>
                        @endforeach

                    </ul>

                    <div class="tab-content" id="myTabContent">
                        @foreach(getLanguages() as $language)
                          <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $language->code }}" role="tabpanel" aria-labelledby="{{ $language->code }}-tab">
                              {{--email--}}
                            <div class="form-group">
                                <label>@lang('site.title') <span class="text-danger">{{ $loop->first ? '*' : '' }}</span></label>
                                <input type="text" name="title[{{ $language->code }}]" class="form-control @error('title.' . $language->code) is-invalid @enderror" 
                                value="{{ old('title.'. $language->code, $slider->getTranslations('title')[$language->code] ?? '') }}">
                                @error('title.' . $language->code)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- claim_description --}}
                            <div class="form-group">
                                <label>@lang('site.description') <span class="text-danger">{{ $loop->first ? '*' : '' }}</span></label>
                                <textarea id="description-{{ $language->code }}" class="form-control @error('description.' . $language->code . '.' . $loop->index) is-invalid @enderror" name="description[{{ $language->code }}]" rows="5">{{ old('description.' . $language->code, $slider->getTranslations('description')[$language->code] ?? '') }}</textarea>
                                @error('description.' . $language->code . '.' . $loop->index)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                          </div>
                        @endforeach
                    </div>

                   {{--status--}}
                    <label class="form-check-label" for="status">@lang('site.status')</label>
                    <div class="form-group ml-3">
                        <div class="form-check form-switch">
                          <input class="form-check-input" id="status" type="checkbox" name="status" value="true" {{ old('status', $slider->status) ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.update')</button>
                    </div>

                </div><!-- end of tile -->

            </div><!-- end of col -->

        </div><!-- end of row -->

    </form><!-- end of form -->


@endsection