@extends($activeTemplate.'layouts.frontend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-5">
                <div class="shadow-lg p-4 mb-5 bg-body rounded ">
                    <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha">
                        @csrf

                        <div class="form-group text-secondary py-2">
                            <label for="email" class="form-label">@lang('Email or Username')</label>
                            <input type="text" name="username" value="{{ old('username') }}"
                                   class="form-control form--control" required>
                        </div>

                        <div class="form-group text-secondary py-2">
                            <label for="password" class="form-label mb-0">@lang('Password')</label>
                            <input id="password" type="password" class="form-control form--control" name="password"
                                   required>
                        </div>

                        <x-captcha></x-captcha>
                        <div class="form-group form-check py-2">
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

                        </div>
                        <p class="mb-0 text-secondary text-center">@lang('Don\'t have any account?') <a href="{{ route
                        ('user.register') }}" class="text-primary">@lang('SignUp')</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
