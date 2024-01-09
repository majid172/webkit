<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Episode;
use App\Models\GatewayCurrency;
use App\Models\Subscription;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function list()
    {
        $pageTitle = 'Course lists';
        $user = auth()->user();
        if($user->user_type == 1)
        {
            $courses = Category::with('categoryDetails.episodes' )
                        ->whereHas('categoryDetails',function($query) use($user){
                            $query->where('creator_id',$user->id);
                        })
                        ->get();
        }
        else{
            $courses = Category::where('is_subscribed',1)
                        ->with('categoryDetails.episodes','subscription')
                        ->whereHas('subscription',function($q) use ($user){
                            $q->where('user_id',$user->id);
                        })->get();
            
        }
       
        // dd($courses->toArray());
        return view($this->activeTemplate.'user.course.list',compact('courses','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function episodeList($category_id)
    {
        $pageTitle = "Episode Lists";
        $episodes = Episode::where('category_id',$category_id)->with('category')->get();
        
        return view($this->activeTemplate.'user.course.episode',compact('pageTitle','episodes'));
    }

    public function details($category_id,$ep_id)
    {
        $pageTitle = "Episode Details";
        $user = auth()->user();
        $is_subscribe = Subscription::where(['category_id'=>$category_id,'user_id'=>$user->id])->first();
        if(!$is_subscribe)
        {
            return $this->subscribe($category_id,$user);
        }
        
        $details = Episode::where(['id' => $ep_id])->with('category')->first();
        $relateds = Episode::where('id','!=',$ep_id)->where('category_id',$category_id)->with('category')->limit(3)->get();
        return view($this->activeTemplate.'user.course.details',compact('pageTitle','details','relateds'));
    }

    /**
     * Display the specified resource.
     */
    public function subscribe($category_id,$user)
    {
        $pageTitle = "Course Subscription";
        $category = Category::where('id',$category_id)->first();
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        return view($this->activeTemplate.'user.course.subscribe',compact('category','pageTitle','user','gatewayCurrency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
