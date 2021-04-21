@extends('layouts.customers')

@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@section('content')

<div class="nk-content ">
   <div class="container wide-xl">
      <div class="nk-content-inner">
        
        @include ('customers.includes.nav')

        <div class="nk-content-body">
            <div class="nk-content-wrap">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-sub"><a href="support.html" class="text-soft"><span>Editar</span></a></div>
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Integrante</h2>
                        <div class="nk-block-des">
                            <p>Puede encontrar todas la informacion para editar un proyecto que tienes creado en tu cuenta.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block mb-3">
                    <div class="card card-bordered">
                        <div class="card-inner">

                            {!! Form::open(['route' => ['customers.uploads.update'], 'method' =>'POST', 'class' =>'gy-3', 'files' => true ,'enctype'=>'multipart/form-data']) !!}
                                  
                                <input id="project" name="project" type="hidden" value="{{ $project->id }}">
                                <input id="upload" name="upload" type="hidden" value="{{ $upload->token }}">


                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Usuarios</label>
                                                <span class="form-note">Especifique el nombre de su proyecto</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    {!! Form::text('user', $user->email,  ['class' => 'form-control form-control-lg','disabled','placeholder'=> '...' ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label">Privilegios</label>
                                                <span class="form-note">Especifique el subtitulo de su proyecto.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    {!! Form::select('privilege', $privileges , $privilege , ['id' => 'privileges' , 'data-search' => 'on' , 'class' => 'form-select form-control form-control-lg']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Editar</button>
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                        </div>
                    </div>

                </div><!-- .nk-block -->
            </div>
            <!-- footer @s -->
            <div class="nk-footer">
                <div class="container wide-xl">
                    <div class="nk-footer-wrap g-2">
                        <div class="nk-footer-copyright"> © 2021 Share Work. 
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
@endsection
@push('scripts')
@endpush