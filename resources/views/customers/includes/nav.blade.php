<div class="nk-aside toggle-screen-lg" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
    <div class="nk-sidebar-menu" data-simplebar="init">
       <div class="simplebar-wrapper" style="margin: 0px 0px -40px;">
          <div class="simplebar-height-auto-observer-wrapper">
             <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
             <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                   <div class="simplebar-content" style="padding: 0px 0px 40px;">
                      <!-- Menu -->
                      <ul class="nk-menu">
                         <li class="nk-menu-heading">
                            <h6 class="overline-title">Menu</h6>
                         </li>
                         <li class="nk-menu-item active current-page">
                            <a href="{{ route('customers.home') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                            </a>
                         </li>
                         <li class="nk-menu-item">
                            <a href="{{ route('customers.subscriptions.history') }}" class="nk-menu-link" data-original-title="" title="">
                              <span class="nk-menu-icon"><em class="icon ni ni-report-profit"></em></span>
                            <span class="nk-menu-text">Mi Suscripción</span>
                            </a>
                         </li> 
                         <li class="nk-menu-item">
                           <a href="{{ route('customers.uploads.reports') }}" class="nk-menu-link" data-original-title="" title="">
                           <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
                           <span class="nk-menu-text">Reporte Cargas</span>
                           </a>
                        </li>
                         <li class="nk-menu-item">
                            <a href="{{ route('customers.projects') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Mis Proyectos</span>
                            </a>
                         </li>   
                         <li class="nk-menu-item">
                           <a href="{{ route('customers.settings') }}" class="nk-menu-link" data-original-title="" title="">
                              <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                              <span class="nk-menu-text">Configuración</span>
                           </a>
                        </li>

                         <li class="nk-menu-heading">
                            <h6 class="overline-title">Paginas</h6>
                         </li>
                         <li class="nk-menu-item">
                            <a href="{{ route('customers.subscriptions.plans') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text">Planes</span>
                            </a>
                         </li>
                         <li class="nk-menu-item has-sub">
                           <a href="{{ route('customers.faqs') }}" class="nk-menu-link" data-original-title="" title="">
                               <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                               <span class="nk-menu-text">Soporte y Preguntas</span>
                           </a>
                       </li>

                         
                      </ul>
                      <!-- Menu -->
                      <ul class="nk-menu nk-menu-sm">
                        <div class="nk-fmg-aside-bottom">
                           <div class="nk-fmg-storage">
                               <h6 class="nk-fmg-status-title"><em class="icon ni ni-hard-drive"></em><span>Almacenamiento</span></h6>
                               <div class="progress progress-md bg-light">
                                   <div class="progress-bar" data-progress="({{ $storage }}/{{ $subscription }})*100" style="width: ({{ $storage }}/{{ $subscription }})*100%;"></div>
                               </div>
                               <div class="nk-fmg-status-info">{{ formatedSize($storage) }} de  {{ $subscription }} GB usado</div>
                           </div>
                       </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
          <div class="simplebar-placeholder" style="width: auto; height: 960px;"></div>
       </div>
       <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
       </div>
       <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
       </div>
    </div>
    <!-- .nk-sidebar-menu -->
    <div class="nk-aside-close">
       <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
    </div>
    <!-- .nk-aside-close -->
 </div>