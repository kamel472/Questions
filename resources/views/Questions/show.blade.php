@extends('layouts.questions')

@section('body')

<!--/.Card-->

    <!--Card-->
    <div class="card mb-4 wow fadeIn">

    <!--Card content-->
    
    <div  class="card-body text-center text-md-left ml-md-3 ml-0">
    
    <div class="row">

    <div class="col-10">
    <p class="h5 ">{{$question->title}}</p>
    <p>{{$question->text}}</p>
    <small >
        <a href="{{route('users.show' , $question->user_id)}}"> 
         <img src="{{ asset('storage/images/'.$question->user->avatar) }}" alt="image" style="width:20px;">
         {{ $question->user->name}}</a></small>
    </div>
    @if(auth()->user())
    @if($question->user_id == auth()->user()->id)

    <div class="col-1">
    <a href="{{route('questions.edit', $question->id)}}" style="color: orange; " >
        <span class="fas fa-edit"></span></a>
    </div>

    
    <div class="col-1">
    <form  method="post" action="{{route('questions.destroy', $question->id)}}" id="question-destroy">
    @csrf
    @method('delete')
    <span class="fas fa-trash" style="color: red; cursor: pointer;"
    onclick="event.preventDefault();
        if(confirm('Do you really want to delete?')){
            document.getElementById('question-destroy')
        .submit() }"></span>
        </form>
        </div>

    
    @endif 
    @endif    
    
  </div>
    
    </div>
    </div>
    <!--/.Card-->

    <!--Comments-->
    <div class="card card-comments mb-3 wow fadeIn">
    <div class="card-header font-weight-bold">Answers</div>
    <div class="card-body" >
    <div class="media d-block d-md-flex ">
    <div class="media-body text-center text-md-left ml-md-3 ml-0">
    @foreach($question->answers as $answer)    

                            
    <div class="row" style="border-bottom: 1px solid #D3D3D3; padding:25px;" >

    <div class="col-10" >
    <p>{{$answer->body}}</p>
    <small >
        <a href="{{route('users.show' , $answer->user_id)}}"> 
         <img src="{{ asset('storage/images/'.$answer->user->avatar) }}" alt="image" style="width:20px;">
         {{ $answer->user->name}}</a></small>
    </div>

    @if($answer->user->id == auth()->user()->id)

    <div class="col-1">
    <a href="" style="color: orange; " >
        <span class="fas fa-edit"></span></a>
    </div>

    <div class="col-1">
    <form  method="post" action="{{route('answers.destroy' , $answer->id)}}"
    id="answer-destroy">
    @csrf
    @method('delete')
    <span class="fas fa-trash" style="color: red; cursor: pointer;"
    onclick="event.preventDefault();
    if(confirm('Do you really want to delete?')){
        document.getElementById('answer-destroy')
    .submit() }"></span>
    </form>
    </div>
    @endif
    </div>
    @endforeach
    <!-- Quick Reply -->
    
    <div class="form-group mt-4" >
    @if(auth()->user())
    <form action="{{route('questions.addAnswer' , $question->id)}}" method="post">
    @csrf
    <label for="quickReplyFormComment">Your Answer</label>
    <textarea class="form-control" id="quickReplyFormComment" rows="5" name="answer[]" required></textarea>

    <div class="text-center">
        <button class="btn btn-info btn-sm" type="submit" >Post</button>
    </div>
    </form>
    @else
    <h4> Sign in to post an answer</h4>
    @endif
    </div>
    


    <div class="media d-block d-md-flex mt-3">
                                    
                                    
    </div>
    </div>
    </div>
                        

    </div>
    </div>
    <!--/.Comments-->
    @endsection






