<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Comment;

class AnswerController extends Controller
{
    
    
    
    
    public function destroy( Answer $answer )
    {
        $answer->comments->each->delete();
        $answer->delete();
        return redirect()->back();


    }

    public function addComment (Request $request, $id)
    {
        
        
        $userId= auth()->user()->id;
        Comment::create(['body'=> $request->body,  'user_id'=>$userId , 'answer_id'=>$id  ]);
        return redirect()->back();

        

    }    

        public function updateComment (Request $request, $id)
    {
        
        
        Comment::where('id' , $id)->update(['body'=> $request->body]);
        return redirect()->back();
   
    }



}
