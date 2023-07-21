@extends('layouts/template')

@section('title', 'creer produit')

@section('body')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Wizard Form - Basic</h4>
            <div class="nk-block-des">
                <p>A basic demostration of wizard form.</p>
            </div>
        </div>
    </div>
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup">Ouvrir</a>
    <div class="modal fade" tabindex="-1" id="addEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Changement de mot de passe</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                    <div class="card" >
                        <div class="card-inner">
                            <form action="#" class="nk-wizard nk-wizard-simple is-alter">
                                <div class="nk-wizard-head">
                                    <h5>Etape 1</h5>
                                </div>
                                <div class="nk-wizard-content">
                                    <div class="row gy-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="fw-first-name">Ancien mot de passe </label>
                                                <div class="form-control-wrap">
                                                    <input type="password" data-msg="Required" class="form-control required" id="fw-first-name" name="fw-first-name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-wizard-head">
                                    <h5>Etape 2</h5>
                                </div>
                                <div class="nk-wizard-content">
                                    <div class="row gy-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="fw-username">Nouveau mot de passe</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" data-msg="Required" class="form-control required" id="fw-username" name="fw-username" required>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->

                                </div>
                                <div class="nk-wizard-head">
                                    <h5>Etape 3</h5>
                                </div>
                                <div class="nk-wizard-content">
                                    <div class="row gy-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="fw-token-address">Confirmer le mot de passe</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" data-msg="Required" class="form-control required" id="fw-token-address" name="fw-token-address" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">

                                            <div class="col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" data-msg="Required" class="custom-control-input required" name="fw-policy" id="fw-policy" required>
                                                    <label class="custom-control-label" for="fw-policy">Valider les informations</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




