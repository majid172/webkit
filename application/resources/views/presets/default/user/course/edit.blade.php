@extends($activeTemplate.'layouts.master')
@section('content')

<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <h5 class="text-secondary">@lang('Update Course')</h5>
                    <div class="card mt-3">
                        <form action="{{route('user.course.update',$course->id)}}" class="text-secondary" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row mb-2 px-3 py-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="mb-1">@lang('Title')</label>
                                        <input type="text" name="title" class="form-control" value="{{__($course->title)}}" id="title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category" class="mb-1">@lang('Category')</label>
                                        <select type="text" name="category_id" class="form-control" placeholder="Choose category" id="category">

                                            @foreach ($categories as $item)
                                                <option value="{{$item->id}}" class="text-primary">{{ucwords($item->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 px-3 py-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="mb-1">@lang('Price')</label>
                                        <input type="number" name="price" class="form-control" placeholder="ex.10.00 USD" value="{{getAmount($course->price)}}" id="price">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="course_img" class="mb-1">@lang('Course Image')</label>
                                        <input type="file" name="course_img" class="form-control" placeholder="Choose image" id="course_img">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2 px-3 py-2">
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn  btn-primary w-100">@lang('Update Now')</button>
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
