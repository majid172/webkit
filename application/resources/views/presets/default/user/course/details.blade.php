@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <video width="100%" controls autoplay>
                        <source src="{{getImage(getFilePath('episode').'/' . @$details->file_path .'/'. @$details->file)}}" type="video/mp4">
                    </video>
                    <p class="text-secondary p-3">{{__($details->description)}}</p>
                </div>

                <div class="shadow p-3 mb-5 bg-body rounded">
                    <h5 class="text-primary">@lang('Related Episodes') ({{$relateds->count()}})</h5>
                    <div class="row mt-4 justify-content-center">
                        @forelse ($relateds as $item)
                        <div class="col-4">
                            <div class="shadow p-3 mb-3 bg-body rounded">
                                <video width="100%">
                                    <source src="{{getImage(getFilePath('episode').'/' . @$item->file_path .'/'. @$item->file)}}" type="video/mp4">
                                </video>
                                <div class="title">
                                    <h5 class="text-primary">{{__($item->title)}}</h5>
                                </div>   
                            </div>
                        </div>
                        @empty
                            
                        @endforelse
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection