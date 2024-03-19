@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 ">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9 mb-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shadow mb-5 bg-body rounded">
                            <div class="row">
                                <div class="col-lg-4 mx-auto bg-primary ve d-flex align-items-center
                                justify-content-center ">
                                    <i class="las la-film text-light" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="col-lg-8 p-3">
                                    <a href="{{route('user.course.list')}}">

                                        @if (auth()->user()->user_type == 1)
                                            <h6 class="text-secondary"> @lang('Total Created Courses')</h6>
                                            <h4 class="text-primary">{{$create_course}}</h4>
                                        @else
                                            <h6 class="text-secondary">@lang('Purchase Courses')</h6>
                                            <h4 class="text-primary">{{$total_course}}</h4>
                                        @endif

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shadow mb-5 bg-body rounded">
                            <div class="row">
                                <div class="col-lg-4 mx-auto bg-primary d-flex align-items-center justify-content-center ">
                                    <i class="lar la-play-circle text-light" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="col-lg-8 p-3">
                                    <a href="{{route('user.course.list')}}">
                                        @if (auth()->user()->user_type == 1)
                                        <h6 class="text-secondary"> @lang('Total Buyer')</h6>
                                        <h4 class="text-primary">{{$buyer}}</h4>
                                        @else
                                        <h6 class="text-secondary">@lang('Total Episodes')</h6>
                                        <h4 class="text-primary">{{$total_episodes}}</h4>
                                        @endif
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="shadow mb-5 bg-body rounded">
                            <div class="row">
                                <div class="col-lg-4 mx-auto bg-primary d-flex align-items-center justify-content-center ">
                                    <i class="las la-money-bill-wave-alt text-light" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="col-lg-8 p-3">
                                    @if (auth()->user()->user_type==1)
                                    <h6 class="text-secondary">@lang('Total Sell')</h6>
                                    <h4 class="text-primary">{{gs()->cur_sym}}{{getAmount($total_sell)}}</h4>
                                    @else
                                    <h6 class="text-secondary">@lang('Total Cost')</h6>
                                    <h4 class="text-primary">{{gs()->cur_sym}}{{getAmount($total_cost)}}</h4>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shadow mb-5 bg-body rounded">
                            <div class="row">
                                <div class="col-lg-4 mx-auto bg-primary d-flex align-items-center justify-content-center ">
                                    <i class="las la-wallet text-light" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="col-lg-8 p-3">
                                    <h6 class="text-secondary">@lang('Wallet')</h6>
                                    <h4 class="text-primary">{{gs()->cur_sym}}{{getAmount($balance)}} </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="shadow mb-5 bg-body rounded">
                            <div class="row">
                                <div class="col-lg-4 mx-auto bg-primary d-flex align-items-center justify-content-center ">
                                    <i class="las la-money-check text-light" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="col-lg-8 p-3">
                                    <h6 class="text-secondary">@lang('Pending Funds')</h6>
                                    <h4 class="text-primary">{{gs()->cur_sym}}{{getAmount($deposit_pending)}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="shadow mb-5 bg-body rounded">
                            <div class="row">
                                <div class="col-lg-4 mx-auto bg-primary d-flex align-items-center justify-content-center ">
                                    <i class="las la-money-check-alt text-light" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="col-lg-8 p-3">
                                    <h6 class="text-secondary">@lang('Pending Payouts')</h6>
                                    <h4 class="text-primary">{{gs()->cur_sym}}{{getAmount($withdraw_pending)}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
