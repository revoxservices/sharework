@extends('layouts.customers')

@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@section('content')

<input type="hidden" id="token" value="{{ $project->token }}">

<div class="nk-content ">
    <div class="container wide-xl">
        <div class="nk-content-inner">
           
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-md">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Administradora de archivos</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">

                                <a href="{{ route('customers.projects') }}"  class="back-to"><em class="icon ni ni-arrow-left"></em><span><span class="d-none d-sm-inline-block">De regreso a </span> Dashboard</span></a>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-fmg nk-fmg-boxed">
                        <div class="nk-fmg-aside" data-content="files-aside" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="lg" data-simplebar>
                            <div class="nk-fmg-aside-wrap">

                                
                                <div class="nk-fmg-aside-top" data-simplebar>
                                    <ul class="nk-fmg-menu">
                                        <li class="active">
                                            <a class="nk-fmg-menu-item all-action" >
                                                <em class="icon ni ni-home-alt"></em>
                                                <span class="nk-fmg-menu-text">Home</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nk-fmg-menu-item files-action" >
                                                <em class="icon ni ni-file-docs"></em>
                                                <span class="nk-fmg-menu-text">Archivos</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nk-fmg-menu-item shared-action">
                                                <em class="icon ni ni-share-alt"></em>
                                                <span class="nk-fmg-menu-text">Compartidos</span>
                                            </a>
                                        </li>


                                        @if($privilege->privilege_id == 1)
                                            <li>
                                                <a class="nk-fmg-menu-item" href="{{ route('customers.projects.view', array($project->token)) }}">
                                                    <em class="icon ni ni-file-docs"></em>
                                                    <span class="nk-fmg-menu-text">Reporte</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if($privilege->privilege_id == 1)
                                        <li>
                                            <a class="nk-fmg-menu-item" href="{{ route('customers.projects.teams', array($project->token)) }}">
                                                <em class="icon ni ni-share-alt"></em>
                                                <span class="nk-fmg-menu-text">Equipo</span>
                                            </a>
                                        </li>
                                        @endif

                                        @if($privilege->privilege_id == 1)
                                            <li>
                                                <a class="nk-fmg-menu-item" href="{{ route('customers.projects.edit', array($project->token)) }}">
                                                    <em class="icon ni ni-setting-alt"></em>
                                                    <span class="nk-fmg-menu-text">Settings</span>
                                                </a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>


                                <div class="nk-fmg-aside-bottom">
                                    <div class="nk-fmg-status">
                                        <h6 class="nk-fmg-status-title"><em class="icon ni ni-hard-drive"></em><span>Almacenamiento</span></h6>
                                        <div class="progress progress-md bg-light">
                                             <div class="progress-bar" data-progress="({{ $storage }}/{{ $subscription }})*100" style="width: ({{ $storage }}/{{ $subscription }})*100%;"></div>
                                        </div>
                                        <div class="nk-fmg-status-info">{{ formatedSize($storage) }} GB de {{ $subscription }} GB usado</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-fmg-aside -->
                        <div class="nk-fmg-body">
                            <div class="nk-fmg-body-head d-none d-lg-flex">
                                <div class="nk-fmg-search">
                                    <em class="icon ni ni-search"></em>
                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders">
                                </div>
                                <div class="nk-fmg-actions">
                                    @if($privilege->privilege_id == 1 || $privilege->privilege_id == 2  )
                                        <ul class="nk-block-tools g-3">
                                            <li><a href="#file-upload" id="add-file" class="btn btn-primary" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em> <span>Subir</span></a></li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="nk-fmg-body-content">
                                    <div class="nk-block-between position-relative">
                                      
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-1">
                                                <li class="d-lg-none">
                                                    <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                </li>
                                                <li class="d-lg-none">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#file-upload" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em><span>Upload File</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-file-plus"></em><span>Create File</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-lg-none mr-n1"><a href="#" class="btn btn-trigger btn-icon toggle" data-target="files-aside"><em class="icon ni ni-menu-alt-r"></em></a></li>
                                            </ul>
                                        </div>
                                        <div class="search-wrap px-2 d-lg-none" data-search="search">
                                            <div class="search-content">
                                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message">
                                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                            </div>
                                        </div><!-- .search-wrap -->
                                    </div>
                                <div class="nk-fmg-listing nk-block-lg">
                                  
                                    <div class="tab-content" id="listUploads">
                                        
                                        @include('customers.partials.sections.files.uploads')
                                       
                                    </div>

                                    <div class="tab-content" id="listShares">
                                        
                                        @include('customers.partials.sections.files.shares')
                                       
                                    </div>
                                </div><!-- .nk-block -->
                            </div><!-- .nk-fmg-body-content -->
                        </div><!-- .nk-fmg-body -->
                    </div><!-- .nk-fmg -->
                </div>
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container wide-xl">
                        <div class="nk-footer-wrap g-2">
                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. 
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
        </div>
    </div>
</div>

@include('customers.partials.modals.uploads')
@include('customers.partials.modals.video')
@include('customers.partials.modals.image')

<div id="modalShare">
</div>


<div id="modalDetails">
</div>


<script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>

<script  type="text/javascript">
         
   $(document).ready(function() {
 
     $(".all-action").on("click",function(e){
         
        $("#listUploads").addClass("none");        
        $("#listShares").addClass("none");

        $("#listUploads").removeClass("none");
        $("#listShares").removeClass("none");

        allUploads();
        allShares();
     });

     $(".files-action").on("click",function(e){
         
        $("#listUploads").addClass("none");        
        $("#listShares").addClass("none");

        $("#listUploads").removeClass( "none");;

        allUploads();
     });
                  
     
     $(".shared-action").on("click",function(e){
         
        $("#listUploads").addClass("none");        
        $("#listShares").addClass("none");
        $("#listShares").removeClass("none");

        allShares();
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

   });

</script>




@endsection

@push('scripts')


@endpush
