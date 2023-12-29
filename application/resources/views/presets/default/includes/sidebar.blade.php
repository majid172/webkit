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