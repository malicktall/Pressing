@extends('layouts/template')

@section('title', 'Detail personnel '.$personnel->id)

@section('body')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">personnel / <strong class="text-primary small">{{$personnel->name}}</strong></h3>
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>personnel ID: <span class="text-base">#{{$personnel->id}}</span></li>
                    <li>Date: <span class="text-base">{{$personnel->created_at}}</span></li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            {{-- <a href="#" data-toggle="modal" data-target="#addKilos" class="btn btn-primary btn-dim d-none d-sm-inline-flex mx-2"><em class="icon ni ni-plus"></em><span>Kilos</span></a> --}}
            {{-- <a href="#" data-toggle="modal" data-target="#paaserCommande" class="btn btn-primary  d-none d-sm-inline-flex mx-2"><em class="icon ni ni-plus"></em><span>Passer une Commande</span></a> --}}
            <a  href="{{route('personnel.index')}}"  class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>

        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">

            <div class="card-content">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('personnel.show', compact('personnel'))}}"><em class="icon ni ni-user-circle"></em><span>personnel</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('personnel.showProduit', compact('personnel'))}}"><em class="icon ni ni-bag"></em><span>Commandes</span></a>
                    </li>

                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                    </li> --}}
                </ul><!-- .nav-tabs -->
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Information sur la personnel</h5>
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">ID</span>
                                    <span class="profile-ud-value">{{$personnel->id}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nom Complet</span>
                                    <span class="profile-ud-value">{{$personnel->name}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nombre de kilos</span>
                                    <span class="profile-ud-value">{{$personnel->nbr_kilos}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Email</span>
                                    <span class="profile-ud-value">{{$personnel->email}}</span>
                                </div>
                            </div>
                            {{-- <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Scanner</span>
                                    <div id="scanner-container">
                                        <video id="preview" class="bg-danger"></video>
                                        <form action="{{route('personnel.store')}}" method="post" id="form">
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Numéro téléphone</span>
                                    <span class="profile-ud-value text-success">{{$personnel->telephone}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Adresse</span>
                                    <span class="profile-ud-value ">{{$personnel->adresse}}</span>
                                </div>
                            </div>
                            @if ($personnel->description)
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Description</span>
                                    <span class="profile-ud-value ">{{$personnel->description}}</span>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                    <div class="nk-block">
                        {{-- <div class="nk-block-head nk-block-head-line">
                            <h6 class="title overline-title text-base">Information Supplémentaire sur le personnel</h6>
                        </div><!-- .nk-block-head --> --}}
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud " style="width: 170px; margin-left:800px" >
                                    {{-- <span class="profile-ud-label">Nom</span>
                                    <span class="profile-ud-value">{{$personnel->name}}</span> --}}
                                    {{-- {{$qrCode}} --}}
                                     {{-- <h1>Scanner le code QR du personnel</h1> --}}
                                     <div id="reader" width="600px"></div>
                                    {{-- <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="Code QR"> --}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection


