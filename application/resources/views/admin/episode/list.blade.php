@extends('admin.layouts.app')
@section('panel')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('Sl.')</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Category')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Descripton')</th>
                                <th>@lang('Created_at')</th>
                               <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($episodes as $item)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ucwords($item->title)}}</td>
                                    <td>{{ucwords($item->course->title)}}</td>
                                    <td>
                                        @if ($item->status==1)
                                            <span class="badge bg-success">@lang('Active')</span>
                                            @else
                                            <span class="badge bg-danger">@lang('Inactive')</span>
                                        @endif
                                    </td>
                                    <td title="{{$item->description}}">{{Str::limit($item->description,40)}}</td>
                                    <td>
                                        {{ showDateTime($item->created_at) }}
                                    </td>
                                    <td title="@lang('Active/Deactive')">
                                        <div class="form-check form-switch text-primary">
                                           
                                           <label class="switch m-0">
                                                <input type="checkbox" class="toggle-switch checkStatus"  data-id="{{$item->id}}"{{($item->status == 1)?'checked':''}}>
                                                <span class="slider round"></span>
                                            </label>
                                          </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($episodes->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($episodes) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search by Username')"
                       value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush
@push('script')
    <script>
        $(document).ready(function(){
            $('.checkStatus').on('click', function(){
                var status = $(this).prop('checked') ? 1 : 0;
                var episode_id = $(this).data('id');
                
                $.ajax({
                    url: '{{ route("admin.episode.status") }}',
                    method: 'GET',
                    data: {
                        status: status,
                        episode_id:episode_id
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error: ' + textStatus, errorThrown);
                    }
                });
            });
});

    </script>
@endpush

