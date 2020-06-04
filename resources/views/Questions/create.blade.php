@extends('layouts.questions') 
@section('body')
<!--Reply-->
<div class="card mb-3 wow fadeIn">
<div class="card-header font-weight-bold">Ask a Question</div>
<div class="card-body">
<x-alert/>

<!-- Default form reply -->
<form action="{{route('questions.store')}}" method="post">
@csrf


<!-- Title -->
<label for="title">Title</label>
<input type="text" id="replyFormEmail" name="title" class="form-control" required>

<!-- Text -->
<div class="form-group">
<label for="Text">Body</label>
<textarea class="form-control" id="replyFormComment" name="text" rows="5" required></textarea>
</div>


<div class="text-center mt-4">
<input type="submit" class="btn btn-primary" value="Post you question">
</div>
</form>
<!-- Default form reply -->



</div>
</div>
<!--/.Reply-->
@endsection                