@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('site.admins')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.index') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.managements.admins.index') }}">@lang('site.admins')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>


    <form method="post" action="{{ route('admin.managements.admins.update', $admin->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('partials._errors')

        <div class="row">

            <div class="col-12 col-md-4">

                <div class="tile shadow">

                    @include('admin.dataTables.image_privew', ['imagePath' => $admin->image_path])

                </div><!-- end of tile -->

            </div><!-- end of col -->

            <div class="col-12 col-md-8">

                <div class="tile shadow">

                    {{--name--}}
                    <div class="form-group">
                        <label>@lang('site.name') <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $admin->name) }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('site.email') <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $admin->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{--password--}}
                    <div class="form-group">
                        <label>@lang('site.password') <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{--password_confirmation--}}
                    <div class="form-group">
                        <label>@lang('site.password_confirmation') <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.update')</button>
                    </div>

                </div><!-- end of tile -->

            </div><!-- end of col -->

        </div><!-- end of row -->

    </form><!-- end of form -->


@endsection