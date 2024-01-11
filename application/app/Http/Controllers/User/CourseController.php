<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
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
            $courses = Course::where('creator_id',auth()->user()->id)->with('episodes')->get();
        }
        else{
            $courses = Course::with('episodes','subscription')
                        ->whereHas('subscription',function($q) use ($user){
                            $q->where('user_id',$user->id);
                        })->get();
        }
        return view($this->activeTemplate.'user.course.list',compact('courses','pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Create Course';
        $categories = Category::where('status',1)->get();
        return view($this->activeTemplate.'user.course.create',compact('pageTitle','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'course_img' => 'required'
        ]);
        $course = new Course();
        $course->title = $request->title;
        $course->category_id = $request->category_id;
        $course->creator_id = auth()->user()->id;
        $course->price = $request->price;
        if($request->hasFile('course_img')){
            try {
                $directory = date("Y")."/".date("m");
                $path      = getFilePath('course').'/'.$directory;
                $size = getFileSize('course');
                $file = fileUploader($request->course_img, $path,$size);
                $course->image = $file;
                $course->img_path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your episode file'];
                return back()->withNotify($notify);
            }
        }

        $course->save();
        $notify[] = ['success', $course->title . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);

    }
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
    public function allCourses($category_id)
    {
        $pageTitle = 'All Courses';
        $courses = Course::where('category_id',$category_id)->with('creator','episodes','subscription')->inRandomOrder()->get();
        return view($this->activeTemplate.'allcourses',compact('courses','pageTitle'));
    }

    public function edit($id)
    {
        $pageTitle = "Course Edit";
        $course = Course::findOrFail($id);
        $categories = Category::where('status',1)->get();
        return view($this->activeTemplate.'user.course.edit',compact('pageTitle','course','categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'course_img' => 'required'
        ]);
        $course = Course::findOrFail($id);
        $course->title = $request->title;
        $course->category_id = $request->category_id;
        $course->price = $request->price;
        if($request->hasFile('course_img')){
            try {
                $directory = date("Y")."/".date("m");
                $path      = getFilePath('course').'/'.$directory;
                $size = getFileSize('course');
                $file = fileUploader($request->course_img, $path,$size);
                $course->image = $file;
                $course->img_path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your episode file'];
                return back()->withNotify($notify);
            }
        }

        $course->save();
        $notify[] = ['success', $course->title . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
