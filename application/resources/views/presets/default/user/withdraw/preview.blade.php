@extends($activeTemplate.'layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="shadow p-3 mb-5 bg-body rounded mt-5">
                <div >
                    <div class="text-primary">
                        <h5 class="card-title">@lang('Payout Via') {{ $withdraw->method->name }}</h5>
                    </div>
                    <form action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2"> {!! @$withdraw->method->description !!}</div>
                            <x-custom-form identifier="id" identifierValue="{{ $withdraw->method->form_id }}"></x-custom-form>
                            @if(auth()->user()->ts)
                                <div class="form-group">
                                    <label>@lang('Google Authenticator Code')</label>
                                    <input type="text" name="authenticator_code" class="form-control form--control" required>
                                </div>
                            @endif
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary w-100">@lang('Confirm Payout')</button>
                            </div>
                        </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
