@extends($activeTemplate.'layouts.master')
@section('content')
{{-- @include($activeTemplate.'includes.sidebar') --}}
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-3 mb-5">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{route('user.home')}}" class="nav-link" data-toggle="tooltip" data-placement="right" title="Dashboard">
                                    <i class="las la-tachometer-alt"></i> @lang('Dashboard')
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.course.list')}}" class="nav-link" data-toggle="tooltip" data-placement="right" title="Courses">
                                    <i class="las la-book-reader"></i> @lang('Course Lists')
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="nav-link" data-toggle="tooltip" data-placement="right" title="Subscription">
                                    <i class="las la-wallet"></i> @lang('Subscription')
                                </a>
                            </li>
                            <li class="list-group-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-placement="right" title="PayIn">
                                    <i class="las la-money-bill-wave-alt"></i> @lang('PayIn')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user.deposit')}}">@lang('PayIn Money')</a>
                                    <a class="dropdown-item" href="{{route('user.deposit.history')}}">@lang('PayIn History')</a>
                                
                                </div>
                            </li>
                            
                            <li class="list-group-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-placement="right" title="Payout">
                                    <i class="las la-money-check-alt"></i> @lang('Payout')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <!-- Dropdown items go here -->
                                    <a class="dropdown-item" href="{{route('user.withdraw')}}">@lang('Payout Money')</a>
                                    <a class="dropdown-item" href="{{route('user.withdraw.history')}}">@lang('Payout History')</a>
                                    <!-- Add more items as needed -->
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 mb-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary"><i class="las la-book-open"></i> @lang('Total Subscribe Courses')</h6>
                            <h4>05</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h6 class="text-secondary">@lang('Total Episodes')</h6>
                            <h4>07</h4>
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
