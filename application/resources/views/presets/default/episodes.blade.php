@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <ul class="list-group list-group-flush">
                        @forelse ($episodes as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start py-3">
                            <div class=" ms-2 me-auto">
                                <div class="fw-bold">
                                    <a href="{{route('user.episode.details',$item->id)}}" class="text-primary">{{ucfirst($item->title)}}</a>

                                </div>
                                <p>
{{--                                    @php--}}
{{--                                        $path = (getFilePath('episode').'/' . @$item->file_path .'/'. @$item->file);--}}
{{--                                        $file = $getID3->analyze($path);--}}
{{--                                        $duration = date('H:i:s', $file['playtime_seconds']);--}}
{{--                                    @endphp--}}

{{--                                    <span class="badge bg-primary">@lang('Duration') - {{$duration}}</span>--}}

                                </p>
                                <a href="{{route('user.episode.details',$item->id)}}" class="text-secondary">{{Str::limit($item->description, 200, '...')}}</a>
                            </div>
                            <div>
                                <a href="{{route('user.episode.details',$item->id)}}"><i class="las la-play-circle text-primary fs-1"></i></a>
                            </div>


                        </li>

                        @empty
                            <li class="list-group-item d-flex justify-content-center align-items-center">
                                <div>
                                    <img src="{{asset('assets/images/no_episode.png')}}" alt="no_episode">
                                </div>
                                <p class="text-danger text-center">@lang('No episodes are available')</p>
                            </li>

                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
