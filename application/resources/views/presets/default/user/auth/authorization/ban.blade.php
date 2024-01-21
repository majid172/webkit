@extends($activeTemplate .'layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="shadow-lg p-4 mb-5 bg-body rounded ">
                <h5 class="text-center text-danger"> @lang(ucfirst($user->username).' '.'is banned')</h5>
                <div class="text-center">
                    <p class="text-secondary mb-1">@lang('Reason'): {{ $user->ban_reason }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
