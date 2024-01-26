<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function details($id)
    {
        $pageTitle = "Instructor Details";
        $instructor = User::with('course')->findOrFail($id);

        return view($this->activeTemplate . 'instructor_details', compact('pageTitle','instructor'));
    }
}
