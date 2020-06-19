<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    
    public function store (Request $request, $id){        
        
        $request->validate([
            
            'body' => ['required']
        ]);

        $userId= auth()->user()->id;
        Comment::create(['body'=> $request->body,  'user_id'=>$userId , 'answer_id'=>$id  ]);
        return redirect()->back()->with('message' , 'comment posted');

    }  
    
    public function update (Request $request , $id){
        
        $request->validate([
            
            'body' => ['required']
        ]);
        
        Comment::where('id' , $id )->update(['body'=> $request->body]);
        return redirect()->back()->with('message' , 'Comment updated');
   
    }

    public function destroy( Comment $comment ){

        $comment->delete();
        return redirect()->back()->with('message' , 'Comment Deleted');
    }

}
