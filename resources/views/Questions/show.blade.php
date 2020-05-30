@extends('layouts.questions')

@section('body')
<div class="container" style="padding:10px; background:#B2BABB; ">
  <div class="row">
    <div class="col-9">
<h2>{{$question->title}}<h1>
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

<div class="container" style="padding:10px; background:#B2BABB; ">
  <div class="row">
    <div class="col-9">
@foreach($question->answers as $answer)    
<p>{{$answer->body}}<p>
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


