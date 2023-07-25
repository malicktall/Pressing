@extends('layouts/template')

@section('title', 'Listes personnel')

@section('body')
<div class="nk-block nk-block-lg">
    @if(session('error'))
    <div class="example-alert alert-container">
        <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Operation echoué</strong>! {{ session('error') }}. <button class="close" data-dismiss="alert"></button>
        </div>
    </div>
    @endif
    @if(session('success'))
    <div class="example-alert alert-container">
        <div class="alert  alert-success alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Operation Réussie</strong>! {{ session('success') }}. <button class="close" data-dismiss="alert"></button>
        </div>
        {{-- @if ($darkMode)
        <div class="alert  alert-success alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Operation Réussie</strong>! {{ session('success') }}. <button class="close" data-dismiss="alert"></button>
        </div>
        @else
        <div class="alert alert-fill alert-success alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Operation Réussie</strong>! {{ session('success') }}. <button class="close" data-dismiss="alert"></button>
        </div>
        @endif --}}

    </div>
    @endif

    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Listes des personnels</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">

                        <li>

                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="#"data-toggle="modal" data-target="#profile-edit" class="btn btn-primary" ><em class="icon ni ni-plus"></em><span>personnel</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-preview my-5">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">

                        <th class="nk-tb-col"><span class="sub-text">Nom</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Role</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Adresse mail</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Telephone</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Adresse</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Argent recu</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($personnels as $personnel)
                    <tr class="nk-tb-item">

                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="tb-lead">{{$personnel->name}} <span class="dot dot-success d-md-none ml-1"></span></span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{$personnel->role}} </span>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{$personnel->email}} </span>
                        </td>

                        <td class="nk-tb-col tb-col-md">
                            <span>{{$personnel->telephone}} </span>
                        </td>

                        <td class="nk-tb-col tb-col-lg">
                            <span>{{$personnel->adresse}} </span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{$personnel->argent_recu_total}} </span>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                {{-- <li class="nk-tb-action-hidden">
                                    <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Envoyer Email">
                                        <em class="icon ni ni-mail-fill"></em>
                                    </a>
                                </li> --}}
                                <li class="nk-tb-action-hidden">
                                    <form action="{{route('personnel.destroy', compact('personnel'))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Supprimer le personnel">
                                            <em class="icon ni ni-user-cross-fill"></em>
                                        </button>
                                    </form>

                                </li>
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{route('personnel.show', compact('personnel'))}}"><em class="icon ni ni-eye"></em><span>Voir Details</span></a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#profile-update{{$personnel->id}}">
                                                    <em class="icon ni ni-pen2"></em><span>Modifier</span></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                        <div class="modal fade" tabindex="-1" role="dialog" id="profile-update{{$personnel->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                    <div class="modal-body modal-body-lg">
                                        <h5 class="title">Modifier le personnel {{$personnel->id}}</h5>
                                        <ul class="nk-nav nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#personal">Information</a>
                                            </li>

                                        </ul>

                                        <form action="{{route('personnel.update', compact('personnel'))}}" method="post">
                                            @csrf
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="personal">
                                                    <div class="row gy-4">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Nom Complet</label>
                                                                <input type="text" name="name" class="form-control form-control-lg"
                                                                    id="full-name"  placeholder="Nom Complet"
                                                                    value="{{ old('name') ?? $personnel->name }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="display-name">Email</label>
                                                                <input name="email" type="email" class="form-control form-control-lg"
                                                                    id="display-name"  placeholder="Email"
                                                                    value="{{ old('email') ?? $personnel->email }}">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">Numero tétéphone</label>
                                                                <input type="text" name="telephone" class="form-control form-control-lg"
                                                                    id="phone-no"  placeholder="Numero de téléphone" value="{{ old('telephone') ?? $personnel->telephone }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Role</label>
                                                                <div class="form-control-wrap">

                                                                    <select name="role" id="event-theme" class="select-calendar-theme form-control form-control-lg">
                                                                        <option value="{{$personnel->role}}">{{$personnel->role}}</option>
                                                                        <option value="">------ Choississez un role ------</option>
                                                                        <option value="admin">Admin-</option>
                                                                        <option value="gestionnaire">Gestionnaire</option>
                                                                        <option value="gerant">gerant-</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                <li>
                                                                    <button type="submit"  class="btn btn-lg btn-primary">Modifier</button>
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
                    </tr>
                    @empty
                    <tr class="nk-tb-item">

                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">Pas de personnel</span>
                        </td>

                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->



</div> <!-- nk-block -->
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Ajouter un personnel</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Information</a>
                    </li>

                </ul>

                <form action="{{route('personnel.store')}}" method="post">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Nom Complet</label>
                                        <input type="text" name="name" class="form-control form-control-lg"
                                            id="full-name"  placeholder="Nom Complet">
                                            {{-- value="{{$personnel->name}}" --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Email</label>
                                        <input name="email" type="email" class="form-control form-control-lg"
                                            id="display-name" value="" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Numero tétéphone</label>
                                        <input type="text" name="telephone" class="form-control form-control-lg"
                                            id="phone-no" value="" placeholder="Numero de téléphone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <div class="form-control-wrap">

                                            <select name="role" id="event-theme" class="select-calendar-theme form-control form-control-lg">
                                                <option value="">------ Choississez un role ------</option>
                                                <option value="admin">Admin-</option>
                                                <option value="gestionnaire">Gestionnaire</option>
                                                <option value="gerant">gerant-</option>

                                            </select>
                                        </div>
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

@endsection



