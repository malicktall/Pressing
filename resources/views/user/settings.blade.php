@extends('layouts/template')

@section('title', 'Paramètres')

@section('body')

<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Les paramètres de sécurité</h4>
                            <div class="nk-block-des">
                                <p>Ces paramètres vous permettent de mettre votre compte en sécurité.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner-group">
                            {{-- <div class="card-inner">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <h6>Save my Activity Logs</h6>
                                        <p>You can save your all activity logs including unusual activity detected.</p>
                                    </div>
                                    <div class="nk-block-actions">
                                        <ul class="align-center gx-3">
                                            <li class="order-md-last">
                                                <div class="custom-control custom-switch mr-n2">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="activity-log">
                                                    <label class="custom-control-label" for="activity-log"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-inner">
                                <div class="between-center flex-wrap g-3">
                                    <div class="nk-block-text">
                                        <h6>Changer le mot de passe</h6>
                                        <p>Définissez un mot de passe unique </p>
                                    </div>
                                    <div class="nk-block-actions flex-shrink-sm-0">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                            <li class="order-md-last">
                                                    <a href="df" data-toggle="modal" data-target="#changePassword" class="btn btn-primary">Changer le mot de passe</a>
                                            </li>
                                            <li>
                                                <em class="text-soft text-date fs-12px">Last changed: <span>{{Auth::user()->updated_at}}</span></em>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-inner">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <h6>2 Factor Auth &nbsp; <span class="badge badge-success ml-0">Enabled</span></h6>
                                        <p>Secure your account with 2FA security. When it is activated you will need to enter not only your password, but also a special code using app. You can receive this code by in mobile app. </p>
                                    </div>
                                    <div class="nk-block-actions">
                                        <a href="#" class="btn btn-primary">Disable</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar">
                                <img src="{{asset(Auth::user()->photo)}}" alt="">
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{$user->name}}</span>
                                <span class="sub-text">{{$user->email}}</span>
                            </div>

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
                            <li><a href="{{route('user.profile', compact('user'))}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                            <li><a class="active" href="#"><em class="icon ni ni-lock-alt-fill"></em><span>Paramètres de sécurité</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div

@livewire('change-password-component')
@endsection



