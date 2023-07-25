@extends('layouts.auth')

@section('title', 'Login')
@section('content')
<div class="card">
    <div class="card-inner card-inner-lg">
        {{-- <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Sign-In</h4>
                <div class="nk-block-des">
                    <p>Access the CryptoLite panel using your email and passcode.</p>
                </div>
            </div>
        </div> --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email </label>
                </div>
                <input  type="email" class="form-control form-control-lg
                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    id="default-01" placeholder="Enter votre adresse email "
                    required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                    {{-- {{route('user.forgotPassword')}} --}}
                    <a class="link link-primary link-sm" href="{{route('user.forgotPassword')}}">Code oublié ?</a>
                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                        id="password" placeholder="Entrer votre mot de passe"
                        name="password" >
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
            </div>
        </form>
        {{-- <div class="form-note-s2 text-center pt-4"> Nouveau ? <a href="html/pages/auths/auth-register-v2.html">Create an account</a>
        </div> --}}
        <div class="text-center pt-4 pb-3">
            <h6 class="overline-title overline-title-sap"><span>{{ config('app.name') }}</span></h6>
        </div>
        {{-- <ul class="nav justify-center gx-4">
            <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
        </ul> --}}
    </div>
</div>
@endsection
