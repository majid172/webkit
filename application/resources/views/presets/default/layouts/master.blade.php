<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>

    @include('includes.seo')

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/font.css')}}">

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
{{--    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/sidebar.css')}}">--}}
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

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
    @include($activeTemplate.'includes.header')

    <div class="page-wrapper">
        @yield('content')
    </div>

    @include($activeTemplate.'includes.footer')
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/common/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/jquery.validate.js') }}"></script>

    @stack('script-lib')
    @include('includes.notify')
    @include('includes.plugins')

    @stack('script')
    <script>
        (function ($) {
            "use strict";
            $(".langSel").on("change", function () {
                window.location.href = "{{ route('home') }}/change/" + $(this).val();
            });

        })(jQuery);
    </script>

    <script>
        (function ($) {
            "use strict";
            $('form').on('submit', function () {
                if ($(this).valid()) {
                    $(':submit', this).attr('disabled', 'disabled');
                }
            });

            var inputElements = $('[type=text],[type=password],select,textarea');
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

            $('.showFilterBtn').on('click',function(){
                $('.responsive-filter-card').slideToggle();
            });

            let headings = $('.table th');
            let rows = $('.table tbody tr');
            let columns
            let dataLabel;

            $.each(rows, function (index, element) {
                columns = element.children;
                if (columns.length == headings.length) {
                    $.each(columns, function (i, td) {
                    dataLabel = headings[i].innerText;
                    $(td).attr('data-label', dataLabel)
                    });
                }
            });

        })(jQuery);

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/wow/wow.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/easing/easing.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/sidebar.js')}}"></script>
</body>

</html>
