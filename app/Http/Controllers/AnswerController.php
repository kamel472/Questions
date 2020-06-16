<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Comment;

class AnswerController extends Controller
{
    
    
    public function update (Request $request, Answer $answer) {

        $request->validate([
            'body' => ['required']
        ]);

        $answer->update(['body'=> $request->body]);
        return redirect()->back()->with('message' , 'Answer updated '); 
    }
    
    public function destroy( Answer $answer ){
        $answer->ratings->each->delete();
        $answer->comments->each->delete();
        $answer->likes->each->delete();
        $answer->delete();
        return redirect()->back()->with('message' , 'Answer Deleted');


    }

    public function addComment (Request $request, $id){        
        $request->validate([
            
            'body' => ['required']
        ]);

        $userId= auth()->user()->id;
        Comment::create(['body'=> $request->body,  'user_id'=>$userId , 'answer_id'=>$id  ]);
        return redirect()->back()->with('message' , 'comment posted');

    }    

        
}