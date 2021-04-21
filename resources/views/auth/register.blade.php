@extends('layouts.auth')

@section('content')

    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
        <a href="../../index.html" class="logo-link"><img class="logo-light logo-img logo-img-lg" src="/images/logo.png" srcset="../../images/logo2x.png 2x" alt="logo"><img class="logo-dark logo-img logo-img-lg" src="../../images/logo-dark.png" srcset="../../images/logo-dark2x.png 2x" alt="logo-dark"></a></div>
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
               <div class="nk-block-head">
                  <div class="nk-block-head-content">
                     <h4 class="nk-block-title">Registrarse</h4>
                     <div class="nk-block-des">
                        <p>Crear una nueva cuenta de Share Work</p>
                     </div>
                  </div>
               </div>
                     
            <form action="{{ url('/register') }}" method="post">
               {!! csrf_field() !!}
                  <div class="form-group">
                     <label class="form-label" for="name">Username</label>
                     <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Ingresar username">
                     @if ($errors->has('name'))
                        <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                        </div>
                     @endif
                  </div> 
                  
                  <div class="form-group">
                     <label class="form-label" for="name">Nombres</label>
                     <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" placeholder="Ingresar Nombres">
                     @if ($errors->has('name'))
                        <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                        </div>
                     @endif
                  </div> 
                  <div class="form-group">
                     <label class="form-label" for="name">Apellidos</label>
                     <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" placeholder="Ingresar Apellidos">
                     @if ($errors->has('name'))
                        <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                        </div>
                     @endif
                  </div> 
                  <div class="form-group">
                     <label class="form-label" for="email">Email</label>
                     <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address or username">
                     @if ($errors->has('email'))
                        <div class="invalid-feedback">
                              {{ $errors->first('email') }}
                        </div>
                     @endif
                  </div>
                  <div class="form-group">
                     <label class="form-label" for="password">Contraseña</label>
                     <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                           <em class="passcode-icon icon-show icon ni ni-eye"></em>
                           <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" name="password"  id="password" placeholder="Enter your passcode">
                        @if ($errors->has('email'))
                           <div class="invalid-feedback">
                                 {{ $errors->first('email') }}
                           </div>
                        @endif
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label class="form-label" for="password_confirmation">Contraseña Confirmcion</label>
                     <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password_confirmation">
                           <em class="passcode-icon icon-show icon ni ni-eye"></em>
                           <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation" placeholder="Enter your passcode">
                        @if ($errors->has('password_confirmation'))
                           <div class="invalid-feedback">
                                 {{ $errors->first('password_confirmation') }}
                           </div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="custom-control custom-control-xs custom-checkbox"><input type="checkbox" class="custom-control-input" id="checkbox">
                        <label class="custom-control-label" for="checkbox">Estoy de acuerdo con<a href="#">Política de privacidad</a> &amp; <a href="#"> Terms.</a></label>
                     </div>
                  </div>
                  <div class="form-group"><button class="btn btn-lg btn-primary btn-block">Regisrarme</button></div>
               </form>
               <div class="form-note-s2 text-center pt-4"> 
                  ¿Ya tienes una cuenta?
                   <a href="{{ url('/login') }}"><strong>Iniciar sesión</strong></a>
                </div>
              
            </div>
         </div>
    </div>

@endsection


