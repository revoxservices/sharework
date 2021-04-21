@extends('layouts.customers')
@section('body', 'npc-subscription has-aside has-touch nk-nio-theme')

@inject('values', 'App\Models\Project')
@section('content')
<div class="nk-content ">
   <div class="container wide-xl">
      <div class="nk-content-inner">
         <div class="nk-content-body">
            <div class="nk-content-wrap">
               <div class="nk-block-head nk-block-head-md">
                  <div class="nk-block-between">
                     <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title"></h3>
                     </div>
                     <!-- .nk-block-head-content -->
                     <div class="nk-block-head-content">
                        <a href="{{ route('customers.projects') }}"  class="back-to"><em class="icon ni ni-arrow-left"></em><span><span class="d-none d-sm-inline-block">De regreso a </span> Dashboard</span></a>
                     </div>
                     <!-- .nk-block-head-content -->
                  </div>
                  <!-- .nk-block-between -->
               </div>
               <!-- .nk-block-head -->
               <div class="nk-msg nk-msg-boxed">
                  <div class="nk-msg-aside">
                     
                     <!-- .nk-msg-nav -->
                     <div class="nk-msg-list" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                           <div class="simplebar-height-auto-observer-wrapper">
                              <div class="simplebar-height-auto-observer"></div>
                           </div>
                           <div class="simplebar-mask">
                              <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                 <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                       @foreach($uploads as $upload)
                                          
                                          <div class="nk-msg-item" data-msg-id="1">
                                             <div class="nk-msg-media user-avatar">
                                                <img src="./images/avatar/c-sm.jpg" alt="">
                                             </div>
                                             <div class="nk-msg-info">
                                                <div class="nk-msg-from">
                                                   <div class="nk-msg-sender">
                                                      <div class="name">{{ $upload->user->firstname }} {{ $upload->user->lastname }}</div>
                                                      <div class="lable-tag dot bg-pink"></div>
                                                   </div>
                                                   <div class="nk-msg-meta">
                                                      <div class="date">14 Dec, 2019</div>
                                                   </div>
                                                </div>
                                                <div class="nk-msg-context">
                                                   <div class="nk-msg-text">
                                                      <h6 class="title">{{ $upload->file_name }} ({{ round($upload->size/1000000 ,2) }} MB)</h6>
                                                      <p>{{ $upload->created_at }}</p>
                                                   </div>
                                                   <div class="nk-msg-lables">
                                                      <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       @endforeach
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="simplebar-placeholder" style="width: auto; height: 1389px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                           <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                           <div class="simplebar-scrollbar" style="height: 237px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                     </div>
                     <!-- .nk-msg-list -->
                  </div>
                  <!-- .nk-msg-aside -->
                  <div class="nk-msg-body bg-white profile-shown">
                    
                     <!-- .nk-reply -->
                     <div class="nk-msg-profile visible" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                           <div class="simplebar-height-auto-observer-wrapper">
                              <div class="simplebar-height-auto-observer"></div>
                           </div>
                           <div class="simplebar-mask">
                              <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                 <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                       <div class="card">
                                          <div class="card-inner-group">
                                             <div class="card-inner">
                                                <div class="user-card user-card-s2 mb-2">
                                                   <div class="user-avatar md bg-primary">
                                                      <span>AB</span>
                                                   </div>
                                                   <div class="user-info">
                                                      <h5>{{ $project->title }}</h5>
                                                      
                                                   </div>
                                                   <div class="user-card-menu dropdown">
                                                      <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                      <div class="dropdown-menu dropdown-menu-right">
                                                         <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-eye"></em><span>View Profile</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-na"></em><span>Ban From System</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-repeat"></em><span>View Orders</span></a></li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row text-center g-1">
                                                   <div class="col-6">
                                                      <div class="profile-stats">
                                                         <span class="amount">{{ count($uploads) }}</span>
                                                         <span class="sub-text">Total Archivos</span>
                                                      </div>
                                                   </div>
                                                   <div class="col-6">
                                                      <div class="profile-stats">
                                                         <span class="amount">{{ count($project->users) }}</span>
                                                         <span class="sub-text">Integrantes</span>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- .card-inner -->
                                             <div class="card-inner">
                                                <div class="aside-wg">
                                                   <h6 class="overline-title-alt mb-2">Descripción</h6>
                                                   <div class="user-info">
                                                      <p>{{ $project->description }}</p>                                                      
                                                   </div>
                                                </div>
                                                <div class="aside-wg">
                                                   <h6 class="overline-title-alt mb-2">Información Adicional</h6>
                                                   <div class="row gx-1 gy-3">
                                                      <div class="col-6">
                                                         <span class="sub-text">Proyecto: </span>
                                                         <span>{{ $project->token }}</span>
                                                      </div>
                                                      <div class="col-6">
                                                         <span class="sub-text">Status:</span>
                                                         @if($project->status == 1 )
                                                            <span class="lead-text text-success">Activo</span>
                                                         @else  
                                                            <span class="lead-text text-success">Open</span>
                                                         @endif
                                                      </div>
                                                      <div class="col-6">
                                                         <span class="sub-text">Fecha creación:</span>
                                                         <span>{{ $project->created_at }}</span>
                                                      </div>                                                      
                                                      <div class="col-6">
                                                         <span class="sub-text">Fecha actualización:</span>
                                                         <span>{{ $project->updated_at }}</span>
                                                      </div>
                                                   </div>
                                                </div>
                                                @if(count($project->findUsers($project->id))>=1 )

                                                <div class="aside-wg">
                                                   <h6 class="overline-title-alt mb-2">Integrantes</h6>
                                                   <ul class="align-center g-2">
                                                      
                                                      @foreach($values->findUsers($project->id) as $interactive)
                                                      <li>
                                                          <div class="user-avatar sm bg-primary"><span>{{ substr($interactive->user->firstname, 0, 1) }}{{substr($interactive->user->lastname, 0, 1) }}</span></div>
                                                      </li>
                                                    @endforeach
                                                   </ul>
                                                </div>

                                                
                                                @endif   
                                             </div>
                                             <!-- .card-inner -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="simplebar-placeholder" style="width: auto; height: 713px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                           <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                           <div class="simplebar-scrollbar" style="height: 558px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                     </div>
                     <!-- .nk-msg-profile -->
                  </div>
                  <!-- .nk-msg-body -->
               </div>
               <!-- .nk-msg -->
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