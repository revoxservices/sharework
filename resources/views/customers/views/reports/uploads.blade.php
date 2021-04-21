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
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Reporte Cargas</h3>
                                    <div class="nk-block-des text-soft">
                                        <p>Tiene un total de {{ count($uploads) }} archivos subidos.</p>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                            </div>
                                            <div class="card-tools mr-n1">
                                                <ul class="btn-toolbar">
                                                    <li>
                                                        <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                    </li><!-- li -->
                                                    <li class="btn-toolbar-sep"></li><!-- li -->
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <em class="icon ni ni-setting"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                <ul class="link-check">
                                                                    <li><span>Show</span></li>
                                                                    <li class="active"><a href="#">10</a></li>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a href="#">50</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Order</span></li>
                                                                    <li class="active"><a href="#">DESC</a></li>
                                                                    <li><a href="#">ASC</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Density</span></li>
                                                                    <li class="active"><a href="#">Regular</a></li>
                                                                    <li><a href="#">Compact</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                </ul><!-- .btn-toolbar -->
                                            </div><!-- card-tools -->
                                            <div class="card-search search-wrap" data-search="search">
                                                <div class="search-content">
                                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                    <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                </div>
                                            </div><!-- card-search -->
                                        </div><!-- .card-title-group -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <table class="table table-tranx">
                                            <thead>
                                                <tr class="tb-tnx-head">
                                                    <th class="tb-tnx-id"><span class="">#</span></th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Proyecto</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Archivo</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Peso</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-info">                                                       
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Fecha Creación</span>
                                                        </span>
                                                    </th>
                                                </tr><!-- tb-tnx-item -->
                                            </thead>
                                            <tbody>
                                                @foreach($uploads as $upload)
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                            <a href="#"><span>{{ $upload->id }}</span></a>
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="amount"> {{ $upload->project->title  }}</span>
                                                            </div>
                                                        </td>

                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="amount"> {{ $upload->file_name  }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="date">{{ round($upload->size/1024)  }} MB</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="date">{{ $upload->created_at }}</span>
                                                            </div>
                                                        </td>
                                                    </tr><!-- tb-tnx-item -->
                                                @endforeach
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul><!-- .pagination -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- .card -->
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