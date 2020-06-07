<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function destroy( Comment $comment )
    {
        $comment->delete();
        return redirect()->back();


    }
}
