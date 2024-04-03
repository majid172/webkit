@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @forelse ($episodes as $item)
                        @php
                            $duration = '';
                            $path = (getFilePath('episode').'/' . @$item->file_path .'/'. @$item->file);
                            $file = $getID3->analyze($path);
                            if (isset($file['playtime_seconds'])) {
                                $playtime_seconds = (int)$file['playtime_seconds']; // Convert to integer
                                $duration = date('H:i:s', $playtime_seconds);
                            }
                        @endphp
                        <div class="shadow p-3 mb-3 bg-body rounded">
                            <div class="accordion-item ">
                                <h2 class="accordion-header" id="flush-heading_{{$item->id}}">
                                    <button class="accordion-button collapsed fw-bold text-secondary" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{$item->id}}" aria-expanded="false" aria-controls="flush-collapse_{{$item->id}}">
                                        <a href="{{route('user.episode.details',$item->id)}}" class="text-primary">
                                            <i class="las la-play-circle text-primary fs-1"></i> </a> {{ucfirst
                                        ($item->title)}}

                                            <span
                                                class="badge bg-primary mx-3"
                                            >{{
                               empty($duration)?'00:00:00': $duration}}</span>

                                    </button>
                                </h2>

                                <div id="flush-collapse_{{$item->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-heading_{{$item->id}}"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{$item->description}}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="shadow-none py-5 mb-5 bg-light rounded ">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/images/empty.png')}}" alt="no_episode" class="img-fluid">
                            </div>
                            <h6 class="text-center text-secondary">@lang('No episodes are available')</h6>
                        </div>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
