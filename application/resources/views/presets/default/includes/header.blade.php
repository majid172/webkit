@php
$pages = \App\Models\Page::get();
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="{{ getImage('assets/images/logoIcon/logo.png') }}" alt="">
        {{-- <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i></h2> --}}
    </a>
   
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @foreach($pages as $page)
                <a href="{{route('pages',$page->slug)}}" class="nav-item nav-link {{url()->current() == route('pages',$page->slug)? 'active' : ''}} ">{{$page->name}}</a>
            @endforeach
            @auth
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">@lang(auth()->user()->username)</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{route('user.profile.setting')}}" class="dropdown-item"><i class="las la-user-circle me-2"></i>@lang('Profile Settings')</a>
                    <a href="{{route('user.change.password')}}" class="dropdown-item"><i class="las la-fingerprint me-2"></i>@lang('Change Password')</a>
                    <a href="{{route('user.twofactor')}}" class="dropdown-item"><i class="las la-dice-two me-2"></i>@lang('Two Factor')</a>
                    <a href="{{route('user.logout')}}" class="dropdown-item"><i class="las la-sign-out-alt me-2"></i>@lang('Logout')</a>
                </div>
            </div>
               
            @endauth
        </div>
        @guest
            <a href="{{route('user.login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">@lang('Join Now')<i class="fa fa-arrow-right ms-3"></i></a>
        @endguest
        @auth
            <a href="{{route('user.home')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">@lang('Dashboard')</a>
            
        @endauth

    </div>
</nav>
