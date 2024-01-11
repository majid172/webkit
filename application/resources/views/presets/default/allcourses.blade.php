@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @forelse ($courses as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{getImage(getFilePath('course').'/' . @$item->img_path .'/'. @$item->image )}}" alt="{{@$item->image}}">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="{{route('allEpisodes',$item->id)}}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">@lang('View More')</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">@lang('Buy Now')</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">{{$general->cur_sym}}{{getAmount($item->price)}}</h3>
                        
                        <h5 class="mb-4">{{ucwords($item->title)}}</h5>
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