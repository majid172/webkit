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

                                            <i class="las la-play-circle text-primary fs-1"></i><a href="{{route('user.episode.details',$item->id)}}" class="text-primary">  {{ucfirst($item->title)}}

                                                <span
                                                    class="badge bg-primary mx-3"
                                                >{{
                               empty($duration)?'00:00:00': $duration}}</span></a>
                                            @if (auth()->user()->user_type==1)

                                                    <i class="las la-pen edit" title="edit_episode"   data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-title="{{ucfirst($item->title)}}" data-description="{{$item->description}}" data-id="{{$item->id}}"></i>

                                            @endif
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

{{--    modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.episode.edit')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row mb-2 px-3 py-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="mb-1">@lang('Title')</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 px-3 py-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link" class="mb-1">@lang('Episode Link')</label>
                                <input type="text" class="form-control" name="file_link" placeholder="@lang('Episode link')" value="{{old('file_link')}}" id="link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file" class="mb-1">@lang('Episode Upload')</label>
                                <input type="file" class="form-control" name="file" value="{{old('file')}}" placeholder="@lang('File')" id="file">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 px-3 py-2">
                        <div class="col-md-12">
                            <label for="description" class="mb-1">@lang('Description')</label>
                            <textarea name="description" value="{{old('description')}}" id="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </div>
            </form>

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
@push('script')
    <script>
        $('.edit').on('click',function(){
            let id = $(this).data('id');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let modal = $('#staticBackdrop');
            modal.find('input[name="id"]').val(id);
            modal.find('input[name="title"]').val(title);
            modal.find('textarea[name="description"]').val(description);
            $('.modal-title').text("Title : "+title);
        })
    </script>
@endpush
