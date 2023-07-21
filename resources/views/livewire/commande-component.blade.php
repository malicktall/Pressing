<div>
    <div>
        <style>
            .alert-container {
            position: fixed;
            bottom: 70px;
            right: 20px;
            z-index: 9999;
            }

            .alert {
            /* Ajoutez vos styles personnalisés ici */
            }
        </style>
        <div class="nk-block-head nk-block-head-sm">
            @if(session('success'))
            <div class="example-alert alert-container">
                <div class="alert alert-fill alert-success alert-dismissible alert-icon">
                    <em class="icon ni ni-cross-circle"></em> <strong>Operation Réussie</strong>! {{ session('success') }}. <button class="close" data-dismiss="alert"></button>
                </div>
            </div>
            @endif
            @if(session('warning'))
            <div class="example-alert alert-container">
                <div class="alert alert-fill alert-warning alert-dismissible alert-icon">
                    <em class="icon ni ni-cross-circle"></em> <strong>Operation echoué</strong>! {{ session('warning') }}. <button class="close" data-dismiss="alert"></button>
                </div>
            </div>
            @endif
            @if(session('error'))
            <div class="example-alert alert-container">
                <div class="alert alert-fill alert-error alert-dismissible alert-icon">
                    <em class="icon ni ni-cross-circle"></em> <strong>Operation echoué</strong>! {{ session('error') }}. <button class="close" data-dismiss="alert"></button>
                </div>
            </div>
            @endif
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Commandes</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                {{-- <li>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-search"></em>
                                        </div>
                                    </div>
                                </li> --}}
                                <li>
                                    {{-- <div class="drodown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Status</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a wire:click.prevent="nouveau" href="#"><span>Nouveau Commande</span></a></li>
                                                <li><a href="{{ route('commande.moreOrder') }}"><span>Les plus vendu</span></a></li>
                                                <li><a href="{{ route('commande.out') }} "><span>Commande épuisé</span></a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </li>
                                <li class="nk-block-tools-opt">
                                    {{-- {{ route('commande.create') }} <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>   --}}
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup"><em class="icon ni ni-plus"></em><span>Commande</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>

        <div class="nk-block">
            {{-- datatable-init --}}
            <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-sm"><span>Client</span></th>
                        <th class="nk-tb-col"><span>Kilos</span></th>
                        <th class="nk-tb-col"><span>Statut</span></th>
                        <th class="nk-tb-col"><span>Prix</span></th>
                        <th class="nk-tb-col"><span>Date</span></th>
                        <th class="nk-tb-col"><span>Date retour</span></th>
                        <th class="nk-tb-col"><span>Paiement</span></th>
                    {{-- <th class="nk-tb-col tb-col-md"><span>Categorie</span></th> --}}
                    <th class="nk-tb-col nk-tb-col-tools">
                    </th>
                    </tr><!-- .nk-tb-item -->
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)

                    @livewire('nbre-commande-component', ['commande' => $commande, 'clients'=>$clients], key($commande->id))


                    @endforeach
                </tbody>
            </table>


        </div>



        <div class="modal fade" tabindex="-1" id="addEventPopup">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un commande</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('commande.store') }}"
                             id="addEventForm" class="form-validate is-alter" >
                            @csrf
                            <div class="row gx-4 gy-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Client</label>
                                        <div class="form-control-wrap">

                                            <select name="client_id" id="event-theme" class="select-calendar-theme form-control form-control-lg">
                                                <option value="">------ Choississez un client ------</option>
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
                                <div class="col-12">
                                    {{-- <div class="form-group"> --}}

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="payed" id="customSwitch1"  >
                                        <label class="custom-control-label" for="customSwitch1">Payer</label>
                                    </div>

                                    {{-- </div> --}}
                                </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('a[data-target^="#editEventPopup"]').click(function() {
                var target = $(this).attr('data-target');
                $(target).modal('show');
            });
        </script>
    </div>
</div>
