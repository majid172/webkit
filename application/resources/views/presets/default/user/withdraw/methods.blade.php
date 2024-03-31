@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-lg-8">
                @foreach($withdrawMethod as $data)

                    <div class="shadow p-3 mb-5 bg-body rounded ">
                        <ul class="list-group list-group-flush details" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" data-name="{{$data->name}}"
                            data-min_amount="{{$data->min_amount}}" data-max_amount = "{{$data->max_amount}}"
                            data-method_code = "{{$data->id}}" data-currency = "{{$data->currency}}"
                            data-gateway="{{ $data }}">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold text-primary">{{__($data->name)}}</div>
                                    <span class="badge text-secondary mt-3">@lang("Limit") :
                                        {{$general->cur_sym}}{{showAmount
                                    ($data->min_limit)
                                    }} - {{$general->cur_sym}}{{showAmount($data->max_limit)}}
                                    </span>
                                </div>
                                <span class="badge ">
                                    @if(isset($data->image))
                                        <img src="{{getImage(getFilePath('gatewayImage').'/'.@$data->path.'/'
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
                    <h5 class="modal-title title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('user.withdraw.money')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="method_code">
                        <input type="hidden" name="currency">
                        <div class="text-primary custom--card">
                            <div class="mt-2 px-3">
                                <input type="hidden" name="gateway">

                                <div class="form-group">
                                    <label class="form-label">@lang('Amount')</label>
                                    <div class="input-group">
                                        <input type="number" step="any" name="amount" class="form-control form--control
                                    amount" value="{{ old('amount') }}" autocomplete="off" required>
                                        <span class="input-group-text bg-primary text-light">{{ $general->cur_text }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 preview-details d-none">
                                    <ul class="list-group list-group-flush text-center">
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
                                            <span>@lang('Receivable')</span> <span><span class="receivable fw-bold"> 0</span>
                                            {{__($general->cur_text)}} </span>
                                        </li>
                                        <li class="list-group-item d-none justify-content-between rate-element">

                                        </li>
                                        <li class="list-group-item d-none justify-content-between in-site-cur">
                                            <span>@lang('In') <span class="base-currency"></span></span>
                                            <strong class="final_amo">0</strong>
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

            // Clear input values and dynamic content
            modal.find('input[name="method_code"]').val('');
            modal.find('input[name="currency"]').val('');
            modal.find('input[name="gateway"]').val('');
            $('.amount').val('');
            $('.preview-details').addClass('d-none');
            $('.charge').text('');
            $('.payable').text('');
            $('.final_amo').text('');
            $('.rate-element').html('');
            $('.rate-element').addClass('d-none');
            $('.in-site-cur').addClass('d-none');
            $('.rate-element').removeClass('d-flex');
            $('.in-site-cur').removeClass('d-flex');

            $('.title').text($(this).data('name'))
            let method_code = $(this).data('method_code');
            let currency = $(this).data('currency');
            let resource = $(this).data('gateway');


            $('.amount').on('input',function(){
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                var toFixedDigit = 2;
                $('.min').text(parseFloat(resource.min_limit).toFixed(2));
                $('.max').text(parseFloat(resource.max_limit).toFixed(2));

                var amount = modal.find('input[name="amount"]').val();
                if(!amount){
                    amount = 0;
                }
                if(amount <= 0)
                {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                $('.preview-details').removeClass('d-none');
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                if (resource.currency != '{{ $general->cur_text }}') {
                    var rateElement = `<span>@lang('Conversion Rate')</span> <span class="fw-bold">1 {{__($general->cur_text)}} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span>`;
                    $('.rate-element').html(rateElement);
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
                var receivable = parseFloat((parseFloat(amount) - parseFloat(charge))).toFixed(2);
                $('.receivable').text(receivable);
                var final_amo = parseFloat(parseFloat(receivable) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=amount]').on('input');
            })
            modal.find('input[name="method_code"]').val(method_code);
            modal.find('input[name="currency"]').val(currency);
            modal.find('input[name="gateway"]').val(method_code);

        });
    </script>


@endpush
