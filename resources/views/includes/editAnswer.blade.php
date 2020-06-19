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