<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    
    public function update (Request $request , $id)
    {
        
        $request->validate([
            
            'body' => ['required']
        ]);
        
        Comment::where('id' , $id )->update(['body'=> $request->body]);
        return redirect()->back()->with('message' , 'Comment updated');
   
    }

    public function destroy( Comment $comment )
    {
        $comment->delete();
        return redirect()->back()->with('message' , 'Comment Deleted');


    }
}
