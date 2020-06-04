@extends('layouts.questions')

@section('body')

<!--Featured Image-->
<div class="card mb-3 wow fadeIn" style="background-image: url('images/asking.jpg');height:300px">


<p class="h1 my-4" style="text-align:center;color:blue;font-family:Impact;"><br><br>Ask and find your answer</p>
<p style="text-align:center;">Ask whatever you want and you will find the answer</P>


</div>
<!--/.Featured Image-->

<!--Card-->
<div class="card mb-4 wow fadeIn">

<!--Card content-->
<div class="card-body text-center">

<div class="row">
    <div class="col">
    
    <div class="h5 my-4"><a href="{{route('questions.create')}}"><img src="images/ask.png"><img><br><br>Ask a Question</a> </div>
    </div>
    <div class="col">
    
    <div class="h5 my-4"><a href="{{route('questions.index')}}"> <img src="images/ask2.jpg"><br><br><img>View Questions</a> </div>
    </div>
    
  </div>
</div>
</div>
@endsection