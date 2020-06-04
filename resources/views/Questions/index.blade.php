@extends('layouts.questions')

@section('body')

<!--/.Card-->

<!--Card-->
<div class="card mb-4 wow fadeIn">

<!--Card content-->
<div class="card-header" style=" padding-bottom:2px;" >
<h3 style="font-family:Impact;">Questions</h3>
<p >{{$questions->count()}} Questions Asked</p>
</div>
<x-alert/>

<div class="card-body" >
@foreach ($questions as $question)
<div style="border-bottom: 1px solid #D3D3D3; padding:5px;" >
<p class="h5 "><a href="{{route('questions.show' , $question->id)}}">{{ $question->title}}</a> </p>
<br>
<div class="container">
<div class="row">
<div class="col-8">
<small>{{$question->answers->count()}} Answers</small>
</div>
<div class="col-4">
<small >
<a href="{{route('users.show' , $question->user_id)}}"> 
<img src="{{ asset('storage/images/'.$question->user->avatar) }}" alt="image" style="width:20px;">
{{ $question->user->name}}</a></small>

</div>
</div>
</div>

</div>   
<br>
@endforeach 
</div>

<!--/.Card-->
@endsection