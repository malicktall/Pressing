<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Gestion Stock | Facture {{$facture->id}}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href={{url('assets/css/dashlite.css?ver=2.4.0')}}>
    <link rel="stylesheet" type="text/css" href="./assets/css/libs/fontawesome-icons.css">
    <link id="skin-default" rel="stylesheet" href={{url('assets/css/theme.css?ver=2.4.0')}}>
</head>

<body class="bg-white" onload="printPromot()">
    <div class="nk-block">
        <div class="invoice invoice-print">
            <div class="invoice-wrap">
                <div class="invoice-brand text-center">
                    <img src="{{asset('assets/images/logochti.jpg')}}" srcset="./images/logo-dark2x.png 2x" alt="">
                </div>
                <div class="invoice-head">
                    <div class="invoice-contact">
                        <span class="overline-title">Facture de </span>
                        <div class="invoice-contact-info">
                            <h4 class="title">{{$facture->commande->nom_client}}</h4>
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
                </div>
                <div class="invoice-bills">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="w-150px">Produit ID</th>
                                    <th class="w-60">Description</th>
                                    <th>Prix</th>
                                    <th>Quantite</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($facture->commande->produits as $produit)
                                <tr>
                                    <td>{{$produit->id}}</td>
                                    @if (empty($produit->description) )
                                    <td>{{$produit->nom}}</td>
                                    @else
                                    <td>{{$produit->description}}</td>
                                    @endif
                                    <td>{{$produit->pivot->prix_vente}}</td>
                                    <td>{{$produit->pivot->quantite}}</td>
                                    <td>{{ $produit->pivot->quantite * $produit->pivot->prix_vente}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Pas de produit</td>

                                </tr>
                                @endforelse


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
                                    <td>Non prix en charge</td>
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
    <script>
        function printPromot() {
            window.print();
        }
    </script>
</body>

</html>
