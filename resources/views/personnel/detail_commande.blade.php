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
            <a href="#" data-toggle="modal" data-target="#addKilos" class="btn btn-primary btn-dim d-none d-sm-inline-flex mx-2"><em class="icon ni ni-plus"></em><span>Kilos</span></a>
            <a href="#" data-toggle="modal" data-target="#paaserCommande" class="btn btn-primary  d-none d-sm-inline-flex mx-2"><em class="icon ni ni-plus"></em><span>Passer une Commande</span></a>
            <a  href="{{route('client.index')}}"  class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>

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
                    <table class=" nk-tb-list nk-tb-ulist" >
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">

                                <th class="nk-tb-col"><span class="sub-text">  Kilos </span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Prix </span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date livraison</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Paiement</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($client->commandes as $commande)

                            <tr class="nk-tb-item">
                                <td class="nk-tb-col tb-col-sm">
                                    <span class="tb-product">
                                        {{-- <img src="{{asset($commande->photo)}}" alt="" class="thumb"> --}}
                                        <span class="title">{{$commande->kilos}} </span>

                                    </span>
                                </td>

                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                    <span class="tb-sub">{{$commande->status}}</span>

                                </td>

                                <td class="nk-tb-col tb-col-lg" >
                                    <span class="tb-sub">{{$commande->prix_total}} FCFA</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span class="tb-lead">{{$commande->created_at}} </span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span class="tb-lead">{{$commande->date_retour}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span class="tb-lead">{{$commande->payed}}</span>
                                </td>

                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">

                                        <li>
                                            <div class="drodown mr-n1">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('commande.show', compact('commande'))}}"><em class="icon ni ni-eye"></em><span>Détails commande</span></a></li>
                                                        @if ($commande->deleted)
                                                        <li>
                                                            <form action="{{route('commande.restorer', compact('commande'))}}" method="POST">
                                                                @csrf
                                                                <button type="submit">
                                                                    <em class="icon ni ni-trash"></em><span>Restaurer ce commande</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        @else
                                                        <li>
                                                            <form action="{{route('commande.destroy', compact('commande'))}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"><em class="icon ni ni-trash"></em><span>Supprimer ce commande</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            @empty
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <p><strong>Pas de commande </strong></p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addKilos">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Modifier le nombre de kilos du client:  {{$client->name}}</h5>


                <form action="{{route('client.nbrKilos', compact('client'))}}" method="post">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Quantité à augmenter</label>
                                        <input type="text" name="nbr_kilos" class="form-control form-control-lg"
                                            id="full-name"  placeholder="20"
                                            value="{{ old('nbr_kilos') ?? $client->nbr_kilos }}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h2>Prix : </h2>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit"  class="btn btn-lg btn-primary">Ajouter</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="paaserCommande">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Passer une commande pour le client:  {{$client->name}}</h5>


                <form action="{{route('client.commande', compact('client'))}}" method="post">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gx-4 gy-3">
                                {{-- <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="hidden" name="client_id">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="event-title">Nombre de kilos</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="kilos" class="form-control" id="event-title" >
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="event-title">Quantité</label>
                                        <div class="form-control-wrap">
                                            <input type="number" name="quantite" class="form-control"  >
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="event-title">Prix</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="prix" class="form-control"  >
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="event-title">Prix En gors</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="prix_en_gros" class="form-control"  >
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="event-description">Date à livrer</label>
                                        <div class="form-control-wrap">
                                            <input type="date" name="date_retour" class="form-control" id="">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12">

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="payed" id="customSwitch1"  >
                                        <label class="custom-control-label" for="customSwitch1">Payer</label>
                                    </div>

                                </div> --}}
                                {{-- <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="edit-event-title">Image</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file"  name="photo"  class="form-control"
                                                    id="customFile"  >
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <ul class="d-flex justify-content-between gx-4 mt-1">
                                        <li>
                                            <button id="addEvent" type="submit" class="btn btn-primary">Ajouter </button>
                                        </li>
                                        <li>
                                            <button id="resetEvent" data-dismiss="modal" class="btn btn-danger btn-dim">Annuler</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


