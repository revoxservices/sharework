!(function (NioApp, $) {
    "use strict";
    NioApp.Package.name = "DashLite";
    NioApp.Package.version = "2.2";

    var $win = $(window), $body = $('body'), $doc = $(document), 

    //class names
    _body_theme  = 'nio-theme',
    _menu        = 'nk-menu', 
    _mobile_nav  = 'mobile-menu',
    _header      = 'nk-header', 
    _header_menu = 'nk-header-menu', 
    _aside       = 'nk-aside', 
    //breakpoints
    _break       = NioApp.Break;

    function extend(obj, ext) {
        Object.keys(ext).forEach(function(key) { obj[key] = ext[key]; });
        return obj;
    }
    // ClassInit @v1.0
    NioApp.ClassBody = function() {
        NioApp.AddInBody(_aside); 
    };

    // Dropzone @v1.0
    NioApp.Dropzone = function(elm, opt) {
        if ($(elm).exists()) {
            $(elm).each(function(){
                var def = {autoDiscover: false}, 
                    attr = (opt) ? extend(def, opt) : def;
                $(this).addClass('dropzone').dropzone(attr);
            });
        }
    };

    // Dropzone Init @v1.0
    NioApp.Dropzone.init = function() {

        var token = $("#token").val();

        NioApp.Dropzone('.upload-zone', {
            url: "/customers/uploads/store/"+token,
            addRemoveLinks: true,
            success: function (file, response) {
                allUploads();
                allShares();
            },
            error: function (file, response) {
                //file.previewElement.classList.add("dz-error");
            },            
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        } );

    };

    // Addons @v1
    NioApp.Addons.Init = function() {
        NioApp.Dropzone.init();
    };

    NioApp.init();

    $("#add-file").click(function(){
        Dropzone.forElement(".upload-zone").removeAllFiles(true);
    });

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



	return NioApp;
})(NioApp, jQuery);