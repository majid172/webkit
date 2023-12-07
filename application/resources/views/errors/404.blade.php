<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <link href="{{asset($activeTemplateTrue.'css/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset($activeTemplateTrue.'css/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/common/css/line-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.css')}}"></link>
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">
</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- 404 Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">@lang('Page Not Found')</h1>
                <p class="mb-4">@lang('We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?')</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('home')}}">@lang('Go Back To Home')</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/wow/wow.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/easing/easing.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
</body>

</html>
