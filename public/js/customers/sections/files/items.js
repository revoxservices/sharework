
$(document).ready(function() {

    function allUploads() {
        
        var token = $("#token").val();

        $.ajax({                    
            url: '/customers/uploads/all/' + token,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            contentType: false,
            processData: false,
            success: function(data) {
                $("#listItems").empty().html(data);
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

    $(".clear-upload").on("click",function(e){

        e.preventDefault();

        var upload =  $(this).find("input[name='token']").val();
        
        $.ajax({                    
            url: '/customers/uploads/clear/' + upload,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            contentType: false,
            processData: false,
            success: function(data) {
                allUploads();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
        });

    });
    
    

    $(".download-upload").on("click",function(e){

        e.preventDefault();

        var upload =  $(this).find("input[name='token']").val();
        
        $.ajax({                    
            url: '/customers/uploads/download/' + upload,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            contentType: false,
            processData: false,
            success: function(data) {
                //allUploads();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
        });

    });

});
