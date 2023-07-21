@extends('layouts/template')

@section('title', 'Profil '.$user->name)

@section('body')
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title"> Information Personnel</h4>

                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-data data-list">
                        <div class="data-head">
                            <h6 class="overline-title">Basics</h6>
                        </div>
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Nom Complet</span>
                                <span class="data-value">{{$user->name}}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                        </div><!-- data-item -->

                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Email</span>
                                <span class="data-value">{{$user->email}}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Numbero Téléphone</span>
                                @if ($user->telephone)
                                    <span class="data-value text-soft">{{$user->telephone}}</span>
                                @else
                                    <span class="data-value text-soft">Pas de numéro</span>
                                @endif
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                        </div>

                    </div>
                </div><!-- .nk-block -->
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar">
                                <img src="{{asset(Auth::user()->photo)}}" alt="">
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{$user->name}}</span>
                                <span class="sub-text">{{$user->email}}</span>
                            </div>
                            {{-- <div class="user-action">
                                <div class="dropdown">
                                    <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <form action="" method="post">
                                                    <input type="file" id="photo-input" style="display: none;">
                                                </form>
                                                <a href="" id="change-photo-link"><em class="icon ni ni-camera-fill"></em>
                                                <span>Change Photo</span>
                                                </a>
                                            </li>
                                            <li><a  data-toggle="tab" href="#personal"><em class="icon ni ni-edit-fill"></em><span>Modifier Profile</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div><!-- .user-card -->
                    </div>
                    <div class="card-inner">
                        <div class="user-account-info py-0">
                            <h6 class="overline-title-alt">Status</h6>
                            <div class="user-balance">{{$user->role}}</div>
                            {{-- <div class="user-balance-sub">Pending <span>0.344939 <span class="currency currency-btc">USD</span></span></div> --}}
                        </div>
                    </div>
                    <div class="card-inner p-0">
                        <ul class="link-list-menu">
                            <li><a class="active" href="#"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                            <li><a href="{{route('user.settings', compact('user'))}}">
                                <em class="icon ni ni-lock-alt-fill"></em><span>Paramètres de sécurité</span>
                            </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#multimedia">Photo Profil</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form action="{{route('user.update', compact('user'))}}" method="post">
                         @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Nom Complet</label>
                                        <input type="text" name="name" class="form-control form-control-lg"
                                            id="full-name" value="{{$user->name}}" placeholder="Enter Full name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Email</label>
                                        <input name="email" type="email" class="form-control form-control-lg"
                                            id="display-name" value="{{$user->email}}" placeholder="Enter display name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Numero tétéphone</label>
                                        <input type="text" name="telephone" class="form-control form-control-lg"
                                            id="phone-no" value="{{$user->telephone}}" placeholder="Phone Number">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-lg btn-primary">Modifier</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="tab-pane" id="multimedia">
                        <form {{$user = Auth::user()}} action="{{route('user.updatePhotoProfil', compact('user'))}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l1">Choissir une image</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-lg btn-primary">Modifier image</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // alert('asdf');

        $('#change-photo-link').on('click', function(e) {
            e.preventDefault();
            // alert('sdfghj');
            $('#photo-input').click();
        });
    });

    </script>
</div>


@endsection







