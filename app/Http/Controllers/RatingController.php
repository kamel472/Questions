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
    

        if (Rating::where('answer_id', $answerId)->where('user_id' , $userId)->exists()) {
            
            Rating::where('answer_id', $answerId)
            ->where('user_id' , $userId)
            ->update(['answer_id'=> $answerId, 'user_id'=>$userId , 'rating'=> $rating ]);

        } 
        
        else { 
    
            Rating::create(['answer_id'=> $answerId , 'user_id'=>$userId , 'rating'=> $rating ]);
        } 

            return ('Rating Saved');
        }
}
