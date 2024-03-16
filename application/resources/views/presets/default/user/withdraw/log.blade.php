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
                    <form action="{{route('user.withdraw.search')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" id="gateway" class="form-control" placeholder="@lang('Gateway')">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" id="trx_id" class="form-control" placeholder="@lang('Trx number')">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select class="form-control" id="status">
                                        <option value="">@lang('Status')</option>
                                        <option value="1">@lang('Approved')</option>
                                        <option value="2">@lang('Pending')</option>
                                        <option value="3">@lang('Rejected')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>

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
                        <tbody>
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
                                <td class="text-center">{!! $withdraw->statusBadge !!}

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
            $('#gateway, #trx_id, #status').on('input click', function() {
                let trx = $('#trx_id').val();
                let gateway = $('#gateway').val();
                let status = $('#status').val();
                $.ajax({
                    url: "{{ route('user.withdraw.search') }}",
                    method: 'GET',
                    data: {
                        trx: trx,
                        gateway: gateway,
                        status: status
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(status, error);
                    }
                });
            });
    });

</script>
@endpush
