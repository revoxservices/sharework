

    readyUpload();

    function readyUpload() {

        
        

        $(".file-details").on("click",function(e){

            var upload =  $(this).attr("data-id");     
            uploadDetails(upload);
                
        });

        
        function uploadDetails(upload) {
                    
            $.ajax({                    
                url: '/customers/uploads/modal/details/' + upload,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                contentType: false,
                processData: false,
                success: function(data) {       
                    $("#modalDetails").empty().html(data);
                    $('#file-details').modal('show');        
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


        $(".file-share").on("click",function(e){

            var upload =  $(this).attr("data-id");     
            uploadShare(upload);
                
        });

        
        function uploadShare(upload) {
                    
            $.ajax({                    
                url: '/customers/uploads/modal/share/' + upload,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                contentType: false,
                processData: false,
                success: function(data) {       
                    $("#modalShare").empty().html(data);
                    $('#file-share').modal('show'); 
                    NioApp.Select2('.form-select');       
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



        $(".file-image").on("click",function(e){

            var upload =  $(this).attr("data-id");     
            uploadImage(upload);
                
        });

        
        function uploadImage(upload) {
                    
            $.ajax({                    
                url: '/customers/uploads/image/' + upload,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#file-image').modal('show');                    
                    var source = document.getElementById('image');                
                    source.setAttribute('src', data);
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


        $(".file-video").on("click",function(e){

            var upload =  $(this).attr("data-id");
            
            uploadVideo(upload);

        });


        function uploadVideo(upload) {
                    
            $.ajax({                    
                url: '/customers/uploads/video/' + upload,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                contentType: false,
                processData: false,
                success: function(data) {
                    
                    var video = document.getElementById('video');
                    var source = document.getElementById('source');                
                    source.setAttribute('src', data);
                    video.load();
                    video.play();
                    $('#file-video').modal('show');
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

        
        $("#file-video").on("hidden.bs.modal", function (e) {
                    
            var video = document.getElementById('video');
            var source = document.getElementById('source');                
            source.setAttribute('src', '');
            video.load();
            video.stop();

        });
        

        $(".file-download").on("click",function(e){
        
            var upload =  $(this).attr("data-id");       
        
            uploadDownload(upload);

        });

        function uploadDownload(upload) {
                    
            $.ajax({                    
                url: '/customers/uploads/download/' + upload,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                contentType: false,
                processData: false,
                success: function(data) {
 
                    //window.open(data, 'Download');

                    NioApp.Toast('<h5>Descargando archivo</h5><p>Generando el archivo para iniciar la descarga.</p>', 'success', {position: 'bottom-center', icon: 'ni ni-download-cloud', ui: 'is-dark'});

/*
                    var link=document.createElement('a');
                    link.setAttribute('download',"download");
                    document.body.appendChild(link);
                    link.href=data ;
                    link.click();*/
                    //window.open(valFileDownloadPath , '_blank');

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

        $(".file-trash").on("click",function(e){

            var upload =  $(this).attr("data-id");

            uploadClear(upload);

        });
            
        function uploadClear(upload) {
                    
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
                    allShares();
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
                    $("#listUploads").empty().html(data);
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
        
        function allShares() {
            
            var token = $("#token").val();

            $.ajax({                    
                url: '/customers/uploads/shares/' + token,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#listShares").empty().html(data);
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
