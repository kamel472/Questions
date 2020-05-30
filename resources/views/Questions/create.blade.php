@extends('layouts.questions') 
@section('body')
        <div class="container" style="padding:15px; background:#B2BABB;"><h2>Ask a Question</h2></div>
        <x-alert/>
        <div class="card-body">
        <form action="{{route('questions.store')}}" method="post">
    @csrf
    <div class="container" style=" padding-left:30px; padding-top:5px;">
        <div style="padding-left:30px;padding-bottom:20px;">
        <input type="text" name="title" placeholder="Title" >
        </div>
        
        <div style="padding-left:30px; padding-bottom:20px;">
        <textarea name="text" placeholder="body"></textarea>
        </div>
        <div style="padding-left:30px; padding-bottom:20px;">
        <input type="submit" value="Post you question">
        </div>
        </form>
        </div>
        <br>
        <a class="btn btn-secondary" href="{{route('questions.index')}}" role="button">Back</a> 
@endsection