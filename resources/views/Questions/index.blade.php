@extends('layouts.questions')

@section('body')
    
<div class="container" style="padding:15px; background:#B2BABB; ">
  <div class="row">
    <div class="col-9">
    <h4 >Questions </h4>
    </div>
    <div class="col-3">
    <a class="btn btn-primary" href="{{route('questions.create')}}" role="button" >Ask question</a>
    </div>
  </div>
</div>
        <x-alert/>
        
        @foreach ($questions as $question)   
<div class="container" style="padding-top:15px;" >

  <div class="row" style="padding:10px;">
  
    <div >
        <a href="{{route('questions.show' , $question->id)}}"> {{ $question->title}} </a>
         
    </div>
  </div>
</div>

@endforeach 
@endsection
                
                
    










