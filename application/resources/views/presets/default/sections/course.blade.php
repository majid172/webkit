{{-- @php
$content = getContent('course.content',true);
$categories = \App\Models\Category::with('categoryDetails','categoryDetails.episodes')->limit(4)->get();


// foreach ($categories as $category) {
//     foreach ($category->category_details as $detail) {
//         $creatorId = $detail['creator_id'];
//         $categoryId = $detail['category_id'];

//         // Check if the combination of creator_id and category_id are set
//         if (isset($creatorId, $categoryId)) {
//             // Check if the combination of creator_id and category_id already exists
//             $key = $creatorId . '_' . $categoryId;

//             if (!isset($group[$key])) {
//                 $group[$key] = [
//                     'creator_id' => $creatorId,
//                     'category_id' => $categoryId,
//                     'details' => []
//                 ];
//             }

//             // Add the current detail to the array under the specific combination
//             $group[$key]['details'][] = $detail;
//         } else {
//             // Handle the case where creator_id or category_id is not set
//             // You may want to log or handle this situation differently
//         }
//     }
// }

// dd($categories->toArray());
@endphp
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">{{__($content->data_values->subheading)}}</h6>
            <h1 class="mb-5">{{__($content->data_values->heading)}}</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse ($categories as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0"></h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h5 class="mb-4">{{ucwords($item->name)}}</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>@lang('Admin')</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>Students</small>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
            
           
        </div>
    </div>
</div> --}}
