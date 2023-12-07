@php
    $content = getContent('about.content',true);
    $elements = getContent('about.element',false,6);
        #getContent('data_key','singleQuery true/false','limit');
@endphp

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3"> {{__($content->data_values->subheading)}}</h6>
                <h1 class="mb-4">{{__($content->data_values->heading)}}</h1>
                <p class="mb-4">{{__($content->data_values->description)}}</p>

                <div class="row gy-2 gx-4 mb-4">
                    @foreach($elements as $element)
                        <div class="col-sm-6">
                            <p class="mb-0">{!! $element->data_values->icon!!} {{__(@$element->data_values->title)}}</p>
                        </div>
                    @endforeach


                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="javascript:void(0)">@lang('Read More')</a>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{getImage(getFilePath('frontend').'/about/' . @$content->data_values->about_image)}}" alt="" style="object-fit: cover;">
                </div>
            </div>

        </div>
    </div>
</div>
