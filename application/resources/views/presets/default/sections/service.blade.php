@php
    $services = getContent('service.element',false,4);
       #getContent('data_key','singleQuery true/false','limit');
@endphp
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($services as $item)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            {!!$item->data_values->service_icon  !!}
{{--                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>--}}
                            <h5 class="mb-3">{{__($item->data_values->title)}}</h5>
                            <p>{{__($item->data_values->description)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>
