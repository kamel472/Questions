<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    
    
    
    
    public function destroy( Answer $answer )
    {
        $answer->delete();
        return redirect()->back();


    }
}
