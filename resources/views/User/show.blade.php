@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                <h4>Personal details:</h4>
                <br>
                <p>Name: {{auth()->user()->name}}</p>
                
                E-mail: {{auth()->user()->email}}
                </div>

                <div class="card-body">
                    

                <h4>Questions Asked:</h4>
                <br> 
                @foreach(auth()->user()->questions as $question) 
                <p>{{$question->title}}</p>
                @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
