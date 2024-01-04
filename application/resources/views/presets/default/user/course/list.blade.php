@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <form action="">
                        <div class="mb-3 d-flex justify-content-end w-50">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" value="{{ request()->search }}"
                                    placeholder="@lang('Search by transactions')">
                                <button class="input-group-text bg-primary text-white">
                                    <i class="las la-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class=" custom--card">
                        <div class="p-0">
                            <div class="table-responsive">
                                <table class="table custom--table">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>@lang('Couse Title')</th>
                                            <th class="text-center">@lang('Number of Episodes')</th>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('Created_at')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($courses as $list)
                                        <tr>
                                            <td>
                                                <span class="fw-bold"> <span class="text-secondary">{{
                                                        ucwords($list->name) }}</span> </span>
                                            </td>
    
                                            <td class="text-center">
                                                <span class="badge bg-primary">{{optional($list->episodes)->count()}}</span>
                                                
                                            </td>
                                            <td class="text-center text-success">
                                               {{$general->cur_sym}}{{getAmount($list->price)}}
                                            </td>
                                            <td class="text-center">
                                                {{ showDateTime($list->created_at) }}
                                            </td>
                                            <td class="text-center">
                                               <a href="{{route('user.course.episode.list',$list->id)}}" class="btn btn-outline-primary btn-sm"><i class="las la-eye"></i> @lang('View')</a>
                                            </td>
    
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">
                                                <img src="{{asset('assets/images/empty.png')}}" alt="emptyImag"> <br>
                                                {{ __($emptyMessage) }}
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if($courses->hasPages())
                        <div class="card-footer text-end">
                            {{ $courses->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- APPROVE MODAL --}}
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Details')</h5>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <ul class="list-group userData mb-2">
                </ul>
                <div class="feedback"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

@endsection


@push('script')
<script>
    (function ($) {
        "use strict";
        $('.detailBtn').on('click', function () {
            var modal = $('#detailModal');

            var userData = $(this).data('info');
            var html = '';
            if (userData) {
                userData.forEach(element => {
                    if (element.type != 'file') {
                        html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                    }
                });
            }

            modal.find('.userData').html(html);

            if ($(this).data('admin_feedback') != undefined) {
                var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
            } else {
                var adminFeedback = '';
            }

            modal.find('.feedback').html(adminFeedback);


            modal.modal('show');
        });
    })(jQuery);

</script>
@endpush