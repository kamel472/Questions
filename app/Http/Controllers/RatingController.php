<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function create(request $request){

        $answerId = $request->answer_id;
        $rating = $request->ratings;
        $userId = Auth()->user()->id;
    
        $rating = Rating::updateOrCreate(
            ['answer_id' => $answerId, 'user_id' => $userId],
            ['rating' => $rating]
        );

        return ('You Rating Is Saved');

    }
}
