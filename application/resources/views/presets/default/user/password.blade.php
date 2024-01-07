@extends($activeTemplate.'layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        @include($activeTemplate.'includes.sidebar')
        <div class="col-md-9 mb-5">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <div class="text-primary">
                    <h5 class="card-title">@lang('Change Password')</h5>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label text-secondary">@lang('Current Password')</label>
                            <input type="password" class="form-control form--control" name="current_password" required
                                autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-secondary">@lang('Password')</label>
                            <input type="password" class="form-control form--control" name="password" required
                                autocomplete="current-password">
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
                        <div class="form-group mb-3">
                            <label class="form-label text-secondary">@lang('Confirm Password')</label>
                            <input type="password" class="form-control form--control" name="password_confirmation"
                                required autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">@lang('Change Password')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script-lib')
<script src="{{ asset('assets/common/js/secure_password.js') }}"></script>
@endpush
@push('script')
<script>
    (function ($) {
        "use strict";
        @if ($general -> secure_password)
            $('input[name=password]').on('input', function () {
                secure_password($(this));
            });

        $('[name=password]').focus(function () {
            $(this).closest('.form-group').addClass('hover-input-popup');
        });

        $('[name=password]').focusout(function () {
            $(this).closest('.form-group').removeClass('hover-input-popup');
        });

        @endif
    })(jQuery);
</script>
@endpush