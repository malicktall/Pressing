@extends('layouts/template')

@section('title', 'Dashboard')

@section('body')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title page-title">Tableau de bord</h4>
        </div>
    </div>
</div>
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-xxl-4 col-md-6">
            <div class="card is-dark h-100">
                <div class="nk-ecwg nk-ecwg1">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Ventes Totales</h6>
                            </div>
                            <div class="card-tools">
                                <a href="#" class="link">Voir le raport</a>
                            </div>
                        </div>
                        <div class="data">
                            <div class="amount">{{$vente_totals}} FCFA</div>
                            <div class="info"><strong>{{$ventes_last_month}} FCFA</strong> dernier mois</div>
                        </div>
                        <div class="data">
                            <h6 class="sub-title">Cette week juqu'a présent</h6>
                            <div class="data-group">
                                <div class="amount">{{$ventes_last_week}} FCFA</div>
                                @if ($pourcentageRedressement)
                                <div class="info text-right"><span class="change down text-danger"><em class="icon ni ni-arrow-long-up"></em>{{$pourcentageRedressement}}%</span><br><span>vs. Semaine dernière</span></div>
                                @else
                                <div class="info text-right"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>{{$pourcentageCroissance}}%</span><br><span>vs. Semaine dernière</span></div>

                                @endif
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="nk-ecwg1-ck">
                        <canvas class="ecommerce-line-chart-s1" id="totalSales"></canvas>
                    </div>
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card h-100">
                <div class="nk-ecwg nk-ecwg2">
                    <div class="card-inner">
                        <div class="card-title-group mt-n1">
                            <div class="card-title">
                                <h6 class="title">Montant total des commandes non acquitées</h6>
                            </div>
                            <div class="card-tools mr-n1">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#" class="active"><span>15 Days</span></a></li>
                                            <li><a href="#"><span>30 Days</span></a></li>
                                            <li><a href="#"><span>3 Months</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount">{{$commande_totals}}  FCFA</div>
                                @if ($pourcentageRedressementCommande)
                                <div class="info text-right"><span class="change down text-danger"><em class="icon ni ni-arrow-long-up">
                                    </em>{{$pourcentageRedressementCommande}}%</span><br><span>vs. Semaine dernière</span></div>
                                @else
                                <div class="info text-right"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up">
                                    </em>{{$pourcentageCroissanceCommande}}%</span><br><span>vs. Semaine dernière</span></div>

                                @endif

                            </div>
                        </div>
                        <h6 class="sub-title">Commandes au fils du temps</h6>
                    </div><!-- .card-inner -->
                    <div class="nk-ecwg2-ck">
                        <canvas class="ecommerce-bar-chart-s1" id="averargeOrder"></canvas>
                    </div>
                </div><!-- .nk-ecwg -->
            </div><!-- .card -->
        </div>
        {{-- <div class="col-xxl-4">
            <div class="row g-gs">
                <div class="col-xxl-12 col-md-6">
                    <div class="card">
                        <div class="nk-ecwg nk-ecwg3">
                            <div class="card-inner pb-0">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Orders</h6>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="data-group">
                                        <div class="amount">329</div>
                                        <div class="info text-right"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><br><span>vs. last week</span></div>
                                    </div>
                                </div>
                            </div><!-- .card-inner -->
                            <div class="nk-ecwg3-ck">
                                <canvas class="ecommerce-line-chart-s1" id="totalOrders"></canvas>
                            </div>
                        </div><!-- .nk-ecwg -->
                    </div><!-- .card -->
                </div><!-- .col -->
                <div class="col-xxl-12 col-md-6">
                    <div class="card">
                        <div class="nk-ecwg nk-ecwg3">
                            <div class="card-inner pb-0">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Customers</h6>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="data-group">
                                        <div class="amount">194</div>
                                        <div class="info text-right"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><br><span>vs. last week</span></div>
                                    </div>
                                </div>
                            </div><!-- .card-inner -->
                            <div class="nk-ecwg3-ck">
                                <canvas class="ecommerce-line-chart-s1" id="totalCustomers"></canvas>
                            </div>
                        </div><!-- .nk-ecwg -->
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div> --}}
        <div class="col-xxl-8">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Commandes Récentes</h6>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-list mt-n2">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Commande ID</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>Client</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                        <div class="nk-tb-col"><span>Prix total</span></div>
                        <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                    </div>
                    @forelse ($commandes_lastest as $commande_lastest)
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead" {{$commande = $commande_lastest}}><a href="{{route('commande.show', compact('commande'))}}">#{{$commande_lastest->id}}</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">

                                <div class="user-name">
                                    <span class="tb-lead">{{$commande_lastest->nom_client}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">{{$commande_lastest->created_at}}</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">{{$commande_lastest->prix_total}} <span>FCFA</span></span>
                        </div>
                        <div class="nk-tb-col">
                            @if ($commande_lastest->payed)

                            <span class="badge badge-dot badge-dot-xs badge-success">Payé</span>
                            @else
                            <span class="badge badge-dot badge-dot-xs badge-warning">Non Payé</span>

                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="nk-tb-item">
                        <div class="nk-tb-col ">
                            <span class="tb-sub">Pas de commande</span>
                        </div>
                    </div>
                    @endforelse

                </div>
            </div><!-- .card -->
        </div>
        {{-- <div class="col-xxl-4 col-md-6">
            <div class="card h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-2">
                        <div class="card-title">
                            <h6 class="title">Les produits les plus achetés</h6>
                        </div>

                    </div>
                    <ul class="nk-top-products">
                        @forelse ($produitMoreOrders as $produitMoreOrder)
                        <li class="item">
                            <div class="thumb">
                                <img src="{{asset($produitMoreOrder->photo)}}" alt="">
                            </div>
                            <div class="info">
                                <div class="title">{{$produitMoreOrder->nom}}</div>
                                <div class="price">{{$produitMoreOrder->prix}} FCFA</div>
                            </div>
                            <div class="total">
                                <div class="amount">nombre vendu</div>
                                <div class="count">{{$produitMoreOrder->nbr_commande}}</div>
                            </div>
                        </li>
                        @empty
                        <li class="item">
                            <div class="info">
                                <div class="title">Pas de produits achetés</div>
                            </div>
                        </li>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="col-xxl-3 col-md-6">
            <div class="card h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-2">
                        <div class="card-title">
                            <h6 class="title">Statistiques du magasin</h6>
                        </div>
                    </div>
                    <ul class="nk-store-statistics">
                        <li class="item">
                            <div class="info">
                                <div class="title">Commandes</div>
                                <div class="count">{{$nbr_commandes}}</div>
                            </div>
                            <em class="icon bg-primary-dim ni ni-bag"></em>
                        </li>
                        {{-- <li class="item">
                            <div class="info">
                                <div class="title">Customers</div>
                                <div class="count">2,327</div>
                            </div>
                            <em class="icon bg-info-dim ni ni-users"></em>
                        </li> --}}
                        <li class="item">
                            <div class="info">
                                <div class="title">Produits</div>
                                {{-- <div class="count">{{$nbr_produits}}</div> --}}
                            </div>
                            <em class="icon bg-pink-dim ni ni-box"></em>
                        </li>
                        <li class="item">
                            <div class="info">
                                <div class="title">Commandes non acquité</div>
                                <div class="count">{{$commande_non_acquite}}</div>
                            </div>
                            <em class="icon bg-purple-dim ni ni-server"></em>
                        </li>
                    </ul>
                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div>

    </div>
</div>

@endsection

