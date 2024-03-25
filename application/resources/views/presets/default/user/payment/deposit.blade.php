@extends($activeTemplate.'layouts.master')
@section('content')
{{--@include($activeTemplate.'includes.breadcumb')--}}
<div class="container">
    <div class="row justify-content-center">
        @include($activeTemplate.'includes.sidebar')
        <div class="col-lg-8">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <form action="{{route('user.deposit.insert')}}" method="post">
                    @csrf
                    <input type="hidden" name="method_code">
                    <input type="hidden" name="currency">
                    <div class="text-primary custom--card">
                        <h5 class="card-title">@lang('PayIn Money')</h5>
                        <div class="mt-5 px-3">
                            <div class="form-group mb-3">
                                <label class="form-label">@lang('Select Gateway')</label>
                                <select class="form-control form--control" name="gateway" required>
                                    <option value="">@lang('Select One')</option>
                                    @foreach($gatewayCurrency as $data)
                                    <option value="{{$data->method_code}}" @selected(old('gateway')==$data->method_code)
                                        data-gateway="{{ $data }}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Amount')</label>
                                <div class="input-group">
                                    <input type="number" step="any" name="amount" class="form-control form--control"
                                        value="{{ old('amount') }}" autocomplete="off" required>
                                    <span class="input-group-text bg-primary text-light">{{ $general->cur_text }}</span>
                                </div>
                            </div>
                            <div class="mt-3 preview-details d-none">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>@lang('Limit')</span>
                                        <span><span class="min fw-bold">0</span> {{__($general->cur_text)}} - <span
                                                class="max fw-bold">0</span> {{__($general->cur_text)}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>@lang('Charge')</span>
                                        <span><span class="charge fw-bold">0</span> {{__($general->cur_text)}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>@lang('Payable')</span> <span><span class="payable fw-bold"> 0</span>
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
                            <button type="submit" class="btn btn-primary w-100 mt-3">@lang('Pay')</button>
                        </div>
                    </div>
                </form>
            </div>
                @foreach($gatewayCurrency as $data)
                    <div class="shadow p-3 mb-5 bg-body rounded ">
                        <ul class="list-group list-group-flush details" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold text-primary">{{__($data->name)}}</div>
                                    <span class="badge text-secondary mt-3">@lang("Limit") : {{$data->symbol}}{{showAmount($data->min_amount)
                                    }} - {{$data->symbol}}{{showAmount($data->max_amount)}}
                                    </span>
                                </div>
                                <span class="badge ">
                                    @if(isset($data->image))
                                        <img src="{{getImage(getFilePath('automaticGateway').'/'.@$data->img_path.'/'.@$data->image)}}" alt="">
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>

            $('.details').on('click',function(){
                alert('ok')
            });

    </script>
<script>
    (function ($) {
        "use strict";
        $('select[name=gateway]').change(function () {
            if (!$('select[name=gateway]').val()) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            var resource = $('select[name=gateway] option:selected').data('gateway');
            var fixed_charge = parseFloat(resource.fixed_charge);
            var percent_charge = parseFloat(resource.percent_charge);
            var rate = parseFloat(resource.rate)
            if (resource.method.crypto == 1) {
                var toFixedDigit = 8;
                $('.crypto_currency').removeClass('d-none');
            } else {
                var toFixedDigit = 2;
                $('.crypto_currency').addClass('d-none');
            }
            $('.min').text(parseFloat(resource.min_amount).toFixed(2));
            $('.max').text(parseFloat(resource.max_amount).toFixed(2));
            var amount = parseFloat($('input[name=amount]').val());
            if (!amount) {
                amount = 0;
            }
            if (amount <= 0) {
                $('.preview-details').addClass('d-none');
                return false;
            }
            $('.preview-details').removeClass('d-none');
            var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
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
            } else {
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
        });
        $('input[name=amount]').on('input', function () {
            $('select[name=gateway]').change();
            $('.amount').text(parseFloat($(this).val()).toFixed(2));
        });
    })(jQuery);
</script>
@endpush
