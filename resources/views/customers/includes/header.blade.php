<div class="nk-header nk-header-fixed is-light">
  <div class="container-lg wide-xl">
      <div class="nk-header-wrap">
          <div class="nk-header-brand">
              <a href="{{ route('customers.dashboard') }}" class="logo-link">
                  <img class="logo-dark logo-img" src="/images/logo-dark.png" srcset="/images/logo-dark2x.png 2x" alt="logo-dark">
              </a>
          </div><!-- .nk-header-brand -->
          <div class="nk-header-tools">
              <ul class="nk-quick-nav">
                  <li class="dropdown user-dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <div class="user-toggle">
                              <div class="user-avatar sm">
                                  <em class="icon ni ni-user-alt"></em>
                              </div>
                              <div class="user-name dropdown-indicator d-none d-sm-block">{{ucfirst(Auth::user()->firstname)}} {{ucfirst(Auth::user()->lastname)}}</div>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                          <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                              <div class="user-card">
                                  <div class="user-avatar">
                                      <span>AB</span>
                                  </div>
                                  <div class="user-info">
                                      <span class="lead-text">{{ucfirst(Auth::user()->firstname)}} {{ucfirst(Auth::user()->lastname)}}</span>
                                      <span class="sub-text">{{ucfirst(Auth::user()->email)}} </span>
                                  </div>
                                  <div class="user-action">
                                      <a class="btn btn-icon mr-n2" href="html/subscription/profile-setting.html"><em class="icon ni ni-setting"></em></a>
                                  </div>
                              </div>
                          </div>
                          <div class="dropdown-inner">
                              <ul class="link-list">
                                  <li><a href="{{ route('customers.home') }}"><em class="icon ni ni-user-alt"></em><span>Dashboard</span></a></li>
                                  <li><a href="{{ route('customers.settings') }}"><em class="icon ni ni-setting-alt"></em><span>Configuración</span></a></li>
                              </ul>
                          </div>
                          <div class="dropdown-inner">
                              <ul class="link-list">
                                  <li><a class="signout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      <em class="icon ni ni-signout"></em><span>Cerrar Sesión</span></a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                            </form>
                              </ul>
                          </div>
                      </div>
                  </li><!-- .dropdown -->
                  
                  <li class="d-lg-none">
                      <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                  </li>
              </ul><!-- .nk-quick-nav -->
          </div><!-- .nk-header-tools -->
      </div><!-- .nk-header-wrap -->
  </div><!-- .container-fliud -->
</div>