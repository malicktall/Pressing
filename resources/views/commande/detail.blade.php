@extends('layouts/template')

@section('title', 'Detail Commande '.$commande->id)

@section('body')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Client / <strong class="text-primary small">{{$commande->client->name}}</strong></h3>
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>Commande ID: <span class="text-base">#{{$commande->id}}</span></li>
                    <li>Date: <span class="text-base">{{$commande->created_at}}</span></li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="{{route('commande.index')}}"  class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">
            <div class="card-content">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('commande.show', compact('commande'))}}"><em class="icon ni ni-user-circle"></em><span>Commande</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('commande.showProduit', compact('commande'))}}"><em class="icon ni ni-bag"></em><span>Produits</span></a>
                    </li> --}}

                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                    </li> --}}
                </ul><!-- .nav-tabs -->
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Information sur la commande</h5>
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">ID</span>
                                    <span class="profile-ud-value">{{$commande->id}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Prix total</span>
                                    <span class="profile-ud-value">{{$commande->prix_total}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Kilos</span>
                                    <span class="profile-ud-value">{{$commande->kilos}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Date à livrer </span>
                                    <span class="profile-ud-value">{{$commande->date_retour}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Status</span>
                                    <span class="profile-ud-value">{{$commande->status}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Paiement</span>
                                    @if ($commande->payed)
                                        <span class="profile-ud-value">oui</span>
                                    @else
                                        <span class="profile-ud-value text-success">non</span>

                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-line">
                            <h6 class="title overline-title text-base">Information Supplémentaire sur le client</h6>
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nom</span>
                                    <span class="profile-ud-value">{{$commande->client->name}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Adresse</span>
                                    <span class="profile-ud-value">{{$commande->client->adresse}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Numero telephone</span>
                                    <span class="profile-ud-value">{{$commande->client->telephone}}</span>
                                </div>
                            </div>
                           @if ($commande->email_client)
                           <div class="profile-ud-item">
                            <div class="profile-ud wider">
                                <span class="profile-ud-label">Email</span>
                                <span class="profile-ud-value">{{$commande->client->email}}</span>
                            </div>
                        </div>
                           @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div

@endsection

