function questionDelete (form) {
    event.preventDefault();
            if(confirm('Do you really want to delete?')){
            document.getElementById('question-destroy')
            .submit() }
}

function answerDelete (form) {
    event.preventDefault();
            if(confirm('Do you really want to delete?')){
            document.getElementById('answer-destroy')
            .submit() }
}

function commentDelete (form) {
    event.preventDefault();
            if(confirm('Do you really want to delete?')){
            document.getElementById('comment-destroy')
            .submit() }
}

var ratings = 0;

        
$(function () {

    $(".starrr").starrr().on("starrr:change", function (event, value) {

        ratings = value;
        answer_id = this.getAttribute("data-answerid");

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
    
    // location.reload();
    // $('.kamel').hide('.kamel');
    // append
    
    });
    
    var rating = document.getElementsByClassName('rating');
    for(var i=0; i<rating.length; i++){
        $(rating[i]).starrr({

            readOnly:true,
            rating: rating[i].getAttribute("data-rating")

        });
    }
});
