@extends('layouts.questions')

@section('body')

<div class="card mb-4 wow fadeIn" style="width:800px; margin:0 auto;">
<div class="card-header" style=" padding-bottom:2px;" >
<div class="row">
<div class="col-8">
<h3 style="font-family:Impact;">Questions</h3>
<p >{{$questionsCount}} Questions Asked</p>
</div>
<div class="col-4">
<a class="btn btn-primary btn-sm" href="questions?arrange=mostAnswered" role="button">Most Answered</a>
<a class="btn btn-primary btn-sm" href="questions?arrange=mostRecent" role="button">Most Recent</a>
</div>
</div>
</div>
<x-alert/>

<!-- Questions-->
<div class="card-body" >
@foreach ($questions as $question)
<div style="border-bottom: 1px solid #D3D3D3; padding:5px;" >
<small >Asked By:
<a href="{{route('users.show' , $question->user_id)}}"> 
{{ $question->user->name}}</a></small>
<br><br>
<a href="{{route('questions.show' , $question->id)}}">    
<p class="h4 " style="font-family:Arial;color:black;font-weight:bold;">{{ $question->title}}</p>
<p style="font-family:Arial;color:black;">
{{\Illuminate\Support\Str::limit($question->text,150,'...')}}</p>
</a>
<small>{{$question->answers->count()}} Answers</small>
</div>   
@endforeach 
</div>

{{ $questions->links() }}
@endsection