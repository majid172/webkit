@extends('admin.layouts.app')
@section('panel')
    <button type="button" class="btn btn--primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal"><i class="las la-plus"></i>@lang('Add')</button>

    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('Sl.')</th>
                                <th>@lang('Categories Name')</th>
                                <th>@lang('Description')</th>
                                <th>@lang('Created_at')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($lists as $list)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{ucwords($list->name)}}</td>
                                    <td>{{Str::limit($list->description,40)}}</td>
                                    <td>
                                        {{ showDateTime($list->created_at) }}
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-outline-primary mb-3 edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$list->id}}" data-name="{{__($list->name)}}" data-description="{{__($list->description)}}"><i class="las la-edit"></i></button>

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
                @if ($lists->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($lists) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">@lang('Add Category')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">@lang('Category Name')</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('Description')</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">@lang('Category Image')</label>
                            <input type="file" name="image" id="img" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">@lang('Edit Category')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">@lang('Category Name')</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('Description')</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">@lang('Category Image')</label>
                            <input type="file" name="image" id="img" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Create')</button>
                    </div>
                </form>
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
        $('.edit').on('click',function(){
            $('#editModal').find('input[name="id"]').val($(this).data('id'));
            $('#editModal').find('input[name="name"]').val($(this).data('name'));
            $('#editModal').find('textarea[name="description"]').val($(this).data('description'));
        })
    </script>
@endpush
