@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-4">
                <div class="shadow p-3 mb-2 bg-body rounded">
                    <div class="d-flex align-items-center px-2 pt-3">
                        <div class="profile-photo">
                            <img src="{{getImage(getFilePath('userProfile').'/' . @$instructor->img_path .'/'. @$instructor->image )}}" alt="{{@$instructor->image}}" class="rounded-circle" alt="Profile Picture" style="height: 80px; width:80px;">
                        </div>
                        <div class="mx-1">
                            <h6 class="mb-0">{{__($instructor->firstname)}} {{__($instructor->lastname)}}</h6>
                            <p> <span class="text-secondary">@</span>  {{__($instructor->username)}}</p>
                            <div class="ins_details">
                                <p class="text-secondary"><i class="las la-envelope"></i>   {{__($instructor->email)}}</p>
                                <p class="text-secondary"><i class="las la-phone-volume"></i> {{__($instructor->mobile)}}</p>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="tags mt-3">
                        <p class="text-secondary fw-bolder fs-6 mb-0"> <i class="las la-address-card"></i> @lang('Address Info')</p>
                        <ul class="custom-list text-secondary">
                            <li ><i class="las la-map-marker-alt"></i>
                            <p>
                                <small class="fw-bolder">@lang('Address'):</small> {{__(@$instructor->address->address)??'N/A'}},<small class="fw-bolder">@lang('City'):</small> {{__(@$instructor->address->city)??'N/A'}}, <small class="fw-bolder">@lang('Country'): </small> {{__(@$instructor->address->country)??'N/A'}}
                            </p>
                            </li>

                          </ul>
                    </div>
                    <hr>
                    <div class="tags mt-3">
                        <p class="text-secondary fw-bolder fs-6 mb-0"> <i class="las la-address-card"></i> @lang('Course Details')</p>
                        <ul class="custom-list text-secondary">
                            <li class="d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                   <i class="far fa-solid fa-book-open"></i> <div class="">@lang('Total Course')</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{@$instructor->course->count()}}</span>
                            </li>
                          </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row g-4">
                    @foreach($courses as $course)
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{getImage(getFilePath('course').'/' . @$course->img_path .'/'. @$course->image )}}" alt="{{@$course->image}}">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="{{route('allEpisodes',$course->id)}}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">@lang('View Episodes')</a> 
                                    <a href="{{ route('user.payment', ['amount' => $course->price, 'courseId' => $course->id]) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">@lang('Buy Now')</a>
        
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0 text-primary">{{$general->cur_sym}}{{getAmount($course->price)}}</h3>
                                <div class="mb-3">
                                    @php
                                        $total = 0;
                                        $count = $course->rating->count();
                                        $avg = 0;
        
                                        if ($count > 0) {
                                            foreach ($course->rating as $rating) {
                                                $total += $rating['rating'];
                                            }
                                            $avg = $total / $count;
                                        }
        
                                        $maxRating = 5;
                                        for ($i = 1; $i <= $maxRating; $i++) {
                                            $starClass = ($i <= $avg) ? 'fas fa-star text-warning' : 'far fa-star';
                                            echo "<small class='$starClass' data-course_id='{$course->id}'></small>";
                                        }
                                    @endphp
                                    <small>({{optional($course->rating)->count()}})</small>
                                </div>
                                <h5 class="mb-4">{{ucwords($course->title)}}</h5>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{optional($course->creator)->fullname}}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-play-circle text-primary me-2"></i>@lang('Episodes')  ({{optional($course->episodes)->count()}})</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>@lang('Students') ({{optional($course->subscription)->count()}})</small>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <style>
       .ins_details p{
        line-height: 0.8;
       }
       .custom-list {
            list-style: none;
            padding: 0;
        }

  .custom-list li {
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
    line-height: 1.6;
    margin-left: 20px;
  }

  .custom-list li i {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    margin-right: 10px; 
    color: #3498db; 
  }
    </style>
@endpush
