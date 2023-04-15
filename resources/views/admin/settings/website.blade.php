@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('settings.websit')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.index') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.settings')</li>
        <li class="breadcrumb-item">@lang('settings.websit')</li>
    </ul>

    <form method="post" action="{{ route('admin.settings.websit.store') }}" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row">

            <div class="col-12 col-md-4">

                <div class="tile shadow">

                    @include('admin.dataTables.image_privew', ['imagePath' => asset('storage/' . getSetting('system_image'))])

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
                                <label>@lang('settings.system_name') <span class="text-danger">*</span></label>
                                <input type="text" name="system_name[{{ $language->code }}]" class="form-control" value="{{ getTransSetting('system_name', $language->code) }}" required>
                            </div>

                          </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>


                </div><!-- end of tile -->

            </div><!-- end of col -->

        </div><!-- end of row -->
    </form><!-- end of form --> 

@endsection