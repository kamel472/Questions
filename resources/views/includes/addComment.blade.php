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
                <form action="{{route('comments.store' , $answer->id)}}" method="post">
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