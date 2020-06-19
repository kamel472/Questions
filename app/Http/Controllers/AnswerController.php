<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Comment;

class AnswerController extends Controller
{
    
    public function store (Request $request, $id){
    
        $request->validate([
            'body' => ['required']
        ]);

    $userId= auth()->user()->id;

    Answer::create(['body'=> $request->body , 'user_id'=> $userId , 'question_id'=>$id , 
    'approved'=>0 , 'rating'=>0]);
    return redirect()->back()->with('message' , 'Answer Added');

    }  

    public function update (Request $request, Answer $answer) {

        $request->validate([
            'body' => ['required']
        ]);

        $answer->update(['body'=> $request->body]);
        return redirect()->back()->with('message' , 'Answer updated '); 
    }
    
    public function destroy( Answer $answer ){
    
        $answer->delete();
        return redirect()->back()->with('message' , 'Answer Deleted');

    }
       
}