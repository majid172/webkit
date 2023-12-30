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
                    <h5 class="text-primary">@lang('Related Episodes') (03)</h5>
                    <div class="row mt-4">
                        <div class="col-4">
                            <div class="shadow p-3 mb-3 bg-body rounded">
                                <video  width="100%"></video>
                                fsdf    
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="shadow p-3 mb-3 bg-body rounded">
                                <video  width="100%"></video>
                                fsdf
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="shadow p-3 mb-3 bg-body rounded">
                                <video  width="100%"></video>
                                fsdf
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection