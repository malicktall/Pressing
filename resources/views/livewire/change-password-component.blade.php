<div>
    <div>
     <div class="modal fade" tabindex="-1" id="changePassword">
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
                             <form method="POST" action="{{route('user.passwordupdate')}}"  class="nk-wizard nk-wizard-simple is-alter">
                                @csrf
                                 <div class="nk-wizard-head">
                                     <h5>Etape 1</h5>
                                 </div>
                                 <div class="nk-wizard-content">
                                     <div class="row gy-3">
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label class="form-label" for="fw-first-name">Ancien mot de passe </label>
                                                 <div class="form-control-wrap">
                                                     <input type="password" name="oldPassword" data-msg="Required" class="form-control required" id="fw-first-name" name="fw-first-name" required>
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
                                                     <input type="password" name="password1" data-msg="Required" class="form-control required" id="fw-username" name="fw-username" required>
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
                                                 <label class="form-label" >Confirmer le mot de passe</label>
                                                 <div class="form-control-wrap">
                                                     <input type="password" name="password2"  class="form-control required"  >
                                                 </div>
                                             </div>
                                         </div>
                                         {{-- <div class="row gy-3">

                                             <div class="col-md-12">
                                                 <div class="custom-control custom-checkbox">
                                                     <input type="checkbox" data-msg="Required" class="custom-control-input required" name="fw-policy" id="fw-policy" required>
                                                     <label class="custom-control-label" for="fw-policy">Valider les informations</label>
                                                 </div>
                                             </div>
                                         </div> --}}
                                     </div>
                                     {{-- <button type="submit" class="btn btn-primary">valider</button> --}}
                                 </div>



                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    </div>
 </div>
