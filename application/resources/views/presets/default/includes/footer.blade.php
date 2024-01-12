@php
    $contact = getContent('contact_us.content',true);
    $pages = \App\Models\Page::get();
    $courses = \App\Models\Course::limit(6)->inRandomOrder()->get(); 
    $policyPages = getContent('policy_pages.element',false,null,true);
@endphp
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">@lang('Quick Link')</h4>
                @foreach($pages as $page)
                   @if ($page->slug == 'about')
                   <a class="btn btn-link" href="{{route('pages',$page->slug)}}">@lang('About Us')</a>
                   @endif
                @endforeach
                
                <a class="btn btn-link" href="{{route('contact')}}" >@lang('Contact Us')</a>
                @foreach($policyPages as $key => $data)       
                    <a class="btn btn-link" href="{{ route('policy.pages',[slug($data->data_values->title),$data->id]) }}">{{__($data->data_values->title)}}</a>
                @endforeach
                
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">@lang('Contact')</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{__($contact->data_values->contact_details)}}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{__($contact->data_values->contact_number)}}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{__($contact->data_values->email_address)}}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">@lang('Gallery')</h4>
                <div class="row g-2 pt-2">
                    @foreach ($courses as $item)
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{getImage(getFilePath('course').'/' . @$item->img_path .'/'. @$item->image )}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">@lang('Newsletter')</h4>
                <p>@lang('Dolor amet sit justo amet elitr clita ipsum elitr est.')</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">@lang('Subscribe')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6  text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{route('home')}}" >{{$general->siteName(__($pageTitle))}}</a>, {!! $contact->data_values->website_footer !!}
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{route('home')}}">@lang('Home')</a>
                        <a href="{{route('cookie.policy')}}">@lang('Cookies')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
