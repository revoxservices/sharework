

    readyModals();

    function readyModals() {
        
        $(".add-share").on("click",function(e){

            var upload =  $(this).attr("data-id");

            addShare(upload);

        });
            

        function addShare(upload) {
             
            alert("add-share");
            var user = $('#users').val();
            var privilege = $('#privileges').val();
            var project = $('#project').val();

            $.ajax({
                url: '/customers/uploads/modal/share/store',
                type: "POST",
                datatype: "html",
                data: {
                    _token: $('meta[name=csrf-token]').attr('content'),
                    user : user,
                    privilege : privilege,
                    project : project,
                    upload : upload,
                },
                success: function(data) {
                    $('#file-share').modal('hide'); 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 500) {
                        alert('Internal error: ' + jqXHR.responseText);
                    } else {
                        alert('Unexpected error.');
                    }
                }
            });


        }


    }
