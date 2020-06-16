@extends('layouts.questions')

@section('body')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Dashboard</div>
                

<div class="card-body" >
<div class="row">
<div class="col-7">

<h5>Personal details:</h5>
<br>
<p>Name: {{$user->name}}</p>

E-mail: {{$user->email}}
<br><br><br>
@if(auth()->user())
@if ($user->id == auth()->user()->id)
<a  href="{{route('users.edit' , $user->id )}}" class="btn btn-success btn-sm">Update profile</a>
@endif
@endif
</div>

<div class="col-5">

@if($user->avatar)
<img src="{{ asset('storage/images/'.$user->avatar) }}" alt="image" style="width:200px;">
@else
<img src="{{ asset('storage/images/default.png') }}" alt="image" style="width:200px;">
@endif    
</div>    
</div>


<br>
<h5 style="border-top: 1px solid #D3D3D3;padding-top:20px">Questions Asked:</h5>
<br>
<ul> 
@foreach($user->questions as $question)

<li>
<small ><a href="{{route('questions.show' , $question->id)}}">{{ $question->title}}</a> </small> </li>

@endforeach
</ul>




</div>
</div>
</div>
</div>
@endsection
