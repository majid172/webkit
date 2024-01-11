@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @forelse ($courses as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">@lang('Read More')</a>
                            <a href="{{route('user.login')}}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">@lang('Join Now')</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h5 class="mb-4"><a href="{{route('allEpisodes',$item->id)}}" class="text-secondary">{{ucwords($item->title)}}</a></h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{optional($item->creator)->fullname}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>@lang('Episode')  ({{optional($item->episodes)->count()}})</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>@lang('Students') ({{optional($item->subscription)->count()}})</small>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
            
           
        </div>
    </div>
</div>
@endsection