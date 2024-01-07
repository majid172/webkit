@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $policyPages = getContent('policy_pages.element',false,null,true);
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="shadow-lg p-4 mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="{{ route('user.register') }}" method="POST" class="verify-gcaptcha">
                        @csrf
                        <div class="row">
                            @if(session()->get('reference') != null)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="referenceBy" class="form-label">@lang('Reference by')</label>
                                    <input type="text" name="referBy" id="referenceBy" class="form-control form--control" value="{{session()->get('reference')}}" readonly>
                                </div>
                            </div>
                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Username')</label>
                                    <input type="text" class="form-control form--control checkUser" name="username" value="{{ old('username') }}" required>
                                    <small class="text-danger usernameExist"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('E-Mail Address')</label>
                                    <input type="email" class="form-control form--control checkUser" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Country')</label>
                                    <select name="country" class="form-control form--control">
                                        @foreach($countries as $key => $country)
                                            <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Mobile')</label>
                                    <div class="input-group ">
                                        <span class="input-group-text mobile-code">

                                        </span>
                                        <input type="hidden" name="mobile_code">
                                        <input type="hidden" name="country_code">
                                        <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control form--control checkUser" required>
                                    </div>
                                    <small class="text-danger mobileExist"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Password')</label>
                                    <input type="password" class="form-control form--control" name="password" required>
                                    @if($general->secure_password)
                                        <div class="input-popup">
                                            <p class="error lower">@lang('1 small letter minimum')</p>
                                            <p class="error capital">@lang('1 capital letter minimum')</p>
                                            <p class="error number">@lang('1 number minimum')</p>
                                            <p class="error special">@lang('1 special character minimum')</p>
                                            <p class="error minimum">@lang('6 character password')</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Confirm Password')</label>
                                    <input type="password" class="form-control form--control" name="password_confirmation" required>
                                </div>
                            </div>

                            <x-captcha></x-captcha>

                        </div>
                       <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="user_type" type="checkbox" value="1"  role="switch" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">@lang('Instructor')</label>
                          </div>
                       </div>
                        @if($general->agree)
                        <div class="form-group">
                            <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                            <label for="agree">@lang('I agree with') @foreach($policyPages as $policy) <a href="{{ route('policy.pages',[slug($policy->data_values->title),$policy->id]) }}">{{ __($policy->data_values->title) }}</a> @if(!$loop->last), @endif @endforeach</label>
                        </div>
                        @endif

                        <div class="form-group">
                            <button type="submit" id="recaptcha" class="btn btn-primary w-100"> @lang('SignUp')</button>
                        </div>
                        <p class="mb-0">@lang('Already have an account?') <a href="{{ route('user.login') }}" class="text-primary">@lang('Login')</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i class="las la-times"></i>
    </span>
  </div>
  <div class="modal-body">
    <h6 class="text-center">@lang('You already have an account please Login ')</h6>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
    <a href="{{ route('user.login') }}" class="btn btn--base btn-sm">@lang('Login')</a>
  </div>
</div>
</div>
</div>
@endsection
@push('style')
<style>
    .country-code .input-group-text{
        background: #fff !important;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }

    body {
    font-family: 'Roboto', sans-serif;
}

.login-box {
    /* margin-top: 75px; */
    height: auto;
    background: #ffffff;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #969ca3;
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text],input[type=email],select {
    background-color: #ffffff;
    border: none;
    border-bottom: 2px solid var(--primary);
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #52565b;
}

input[type=password] {
    background-color: #ffffff;
    border: none;
    border-bottom: 2px solid var(--primary);
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #52565b;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}

.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #8F77D9;
    outline: 0;
    background-color: #ffffff;
    color: #52565b;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-outline-primary {
    border-color: var(--primary);
    color: var(--primary);
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: var(--primary);
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}
</style>
@endpush
@push('script-lib')
<script src="{{ asset('assets/common/js/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
      "use strict";
        (function ($) {
            @if($mobileCode)
            $(`option[data-code={{ $mobileCode }}]`).attr('selected','');
            @endif

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            @if($general->secure_password)
                $('input[name=password]').on('input',function(){
                    secure_password($(this));
                });

                $('[name=password]').focus(function () {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function () {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });


            @endif

            $('.checkUser').on('focusout',function(e){
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                  if (response.data != false && response.type == 'email') {
                    $('#existModalCenter').modal('show');
                  }else if(response.data != false){
                    $(`.${response.type}Exist`).text(`${response.type} already exist`);
                  }else{
                    $(`.${response.type}Exist`).text('');
                  }
                });
            });
        })(jQuery);

    </script>
@endpush
