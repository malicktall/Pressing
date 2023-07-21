@extends('layouts/template')

@section('title', 'Detail facture '.$facture->id)

@section('body')
<div class="nk-block-head">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Facture <strong class="text-primary small">#{{$facture->id}}</strong></h3>
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>Date : <span class="text-base">{{$facture->created_at}}</span></li>
                </ul>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="/facture" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="html/invoice-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="invoice">
        <div class="invoice-action">
            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary"
                href="{{route('facture.facture_print', compact('facture'))}}"
                target="_blank"><em class="icon ni ni-printer-fill"></em></a>
        </div><!-- .invoice-actions -->
        <div class="invoice-wrap">
            <div class="invoice-brand text-center">
                <img src="{{asset('assets/images/logochti.jpg')}}" srcset="./images/logo-dark2x.png 2x" alt="">
            </div>
            <div class="invoice-head">
                <div class="invoice-contact">
                    <span class="overline-title">Facture de </span>
                    <div class="invoice-contact-info">
                        <h4 class="title">{{$facture->commande->client->name}}</h4>
                        <ul class="list-plain">
                            <li><em class="icon ni ni-map-pin-fill"></em><span>{{ config('app.name') }}<br>Localisation boutique</span></li>
                            <li><em class="icon ni ni-call-fill"></em><span>77 777 77 77 <br> 77 777 77 77</span></li>
                        </ul>
                    </div>
                </div>
                <div class="invoice-desc">
                    <h3 class="title">Facture</h3>
                    <ul class="list-plain">
                        <li class="invoice-id"><span>Facture ID</span>:<span>{{$facture->id}}</span></li>
                        <li class="invoice-date"><span>Date</span>:<span>{{$facture->created_at}}</span></li>
                    </ul>
                </div>
            </div><!-- .invoice-head -->
            <div class="invoice-bills">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="w-150px">Commande ID</th>
                                <th class="w-60">Description</th>
                                <th>Prix</th>
                                <th>Quantite</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$facture->id}}</td>
                                @if (empty($facture->description) )
                                <td>{{$facture->nom}}</td>
                                @else
                                <td>{{$facture->description}}</td>
                                @endif
                                {{-- <td>{{$facture->pivot->prix_vente}}</td> --}}
                                {{-- <td>{{$facture->pivot->quantite}}</td> --}}
                                {{-- <td>{{ $facture->pivot->quantite * $facture->pivot->prix_vente}}</td> --}}
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Somme Total</td>
                                <td>{{$facture->commande->prix_total}} FCFA</td>
                            </tr>
                            {{-- <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Livraison</td>
                                <td>$10.00</td>
                            </tr> --}}

                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Grand Total</td>
                                <td>{{$facture->commande->prix_total}} FCFA</td>
                            </tr>
                        </tfoot>
                    </table>
                    {{-- <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

