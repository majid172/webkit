<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>
    @include('includes.seo')

    <link rel="shortcut icon" href="{{asset($activeTemplateTrue.'/images/logo/favicon.png')}}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/font.css')}}"></link>

    <!-- Icon Font Stylesheet -->
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset($activeTemplateTrue.'css/fontawesome.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset($activeTemplateTrue.'css/bootstrap-icons.css')}}" rel="stylesheet">--}}

    <link href="{{asset($activeTemplateTrue.'css/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset($activeTemplateTrue.'css/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/common/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">
    @stack('style-lib')

    @stack('style')
    <style>
        .cookies-card {
            position: fixed;
            bottom: 16px;
            width: 40%;
            padding: 20px;
            background: #fff;
            border: 2px solid #108ce6;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            right: 16px;
            z-index: 99;
            border: 2px solid #108ce6;
            }
        .dark-mode .cookies-card {
            background: #2d3748;
            border: 1px solid #404040;
        }
        @media (max-width:576px) {
            .cookies-card {
                width: 90%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'css/color.php') }}?color={{ $general->base_color }}&secondColor={{ $general->secondary_color }}">
</head>
<body>

@stack('fbComment')
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
@include($activeTemplate.'includes.header')
@if(request()->route()->uri !='/')
    @include($activeTemplate.'includes.breadcumb')
@endif
@yield('content')
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@include($activeTemplate.'includes.footer')
@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp
@if(($cookie->data_values->status == 1) && !\Cookie::get('gdpr_cookie'))
    <!-- cookies dark version start -->
    <div class="cookies-card text-center hide">
      <div class="cookies-card__icon bg--base">
        <i class="las la-cookie-bite"></i>
      </div>
      <p class="mt-4 cookies-card__content">{{ $cookie->data_values->short_desc }} <a href="{{ route('cookie.policy') }}" target="_blank">@lang('learn more')</a></p>
      <div class="cookies-card__btn mt-4">
        <a href="javascript:void(0)" class="btn btn--base w-100 policy">@lang('Allow')</a>
      </div>
    </div>
  <!-- cookies dark version end -->
  @endif


<script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/common/js/bootstrap.bundle.min.js')}}"></script>

@stack('script-lib')

@stack('script')

@include('includes.plugins')

@include('includes.notify')


<script>
    (function ($) {
        "use strict";
        $(".langSel").on("change", function() {
            window.location.href = "{{route('home')}}/change/"+$(this).val() ;
        });

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            matched = event.matches;
            if(matched){
                $('body').addClass('dark-mode');
                $('.navbar').addClass('navbar-dark');
            }else{
                $('body').removeClass('dark-mode');
                $('.navbar').removeClass('navbar-dark');
            }
        });

        let matched = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if(matched){
            $('body').addClass('dark-mode');
            $('.navbar').addClass('navbar-dark');
        }else{
            $('body').removeClass('dark-mode');
            $('.navbar').removeClass('navbar-dark');
        }

        var inputElements = $('input,select');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for',element.attr('name'));
            element.attr('id',element.attr('name'))
        });

        $('.policy').on('click',function(){
            $.get('{{route('cookie.accept')}}', function(response){
                $('.cookies-card').addClass('d-none');
            });
        });

        setTimeout(function(){
            $('.cookies-card').removeClass('hide')
        },2000);

        var inputElements = $('[type=text],select,textarea');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for',element.attr('name'));
            element.attr('id',element.attr('name'))
        });

        $.each($('input, select, textarea'), function (i, element) {

            if (element.hasAttribute('required')) {
                $(element).closest('.form-group').find('label').addClass('required');
            }

        });

    })(jQuery);
</script>
<!-- JavaScript Libraries -->
{{--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/wow/wow.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/easing/easing.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
</body>
</html>
