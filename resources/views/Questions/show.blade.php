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

            @if($question->user_id == auth()->user()->id)

            <!--Edit Question Button-->
            <div class="col-1">
                <span class="fas fa-edit" style="color: orange; cursor: pointer;" data-toggle="modal"
                    data-target="#modalEditQuestion{{$question->id}}"></span>
            </div>

            <!--Edit Question Modal-->
            <div class="modal fade" id="modalEditQuestion{{$question->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <input type="text" id="form8" value="{{$question->title}}" name="title"
                                    class="md-textarea form-control" rows="4" required></input>
                                </br>
                                <textarea type="text" id="form8" value="" name="text" class="md-textarea form-control"
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

            <!--Delete Question Button-->
            <div class="col-1">
                <form method="post" action="{{route('questions.destroy', $question->id)}}" id="question-destroy">
                    @csrf
                    @method('delete')
                    <span class="fas fa-trash" style="color: red; cursor: pointer;" onclick="event.preventDefault();
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
    <div class="card-body">
        <div class="media d-block d-md-flex ">
            <div class="media-body text-center text-md-left ml-md-3 ml-0">

                @foreach($answers->sortByDesc('created_at') as $answer)
                <div class="row" id="answers_list" data-answerid="{{$answer->id}}"
                    style="border-bottom: 1px solid rgb(184, 170, 170); padding:25px;">

                    <!--Approve Answer-->
                    <div class="col-1">
                        @if(auth()->user()->id == $question->user_id)
                        <livewire:approve :answer="$answer">
                            @else
                            @if($answer->approved == 1)
                            <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
                            @else
                            <i class="fa fa-check" aria-hidden="true"></i>

                            @endif
                            @endif
                            </br>

                            <!--Like Answer-->
                            <livewire:likes :answer="$answer">
                    </div>

                    <!-- Answer Body-->
                    <div class="col-11">
                        <p><img src="{{ asset('images/A.jpg') }}" alt="image"
                                style="width:15px;">&nbsp;&nbsp;{{$answer->body}}</p>

                        <!--Add Comment Button-->
                        <div style="display: flex;">

                            <a href="" data-toggle="modal" data-target="#modalAddComment{{$answer->id}}">
                                <small>Comment</small>
                            </a>&nbsp;&nbsp;

                            <!--Add Comment Modal-->


                            <div class="modal fade" id="modalAddComment{{$answer->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Add Your Comment</h4>
                                            <form action="{{route('answers.addComment' , $answer->id)}}" method="post">
                                                @csrf
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="md-form">
                                                <i class="fas fa-pencil prefix grey-text"></i>
                                                <textarea type="text" id="form8" value="" name="body"
                                                    class="md-textarea form-control" rows="4" required></textarea>
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

                            @if($answer->user->id == auth()->user()->id)

                            <!--Edit Answer Button-->
                            <a href="" data-toggle="modal" data-target="#modalEditAnswer{{$answer->id}}">
                                <small>Edit</small></a>&nbsp;&nbsp;

                            <!--Edit Answer Modal-->

                            <div class="modal fade" id="modalEditAnswer{{$answer->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit Your Answer</h4>
                                            <form action="{{route('answers.update', $answer->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="md-form">
                                                <i class="fas fa-pencil prefix grey-text"></i>
                                                <textarea type="text" id="form8" value="" name="body"
                                                    class="md-textarea form-control" rows="4"
                                                    required>{{$answer->body}}</textarea>
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

                            <!--Delete Answer Button-->

                            <form method="post" action="{{route('answers.destroy' , $answer->id)}}"
                                id="answer-destroy{{$answer->id}}">
                                @csrf
                                @method('delete')
                                <a href="" class="button" onclick="event.preventDefault();
    if(confirm('Do you really want to delete?')){
        document.getElementById('answer-destroy{{$answer->id}}')
    .submit() }"><small>Delete</small></a>
                            </form>
                            @endif
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
                            <div class="col-3">
                                <form method="GET" onsubmit="return saveRatings(this);">
                                    @csrf
                                    <input type="hidden" name="answer_id" value="{{$answer->id}}">
                                    <button class="btn btn-primary btn-sm">Rate</button>
                                    <div class="starrr"></div>
                                </form>
                            </div>
                            <!--Answers Avarage Rating -->
                            <div class="col-3">
                                <i class="fa fa-star" aria-hidden="true" style="color: blue" ;>
                                    {{round($answer->ratings->where('answer_id' , $answer->id)->avg('rating') , 1)}}
                                </i>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>


                <!--Comments-->
                @foreach ($answer->comments->sortByDesc('created_at') as $comment)
                <div style="border-bottom: 1px solid #D3D3D3;padding-left:10px; 
background:rgba(238, 235, 235, 0.884);">
                    <small>{{ $comment->body}} -<a href="{{route('users.show' , $comment->user->id)}}">
                            {{$comment->user->name}}
                        </a></small>
                    <br>

                    @if ($comment->user->id == auth()->user()->id)

                    <!--Edit Comment Button-->
                    <div style="display: flex;">
                        <a href="#modalEditComment{{$comment->id}}" data-toggle="modal"><small>edit</small></a>
                        &nbsp;&nbsp;

                        <!--Edit Comment Modal-->
                        <div class="modal fade" id="modalEditComment{{$comment->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">Edit Your Comment</h4>
                                        <form action="{{route('comments.update', $comment->id)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        <div class="md-form">
                                            <i class="fas fa-pencil prefix grey-text"></i>
                                            <textarea type="text" id="form8" value="" name="body"
                                                class="md-textarea form-control" rows="4"
                                                required>{{$comment->body}}</textarea>
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

                        <!--Delete Comment-->
                        <form method="post" action="{{route('comments.destroy' , $comment->id)}}"
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
                @endforeach
                @endforeach


                {{ $answers->links() }}

                <script>
                    var ratings = 0;
                    $(function () {

                        $(".starrr").starrr().on("starrr:change", function (event, value) {

                            ratings = value;
                        });
                    });

                    function saveRatings(form) {

                        var answer_id = form.answer_id.value;

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "/rating",
                            method: "POST",
                            data: { "answer_id": answer_id, "ratings": ratings },
                            success: function (response) {

                                alert(response);
                            }
                        });
                        return false;
                    }

                </script>


                <!-- Type Answer -->
                <div class="form-group mt-4">
                    <form action="{{route('questions.addAnswer' , $question->id)}}" method="post">
                        @csrf
                        <label for="quickReplyFormComment">Your Answer</label>
                        <textarea class="form-control" id="quickReplyFormComment" rows="5" name="answer[]"
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