@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('settings.branch')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('admin.index') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.settings')</li>
        <li class="breadcrumb-item">@lang('settings.branch')</li>
    </ul>


	<form method="post" action="{{ route('admin.settings.branch.store') }}" enctype="multipart/form-data">
	    @csrf
	    @method('post')

	    <div class="row">

           
            <div class="col-12">

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
				              <div id="append-item-{{ $language->code }}">

				              	@if(old('branch_name_' . $language->code))

				                  	@foreach(old('branch_name_' . $language->code) as $indexName=>$name)
				                  	{{-- @dd($name); --}}

				                  		<div class="row mt-2">
											<div class="col-2 col-md-1">
										        <a class="btn btn-danger mt-4 text-light remove-item remove-item-{{ $loop->index }}" data-uuid="{{ $loop->index }}">
										           <i class="fa fa-trash"></i> 
										        </a>
											</div>

											<div class="col-10 col-md col-5">
										        <div class="form-group">
										            <label>count <span class="text-danger">*</span></label>
										            <input type="text" name="branch_count_{{ $language->code }}[]" class="form-control" value="{{ json_decode(getSetting('branch_count'), true)[$indexName][$language->code] ?? '' }}" required>
										        </div>
											</div>

											<div class="col-12 col-md col-5">
												<div class="form-group">
										            <label>name <span class="text-danger">*</span></label>
										            <input type="text" name="branch_name_{{ $language->code }}[]" class="form-control" value="{{ json_decode(getSetting('branch_name'), true)[$indexName][$language->code] ?? '' }}" required>
										        </div>
											</div>
										</div>

				                  	@endforeach

				              	@else

				                  	@if(json_decode(getSetting('branch_title'), true))


				                      	@foreach(json_decode(getSetting('branch_title'), true) as $indexName=>$name)

				                      		<div class="row mt-2">
												<div class="col-2 col-md-1">
											        <a class="btn btn-danger mt-4 text-light remove-item remove-item-{{ $loop->index }}" data-uuid="{{ $loop->index }}">
											           <i class="fa fa-trash"></i> 
											        </a>
												</div>

												<div class="col-10 col-md col-5">
											        <div class="form-group">
											            <label>@lang('site.title') <span class="text-danger">*</span></label>
											            <input type="text" name="branch_title_{{ $language->code }}[]" class="form-control" value="{{ json_decode(getSetting('branch_title'), true)[$indexName][$language->code] ?? '' }}">
											        </div>

													<div class="form-group">
				                        				<label>@lang('site.location') <span class="text-danger">*</span></label>
				                        				<input type="text" class="form-control" name="branch_location_{{ $language->code }}[]" value="{{ json_decode(getSetting('branch_location'), true)[$indexName][$language->code] ?? '' }}">
											        </div>

													 <div class="form-group">
											            <label>@lang('site.phone') <span class="text-danger">*</span></label>
											            <input type="text" name="branch_phone_{{ $language->code }}[]" class="form-control" value="{{ json_decode(getSetting('branch_phone'), true)[$indexName][$language->code] ?? '' }}">
											        </div>

												</div>
											</div>

				                      	@endforeach
				                  	
				                  	@endif
				              	@endif
				              	
				              </div>

				          </div>
				        @endforeach
				    </div>

				    <a class="col-12 text-light btn btn-primary mt-3" id="add-item">
				    	<i class="fa fa-plus"></i>
				    </a>

				    <div class="form-group mt-2">
				        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.save')</button>
				    </div>

                </div><!-- end of tile -->

            </div><!-- end of col -->

        </div><!-- end of row -->

	</form><!-- end of form -->

@endsection
@push('scripts')

<script type="text/javascript">

	$(document).on('click', '#add-item', function (e) {
		e.preventDefault();

		let uuid = $.now();

		languages = ['ar', 'en'];

		$.each(languages, function(index, lang) {

			let htnl = `<div class="row mt-2">
							<div class="col-2 col-md-1">
						        <a class="btn btn-danger mt-4 text-light remove-item remove-item-${uuid}" data-uuid="${uuid}">
						           <i class="fa fa-trash"></i> 
						        </a>
							</div>

							<div class="col-10 col-md col-5">
						        <div class="form-group">
						            <label>@lang('site.title') <span class="text-danger">*</span></label>
						            <input type="text" name="branch_title_${lang}[]" class="form-control" required>
						        </div>
								<div class="form-group">
                    				<label>@lang('site.location') <span class="text-danger">*</span></label>
                    				<input type="text" class="form-control" name="branch_location_${lang}[]" required></input>
						        </div>
								<div class="form-group">
						            <label>@lang('site.phone') <span class="text-danger">*</span></label>
						            <input type="text" name="branch_phone_${lang}[]" class="form-control" required>
						        </div>
							</div>
						</div>`;

			$('#append-item-' + lang).append(htnl);
		});

	});//end of delete

	$(document).on('click', '.remove-item', function (e) {
		e.preventDefault();

		let uuid = $(this).data('uuid');

		$('.remove-item-' + uuid).parent().parent().remove();

	});//end of delete
</script>

@endpush