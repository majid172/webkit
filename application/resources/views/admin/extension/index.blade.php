@extends('admin.layouts.app')

@section('panel')


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('Extension List')</h6>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Extension')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($extensions as $extension)
                            <tr>
                                <td>
                                    <div class="user">
                                        <div class="thumb"><img
                                                src="{{ getImage(getFilePath('extensions') .'/'. $extension->image,getFileSize('extensions')) }}"
                                                alt="{{ __($extension->name) }}" class="plugin_bg"></div>
                                        <span class="name">{{ __($extension->name) }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($extension->status == 1)
                                    <span class="badge badge--success">@lang('Active')</span>
                                    @else
                                    <span class="badge badge--warning">@lang('Disabled')</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="button--group">
                                        <button title="@lang('Edit')" type="button"
                                            class="btn btn-sm btn-outline--primary ms-1 mb-2 editBtn"
                                            data-name="{{ __($extension->name) }}"
                                            data-shortcode="{{ json_encode($extension->shortcode) }}"
                                            data-action="{{ route('admin.extensions.update', $extension->id) }}">
                                            <i class="las la-edit"></i>
                                        </button>
                                        @if($extension->status == 0)
                                        <button title="@lang('Enable')" type="button"
                                            class="btn btn-sm btn-outline-success ms-1 mb-2 confirmationBtn"
                                            data-action="{{ route('admin.extensions.status', $extension->id) }}"
                                            data-question="@lang('Do you really want to activate this extension?')">
                                            <i class="la la-check-circle"></i>
                                        </button>
                                        @else
                                        <button title="@lang('Disable')" type="button"
                                            class="btn btn-sm btn--danger mb-2 confirmationBtn"
                                            data-action="{{ route('admin.extensions.status', $extension->id) }}"
                                            data-question="@lang('Are you sure to disable this extension?')">
                                            <i class="la la-ban"></i>
                                        </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>


{{-- EDIT METHOD MODAL --}}
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Update Extension'): <span class="extension-name"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12 control-label fw-bold">@lang('Script')</label>
                        <div class="col-md-12">
                            <textarea name="script" class="form-control" required rows="8"
                                placeholder="@lang('Paste your script with proper key')">{{ old('script') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary w-100 btn-global" id="editBtn">@lang('Update')</button>
                </div>
            </form>
        </div>
    </div>
</div>
<x-confirmation-modal></x-confirmation-modal>
@endsection


@push('breadcrumb-plugins')

<div class="d-flex flex-wrap justify-content-end">
    <div class="d-inline">
        <div class="input-group justify-content-end">
            <input type="text" name="search_table" class="form-control bg--white" placeholder="@lang('Search')...">
            <button class="btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>
@endpush


@push('script')
<script>
    (function ($) {
        "use strict";

        $(document).on('click', '.editBtn', function () {
            var modal = $('#editModal');
            var shortcode = $(this).data('shortcode');

            modal.find('.extension-name').text($(this).data('name'));
            modal.find('form').attr('action', $(this).data('action'));

            var html = '';
            $.each(shortcode, function (key, item) {
                html += `<div class="form-group">
                        <label class="col-md-12 control-label fw-bold">${item.title}</label>
                        <div class="col-md-12">
                            <input name="${key}" class="form-control" placeholder="--" value="${item.value}" required>
                        </div>
                    </div>`;
            })
            modal.find('.modal-body').html(html);

            modal.modal('show');
        });

        $(document).on('click', '.helpBtn', function () {
            var modal = $('#helpModal');
            var path = "{{ asset(getFilePath('extensions')) }}";
            modal.find('.modal-body').html(`<div class="mb-2">${$(this).data('description')}</div>`);
            if ($(this).data('support') != 'na') {
                modal.find('.modal-body').append(`<img src="${path}/${$(this).data('support')}">`);
            }
            modal.modal('show');
        });

    })(jQuery);

</script>
@endpush