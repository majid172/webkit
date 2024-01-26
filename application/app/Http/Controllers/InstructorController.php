<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function details($id)
    {
        $pageTitle = "Instructor Details";
        $instructor = User::with('course')->find($id);
        $courses = Course::where('creator_id',$id)->with('episodes','creator','subscription','rating')->get();
        return view($this->activeTemplate . 'instructor_details', compact('pageTitle','instructor','courses'));
    }
}
