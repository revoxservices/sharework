@extends('layouts.customers')

@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@section('content')
<div class="nk-content ">
    <div class="container wide-xl">
        <div class="nk-content-inner">
          
            
            @include ('customers.includes.nav')

            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Mi perfil</h2>
                            <div class="nk-block-des">
                                <p>Tiene control total para administrar la configuración de su propia cuenta. <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                       
                        <div class="card card-bordered">
                            <div class="nk-data data-list">
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Nombres</span>
                                        <span class="data-value">{{ $user->firstname }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- .data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Apellidos</span>
                                        <span class="data-value"> {{ $user->lastname }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- .data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value"> {{ $user->email }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                </div><!-- .data-item -->

                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Password</span>
                                        <span class="data-value">......</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- .data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Fecha Registro</span>
                                        <span class="data-value">{{ formatedDate($user->created_at) }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                </div><!-- .data-item -->
                               
                            </div><!-- .nk-data -->
                        </div><!-- .card -->
                        <!-- Another Section -->
                      
                    </div><!-- .nk-block -->
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

<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Actaulizar Perfil</h5>
                <div class="tab-content">
                    <div class="tab-pane active" >
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Nombres</label>
                                    <input type="text" class="form-control form-control-lg" id="full-name" value="{{ $user->firstname }}" placeholder="Enter Full name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Apellidos</label>
                                    <input type="text" class="form-control form-control-lg" id="display-name" value="{{ $user->lastname }}" placeholder="Enter display name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Apellidos</label>
                                    <input type="password" class="form-control form-control-lg" id="display-name" value="......" placeholder="Enter display name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="birth-day">Fecha Registro</label>
                                    <input type="text" class="form-control form-control-lg date-picker" value="{{ formatedDate($user->created_at) }}" id="birth-day">
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Acualizar</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancelar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                   
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

@endsection

@push('scripts')

@endpush