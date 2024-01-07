<div class="col-md-3 mb-5">
    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="{{route('user.home')}}" class="nav-link text-primary " data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <i class="las la-tachometer-alt me-1 fs-4"></i>@lang('Dashboard')
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('user.course.list')}}" class="nav-link text-primary" data-toggle="tooltip" data-placement="right" title="Courses">
                        <i class="las la-book-reader me-1 fs-4"></i>@lang('Course Lists')
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="nav-link text-primary" data-toggle="tooltip" data-placement="right" title="Subscription">
                        <i class="las la-wallet me-1 fs-4"></i>@lang('Subscription')
                    </a>
                </li>
                <li class="list-group-item dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle text-primary " data-toggle="dropdown" data-placement="right" title="PayIn">
                        <i class="las la-money-bill-wave-alt me-1 fs-4"></i>@lang('PayIn')
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-primary" href="{{route('user.deposit')}}"><i class="las la-wallet me-2 fs-5"></i>@lang('Add Money')</a>
                        <a class="dropdown-item text-primary" href="{{route('user.deposit.history')}}"><i class="las la-history me-2 fs-5 "></i>@lang(' History')</a>
                    
                    </div>
                </li>
                
                <li class="list-group-item dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" data-placement="right" title="Payout">
                        <i class="las la-money-check-alt me-1 fs-4"></i>@lang('Payout')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Dropdown items go here -->
                        <a class="dropdown-item text-primary" href="{{route('user.withdraw')}}"><i class="las la-wallet me-2 fs-5"></i>@lang('Withdraw Money')</a>
                        <a class="dropdown-item text-primary" href="{{route('user.withdraw.history')}}"><i class="las la-history me-2 fs-5 "></i>@lang('History')</a>
                        <!-- Add more items as needed -->
                    </div>
                </li>
                
                <li class="list-group-item dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle text-primary " data-toggle="dropdown" data-placement="right" title="Settings">
                        
                        <i class="las la-cog me-2 fs-4"></i>@lang('Settings')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Dropdown items go here -->
                        <a class="dropdown-item text-primary" href="{{route('user.profile.setting')}}"><i class="las la-user-shield me-2 fs-5"></i>@lang('Profile Setting')</a>
                        <a class="dropdown-item text-primary" href="{{route('user.change.password')}}"><i class="las la-key me-2 fs-5"></i>@lang('Change Password')</a>
                        <a class="dropdown-item text-primary" href="{{route('user.twofactor')}}"><i class="las la-chess-board me-2 fs-5"></i>@lang('Two Factor')</a>
                       
                        <!-- Add more items as needed -->
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>