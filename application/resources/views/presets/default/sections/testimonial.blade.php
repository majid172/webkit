@php
$content = getContent('testimonial.content',true);
$elements = getContent('testimonial.element',false,5);

    #getContent('data_key','singleQuery true/false','limit');
@endphp
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">{{__($content->data_values->subheading)}}</h6>
            <h1 class="mb-5">{{__($content->data_values->heading)}}</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            @foreach($elements as $key=>$element)
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{getImage(getFilePath('frontend').'/testimonial/' .@$element->data_values->testimonial_image )}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{__($element->data_values->title)}}</h5>
                    <p>{{__($element->data_values->subtitle)}}</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">{{__($element->data_values->description)}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
