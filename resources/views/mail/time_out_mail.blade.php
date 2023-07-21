@extends('layouts.mail_error')

@section('title', __('Page expiré'))
{{-- @section('code', '404')
@section('message', __('Not Found')) --}}
@section('content')
<div class="nk-main ">
    <div class="nk-wrap nk-wrap-nosidebar">
        <div class="nk-content ">
            <div class="nk-block nk-block-middle wide-md mx-auto">
                <div class="nk-block-content nk-error-ld text-center">
                    <img class="nk-error-gfx" style="width: 150px" src="{{asset('assets/images/logochti.jpg')}}" alt="">
                    <div class="wide-xs mx-auto">
                        <h3 class="nk-error-title">Page expiré </h3>
                        <a href="/login" class="btn btn-lg btn-primary mt-2">Retourner à la page de connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
