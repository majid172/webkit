@php
$pages = \App\Models\Page::get();
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
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
                <a class="nav-item nav-link {{ Route::is('user.home') ? 'active' : '' }}"  href="{{route('user.home')}}">@lang('Dashboard')</a>
            @endauth
        </div>
        @guest
            <a href="{{route('user.login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">@lang('Join Now')<i class="fa fa-arrow-right ms-3"></i></a>
        @endguest
        @auth
            <a href="{{route('user.logout')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">@lang('Logout')<i class="fa fa-arrow-right ms-3"></i></a>
        @endauth

    </div>
</nav>
