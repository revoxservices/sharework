@extends('layouts.customers')

@inject('values', 'App\Models\Project')


@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@section('content')

    <div class="nk-content ">
        <div class="container wide-xl">
            <div class="nk-content-inner">
                
                @include ('customers.includes.nav')

                <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Proyectos</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Tienes total {{ count($projects) }} proyectos.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtar por</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Nombre</span></a></li>
                                                            <li><a href="#"><span>Estado</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                            <a href="{{ route('customers.projects.create') }}" class="btn btn-primary">
                                                <em class="icon ni ni-plus"></em>
                                                <span>Crear Proyecto</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .toggle-wrap -->
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">

                            @foreach($projects as $project)
                                <div class="col-sm-6 col-xl-4">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="project">
                                                <div class="project-head">
                                                    <a href="{{ route('customers.projects.files', array($project->token)) }}" class="project-title">
                                                        <div class="user-avatar sq bg-purple"><span>DD</span></div>
                                                        <div class="project-info">
                                                            <h6 class="title">{{ $project->title }}</h6>
                                                            <span class="sub-text">{{ substr($project->subtitle, 0, 22) }} </span>
                                                        </div>
                                                    </a>
                                                    @if($project->privilege_id == 1)
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                      
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="{{ route('customers.projects.view', array($project->token)) }}">
                                                                            <em class="icon ni ni-eye"></em>
                                                                            <span>Visualizar Proyecto</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('customers.projects.edit', array($project->token)) }}">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Editar Proyecto</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('customers.projects.teams', array($project->token)) }}">
                                                                            <em class="icon ni ni-check-round-cut"></em>
                                                                            <span>Administrar Equipo</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div> 
                                                    </div>
                                                    @endif 
                                                </div>
                                                <div class="project-details">
                                                    <p>{{ substr($project->description, 0, 200) }}...</p>
                                                </div>
                                                <div class="project-progress">
                                                    <div class="progress progress-pill progress-md bg-light">
                                                        <div class="progress-bar" data-progress="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div class="project-meta">
                                                    <ul class="project-users g-1">
                                                        @if(count($values->findUsers($project->project_id))>=1 )
                                                            @foreach($values->findUsers($project->project_id) as $interactive)
                                                                <li>
                                                                    <div class="user-avatar sm bg-primary"><span>{{ substr($interactive->user->firstname, 0, 1) }}{{substr($interactive->user->lastname, 0, 1) }}</span></div>
                                                                </li>
                                                            @endforeach
                                                            <li>
                                                                <div class="user-avatar bg-light sm"><span>+{{ count($project->users) }}</span></div>
                                                            </li>
                                                        @endif                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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