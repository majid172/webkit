@extends('admin.layouts.app')
@section('panel')
    <a href="{{route('admin.episode.create',$category_id)}}" class="btn btn--primary mb-3">
        <i class="las la-plus"></i> @lang('Create New Episode')
    </a>

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
                                <th>@lang('Created_at')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($episodes as $item)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ucwords($item->title)}}</td>
                                    <td>{{ucwords($item->category->name)}}</td>
                                    <td>
                                        @if ($item->status==1)
                                            <span class="badge bg-success">@lang('Active')</span>
                                            @else
                                            <span class="badge bg-danger">@lang('Inactive')</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ showDateTime($item->created_at) }}
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="las la-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item edit" href="javascript:void(0)"><i class="las la-edit text-info"></i> @lang('Details')</a></li>

                                                <li><a class="dropdown-item" href="#"><i class="las la-book-open text-warning"></i> {{($item->status == 1)? "Active":"Inactive" }} </a></li>

                                                <li><a class="dropdown-item remove" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#removeModal"><i class="las la-trash text-danger" ></i> @lang('Remove')</a></li>
                                            </ul>
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

