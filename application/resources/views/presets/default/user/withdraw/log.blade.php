@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center mt-2">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-lg-9 ">
                <div class="shadow p-3 rounded mb-3">
                    <h6 class="text-secondary pb-2">@lang('Search Payout History')</h6>
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
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="@lang('Trx number')">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="@lang('Status')">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <table class="table">
                        <thead>
                            <tr class="bg-primary text-light">
                                <th scope="col">@lang('Gateway')</th>
                                <th scope="col">@lang('Initiated')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Conversion')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($withdraws as $withdraw)
                            <tr>
                                <td>
                                    <span class="fw-bold"><span class="text-primary"> {{
                                    __(@$withdraw->method->name) }}</span>
                                </td>
                                <td class="text-center">
                                    {{ showDateTime($withdraw->created_at) }} <br> {{
                                    diffForHumans($withdraw->created_at) }}
                                </td>
                                <td class="text-center">
                                    {{ __($general->cur_sym) }}{{ showAmount($withdraw->amount ) }} - <span
                                    class="text-danger" title="@lang('charge')">{{
                                    showAmount($withdraw->charge)}} </span>
                                <br>
                                    <strong title="@lang('Amount after charge')">
                                    {{ showAmount($withdraw->amount-$withdraw->charge) }} {{
                                    __($general->cur_text) }}
                                    </strong>
                                </td>
                                <td class="text-center">
                                1 {{ __($general->cur_text) }} = {{ showAmount($withdraw->rate) }} {{
                                __($withdraw->currency) }}
                                <br>
                                    <strong>{{ showAmount($withdraw->final_amount) }} {{ __($withdraw->currency)}}</strong>
                                </td>
                                <td class="text-center">
                                @php echo $withdraw->statusBadge @endphp
                                </td>
                                <td>
                                    <button class="btn btn-sm btn--base detailBtn" data-user_data="{{ json_encode(@$withdraw->withdraw_information) }}" @if ($withdraw->status == 3) data-admin_feedback="{{ $withdraw->admin_feedback }}" @endif>
                                        <i class="la la-desktop"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center">
                                    <div class="center-content">
                                        <img src="{{ asset('assets/images/empty.png') }}" alt="emptyImage"><br>
                                        {{ __($emptyMessage) }}
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>
{{--                    <form action="">--}}
{{--                        <div class="mb-3 d-flex justify-content-end w-50">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-control" value="{{ request()->search }}"--}}
{{--                                    placeholder="@lang('Search by transactions')">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class=" custom--card">--}}
{{--                        <div class=" p-0">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table">--}}
{{--                                    <thead>--}}
{{--                                        <tr class="text-primary">--}}
{{--                                            <th>@lang('Gateway')</th>--}}
{{--                                            <th class="text-center">@lang('Initiated')</th>--}}
{{--                                            <th class="text-center">@lang('Amount')</th>--}}
{{--                                            <th class="text-center">@lang('Conversion')</th>--}}
{{--                                            <th class="text-center">@lang('Status')</th>--}}
{{--                                            <th>@lang('Action')</th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}

{{--                                        @forelse($withdraws as $withdraw)--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <span class="fw-bold"><span class="text-primary"> {{--}}
{{--                                                        __(@$withdraw->method->name) }}</span></span>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                {{ showDateTime($withdraw->created_at) }} <br> {{--}}
{{--                                                diffForHumans($withdraw->created_at) }}--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                {{ __($general->cur_sym) }}{{ showAmount($withdraw->amount ) }} - <span--}}
{{--                                                    class="text-danger" title="@lang('charge')">{{--}}
{{--                                                    showAmount($withdraw->charge)}} </span>--}}
{{--                                                <br>--}}
{{--                                                <strong title="@lang('Amount after charge')">--}}
{{--                                                    {{ showAmount($withdraw->amount-$withdraw->charge) }} {{--}}
{{--                                                    __($general->cur_text) }}--}}
{{--                                                </strong>--}}

{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                1 {{ __($general->cur_text) }} = {{ showAmount($withdraw->rate) }} {{--}}
{{--                                                __($withdraw->currency) }}--}}
{{--                                                <br>--}}
{{--                                                <strong>{{ showAmount($withdraw->final_amount) }} {{ __($withdraw->currency)--}}
{{--                                                    }}</strong>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                @php echo $withdraw->statusBadge @endphp--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                --}}{{-- <button class="btn btn-sm btn--base detailBtn"--}}
{{--                                                    data-user_data="{{ json_encode($withdraw->withdraw_information) }}" @if--}}
{{--                                                    ($withdraw->status == 3)--}}
{{--                                                    data-admin_feedback="{{ $withdraw->admin_feedback }}"--}}
{{--                                                    @endif--}}
{{--                                                    >--}}
{{--                                                    <i class="la la-desktop"></i>--}}
{{--                                                </button> --}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        @empty--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-muted text-center" colspan="100%">--}}
{{--                                                <img src="{{asset('assets/images/empty.png')}}" alt="emptyImag"> <br>--}}
{{--                                                {{ __($emptyMessage) }}--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        @endforelse--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if($withdraws->hasPages())--}}
{{--                        <div class="card-footer text-end">--}}
{{--                            {{$withdraws->links()}}--}}
{{--                        </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
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
                <ul class="list-group userData">

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
            var userData = $(this).data('user_data');
            var html = ``;
            userData.forEach(element => {
                if (element.type != 'file') {
                    html += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>${element.name}</span>
                            <span">${element.value}</span>
                        </li>`;
                }
            });
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
