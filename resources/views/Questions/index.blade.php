@extends('layouts.questions')

@section('body')
  <div  style="background:orange;text-align: center;display:">
  @foreach ($questions as $question)
  <div>
  <h3>{{$question->title}}</h3>
  </div>
  <div>
  <p>{{$question->text}}</p>
  </div>
@endforeach  
@endsection










