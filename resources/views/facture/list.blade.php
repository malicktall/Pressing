@extends('layouts/template')

@section('title', 'Listes des factures')

@section('body')
<div class="nk-block-head">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Factures</h3>
            <div class="nk-block-des text-soft">
                <p>Le nombre de facture est : {{$factures->count()}} </p>
            </div>
        </div><!-- .nk-block-head-content -->

    </div><!-- .nk-block-between -->
</div>
<div class="nk-block nk-block-lg">

    <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
        <thead>
            <tr class="nk-tb-item nk-tb-head">

                <th class="nk-tb-col tb-col-sm"><span>Commande ID</span></th>
                <th class="nk-tb-col"><span>Date</span></th>
                <th class="nk-tb-col"><span>Prix Total</span></th>
                <th class="nk-tb-col"><span>Nom Client</span></th>
                <th class="nk-tb-col tb-col-md"><span></span></th>
                {{-- <th class="nk-tb-col tb-col-md"><em class="tb-asterisk icon ni ni-star-round"></em></th> --}}
                {{-- <th class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-1 my-n1">
                        <li class="mr-n1">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </th> --}}
            </tr><!-- .nk-tb-item -->
        </thead>
        <tbody>
            @forelse ($factures as $facture)
            <tr class="nk-tb-item">

                <td class="nk-tb-col tb-col-sm">
                    <span class="tb-product">
                        <span class="tb-odr-id" {{$commande = $facture->commande}}>
                            <a href="{{route('commande.show', compact('commande'))}}"># {{$facture->commande_id}}</a>
                        </span>
                    </span>
                </td>
                <td class="nk-tb-col">
                    <span class="tb-sub">{{$facture->created_at}}</span>
                </td>
                <td class="nk-tb-col">
                    <span class="tb-lead">{{$facture->commande->prix_total}}</span>
                </td>
                <td class="nk-tb-col">
                    <span class="tb-sub">{{$facture->commande->nom_client}}</span>
                </td>
                {{-- <td class="nk-tb-col tb-col-md">
                    <span class="tb-sub">Fitbit, Tracker</span>
                </td> --}}
                <td class="nk-tb-col tb-col-md">
                    <div class="asterisk tb-asterisk">
                        <a href="{{route('facture.facture_print', compact('facture'))}}" target="_blank">
                            <em class="icon ni ni-printer-fill"></em></a>

                        <a
                            {{$commande_id = $facture->commande_id}}
                            href="{{route('facture.show', compact('commande_id'))}}"
                            class="btn btn-dim btn-primary mx-2">
                            voir
                            <em class="icon ni ni-eye mx-1"></em> </a>

                    </div>
                </td>
                {{-- <td class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-1 my-n1">
                        <li class="mr-n1">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </td> --}}
            </tr>
            @empty
            <tr class="nk-tb-item">

                <td class="nk-tb-col tb-col-sm">
                    <span class="tb-product">
                        <span class="tb-odr-id">Pas de facture </span>
                    </span>
                </td>


            </tr>
            @endforelse


        </tbody>
    </table><!-- .nk-tb-list -->
</div>
@endsection

