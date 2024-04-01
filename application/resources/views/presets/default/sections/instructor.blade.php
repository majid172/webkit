@php
    $content = getContent('instructor.content',true);
    if(request()->url() == url('/').'/instructors'){
        $instructors = App\Models\User::where('user_type',1)->inRandomOrder()->get();
    }else{
        $instructors = App\Models\User::where('user_type',1)->inRandomOrder()->limit(3)->get();
    }
@endphp
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">{{_($content->data_values->subheading)}}</h6>
            <h1 class="mb-5">{{__($content->data_values->heading)}}</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($instructors as $instructor)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{getImage(getFilePath('instructor').'/' . @$instructor->img_path .'/'. @$instructor->instructor_img )}}" alt="{{@$instructor->instructor_image}}">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="{{(isset($instructor->social_link) && isset($instructor->social_link->fb)) ? $instructor->social_link->fb : 'javascript:void(0)'}}"><i
                                    class="fab
                            fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="{{(isset($instructor->social_link) &&
                             isset($instructor->social_link->twitter)) ? $instructor->social_link->twitter : 'javascript:void(0)'}}"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="{{(isset($instructor->social_link) &&
                             isset($instructor->social_link->linkedin)) ? $instructor->social_link->linkedin :
                             'javascript:void(0)'}}"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0"> @if (isset($instructor->firstname))
                                <a href="{{route('instructor.details',$instructor->id)}}" class="text-primary">{{ucfirst($instructor->firstname)}} {{$instructor->lastname}}</a>
                            @else
                                <a href="{{route('instructor.details',$instructor->id)}}" class="text-primary">{{ucfirst($instructor->username)}}</a>
                            @endif</h5>
                            <small>{{ ucfirst($instructor->designation) ?? 'Empty Designation' }}</small>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

