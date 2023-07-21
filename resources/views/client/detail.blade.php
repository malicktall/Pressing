@extends('layouts/template')

@section('title', 'Detail client '.$client->id)

@section('body')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">client / <strong class="text-primary small">{{$client->name}}</strong></h3>
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>client ID: <span class="text-base">#{{$client->id}}</span></li>
                    <li>Date: <span class="text-base">{{$client->created_at}}</span></li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="{{route('client.index')}}"  class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">

            <div class="card-content">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('client.show', compact('client'))}}"><em class="icon ni ni-user-circle"></em><span>client</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('client.showProduit', compact('client'))}}"><em class="icon ni ni-bag"></em><span>Commandes</span></a>
                    </li>

                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                    </li> --}}
                </ul><!-- .nav-tabs -->
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Information sur la client</h5>
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">ID</span>
                                    <span class="profile-ud-value">{{$client->id}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nom Complet</span>
                                    <span class="profile-ud-value">{{$client->nom}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Email</span>
                                    <span class="profile-ud-value">{{$client->email}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Numéro téléphone</span>
                                    <span class="profile-ud-value text-success">{{$client->telephone}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Adresse</span>
                                    <span class="profile-ud-value ">{{$client->adresse}}</span>
                                </div>
                            </div>
                            @if ($client->description)
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Description</span>
                                    <span class="profile-ud-value ">{{$client->description}}</span>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection


