@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <video width="100%" controls autoplay>
                        <source src="{{getImage(getFilePath('episode').'/' . @$details->file_path .'/'. @$details->file)}}" type="video/mp4">
                    </video>
                    <p class="text-secondary p-3">{{__($details->description)}}</p>

                    <hr>
                    <h4 class="text-primary">@lang('Ratings')</h4>
                    <div class='row'>
                        <div class="rating left">
                        <div class="stars right">
                            @php
                                $maxRating = 5; 
                                $rating = App\Models\Rating::where([
                                        'course_id' => $details->course_id,
                                        'user_id' => auth()->user()->id
                                    ])->first();

                                $currentRating = $rating->rating; 
                                for ($i = 1; $i <= $maxRating; $i++) {
                                    $starClass = ($i <= $currentRating) ? 'rated' : '';
                                    echo "<a class='star $starClass' data-course_id='{$details->course_id}'></a>";
                                }
                            @endphp     
                            

                        </div>
                        </div>
                    </div>
                </div>
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <h5 class="text-primary">@lang('Related Episodes') ({{$relateds->count()}})</h5>
                    <div class="row mt-4 justify-content-center">
                        @forelse ($relateds as $item)
                        <div class="col-4">
                            <div class="border mb-3 bg-body shadow rounded">
                                <video width="100%">
                                    <source src="{{getImage(getFilePath('episode').'/' . @$item->file_path .'/'. @$item->file)}}" type="video/mp4">
                                </video>
                                <div class="title px-3 py-2">
                                    <h5 class="text-primary">{{Str::limit($item->title,15, '...')}}</h5>
                                    <p class="text-secondary">{{Str::limit($item->description,50)}}</p>
                                </div>   
                                <div class="px-3 pb-3">
                                    <a class="btn btn-primary" href="{{ route('user.episode.details',$item->id ) }}">@lang('See More')</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            
                        @endforelse
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
{{-- <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/rating.min.css')}}"> --}}
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>

        .rating .stars {
        margin-right: 15px;
        }

        .rating .stars .star {
        float: left;
        padding: 5px 2px;
        cursor: pointer;
        }

        .rating .stars .star:before {
        font-family: 'FontAwesome';
        content: '\f005';
        color: #d0e8f0;
        font-size: 1.8em;
        }

        .rating .stars .star:hover:before,
        .rating .stars .star.to_rate:before,
        .rating .stars .star.rated:before {
        color: #ecc012;;
        }

        .rating .stars .star.no_to_rate:before {
        color: #d0e8f0;
        }
    </style>
@endpush
@push('script')
<script>
    jQuery(document).ready(function($) {
        $('.rating .star').hover(function() {
            $(this).addClass('to_rate');
            $(this).parent().find('.star:lt(' + $(this).index() + ')').addClass('to_rate');
            $(this).parent().find('.star:gt(' + $(this).index() + ')').addClass('no_to_rate');
        }).mouseout(function() {
            $(this).parent().find('.star').removeClass('to_rate');
            $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate');
        }).click(function() {
            $(this).removeClass('to_rate').addClass('rated');
            $(this).parent().find('.star:lt(' + $(this).index() + ')').removeClass('to_rate').addClass('rated');
            $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate').removeClass('rated');
            /*Save your rate*/
            /*TODO*/
        });
});
</script>

<script>
    
    $('.star').on('click', function() {
        var rating = $(this).index() + 1;
        var course_id = $(this).data('course_id');
        
        $.ajax({
            url: "{{route('user.rating')}}",
            method: 'GET',
            data:{
                rating:rating,
                course_id:course_id,
                // _token: '{{ csrf_token() }}'
            }, 
            success: function(data) {
                console.log(data.rating.user_id);
               
            },
            error: function(xhr, status, error) {
                console.log('error');
            }
        });
    });
  
</script>

@endpush