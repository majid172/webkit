@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                @if (auth()->user()->user_type)
                <div class="text-end mb-3">
                    <a class="btn btn-sm btn-primary" href="{{route('user.episode.create',$course_id)}}">
                        <i class="las la-plus me-2"></i>@lang('Create Episode')
                    </a>
                </div>
                @endif

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @forelse ($episodes as $item)
                            @php
                                $duration = ''; // Initialize duration variable
                                $path = (getFilePath('episode').'/' . @$item->file_path .'/'. @$item->file);
                                $file = $getID3->analyze($path);

                                // Check if 'playtime_seconds' key exists in the $file array
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
                                            <i class="las la-play-circle text-primary fs-1"></i><a href="{{route('user.episode.details',$item->id)}}" class="text-primary">  {{ucfirst($item->title)}} <span
                                                    class="badge bg-primary mx-3"
                                                >{{
                               $duration }}</span></a>
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
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            @lang('No episodes are available')
                                        </button>
                                    </h2>
                                </div>
                            </div>

                        @endforelse
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
    <style>
        .show{
            width: 100% !important;
        }
    </style>
@endpush
