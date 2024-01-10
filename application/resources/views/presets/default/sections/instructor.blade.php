@php
    $content = getContent('instructor.content',true);
    $instructors = App\Models\User::where('user_type',1)->inRandomOrder()->limit(3)->get();
@endphp
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">{{_($content->data_values->subheading)}}</h6>
            <h1 class="mb-5">{{__($content->data_values->heading)}}</h1>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($instructors as $instructor)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        @if (isset($instructor->image))
                        <img class="img-fluid" src="img/team-1.jpg" alt="">
                        @else 
                        <div class="no-image-container">
                            {{ucwords(substr($instructor->fullname,1,2))}}
                        </div>
                        @endif
                        
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">
                            @if (isset($instructor->firstname))
                            {{ucfirst($instructor->firstname)}} {{$instructor->lastname}}
                            @else 
                            {{ucfirst($instructor->username)}}
                            @endif
                        </h5>
                        <small>{{ucfirst($instructor->designation)}}</small>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</div>
