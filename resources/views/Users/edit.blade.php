@extends('layouts.questions')

@section('body')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Update Your Data</div>
<x-alert/>
<div class="card-body">

<div class="row">
<div class="col-6">
<form action="{{route('users.update' , $user->id )}}" method="post" enctype="multipart/form-data">
@csrf
@method('patch')
<p>Name:</p>
<input type="text" id="replyFormEmail" name="name" value="{{$user->name}}" 
class="form-control" required>

<p>E-Mail:</p>
<input type="email" id="replyFormEmail" name="email" value="{{$user->email}}"class="form-control" 
required>
<br>
<input type="submit" class="btn btn-success btn-sm" value="Update">
</div>
        
<div class="col-6">
@if($user->avatar)
    <img src="{{ asset('storage/images/'.$user->avatar) }}" alt="image" style="width:200px;">
@else
    <img src="{{ asset('storage/images/default.png') }}" alt="image" style="width:200px;">
@endif
    <br> <br>
   
    <input type="file" name="image">
    </form>
</div>
    
</div>


@endsection
