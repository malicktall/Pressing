@extends('layouts/template')

@section('title', 'ajouter commande')

@section('body')
<div class="nk-fmg-body">

    <div class="nk-fmg-body-content">

        <div class="nk-fmg-listing nk-block-lg">

            <div class="tab-content">
                <div class="tab-pane active" id="file-grid-view">
                    <div class="nk-files nk-files-view-grid">

                        <div class="nk-files-list">
                            @forelse ($produits as $produit)
                            <div class="nk-file-item nk-file">
                                <div class="nk-file-info">
                                    <div class="nk-file-title">
                                        <div class="nk-file-icon">
                                            <div class="nk-file-icon-link" >
                                                <span class="nk-file-icon-type">

                                                    <img src="{{asset($produit->photo)}}" alt="image du produit a ajouter   " class="thumb">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="nk-file-name">
                                            <div class="nk-file-name-text">
                                                <a href="#" class="title">{{$produit->nom}}</a>
                                                <div class="asterisk">
                                                @if ($produit->like)
                                                    <a href="{{route('produit.unlike', compact('produit'))}}" class="active">
                                                            <em class="asterisk-on icon ni ni-star-fill"></em>
                                                            <em class="asterisk-off icon ni ni-star"></em>
                                                    </a>
                                                @else
                                                    <a href="{{route('produit.like', compact('produit'))}}" class="active">
                                                        <em class="asterisk-off icon ni ni-star"></em>
                                                    </a>

                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nk-file-desc">
                                        <li class="date">Prix</li>
                                        <li class="size">{{$produit->prix}}</li>
                                        {{-- @if ($produit->quantite>5)
                                            <span class="badge  badge-outline-success">disponible:{{$produit->quantite}}</span>
                                        @elseif ($produit->quantite>1 && $produit->quantite <=5)
                                            <li class="">
                                                <span class="badge  badge-warning">en rupture:{{$produit->quantite}}</span>
                                            </li>
                                        @else
                                            <li class="">
                                                <span class="badge  badge-danger">épuisé</span>
                                            </li>
                                        @endif --}}
                                    </ul>
                                    @if ($produit->deleted)
                                    <form action="{{route('produit.restorer', compact('produit'))}}" method="POST">
                                        @csrf
                                        <button type="submit"  class="btn btn-dim btn-warning">Restaurer</button>
                                    </form>
                                    @else
                                    <form action="{{route('addToCart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produit_id" value="{{$produit->id}}">
                                        <button type="submit" class="btn btn-dim btn-primary">Ajouter</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="nk-file-actions">
                                    <div class="dropdown">
                                        <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-plain no-bdr">
                                                <li><a href="#file-details" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Details</span></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <div class="nk-file-item nk-file">
                                <h3>Pas de produit</h3>
                            </div>
                            @endforelse
                        </div>
                    </div><!-- .nk-files -->
                </div><!-- .tab-pane -->

            </div><!-- .tab-content -->
        </div><!-- .nk-block -->
    </div><!-- .nk-fmg-body-content -->
</div><!-- .nk-fmg-body -->

@endsection


