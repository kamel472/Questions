@extends('layouts.questions')

@section('body')

@livewireScripts


<x-alert/>
<div class="card mb-4 wow fadeIn">

<!--Question-->

<div  class="card-body text-center text-md-left ml-md-3 ml-0">
<div class="row">
<div class="col-10">
<p class="h5 "><img src="{{ asset('images/Q.png') }}" alt="image" style="width:18px;"> {{$question->title}}</p>
<p>{{$question->text}}</p>
<div style="background-color: rgb(233, 240, 241); width: fit-content;height: 30px;">
<small >
<a href="{{route('users.show' , $question->user_id)}}"> 
@if($question->user->avatar)
<img src="{{ asset('storage/images/'.$question->user->avatar) }}" alt="image" style="width:20px;">
@else
<img src="{{ asset('storage/images/default.png') }}" alt="image" style="width:20px;">
@endif
{{ $question->user->name}}</a></small>
</div>
</div>

@if($question->user_id == auth()->user()->id)
<div class="col-1">
<span class="fas fa-edit" style="color: orange; " 
data-toggle="modal" data-target="#modalEditQuestion{{$question->id}}"></span>
</div>

<div class="modal fade" id="modalEditQuestion{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Edit Your Question</h4>
<form action="{{route('questions.update', $question->id)}}" method="post">
@csrf
@method('patch')
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body mx-3">
<div class="md-form">
<i class="fas fa-pencil prefix grey-text"></i>
<input type="text" id="form8" value="{{$question->title}}"name="title" class="md-textarea form-control" 
rows="4" required></input>
<textarea type="text" id="form8" value=""name="text" class="md-textarea form-control" 
rows="4" required>{{$question->text}}</textarea>
<label data-error="wrong" data-success="right" for="form8"></label>
</div>

</div>
<div class="modal-footer d-flex justify-content-center">
<button class="btn btn-info btn-sm">update </button>
</form>
</div>
</div>
</div>
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
</div>
</div>
</div>
    

<!--Answers-->
<div class="card card-comments mb-3 wow fadeIn">
<div class="card-header font-weight-bold">Answers</div>
<div class="card-body" >
<div class="media d-block d-md-flex ">
<div class="media-body text-center text-md-left ml-md-3 ml-0">


@foreach($answers->sortByDesc('created_at') as $answer)                            
<div class="row" style="border-bottom: 1px solid rgb(184, 170, 170); padding:25px;" >

<div class="col-1" >   
@if(auth()->user()->id == $question->user_id)
<livewire:approve :answer="$answer"> 
@else
@if($answer->approved == 1)
<i class="fa fa-check" aria-hidden="true" style="color: green;" ></i>
@else
<i class="fa fa-check" aria-hidden="true" ></i>
@endif
@endif   
</div>

<div class="col-8"  >
<p><img src="{{ asset('images/A.jpg') }}" alt="image" style="width:15px;">   {{$answer->body}}</p>
<div style="background-color: rgb(233, 240, 241); width: fit-content;height: 30px;">
<small >
<a href="{{route('users.show' , $answer->user_id)}}"> 
@if($answer->user->avatar)
<img src="{{ asset('storage/images/'.$answer->user->avatar) }}" alt="image" style="width:20px;">
@else
<img src="{{ asset('storage/images/default.png') }}" alt="image" style="width:20px;">
@endif

{{ $answer->user->name}}</a></small></div>
</div>

@if(auth()->user())
<div class="col-1">
<div class="modal fade" id="modalAddComment{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Add Your Comment</h4>
<form action="{{route('answers.addComment' , $answer->id)}}" method="post">
@csrf
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body mx-3">
<div class="md-form">
<i class="fas fa-pencil prefix grey-text"></i>
<textarea type="text" id="form8" value=""name="body" class="md-textarea form-control" rows="4" required></textarea>
<label data-error="wrong" data-success="right" for="form8"></label>
</div>

