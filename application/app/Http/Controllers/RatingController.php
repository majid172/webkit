<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
       $rating = new Rating();
       $rating->course_id = $request->course_id;
       $rating->user_id = auth()->user()->id;
       $rating->rating = $request->rating;
       $rating->save();
       return response()->json(['message' => 'Rating saved successfully']);
    }
}
