@extends($activeTemplate.'layouts.frontend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-5">
                <div class="shadow-lg p-4 mb-5 bg-body rounded ">
                    <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha">
                        @csrf

                        <div class="form-group text-secondary">
                            <label for="email" class="form-label">@lang('Email or Username')</label>
                            <input type="text" name="username" value="{{ old('username') }}"
                                   class="form-control form--control" required>
                        </div>

                        <div class="form-group text-secondary">
                            <label for="password" class="form-label mb-0">@lang('Password')</label>
                            <input id="password" type="password" class="form-control form--control" name="password"
                                   required>
                        </div>
                        
                        <x-captcha></x-captcha>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                @lang('Remember Me')
                            </label>
                            
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2">
                               
                            <a class=" forgot-pass text-primary"
                               href="{{ route('user.password.request') }}">
                                @lang('Forgot your password?')
                            </a>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="recaptcha" class="btn btn-primary w-100 mb-2">
                                @lang('Login')
                            </button>
                            <a href="{{route('user.login.google')}}" class="btn btn-outline-success w-100">
                                <i class="lab la-google"></i> @lang('Sign in with Google')
                            </a>
                            
                        </div>
                        <p class="mb-0 text-secondary">@lang('Don\'t have any account?') <a href="{{ route('user.register') }}" class="text-primary">@lang('SignUp')</a></p>
                    </form>
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

input[type=text] {
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
    border-bottom: 2px solid var(--secondary);
    outline: 0;
   
}

input:focus {
    outline: none;
    /* box-shadow: 0 0 0; */
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