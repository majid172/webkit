@php
    $content_1 = getContent('banner.content',true);
@endphp
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('assets/img/carousel-1.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{__($content_1->data_values->subheading1)}}</h5>
                            <h1 class="display-3 text-white animated slideInDown">{{__($content_1->data_values->heading1)}}</h1>
                            <p class="fs-5 text-white mb-4 pb-2">{{__($content_1->data_values->paragraph1)}}</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">@lang('Read More')</a>
                            <a href="{{route('user.login')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">@lang('Join Now')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('assets/img/carousel-2.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses{{__($content_1->data_values->subheading2)}}</h5>
                            <h1 class="display-3 text-white animated slideInDown">{{__($content_1->data_values->heading2)}}</h1>
                            <p class="fs-5 text-white mb-4 pb-2">{{__($content_1->data_values->paragraph2)}}</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

