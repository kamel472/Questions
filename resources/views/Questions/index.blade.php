@extends('layouts.questions')

@section('body')

<!--/.Card-->

<!--Card-->
<div class="card mb-4 wow fadeIn" style="width:800px; margin:0 auto;">

<!--Card content-->
<div class="card-header" style=" padding-bottom:2px;" >
<h3 style="font-family:Impact;">Questions</h3>
<p >{{$questionsCount}} Questions Asked</p>
</div>
<x-alert/>

<div class="card-body" >
@foreach ($questions->sortByDesc('created_at') as $question)
<div style="border-bottom: 1px solid #D3D3D3; padding:5px;" >
<small >Asked By:
<a href="{{route('users.show' , $question->user_id)}}"> 
{{ $question->user->name}}</a></small>
<br>
<a href="{{route('questions.show' , $question->id)}}">    
<p class="h4 " style="font-family:Arial;color:black;font-weight:bold;">{{ $question->title}}</p>

<p style="font-family:Arial;color:black;">{{\Illuminate\Support\Str::limit($question->text,150,'...')}}</p></a> 

<br>
<div class="container">
<div class="row">
<div class="col-8">
<small>{{$question->answers->count()}} Answers</small>
</div>
<div class="col-4">


</div>
</div>
</div>

</div>   
<br>
@endforeach 
</div>
{{ $questions->links() }}

<!--/.Card-->
@endsection