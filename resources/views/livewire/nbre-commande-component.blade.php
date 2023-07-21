<div>
    <div>
        <tr class="nk-tb-item">

            <td class="nk-tb-col tb-col-sm">
                <span class="tb-product">
                    {{-- <img src="{{asset($commande->photo)}}" alt="" class="thumb"> --}}
                    <span class="title">{{$commande->client->name}} </span>

                </span>
            </td>
            <td class="nk-tb-col">
                <span class="tb-lead">{{$commande->kilos}} </span>
            </td>
            <td class="nk-tb-col">
                <span class="tb-lead">{{$commande->status}} </span>
            </td>

            {{-- @if($commande->quantite<=0)
            <td class="nk-tb-col">
                <span class="badge badge-dim badge-danger badge-md"> épuisé</span>
            </td>
            @else
            <td class="nk-tb-col">
                <span class="tb-sub">{{$commande->quantite}}</span>
            </td>
            @endif --}}
            <td class="nk-tb-col tb-col-md">
                <span class="tb-sub">{{ $commande->prix_total }} FCFA</span>
            </td>
            <td class="nk-tb-col tb-col-md">
                <span class="tb-sub">{{ $commande->created_at }}</span>
            </td>
            <td class="nk-tb-col tb-col-md">
                <span class="tb-sub">{{ $commande->date_retour }}</span>
            </td>
            <td class="nk-tb-col tb-col-md">
                @if ($commande->payed)
                <span class="tb-sub text-success">Payé</span>

                @else
                <span class="tb-sub text-warning">Non Payé</span>

                @endif
            </td>
            {{-- <td class="nk-tb-col tb-col-md">
                <div class="asterisk tb-asterisk">
                    <a href="#"><em class="asterisk-off icon ni ni-star"></em></a>
                </div>
            </td> --}}

            <td class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1">

                    @if ($commande->status =='en attente')
                    <li class="nk-tb-action-hidden">
                        <form action="{{route('commande.delivered', compact('commande'))}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-trigger btn-tooltip" title="Marquer comme livré" >
                                <em class="icon ni ni-truck"></em>
                            </button>
                        </form>
                    </li>
                    @endif
                    @if (!$commande->payed)
                    <li class="nk-tb-action-hidden">
                        <form action="{{route('commande.payed', compact('commande'))}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-trigger btn-tooltip" title="Marquer comme Payé" >
                                <em class="icon ni ni-money"></em>
                            </button>
                        </form>
                    </li>
                    @endif
                    <li class="mr-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#" data-toggle="modal" data-target="#editEventPopup{{$commande->id}}"><em class="icon ni ni-edit"></em><span>Modifier le commande</span></a></li>
                                    <li><a  href="{{route('commande.show', compact('commande'))}}"><em class="icon ni ni-eye"></em><span>Voir le commande</span></a></li>
                                    {{-- <li><a href="#" data-toggle="modal" data-target="#showNombreCommande{{$commande->id}}"><em class="icon ni ni-activity-round"></em><span>Nombre de commande {{$commande->nom}}</span></a></li> --}}
                                    {{-- <form id="myForm" action="{{ route('commande.destroy', compact('commande')) }}" method="post">
                                        @csrf
                                        @method('delete') --}}
                                        <li><a wire:click.prevent="destroy('{{$commande->id}}')" href="#"><em class="icon ni ni-trash"></em><span>Supprimer commande</span></a></li>

                                        {{-- <button type="submit">Supprimer commande</button>
                                    </form> --}}
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </td>


            <div class="modal fade" tabindex="-1" id="editEventPopup{{$commande->id}}">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le commande {{$commande->id}}</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('commande.update', compact('commande'))}}"
                                 id="editEventForm" class="form-validate is-alter" >
                                @csrf

                                <div class="row gx-4 gy-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Client</label>
                                            <div class="form-control-wrap">

                                                <select name="client_id" id="event-theme" class="select-calendar-theme form-control form-control-lg">
                                                    @if ($commande->client)
                                                        <option value="{{$commande->client->id}}">{{$commande->client->name}}</option>
                                                    @else
                                                        <option value="">------ Choississez un client ------</option>

                                                    @endif
                                                    @forelse ($clients as $client)

                                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                                    @empty
                                                    <option value="">Pas de client</option>

                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="edit-event-title">Nombre de kilos</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="kilos"  value="{{ old('kilos') ?? $commande->kilos }}" class="form-control" id="edit-event-title" >
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="event-title">Quantité</label>
                                            <div class="form-control-wrap">
                                                <input type="number"  name="quantite" value="{{ old('quantite') ?? $commande->quantite }}" class="form-control"  >
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="event-title">Prix</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="prix_total" value="{{ old('prix_total') ?? $commande->prix_total }}" class="form-control"  >
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="event-title">Prix En gors</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="prix_en_gros" value="{{ old('prix_en_gros') ?? $commande->prix_en_gros }}" class="form-control"  >
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="event-description">Date à livrer</label>
                                            <div class="form-control-wrap">
                                                <input type="date" name="date_retour" class="form-control"
                                                    value="{{ old('date_retour') ?? $commande->date_retour }}"   id="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="payed" id="customSwitch1"
                                           >
                                            <label class="custom-control-label" for="customSwitch1">Payer</label>
                                        </div>
                                    </div> --}}

                                    <div class="col-12">
                                        <ul class="d-flex justify-content-between gx-4 mt-1">
                                            <li>
                                                <button id="updateEvent" type="submit" class="btn btn-primary">Modifier</button>
                                            </li>
                                            <li>
                                                <button data-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup" class="btn btn-danger btn-dim">Annuler</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </tr>
        {{-- <div class="modal fade" tabindex="-1" id="showNombreCommande{{$commande->id}}">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Voir le nombre de commande du commande <span class="text-primary">{{$commande->nom}}</span></h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        @if ($commande->nbr_commande)
                            <p>Ce commande a été commandé {{$commande->nbr_commande}} 😍</p>
                        @else
                            <p>Pas de commande sur ce commande😉!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</div>






