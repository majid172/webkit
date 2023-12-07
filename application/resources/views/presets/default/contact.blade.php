@php
    $contact = getContent('contact_us.content',true);
@endphp
@extends($activeTemplate.'layouts.frontend')
@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>{{__($contact->data_values->title)}}</h5>
                <p class="mb-4">{{__($contact->data_values->short_details)}}</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">@lang('Office')</h5>
                        <p class="mb-0">{{__($contact->data_values->contact_details)}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">@lang('Mobile')</h5>
                        <p class="mb-0">{{__($contact->data_values->contact_number)}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">@lang('Email')</h5>
                        <p class="mb-0">{{__($contact->data_values->email_address)}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb="{{ @$contact->data_values->latitude }},{{ @$contact->data_values->longitude }}
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>

            </div>
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form method="post" action="" class="verify-gcaptcha">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">@lang('Your Name')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">@lang('Your Email')</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">@lang('Subject')</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                <label for="message">@lang('Message')</label>
                            </div>
                        </div>
                        <x-captcha></x-captcha>
                        <div class="col-lg-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">@lang('Send Message')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
