@extends($activeTemplate.'layouts.master')
@section('content')

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
                            <div class="border border-primary mb-3 bg-body shadow rounded">
                                <video width="100%">
                                    <source src="{{getImage(getFilePath('episode').'/' . @$item->file_path .'/'. @$item->file)}}" type="video/mp4">
                                </video>
                                <div class="title px-3 py-2">
                                    <h5 class="text-primary">{{Str::limit($item->title,15, '...')}}</h5>
                                    <p class="text-secondary">{{Str::limit($item->description,60)}}</p>
                                </div>
                                <div class="px-3 pb-3">
                                    <a class="btn btn-primary" href="{{ route('user.course.episode.details', ['category_id'=>$item->category_id,'ep_id'=>$item->id]) }}">@lang('See More')</a>
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
