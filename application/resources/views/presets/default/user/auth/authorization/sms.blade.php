@extends($activeTemplate .'layouts.frontend')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="shadow-lg px-5 py-4 mb-5 bg-body rounded ">
                <div class="verification-area">
                    <h5 class="border-bottom pb-3 text-primary">@lang('SMS Verification')</h5>
                    <form action="{{route('user.verify.mobile')}}" method="POST" class="submit-form">
                        @csrf
                        <p class="verification-text">+{{
                            showMobileNumber(auth()->user()->mobile) }} @lang('number will receive a six-digit verification number'): </p>
    
                        @include($activeTemplate.'components.verification_code')
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">@lang('Verify')</button>
                        </div>
    
                        <div class="mb-3">
                            <p>
                                @lang('Should you receive no code'), <a href="{{route('user.send.verify.code', 'phone')}}" class="forget-pass text-primary">@lang('Try again')</a>
                            </p>
    
                            @if($errors->has('resend'))
                            <small class="text-danger d-block">{{ $errors->first('resend') }}</small>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection