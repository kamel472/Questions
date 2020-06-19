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