@extends('layouts.auth')

@section('content')

    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
        <a href="../../index.html" class="logo-link"><img class="logo-light logo-img logo-img-lg" src="/images/logo.png" srcset="../../images/logo2x.png 2x" alt="logo"><img class="logo-dark logo-img logo-img-lg" src="../../images/logo-dark.png" srcset="../../images/logo-dark2x.png 2x" alt="logo-dark"></a></div>
        <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Sign-In</h4>
                    <div class="nk-block-des">
                    <p>Access the CryptoLite panel using your email and passcode.</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('password.request') }}">
                
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="default-01">Email</label>
                    </div>
                    <input type="text" name="email"  id="email"  class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="Enter your email address or username" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" name="password" id="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Enter your passcode" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password_confirmation">Password Confirmation</label>
                    </div>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Enter your passcode" value="{{ old('password') }}">
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group"><button class="btn btn-lg btn-primary btn-block">Sign in</button></div>
            </form>
            <div class="form-note-s2 text-center pt-4"> 
                Already have an account? 
               <a href="{{ url('/login') }}"><strong>Sign in instead</strong></a>
            </div>
            
        </div>
        </div>
    </div>

@endsection