</div>
<div class="modal-footer d-flex justify-content-center">
<button class="btn btn-info btn-sm">Post </button>
</form>
</div>
</div>
</div>
</div>
<div class="text-center">
<span class="fas fa-comments" style="color: blue;cursor: pointer;" 
data-toggle="modal" data-target="#modalAddComment{{$answer->id}}"></span>
</div>
</div>

@if($answer->user->id == auth()->user()->id)

<div class="col-1">
<div class="modal fade" id="modalEditAnswer{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Edit Your Answer</h4>
<form action="{{route('questions.updateAnswer', $answer->id)}}" method="post">
@csrf
@method('patch')
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body mx-3">
<div class="md-form">
<i class="fas fa-pencil prefix grey-text"></i>
<textarea type="text" id="form8" value=""name="body" class="md-textarea form-control" rows="4" required>{{$answer->body}}</textarea>
<label data-error="wrong" data-success="right" for="form8"></label>
</div>

</div>
<div class="modal-footer d-flex justify-content-center">
<button class="btn btn-info btn-sm">Post </button>
</form>
</div>
</div>
</div>
</div>

<span class="fas fa-edit" style="color: orange; cursor: pointer;" 
data-toggle="modal" data-target="#modalEditAnswer{{$answer->id}}"></span>
</div>

<div class="col-1">
<form  method="post" action="{{route('answers.destroy' , $answer->id)}}"
id="answer-destroy{{$answer->id}}">
@csrf
@method('delete')
<span class="fas fa-trash" style="color: red; cursor: pointer;"
onclick="event.preventDefault();
if(confirm('Do you really want to delete?')){
    document.getElementById('answer-destroy{{$answer->id}}')
.submit() }"></span>
</form>
</div>
@endif
@endif
</div>

    
<!--Comments-->    
@foreach ($answer->comments->sortByDesc('created_at') as $comment)
<div style="border-bottom: 1px solid #D3D3D3;padding-left:10px; background:rgba(238, 235, 235, 0.884);">
<small>{{ $comment->body}} -<a href="{{route('users.show' , $comment->user->id)}}"> {{$comment->user->name}}
</a></small>
<br>

@if ($comment->user->id == auth()->user()->id)

<div style="display: flex;">
<a href="#modalEditComment{{$comment->id}}" data-toggle="modal" ><small>edit</small></a> &nbsp;&nbsp;

<form  method="post" action="{{route('comments.destroy' , $comment->id)}}"
id="comment-destroy{{$comment->id}}">
@csrf
@method('delete')
<a href="" onclick="event.preventDefault();
if(confirm('Do you really want to delete?')){
document.getElementById('comment-destroy{{$comment->id}}')
.submit() }"><small>delete</small></a>
</form>
</div>
@endif
</div>

<div class="modal fade" id="modalEditComment{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Edit Your Comment</h4>
<form action="{{route('answers.updateComment', $comment->id)}}" method="post">
@csrf
@method('patch')
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body mx-3">
<div class="md-form">
<i class="fas fa-pencil prefix grey-text"></i>
<textarea type="text" id="form8" value=""name="body" class="md-textarea form-control" rows="4" required>{{$comment->body}}</textarea>
<label data-error="wrong" data-success="right" for="form8"></label>
</div>

</div>
<div class="modal-footer d-flex justify-content-center">
<button class="btn btn-info btn-sm">Update </button>
</form>
</div>
</div>
</div>
</div>
@endforeach
@endforeach

{{ $answers->links() }}

<!-- Type Answer -->
<div class="form-group mt-4" >
<form action="{{route('questions.addAnswer' , $question->id)}}" method="post">
@csrf
<label for="quickReplyFormComment">Your Answer</label>
<textarea class="form-control" id="quickReplyFormComment" rows="5" name="answer[]" required></textarea>
<div class="text-center">
    <button class="btn btn-info btn-sm" type="submit" >Post</button>
</div>
</form>
</div>
<div class="media d-block d-md-flex mt-3">                               
</div>
</div>
</div>
</div>
</div>
@endsection