<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionStoreRequest;
use App\Question;
use App\Answer;
use App\User;
use Validator;

class QuestionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index' , 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $questions = Question::all();
        return view ('questions.index' , compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        
        return view ('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        
        

        auth()->user()->questions()->create($request->all());
        return redirect('questions/')->with('message' , 'Question posted');

        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        
        $userAsked = $question->user;

        return view('questions.show' , compact('question' , 'userAsked' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit' , compact ('question') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update(['title'=> $request->title , 'text'=> $request->text ]);
        return redirect()->route('questions.show', ['question' => $question->id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->answers->each->delete();
        $question->delete();

        return redirect('questions/');


    }

    public function addAnswer (Request $request, $id)
    {
        foreach ($request->answer as $answer){

            $userId= auth()->user()->id;
           

            Answer::create(['body'=> $answer , 'user_id'=> $userId , 'question_id'=>$id]);
            return redirect()->back();

        }

    }    

        public function updateAnswer (Request $request, $id)
    {
        
        
        Answer::where('id' , $id)->update(['body'=> $request->body]);
        return redirect()->back();



        
    }
}
