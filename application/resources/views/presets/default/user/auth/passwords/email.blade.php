@extends($activeTemplate.'layouts.frontend')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-5">
            <div class="shadow-lg p-4 mb-5 bg-body rounded ">
                <form method="POST" action="{{ route('user.password.email') }}">
                    @csrf
                    <div class="form-group text-secondary">
                        <label for="email" class="form-label">@lang('Email or Username')</label>
                        <input type="text" name="value" value="{{ old('value') }}" autofocus="off"  class="form-control form--control" required>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary w-100">@lang('Reset Password')</button>
                    </div>
                </form>
            </div>
          
        </div>
    </div>
</div>

@endsection