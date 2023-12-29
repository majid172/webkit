<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Episode;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function list()
    {
        $pageTitle = 'Course lists';
        $creator = auth()->user();
        $courses = Category::where('creator_id',$creator->id)->paginate(getPaginate());
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
