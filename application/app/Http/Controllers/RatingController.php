<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $exist = Rating::where([
                    'course_id' => $request->course_id,
                    'user_id' => auth()->user()->id
                ])->first();

        if ($exist) {
            $rating = $exist;
        } else {
            $rating = new Rating();
        }
        if($request->creator_id != auth()->user()->id)
        {
            $rating->course_id = $request->course_id;
            $rating->user_id = auth()->user()->id;
            $rating->rating = $request->rating;
            $rating->save();

        }
        return 'ok';
        // return response()->json(['rating' => $rating]);

    }
}
