@extends('layouts.questions')

@section('body')

@livewireScripts

<x-alert />

<div class="card mb-4 wow fadeIn">
    <div class="card-body text-center text-md-left ml-md-3 ml-0">
        <div class="row">

            <!--Question-->
            <div class="col-10">
                <p class="h5 "><img src="{{ asset('images/Q.png') }}" alt="image" style="width:18px;">
                    {{$question->title}}
                </p>

                <p>{{$question->text}}</p>

                <!--User Asked-->
                <div style="background-color: rgb(233, 240, 241); width: fit-content;height: 30px;">
                    <small>
                        <a href="{{route('users.show' , $question->user_id)}}">

                            @if($question->user->avatar)
                            <img src="{{ asset('storage/images/'.$question->user->avatar) }}" alt="image"
                                style="width:20px;">
                            @else
                            <img src="{{ asset('storage/images/default.png') }}" alt="image" style="width:20px;">
                            @endif
                            {{ $question->user->name}}</a>
                    </small>
                </div>
            </div>

            
            @can('updateOrDelete', $question)

            <!--Edit Question Button/Modal-->
            @include('includes.editQuestion')

            <!--Delete Question Button-->
            <div class="col-1">
                <form method="post" action="{{route('questions.destroy', $question->id)}}" id="question-destroy">
                    @csrf
                    @method('delete')
                    <span class="fas fa-trash" style="color: red; cursor: pointer;" onclick="questionDelete(this)"></span>
                </form>
            </div>
            @endcan
        </div>
    </div>
</div>

<!--Answers-->
<div class="card card-comments mb-3 wow fadeIn">
    <div class="card-header font-weight-bold">Answers</div>
    <div class="card-body">
        <div class="media d-block d-md-flex ">
            <div class="media-body text-center text-md-left ml-md-3 ml-0">

                @foreach($answers as $answer)
                <div class="row" id="answers_list" data-answerid="{{$answer->id}}"
                    style="border-bottom: 1px solid rgb(184, 170, 170); padding:25px;">

                    <!--Approve Answer-->
                    <div class="col-1">

                        @can('approveAnswer', $question)
                        <livewire:approve :answer="$answer">
                            @else
                            @if($answer->approved == 1)
                            <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
                            @else
                            <i class="fa fa-check" aria-hidden="true" style="color: rgb(184, 170, 170)"></i>

                            @endif
                            @endcan
                            </br>

                            <!--Like Answer-->
                            <livewire:likes :answer="$answer">
                    </div>

                    <!-- Answer Body-->
                    <div class="col-11">
                        <p><img src="{{ asset('images/A.jpg') }}" alt="image" style="width:15px;">&nbsp;&nbsp;{{$answer->body}}</p>

                        <!--Add Comment Button/Modal-->    
                        @include('includes.addComment')

                            @can('updateOrDelete', $answer)

                            <!--Edit Answer Button/Modal-->
                            @include('includes.editAnswer')

                            <!--Delete Answer Button-->

                            <form method="post" action="{{route('answers.destroy' , $answer->id)}}"
                                id="answer-destroy">
                                @csrf
                                @method('delete')
                                <a  href="" onclick="answerDelete(this)"><small>Delete</small></a>
                            </form>
                            @endcan
                        </div>
                        <br>
                        <!--User Answered-->
                        <div class="row">
                            <div class="col-6">
                                <div style="background-color: rgb(233, 240, 241); width: fit-content;height: 30px;">
                                    <small>
                                        <a href="{{route('users.show' , $answer->user_id)}}">
                                            @if($answer->user->avatar)
                                            <img src="{{ asset('storage/images/'.$answer->user->avatar) }}" alt="image"
                                                style="width:20px;">
                                            @else
                                            <img src="{{ asset('storage/images/default.png') }}" alt="image"
                                                style="width:20px;">
                                            @endif
                                            {{ $answer->user->name}}</a></small></div>
                            </div>

                            <!--Answer User Rating-->
                            <div class="col-4">
                                @can('rate' , $answer)
                                <form method="GET" onsubmit="return saveRatings(this);">
                                    <input type="hidden" name="answer_id" value="{{$answer->id}}">
                                    <button class="btn btn-primary btn-sm">Submit</button>
                                    <div class="starrr" ></div>
                                </form>
                                @endcan
                            </div>
                            <!--Answers Avarage Rating -->
                            <div class="col-2">

                                <div class="rating" data-rating="{{$answer->ratings->where('answer_id' , $answer->id)->avg('rating')}}"></div>

                                <!--<small style="color: blue;font-weight: bold;" >Rating: <i class="fa fa-star" aria-hidden="true" ;>
                                    {{round($answer->ratings->where('answer_id' , $answer->id)->avg('rating') , 1)}}
                                </i></small>-->
                            </div>


                            <br><br>
                        </div>
                    </div>
                </div>

                <!--Comments-->
                @foreach ($answer->comments->sortByDesc('created_at') as $comment)
                <div style="border-bottom: 1px solid #D3D3D3;padding-left:10px; background:rgba(238, 235, 235, 0.884);">
                    <small>{{ $comment->body}} -<a href="{{route('users.show' , $comment->user->id)}}">
                            {{$comment->user->name}}
                        </a></small>
                    <br>

                    @can('updateOrDelete' , $comment)

                    <!--Edit Comment Button/Modal-->
                   @include ('includes.editComment')

                        <!--Delete Comment-->
                        <form method="post" action="{{route('comments.destroy' , $comment->id)}}"
                            id="comment-destroy">
                            @csrf
                            @method('delete')
                            <a href="" onclick="commentDelete(this)"><small>Delete</small></a>
                        </form>
                    </div>
                    @endcan
                </div>
                
                @endforeach
                @endforeach

                {{ $answers->links() }}

                <!-- Type Answer -->
                <div class="form-group mt-4">
                    <form action="{{route('answers.store' , $question->id)}}" method="post">
                        @csrf
                        <label for="quickReplyFormComment">Your Answer</label>
                        <textarea class="form-control" id="quickReplyFormComment" rows="5" name="body"
                            required></textarea>
                        <div class="text-center">
                            <button class="btn btn-info btn-sm" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection