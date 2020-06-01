@extends('layouts.questions')

@section('body')

<div class="container" style="padding:15px; background:#B2BABB; ">
  <div class="row">
    <div class="col-9">
    <h4 >{{$question->title}} </h4>
    </div>
    @if(auth()->user())
    @if($question->user_id == auth()->user()->id)
    <div class="col-3">
    <form  method="post" action="{{route('questions.destroy', $question->id)}}">
        @csrf
        @method('delete')
        <input type="submit" class="btn btn-danger" value=" Delete Question">
        </form>
    @endif 
    @endif    
    

    
    </div>
  </div>
</div>



<div class="container" style="padding-top:15px;" >

  <div class="row" style="padding:10px;">
  
    <div >
<p>{{$question->text}}<p>
</div>
  </div>
</div>

<div class="container" style="padding-top:15px;" >

  <div class="row" style="padding:10px;">
  
    <div >
<span>{{$userAsked->name}}</span>
</div>
  </div>
</div>

<div class="container" style="padding:10px; background:#B2BABB; ">
  <div class="row">
    <div class="col-9">
@foreach($question->answers as $answer)    
<p>{{$answer->body}}<p>
<p>{{$answer->user->name}}<p>
<br>
@if($answer->user->id == auth()->user()->id)
<div class="col-3">
    <form  method="post" action="">
        @csrf
        @method('delete')
        <input type="submit" class="btn btn-danger" value=" Delete Answer">
        </form>
    </div>
  </div>
</div>
@endif
<br>
@endforeach
</div>
</div>
</div>

<div class="card-body">
        <form action="{{route('questions.update' , $question->id)}}" method="post">
    @csrf
    @method('patch')
    <div class="container" style=" padding-left:30px; padding-top:5px;">
        
        <div style="padding-left:30px; padding-bottom:20px;">
        <textarea name="answer[]" placeholder="body"></textarea>
        </div>
        <div style="padding-left:30px; padding-bottom:20px;">
        <input type="submit" value="Post you answer">
        </div>
        </form>


<a class="btn btn-secondary" href="{{route('questions.index')}}" role="button">Back</a> 
@endsection


