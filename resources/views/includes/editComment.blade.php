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