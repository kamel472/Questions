
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

                