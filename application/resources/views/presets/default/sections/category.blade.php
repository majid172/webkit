@php
    $content = getContent('category.content',true);
    $categories = App\Models\Category::with('course')
                    ->latest()->inRandomOrder()->get();

    
@endphp

<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">{{__($content->data_values->subheading)}}</h6>
            <h1 class="mb-5">{{__($content->data_values->heading)}}</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-12 col-md-6">
                    <div class="row g-3">
                        @foreach($categories as $category)
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="{{route('allcourses',$category->id)}}">
                                <img class="img-fluid" src="{{getImage(getFilePath('category').'/' . @$category->path .'/'. @$category->image )}}" alt="{{$category->image}}">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">{{ucwords($category->name)}}</h5>
                                    <small class="text-primary">{{$category->course->count()}} @lang('Courses')</small>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
