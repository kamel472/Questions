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
        $answer->likes->each->delete();
        $answer->delete();
        return redirect()->back()->with('message' , 'Answer Deleted');


    }

    public function addComment (Request $request, $id)
    {
        
        $request->validate([
            
            'body' => ['required']
        ]);

        $userId= auth()->user()->id;
        Comment::create(['body'=> $request->body,  'user_id'=>$userId , 'answer_id'=>$id  ]);
        return redirect()->back()->with('message' , 'comment posted');

        

    }    

        public function updateComment (Request $request, $id)
    {
        $request->validate([
            
            'body' => ['required']
        ]);
        
        Comment::where('id' , $id)->update(['body'=> $request->body]);
        return redirect()->back()->with('message' , 'Comment updated');
   
    }

    /**public function postLike (Request $request)
    {
        $answerId = $request['answerId'];
        $isLike = $request['isLike']===true;
        $update = false;
        $answer = Answer::find($answerId);

        if(!$answer){
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()->where('answer_id' , $answerId)->first();

        if($like){

            $alreadyLike = $like->like;
            $update=true;

            // if I clicked like

            if ($alreadyLike == $isLike ){

                $like->delete();
                return null;

            }

        }else{

            $like = New Like();
        }

        $like->like = $isLike;
        $like->user_id = $user->id;
        $like->answer_id = $answer->id;

        if ($update){
            
            $like->update();
        }else{
            $like->save();
        }

        return null;

        
   
    }**/



}
