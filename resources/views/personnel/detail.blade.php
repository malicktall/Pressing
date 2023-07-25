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
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Information sur la client</h5>
                        </div><!-- .nk-block-head -->
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">ID</span>
                                    <span class="profile-ud-value">{{$client->id}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nom Complet</span>
                                    <span class="profile-ud-value">{{$client->name}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nombre de kilos</span>
                                    <span class="profile-ud-value">{{$client->nbr_kilos}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Email</span>
                                    <span class="profile-ud-value">{{$client->email}}</span>
                                </div>
                            </div>
                            {{-- <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Scanner</span>
                                    <div id="scanner-container">
                                        <video id="preview" class="bg-danger"></video>
                                        <form action="{{route('client.store')}}" method="post" id="form">
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Numéro téléphone</span>
                                    <span class="profile-ud-value text-success">{{$client->telephone}}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Adresse</span>
                                    <span class="profile-ud-value ">{{$client->adresse}}</span>
                                </div>
                            </div>
                            @if ($client->description)
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Description</span>
                                    <span class="profile-ud-value ">{{$client->description}}</span>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                    <div class="nk-block">
                        {{-- <div class="nk-block-head nk-block-head-line">
                            <h6 class="title overline-title text-base">Information Supplémentaire sur le client</h6>
                        </div><!-- .nk-block-head --> --}}
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud " style="width: 170px; margin-left:800px" >
                                    {{-- <span class="profile-ud-label">Nom</span>
                                    <span class="profile-ud-value">{{$client->name}}</span> --}}
                                    {{$qrCode}}
                                     {{-- <h1>Scanner le code QR du client</h1> --}}
                                     <div id="reader" width="600px"></div>
                                    {{-- <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="Code QR"> --}}
                                </div>
                            </div>

                        </div>
                    </div>

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
<script type="text/javascript" src="instascan.min.js"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
      console.log(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
    scanner.addListener('scan', function(c){
        document.getElementById('id').value = c;
        document.getElementById('form').submit();
        // console.log(c);
    })
  </script>
{{-- <script src="{{ asset('assets/js/index.js') }}"></script>

{{-- <script type="module">
      // To use Html5QrcodeScanner (more info below)
    import {Html5QrcodeScanner} from "../../../node_modules/html5-qrcode/html5-qrcode-scanner.d.ts";

    // To use Html5Qrcode (more info below)
    import {Html5Qrcode} from "../../../node_modules/html5-qrcode/html5-qrcode.min.js";
</script> --}}
{{-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> --}}
{{-- <script >

    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script> --}}
@endsection


