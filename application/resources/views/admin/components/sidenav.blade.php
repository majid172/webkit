<div class="sidebar">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img
                    src="{{getImage(getFilePath('logoIcon') .'/logo.png')}}" alt="@lang('image')"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-tachometer-alt text--primary"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

{{--    course category            --}}
                <li class="sidebar__menu-header">@lang('Course Management')</li>
                <li class="sidebar-menu-item {{menuActive('admin.category.*')}}">
                    <a href="{{route('admin.category.list')}}" class="nav-link ">
                        <i class="menu-icon las la-list text--info"></i>
                        <span class="menu-title">@lang('Category Lists')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.charge')}}">
                    <a href="{{route('admin.charge')}}" class="nav-link ">
                        <i class="menu-icon las la-coins text--info"></i>
                        <span class="menu-title">@lang('Course Charge')</span>
                    </a>
                </li>

{{--                user management --}}
                <li class="sidebar__menu-header">@lang('Users Panel')</li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.users.*',3)}}">
                        <i class="menu-icon las la-users text-danger"></i>
                        <span class="menu-title">@lang('User Management')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.users.*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.users.all')}} ">
                                <a href="{{route('admin.users.all')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('All Users')</span>
                                    @if($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0)
                                    <div class="blob white"></div>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.users.active')}} ">
                                <a href="{{route('admin.users.active')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Active Users')</span>
                                    @if($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0)
                                    <div class="blob white"></div>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.users.banned')}} ">
                                <a href="{{route('admin.users.banned')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Banned Users')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.users.notification.all')}}">
                                <a href="{{route('admin.users.notification.all')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Send Mail All User')</span>
                                </a>
                            </li>
                            
                            
                        </ul>
                    </div>
                </li>
                
                <li class="sidebar-menu-item  {{menuActive('admin.subscriber.*')}}">
                    <a href="{{route('admin.subscriber.index')}}" class="nav-link"
                        data-default-url="{{ route('admin.subscriber.index') }}">
                        <i class="menu-icon las la-envelope text-warning"></i>
                        <span class="menu-title">@lang('Subscribers') </span>
                    </a>
                </li>

                {{-- PayIn --}}
                <li class="sidebar__menu-header">@lang('Fund Details')</li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.deposit.*',3)}}">
                        <i class="menu-icon las la-wallet text-primary"></i>
                        <span class="menu-title">@lang('Fund')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.deposit.*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.deposit.list')}} ">
                                <a href="{{route('admin.deposit.list')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Fund List')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.deposit.pending')}} ">
                                <a href="{{route('admin.deposit.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if(0 < $pendingDepositsCount) 
                                    <div class="blob white"></div>
                                @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.deposit.approved')}} ">
                                <a href="{{route('admin.deposit.approved')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Approved')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.deposit.successful')}} ">
                                <a href="{{route('admin.deposit.successful')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Successful')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.deposit.rejected')}} ">
                                <a href="{{route('admin.deposit.rejected')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Rejected')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.deposit.initiated')}} ">
                                <a href="{{route('admin.deposit.initiated')}}" class="nav-link">
                                    <i class="menu-icon las la-minus"></i>
                                    <span class="menu-title">@lang('Initiated')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Gateways --}}
                <li class="sidebar__menu-header">@lang('Gateway Method')</li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.gateway.*',3)}}">
                        <i class="menu-icon las la-money-check-alt text--danger"></i> 
                        <span class="menu-title">@lang('Payment Methods')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.gateway.*',2)}}"">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.gateway.automatic.index')}} ">
                                <a href="{{route('admin.gateway.automatic.index')}}" class="nav-link">
                                    <i class="menu-icon las la-caret-right"></i>
                                    <span class="menu-title">@lang('Automatic')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.gateway.manual.index')}} ">
                                <a href="{{route('admin.gateway.manual.index')}}" class="nav-link">
                                    <i class="menu-icon las la-caret-right"></i>
                                    <span class="menu-title">@lang('Manual')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- payout --}}
                <li class="sidebar__menu-header">@lang('Payout Settings')</li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.withdraw.*',3)}}">
                        <i class="menu-icon las la la-credit-card text--success"></i>
                        <span class="menu-title">@lang('Payout')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.withdraw.*',2)}}"">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.log')}} ">
                                <a href="{{route('admin.withdraw.log')}}" class="nav-link">
                                    <i class="menu-icon las la-caret-right"></i>
                                    <span class="menu-title">@lang('All Payouts')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.pending')}} ">
                                <a href="{{route('admin.withdraw.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-caret-right"></i>
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if(0 < $pendingWithdrawCount) <div class="blob white">
                                    </div>
                                    @endif
                                </a>
                            </li>
                            
                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.approved')}} ">
                                <a href="{{route('admin.withdraw.approved')}}" class="nav-link">
                                    <i class="menu-icon las la-caret-right"></i>
                                    <span class="menu-title">@lang('Approved')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.rejected')}} ">
                                <a href="{{route('admin.withdraw.rejected')}}" class="nav-link">
                                    <i class="menu-icon las la-caret-right"></i>
                                    <span class="menu-title">@lang('Rejected')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.withdraw.method.index')}}">
                    <a href="{{route('admin.withdraw.method.index')}}" class="nav-link ">
                        <i class="menu-icon las la la-credit-card text--success"></i>
                        <span class="menu-title">@lang('Payout Methods')</span>
                    </a>
                </li> 
             
    <li class="sidebar__menu-header">@lang('Report')</li>
    <li class="sidebar-menu-item {{menuActive(['admin.report.transaction','admin.report.transaction.search'])}}">
        <a href="{{route('admin.report.transaction')}}" class="nav-link">
            <i class="menu-icon las la-chart-line text--warning"></i> 
            <span class="menu-title">@lang('Transactions')</span>
        </a>
    </li>
    <li class="sidebar-menu-item {{menuActive(['admin.report.login.history','admin.report.login.ipHistory'])}}">
        <a href="{{route('admin.report.login.history')}}" class="nav-link">
            <i class="menu-icon las la-sign-in-alt text--warning"></i>
            <span class="menu-title">@lang('Login Activities')</span>
        </a>
    </li>
    <li class="sidebar-menu-item {{menuActive('admin.report.notification.history')}}">
        <a href="{{route('admin.report.notification.history')}}" class="nav-link">
            <i class="menu-icon las la-bell text--warning"></i>
            <span class="menu-title">@lang('Notifications')</span>
        </a>
    </li>
    <li class="sidebar__menu-header">@lang('Help Desk')</li>
    <li class="sidebar-menu-item {{menuActive('admin.ticket.*')}}">
        <a href="{{route('admin.ticket.pending')}}" class="nav-link ">
            <i class="menu-icon las la la-life-ring text--success"></i>
            <span class="menu-title">@lang('Support Ticket')</span>
            @if(0 < $pendingTicketCount) <div class="blob white">
        </div>@endif
        </a>
    </li>
