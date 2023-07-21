@extends('layouts.auth')

@section('title', 'forgot password')

@section('content')

<div class="card">
    <div class="card-inner card-inner-lg">

        <form method="POST" action="{{ route('user.verifyEmail') }}">
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
                <button class="btn btn-lg btn-primary btn-block" type="submit">Continuer</button>
            </div>
        </form>

    </div>
</div>
@endsection







