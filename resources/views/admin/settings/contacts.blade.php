@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('settings.contact')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.index') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.settings')</li>
        <li class="breadcrumb-item">@lang('settings.contact')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.settings.contact.store') }}">
                    @csrf
                    @method('post')

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('site.email') <span class="text-danger">*</span></label>
                        <input type="email" name="email" autofocus class="form-control" value="{{ old('email', getSetting('contact_email')) }}">
                    </div>

                    {{--phone--}}
                    <div class="form-group">
                        <label>@lang('site.phone') <span class="text-danger">*</span></label>
                        <input type="text" name="phone" autofocus class="form-control" value="{{ old('phone', getSetting('contact_phone')) }}">
                    </div>

                    {{--fax--}}
                    <div class="form-group">
                        <label>@lang('site.fax') <span class="text-danger">*</span></label>
                        <input type="text" name="fax" autofocus class="form-control" value="{{ old('fax', getSetting('contact_fax')) }}">
                    </div>

                    {{--address--}}
                    <div class="form-group">
                        <label>@lang('site.address') <span class="text-danger">*</span></label>
                        <input type="text" name="address" autofocus class="form-control" value="{{ old('address', getSetting('contact_address')) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection