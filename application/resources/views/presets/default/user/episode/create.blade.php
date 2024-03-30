@extends($activeTemplate.'layouts.master')
@section('content')

<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <h5 class="text-secondary">@lang('Create New Episode')</h5>
                    <div class="card mt-3">
                        <form action="{{route('user.episode.store')}}" class="text-secondary" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course_id}}">
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
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-sm btn-primary w-100">@lang('Create Episode')</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
