@extends('admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('site.partners')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('site.partners')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12">

                    	@if(permissionAdmin('create-partners'))
                            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                            	<i class="fa fa-plus"></i> @lang('site.create')
                            </a>
						@endif
                        @if(permissionAdmin('delete-partners'))
                            <form method="post" action="{{ route('admin.partners.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('post')
                                <input type="hidden" name="record_ids" id="record-ids">
                                <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> 
                            	    @lang('site.bulk_delete')
                            	</button>
                            </form><!-- end of form -->
                        @endif

                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
                        </div>
                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="data-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="animated-checkbox">
                                            <label class="m-0">
                                                <input type="checkbox" id="record__select-all">
                                                <span class="label-text"></span>
                                            </label>
                                        </div>
                                    </th>
                                    <th>@lang('site.title')</th>
                                    <th>@lang('site.description')</th>
                                    <th>@lang('site.admins')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.status')</th>
                                    <th>@lang('site.created_at')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

        let dataTable = $('#data-table').DataTable({
            dom: "tiplr",
            scrollY: '500px',
            sScrollX: "100%",
            scrollCollapse: true,
            serverSide: true,
            processing: true,
            language: {
                url: "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.partners.data') }}',
            },
            columns: [
                {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'admin', name: 'admin'},
                {data: 'image', name: 'image'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[2, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });
        console.log('fdf');

        $('#data-table-search').keyup(function () {
            dataTable.search(this.value).draw();
        });

        $(document).on('change', '.status', function (e) {
            e.preventDefault();

            let url    = "{{ route('admin.partners.status') }}";
            let method = 'post';
            let id     = $(this).data('id');

            $.ajax({
                url: url,
                data: {id: id},
                method: method,
                success: function (response) {

                    $('.datatable').DataTable().ajax.reload();

                    new Noty({
                        layout: 'topRight',
                        type: 'alert',
                        text: response,
                        killer: true,
                        timeout: 2000,
                    }).show();
                },

            });//end of ajax call

        });//end of delete
    </script>

@endpush