@extends('layouts.auth')

@section('content')

    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
        <a href="../../index.html" class="logo-link"><img class="logo-light logo-img logo-img-lg" src="/images/logo.png" srcset="../../images/logo2x.png 2x" alt="logo"><img class="logo-dark logo-img logo-img-lg" src="../../images/logo-dark.png" srcset="../../images/logo-dark2x.png 2x" alt="logo-dark"></a></div>
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
               <div class="nk-block-head">
                  <div class="nk-block-head-content">
                     <h5 class="nk-block-title">Reset password</h5>
                     <div class="nk-block-des">
                        <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                     </div>
                  </div>
               </div>
               <form method="post" action="{{ url('password/email') }}">
                {!! csrf_field() !!}    
                  <div class="form-group">
                     <div class="form-label-group">
                         <label class="form-label" for="default-01">Email</label>
                    </div>
                     <input class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Enter your email address" value="{{ old('email') }}" >
                     @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
                  </div>
               </form>
               <div class="form-note-s2 text-center pt-4">
                   <a href="{{ url('/login') }}"><strong>Return to login</strong></a>
                </div>
            </div>
         </div>
    </div>

@endsection

