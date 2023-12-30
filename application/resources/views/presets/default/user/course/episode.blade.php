@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <ul class="list-group list-group-flush">
                        @forelse ($episodes as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start py-3">
                            <div class=" ms-2 me-auto"> 
                                <div class="fw-bold"><a href="{{ route('user.course.episode.details', ['category_id'=>$item->category_id,'ep_id'=>$item->id]) }}" class="text-primary">{{ucfirst($item->title)}}</a></div>
                                <a href="{{ route('user.course.episode.details', ['category_id'=>$item->category_id,'ep_id'=>$item->id]) }}" class="text-secondary">{{Str::limit($item->description, 80, '...')}}</a>
                            </div>
                            <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                      
                        @empty
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           @lang('No episodes available')
                        </li>
                        @endforelse
                    
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection