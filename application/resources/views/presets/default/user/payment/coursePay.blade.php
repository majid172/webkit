@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-lg-8">
                @foreach($gatewayCurrency as $data)
                    <div class="shadow p-3 mb-5 bg-body rounded ">
                        <ul class="list-group list-group-flush details" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" data-min_amount="{{$data->min_amount}}" data-max_amount = "{{$data->max_amount}}" data-method_code = "{{$data->method_code}}" data-currency = "{{$data->currency}}"
                            data-gateway="{{ $data }}" data-amount="{{$amount}}">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold text-primary">{{__($data->name)}}</div>
                                    <span class="badge text-secondary mt-3">@lang("Amount") :
                                        {{$general->cur_sym}}{{showAmount($amount) }}
                                    </span>
                                </div>
                                <span class="badge ">
                                    @if(isset($data->image))
                                        <img src="{{getImage(getFilePath('gatewayImage').'/'.@$data->img_path.'/'
                                        .@$data->image)}}" alt="">
                                    @else
                                        <img src="{{asset('assets/images/empty.png')}}" alt="no_gateway"
                                             style="width: 40px;height: 40px;">
                                    @endif

                                </span>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title text-secondary" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.deposit.insert')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="method_code">
                        <input type="hidden" name="currency">
                        <input type="hidden" name="course_id" value="{{$courseId}}">
                        <div class="text-primary custom--card">
                            <div class="mt-2 px-3">
                                <input type="hidden" name="gateway">
                                <div class="form-group">
                                    <label class="form-label">@lang('Course Amount ')</label>
                                    <div class="input-group">
                                        <input type="number" step="any" name="amount" class="form-control form--control
                                    amount" value="{{ showAmount($amount) }}" autocomplete="off" required readonly>
                                        <span class="input-group-text bg-primary text-light">{{ $general->cur_text }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 preview-details ">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>@lang('Transaction Range')</span>
                                            <span><span class="min fw-bold">0</span> {{__($general->cur_text)}} - <span
                                                    class="max fw-bold">0</span> {{__($general->cur_text)}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>@lang('Charge')</span>
                                            <span><span class="charge fw-bold">0</span> {{__($general->cur_text)}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>@lang('Total Pay')</span> <span><span class="payable fw-bold">
                                                    0</span>
                                            {{__($general->cur_text)}}</span>
                                        </li>
                                        <li class="list-group-item justify-content-between d-none rate-element">

                                        </li>
                                        <li class="list-group-item justify-content-between d-none in-site-cur">
                                            <span>@lang('In') <span class="base-currency"></span></span>
                                            <span class="final_amo fw-bold">0</span>
                                        </li>
                                        <li class="list-group-item justify-content-center crypto_currency d-none">
                                        <span>@lang('Conversion with') <span class="method_currency"></span> @lang('and
                                            final value will Show on next step')</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">@lang('Pay Now')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.details').on('click', function () {
            let modal = $('#staticBackdrop');
            let amount = $(this).data('amount');
            let resource = $(this).data('gateway');

            modal.find('input[name="method_code"]').val('');
            modal.find('input[name="currency"]').val('');
            modal.find('input[name="gateway"]').val('');

            let method_code = $(this).data('method_code');
            let currency = $(this).data('currency');

            modal.find('input[name="amount"]').val(amount);

            let fixed_charge = parseFloat(resource.fixed_charge);
            let percent_charge = parseFloat(resource.percent_charge);
            let rate = parseFloat(resource.rate);

            if (resource.method.crypto == 1) {
                var toFixedDigit = 8;
                $('.crypto_currency').removeClass('d-none');
            } else {
                var toFixedDigit = 2;
                $('.crypto_currency').addClass('d-none');
            }
            $('.min').text(parseFloat(resource.min_amount).toFixed(2));
            $('.max').text(parseFloat(resource.max_amount).toFixed(2));

                let charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);

                if (resource.currency != '{{ $general->cur_text }}') {
                    var rateElement = `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{__($general->cur_text)}} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                }
                else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=method_code]').val(resource.method_code);
                $('input[name=amount]').on('input');


            $('.title').text(resource.name);

            modal.find('input[name="method_code"]').val(method_code);
            modal.find('input[name="currency"]').val(currency);
            modal.find('input[name="gateway"]').val(method_code);

        });
    </script>


@endpush
