@extends('layouts/template')

@section('title', 'Detail Commande '.$commande->id)

@section('body')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Client / <strong class="text-primary small">{{$commande->nom_client}}</strong></h3>
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>Commande ID: <span class="text-base">#{{$commande->id}}</span></li>
                    <li>Date: <span class="text-base">{{$commande->created_at}}</span></li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="{{route('commande.show', compact('commande'))}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('commande.showProduit', compact('commande'))}}"><em class="icon ni ni-bag"></em><span>Produits</span></a>
                    </li>

                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                    </li> --}}
                </ul><!-- .nav-tabs -->
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Information sur la commande</h5>
                        </div><!-- .nk-block-head -->
                        <table class=" nowrap nk-tb-list is-separate" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">

                                <th class="nk-tb-col tb-col-sm"><span>Nom</span></th>
                                {{-- <th class="nk-tb-col"><span></span></th> --}}
                                <th class="nk-tb-col"><span>Prix</span></th>
                                <th class="nk-tb-col"><span>Description</span></th>

                                </th>
                                </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                                @foreach ($commande->produits as $produit)
                                <tr class="nk-tb-item ">

                                    <td class="nk-tb-col tb-col-sm ">
                                        <span class="tb-product">
                                            <img src="{{asset($produit->photo)}}" alt="" class="thumb">
                                            <span class="title">{{$produit->nom}} </span>

                                        </span>
                                    </td>
                                    {{-- <td class="nk-tb-col"
                                    @php
                                        $dateDebutSemaine  = Carbon\Carbon::now()->startOfWeek();
                                        $dateFinSemaine   = Carbon\Carbon::now()->endOfWeek();
                                    @endphp
                                    >
                                    @if($produit->created_at >= $dateDebutSemaine && $produit->created_at <= $dateFinSemaine)
                                        <span class="badge badge-dim badge-primary badge-md"> New</span>
                                    @endif
                                    </td> --}}
                                    <td class="nk-tb-col">
                                        <span class="tb-lead">{{$produit->prix}} FCFA</span>
                                    </td>

                                    <td class="nk-tb-col tb-col-md">
                                        @if (strlen($produit->description) >=50)
                                            <span class="tb-sub">{{ implode(' ', array_slice(str_word_count($produit->description, 1), 0, 5)) }}...</span>
                                            {{-- <span class="tb-sub">Bonjour</span> --}}

                                        @else
                                        <span class="tb-sub">{{ strlen($produit->description) }}</span>

                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div

@endsection

