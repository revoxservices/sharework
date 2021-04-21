@extends('layouts.customers')

@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@section('content')

    <div class="nk-content ">
        <div class="container wide-xl">
            <div class="nk-content-inner">
                
                @include ('customers.includes.nav')

                <div class="nk-content-body" data-select2-id="27">
                    <div class="nk-content-wrap" data-select2-id="26">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-sub"><span>Gestión de proyecto</span></div>
                            <div class="nk-block-between-md g-4">
                                <div class="nk-block-head-content">
                                    <h2 class="nk-block-title fw-normal">Gestión de proyecto</h2>
                                    <div class="nk-block-des">
                                        <p>Puede agregar y eliminar a la miembro del proyecto como desee.</p>
                                    </div>
                                </div>
                                <div class="nk-block-head-content">
                                    <ul class="nk-block-tools gx-3">
                                        <li><a href="{{ route('customers.share.create', array($upload->id)) }}" class="btn btn-primary">Compartir Miembro</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered">
                                <table class="table table-member">
                                    <thead class="tb-member-head thead-light">
                                        <tr class="tb-member-item">
                                            <th class="tb-member-info">
                                                <span class="overline-title">Miembro del proyecto</span>
                                            </th>
                                            <th class="tb-member-type tb-col-sm">
                                                <span class="overline-title">Permiso</span>
                                            </th>
                                            <th class="tb-member-role tb-col-md">
                                                <span class="overline-title">Rol</span>
                                            </th>
                                            <th class="tb-member-action">
                                                <span class="overline-title">Acción</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tb-member-body">
                                        @foreach ($shares as $share)
                                            <tr class="tb-member-item">
                                                <td class="tb-member-info">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-success">
                                                            <span>{{ substr($share->firstname, 0, 1) }}{{ substr($share->lastname, 0, 1) }}</span>
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="lead-text">{{ $share->firstname }} {{ $share->lastname }}</span>
                                                            <span class="sub-text">{{ $share->email }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="tb-member-type tb-col-sm">
                                                    @if ($share->privilege_id == 1)
                                                        <span>Dueño</span>
                                                    @else
                                                        <span>Miembro</span>
                                                    @endif
                                                </td>
                                                <td class="tb-member-role tb-col-md">
                                                    @if($share->privilege_id == 1)
                                                        <span>Admin</span>
                                                    @elseif($share->privilege_id == 2)
                                                        <span>Editor</span>
                                                    @elseif($share->privilege_id == 3)
                                                        <span>Lector</span>
                                                    @endif
                                                </td>
                                                <td class="tb-member-action">
                                                    <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1">
                                                            <li>
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="{{ route('customers.uploads.share', array($share->id)) }}"><em class="icon ni ni-user"></em><span>Editar Integrante</span></a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="{{ route('customers.uploads.destroy', array($share->id,$project->token)) }}"><em class="icon ni ni-trash"></em><span>Eliminar</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

