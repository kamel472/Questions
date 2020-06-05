@extends('layouts.questions') 
@section('body')
<!--Reply-->
<div class="card mb-3 wow fadeIn">
<div class="card-header font-weight-bold">Edit Question</div>
<div class="card-body">

<!-- Default form reply -->
<form action="{{route('questions.update' , $question->id )}}" method="post">
@csrf
@method('patch')


<!-- Title -->
<label for="title">Title</label>
<input type="text"  value = "{{$question->title}}" name="title" class="form-control" required>

<!-- Text -->
<div class="form-group">
    <label for="Text">Body</label>
    <textarea class="form-control" name="text" rows="5" required> {{$question->text}}</textarea>
</div>


<div class="text-center mt-4">
<input type="submit" value="Update">
</div>
</form>
<!-- Default form reply -->



</div>
</div>
<!--/.Reply-->
@endsection                