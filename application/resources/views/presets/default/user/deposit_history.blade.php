@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 rounded mb-3">
                    <h6 class="text-secondary pb-2">@lang('Search Fund History')</h6>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="@lang('Gateway')">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="@lang('Trx number')">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="@lang('Min amount')">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="@lang('Max amount')">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select type="text" class="form-control"  placeholder="@lang('Status')">
                                    <option value="">@lang('Status')</option>
                                    <option value="0">@lang('Initiated')</option>
                                    <option value="2">@lang('Pending')</option>
                                    <option value="1">@lang('Approved')</option>
                                    <option value="1">@lang('Succeed')</option>
                                    <option value="3">@lang('Rejected')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow p-3 mb-5 bg-body rounded">
{{--                    <form action="">--}}
{{--                        <div class="mb-3 d-flex justify-content-end w-50">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-control" value="{{ request()->search }}"--}}
{{--                                    placeholder="@lang('Search by transactions')">--}}
{{--                                <button class="input-group-text bg-primary text-white">--}}
{{--                                    <i class="las la-search"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <div class=" custom--card">
                        <div class="p-0">
                            <div class="table-responsive">
                                <table class="table custom--table">
                                    <thead>
                                        <tr class="text-light bg-primary">
                                            <th>@lang('Gateway')</th>
                                            <th class="text-center">@lang('Initiated')</th>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('Transaction')</th>
                                            <th class="text-center">@lang('Conversion')</th>
                                            <th class="text-center">@lang('Status')</th>
{{--                                            <th>@lang('Details')</th>--}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($deposits as $deposit)
                                        <tr class="td_font" style="font-size: 14px;">
                                            <td>
                                                <span class="fw-bold"> <span class="text-primary">{{
                                                        __(@$deposit->gateway?->name) }}</span> </span>

                                            </td>

                                            <td class="text-center">
                                                {{ showDateTime($deposit->created_at) }}
                                            </td>
                                            <td class="text-center">
                                                {{ __($general->cur_sym) }}{{ showAmount($deposit->amount ) }} + <span
                                                    class="text-danger" title="@lang('charge')">{{
                                                    showAmount($deposit->charge)}} </span>
                                                <br>
                                                <strong class="text-secondary" title="@lang('Amount with charge')">
                                                    {{ showAmount($deposit->amount+$deposit->charge) }} {{
                                                    __($general->cur_text) }}
                                                </strong>
                                            </td>
                                            <td class="text-center fw-bold text-primary">{{__($deposit->trx)}}</td>
                                            <td class="text-center">
                                                1 {{ __($general->cur_text) }} = {{ showAmount($deposit->rate) }}
                                                {{__($deposit->method_currency)}}
                                                <br>
                                                <strong class="text-secondary">{{ showAmount($deposit->final_amo) }}
                                                    {{__($deposit->method_currency)}}</strong>
                                            </td>
                                            <td class="text-center">{!! $deposit->statusBadge !!}</td>
                                            @php
                                            $details = ($deposit->detail != null) ? json_encode($deposit->detail) : null;
                                            @endphp

{{--                                            <td>--}}
{{--                                                <a href="javascript:void(0)"--}}
{{--                                                    class="btn btn--base btn-sm @if($deposit->method_code >= 1000) detailBtn @else disabled @endif"--}}
{{--                                                    @if($deposit->method_code >= 1000)--}}
{{--                                                    data-info="{{ $details }}"--}}
{{--                                                    @endif--}}
{{--                                                    @if ($deposit->status == 3)--}}
{{--                                                    data-admin_feedback="{{ $deposit->admin_feedback }}"--}}
{{--                                                    @endif--}}
{{--                                                    >--}}
{{--                                                    <i class="fa fa-eye"></i>--}}
{{--                                                </a>--}}
{{--                                            </td>--}}
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-muted text-center" >
                                                <img src="{{asset('assets/images/empty.png')}}" alt="emptyImag"> <br>
                                                {{ __($emptyMessage) }}
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if($deposits->hasPages())
                        <div class="card-footer text-end">
                            {{ $deposits->links() }}
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
