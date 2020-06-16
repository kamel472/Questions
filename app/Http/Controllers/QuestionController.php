<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionStoreRequest;
use App\Question;
use App\Answer;
use App\User;
use App\Comment;
use Validator;


class QuestionController extends Controller
{

public function __construct()
{
$this->middleware('auth')->except('index');
}

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index(request $request)


{  
    $questionsCount = Question::all()->count();
    
if($request->query('arrange') == 'mostAnswered'){
    
    $questions = Question::withCount('answers')->orderBy('answers_count', 'desc')
    ->paginate(1)->withPath('questions?arrange=mostAnswered');
    return view ('questions.index' , compact('questions' , 'questionsCount'));

} 

elseif ($request->query('arrange') == 'mostRecent'){

    $questions = Question::orderBy('created_at', 'desc')->paginate(1)
    ->withPath('questions?arrange=mostRecent');
    return view ('questions.index' , compact('questions' , 'questionsCount'));
    
}

else{

    $questions = Question::orderBy('created_at', 'desc')->paginate(1);
    return view ('questions.index' , compact('questions' , 'questionsCount'));
    
}
    
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

    $request->validate([
        'title' => ['required', 'max:100'],
        'text' => ['required']
    ]);

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
    $answers= $question->answers()->paginate(5);
    return view('questions.show' , compact('question' , 'userAsked' , 'answers'  ));
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

    $request->validate([
        'title' => ['required', 'max:100'],
        'text' => ['required']
    ]);
    $question->update(['title'=> $request->title , 'text'=> $request->text ]);
    return redirect()->route('questions.show', ['question' => $question->id])
    ->with('message' , 'Question updated '); 
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy(Question $question)
{

foreach ($question->answers as $answer){
    $answer->likes->each->delete();
    $answer->ratings->each->delete();
    $answer->comments->each->delete();
}

    $question->answers->each->delete();
    $question->delete();

    return redirect('questions/')->with('message' , 'Question deleted');


}

public function addAnswer (Request $request, $id)
{
foreach ($request->answer as $answer){


    $userId= auth()->user()->id;
    Answer::create(['body'=> $answer , 'user_id'=> $userId , 'question_id'=>$id , 
    'approved'=>0 , 'rating'=>0]);
    return redirect()->back()->with('message' , 'Answer Added');

}

}    



}
