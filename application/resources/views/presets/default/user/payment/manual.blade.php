@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow p-3 mb-5 bg-body rounded mt-5">
                    <h5 class="text-primary">{{__($pageTitle)}}</h5>
                    <form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="text-center mt-2">@lang('For a successful payment, please pay') <b class="text-success">{{showAmount($data['final_amo']) .' '.$data['method_currency'] }}</b> , @lang('instead of the suggested')
                                            <b class="text-success"> {{ showAmount($data['amount'])  }} {{__($general->cur_text)}}</b>
                                        </p>
                                        <h4 class="text-center mb-4">@lang('Please follow the instruction below')</h4>

                                        <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>

                                    </div>

                                    <x-custom-form identifier="id" identifierValue="{{ $gateway->form_id }}"></x-custom-form>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary w-100">@lang('Pay Now')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
