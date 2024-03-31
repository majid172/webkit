@extends($activeTemplate.'layouts.master')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center mt-2">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-lg-9 ">
                <div class="shadow p-3 rounded mb-3">
                    <h6 class="text-secondary pb-2">@lang('Search Payout History')</h6>
                    @include($activeTemplate.'includes.search')
                </div>
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <table class="table">
                        <thead>
                            <tr class="bg-primary text-light text-center">
                                <th scope="col">@lang('Gateway')</th>
                                <th scope="col">@lang('Initiated')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Transaction')</th>
                                <th scope="col">@lang('Conversion')</th>
                                <th scope="col">@lang('Status')</th>

                            </tr>
                        </thead>
                        <tbody id="table_body">
                        @forelse($withdraws as $withdraw)
                            <tr style="font-size: 14px;">
                                <td>
                                    <span class="fw-bold"><span class="text-primary"> {{
                                    __(@$withdraw->method->name) }}</span>
                                </td>
                                <td class="text-center">
                                    {{ showDateTime($withdraw->created_at) }}
                                </td>
                                <td class="text-center">
                                    <strong title="@lang('Amount after charge')">
                                    {{ showAmount($withdraw->amount-$withdraw->charge) }} {{
                                    __($general->cur_text) }}
                                    </strong>
                                </td>
                                <td class="text-center fw-bold text-primary">{{$withdraw->trx}}</td>
                                <td class="text-center">
                                    <strong>{{ showAmount($withdraw->final_amount) }} {{ __($withdraw->currency)}}</strong>
                                </td>
                                <td class="text-center">{!! $withdraw->statusBadge !!}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <img src="{{ asset('assets/images/empty.png') }}" alt="emptyImage">
                                    <p>{{ __($emptyMessage) }}</p>
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>

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
<script>
    $(document).ready(function() {
            $('#trx, #status,#max,#min').on('input ', function() {
                let trx = $('#trx').val();
                let min = $('#min').val();
                let max = $('#max').val();
                let status = $('#status').val();
                $.ajax({
                    url: "{{ route('user.withdraw.search') }}",
                    method: 'GET',
                    data: {
                        trx: trx,
                        min:min,
                        max:max,
                        status: status
                    },
                    success: function(response) {
                        var searchValue = $('#table_body');
                        searchValue.empty();
                        if(response.length == 0)
                        {
                            var messageRow = `
                            <tr>
                                <td colspan="6" class="text-center">
                                    <img src="{{asset('assets/images/empty.png')}}" width="">
                                    <p>No Data found.</p>
                                </td>
                            </tr>`;
                            searchValue.append(messageRow);
                        }
                        else{
                            $.each(response, function(index, withdraw) {
                                var row = `
                                <tr>
                                    <td>${withdraw.method_name}</td>
                                    <td class="text-center">${withdraw.createDate}</td>
                                    <td class="text-center ">${withdraw.amount} ${withdraw.currency}</td>
                                    <td class="text-primary text-center fw-bold">${withdraw.trx}</td>
                                    <td class="text-center">
                                        <strong>${withdraw.final_amount} ${withdraw.currency}</strong>
                                    </td>
                                    <td class="text-primary text-center">${withdraw.status}</td>
                                </tr>`;
                                searchValue.append(row);
                            });
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error(status, error);
                    }
                });
            });
    });

</script>
@endpush