<li class="sidebar__menu-header">@lang('Management of Content')</li>
<li class="sidebar-menu-item {{menuActive('admin.frontend.manage.pages')}}">
    <a href="{{route('admin.frontend.manage.pages')}}" class="nav-link ">
        <i class="menu-icon la la-pager text--danger"></i>
        <span class="menu-title">@lang('Main Pages')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.frontend.manage.policyPages')}}">
    <a href="{{route('admin.frontend.manage.policyPages')}}" class="nav-link ">
        <i class="menu-icon la la-pager text--danger"></i>
        <span class="menu-title">@lang('Policy Pages')</span>
    </a>
</li>

<li class="sidebar-menu-item sidebar-dropdown">
    <a href="javascript:void(0)" class="{{menuActive('admin.frontend.sections*',3)}}">
        <i class="menu-icon la la-grip-horizontal text--danger"></i>
        <span class="menu-title">@lang('Sections')</span>
    </a>
    <div class="sidebar-submenu {{menuActive('admin.frontend.sections*',2)}} ">
        <ul>
            @php
            $lastSegment = collect(request()->segments())->last();
            @endphp
            @foreach(getPageSections(true) as $k => $secs)
            @if($secs['builder'])
            <li class="sidebar-menu-item  @if($lastSegment == $k) active @endif ">
                <a href="{{ route('admin.frontend.sections',$k) }}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">{{__($secs['name'])}}</span>
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</li>
<li class="sidebar__menu-header">@lang('Settings Panel' )</li>

<li class="sidebar-menu-item {{menuActive('admin.setting.index')}}">
    <a href="{{route('admin.setting.index')}}" class="nav-link">
        <i class="menu-icon las la-cog text--primary"></i>
        <span class="menu-title">@lang('Control Panel')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.setting.logo.icon')}}">
    <a href="{{route('admin.setting.logo.icon')}}" class="nav-link">
        <i class="menu-icon las la-image text--info"></i>
        <span class="menu-title">@lang('Logo & Favicon')</span>
    </a>
</li>
<li class="sidebar-menu-item  {{menuActive(['admin.language.manage','admin.language.key'])}}">
    <a href="{{route('admin.language.manage')}}" class="nav-link"
        data-default-url="{{ route('admin.language.manage') }}">
        <i class="menu-icon las la-language text--primary"></i>
        <span class="menu-title">@lang('Language') </span>
    </a>
</li>
<li class="sidebar-menu-item sidebar-dropdown">
    <a href="javascript:void(0)" class="{{menuActive('admin.setting.notification*',3)}}">
        <i class="menu-icon las la-bell text--warning"></i>
        <span class="menu-title">@lang('Email & Notification')</span>
    </a>
    <div class="sidebar-submenu {{menuActive('admin.setting.notification*',2)}} ">
        <ul>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.templates')}} ">
                <a href="{{route('admin.setting.notification.templates')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('All Templates')</span>
                </a>
            </li>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.global')}} ">
                <a href="{{route('admin.setting.notification.global')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('Global Template')</span>
                </a>
            </li>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.email')}} ">
                <a href="{{route('admin.setting.notification.email')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('Email Config')</span>
                </a>
            </li>
            <li class="sidebar-menu-item {{menuActive('admin.setting.notification.sms')}} ">
                <a href="{{route('admin.setting.notification.sms')}}" class="nav-link">
                    <i class="menu-icon las la-caret-right"></i>
                    <span class="menu-title">@lang('SMS Config')</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="sidebar-menu-item {{menuActive('admin.extensions.index')}}">
    <a href="{{route('admin.extensions.index')}}" class="nav-link">
        <i class="menu-icon las la-cogs text--primary"></i>
        <span class="menu-title">@lang('Plugins')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.seo')}}">
    <a href="{{route('admin.seo')}}" class="nav-link">
        <i class="menu-icon las la-project-diagram text--success"></i>
        <span class="menu-title">@lang('SEO')</span>
    </a>
</li>
<li class="sidebar-menu-item {{menuActive('admin.setting.cookie')}}">
    <a href="{{route('admin.setting.cookie')}}" class="nav-link">
        <i class="menu-icon las la-check-circle text--primary"></i>
        <span class="menu-title">@lang('GDPR Policy')</span>
    </a>
</li>
</ul>
</div>
</div>
</div>
<!-- sidebar end -->

@push('script')
<script>
    if ($('li').hasClass('active')) {
        $('#sidebar__menuWrapper').animate({
            scrollTop: eval($(".active").offset().top - 320)
        }, 500);
    }
</script>
@endpush
