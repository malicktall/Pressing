@extends('layouts.auth')

@section('title', 'forgot password')

@section('content')

<div class="card">
    <div class="card-inner card-inner-lg">

        <form method="POST" action="{{ route('user.updatedPassword') }}">
            @csrf

            <div class="form-group">
                <div class="form-control-wrap">

                    <input type="password" name="password" class="form-control form-control-xl form-control-outlined @error('password') is-invalid @enderror"  value="{{ old('password') }}"
                    id="outlined-right-icon"
                     >
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="form-label-outlined" for="outlined-right-icon">Nouveau mot de passe </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-control-wrap">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="password" name="password2" class="form-control form-control-xl form-control-outlined @error('password2') is-invalid @enderror" name="password2" value="{{ old('password2') }}"
                    id="outlined-right-icon"
                     >
                     @error('password2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="form-label-outlined" for="outlined-right-icon">Confirmer mot de passe  </label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Modifier</button>
            </div>
        </form>

    </div>
</div>
@endsection







