@extends($activeTemplate.'layouts.master')
@section('content')
{{-- @include($activeTemplate.'includes.sidebar') --}}
    <div class="container">
        <div class="row justify-content-center mt-5">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9 mb-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary"><i class="las la-book-open"></i> @lang('Total Subscribe Courses')</h6>
                            <h4 class="text-primary">{{$total_subscribe}}</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary">@lang('Total Episodes')</h6>
                            <h4>9</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <div class="d-flex">
                                <div class="card_icon "><i class="las la-eye"></i></div>
                                <h6 class="text-secondary">@lang('Total Views')</h6>
                            </div>
                            <h4>07</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary"><i class="las la-book-open"></i> @lang('Net Balances')</h6>
                            <h4>{{getAmount($balance)}}</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary">@lang('Pending Balances')</h6>
                            <h4>$150.00</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary">@lang('Subscription Cost')</h6>
                            <h4>$80.00</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
