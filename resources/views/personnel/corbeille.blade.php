@extends('layouts/template')

@section('title', 'Corbeille Client')

@section('body')
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
    @if(session('error'))
    <div class="example-alert alert-container">
        <div class="alert alert-fill alert-error alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Operation echoué</strong>! {{ session('error') }}. <button class="close" data-dismiss="alert"></button>
        </div>
    </div>
    @endif
</div>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Corbeille</h3>
            {{-- <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <li>fournisseur ID: <span class="text-base">#{{$fournisseur->id}}</span></li>
                    <li>Date: <span class="text-base">{{$fournisseur->created_at}}</span></li>
                </ul>
            </div> --}}
        </div>
        {{-- <div class="nk-block-head-content">
            <a href="{{route('fournisseur.index')}}"  class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
        </div> --}}
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">

            <div class="card-content">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('corbeille.client')}}"><em class="icon ni ni-user-circle"></em><span>Clients</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('corbeille.commande')}}"><em class="icon ni ni-bag"></em><span>Commandes</span></a>
                    </li>

                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                    </li> --}}
                </ul><!-- .nav-tabs -->
                <div class="card-inner">
                    <table class=" nk-tb-list nk-tb-ulist" >
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">

                                <th class="nk-tb-col"><span class="sub-text">Nom </span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">E-mail</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Numéro téléphone</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Adresse</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Actions</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)

                            <tr class="nk-tb-item">
                                <td class="nk-tb-col tb-col-sm">
                                    <span class="tb-product">
                                        <span class="title text-primary">{{$client->name}} </span>

                                    </span>
                                </td>

                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                    <span class="tb-sub">{{$client->email}}</span>

                                </td>

                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                    <span class="tb-sub">{{$client->telephone}}</span>

                                </td>


                                <td class="nk-tb-col tb-col-lg" >
                                    <span class="tb-sub">{{$client->adresse}}</span>
                                </td>
                                {{-- <td class="nk-tb-col tb-col-lg">
                                    @if ($client->produits->count() == 1)
                                        <span class="tb-sub text-primary">{{$client->produits[0]->nom}}</span>
                                    @else
                                    <span class="tb-sub text-primary">{{$client->produits()->count()}} produits</span>
                                    @endif
                                </td> --}}
                           
                                <td class="nk-tb-col">
                                    <form action="{{route('client.restorer', compact('client'))}}" method="POST">
                                        @csrf
                                        <button type="submit"  class="btn btn-dim btn-info">
                                            Restaurer<em class="icon ni ni-reload mx-1"></em>
                                        </button>
                                    </form>
                                </td>

                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">

                                        <li>
                                            <div class="drodown mr-n1">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('client.show', compact('client'))}}"><em class="icon ni ni-eye"></em><span>Détails client</span></a></li>
                                                        {{-- <li>
                                                            <form action="{{route('client.restorer', compact('client'))}}" method="POST">
                                                                @csrf
                                                                <button type="submit">
                                                                    <em class="icon ni ni-trash"></em><span>Restaurer ce client</span>
                                                                </button>
                                                            </form>
                                                        </li> --}}


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
                                        <p><strong>Pas de client </strong></p>
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

@endsection







