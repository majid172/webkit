@extends($activeTemplate.'layouts.frontend')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{ __($pageTitle) }}</h6>
                
            </div>
            <div class="row mt-4 g-4">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="shadow p-3 mb-5 bg-body rounded">
                        <div class="px-5 py-5">{!!$policy->data_values->details!!}</div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .wyg h1, h2, h3, h4{
        color:#383838;
    }
    .wyg strong{
        color:#383838
    }
    .wyg p{
        color: #666666
    }
    .wyg ul{
        margin-left: 40px
    }
    .wyg ul li{
        list-style-type: disc;
        color: #666666
    }
    .section-title{
        font-size: 30px;
        margin-bottom: 0;
    }
</style>
@endpush
