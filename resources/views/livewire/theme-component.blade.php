<div>
    <div>
     <body {{ $darkMode ? 'class=dark-mode' : '' }} class="nk-body bg-lighter  npc-general has-sidebar ">

         <div class="nk-app-root">
             <!-- main @s -->
             <div class="nk-main ">
                 <!-- sidebar @s -->
                 {{-- {{ $isCompact ? 'class=is-compact' : '' }} --}}
                 <div  class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                     <div class="nk-sidebar-element nk-sidebar-head">
                         <div class="nk-sidebar-brand">
                             <a href="/" class="logo-link nk-sidebar-logo">
                                 <img class="logo-light logo-img" src="{{asset('assets/images/logochti.jpg')}}" srcset="{{asset('assets/images/logochti.jpg')}} 2x" alt="logo">
                                 <img class="logo-dark logo-img" src="{{asset('assets/images/logochti.jpg')}}" srcset="{{asset('assets/images/logochti.jpg')}}2x" alt="logo-dark">
                                 <img class="logo-small logo-img logo-img-small" src="{{asset('assets/images/logochti.jpg')}}" srcset="{{asset('assets/images/logochti.jpg')}} 2x" alt="logo-small">
                             </a>
                         </div>
                         <div class="nk-menu-trigger mr-n2">
                            {{-- wire:click="toggleIsCompact"  --}}
                             {{-- <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a> --}}
                             <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                         </div>
                     </div>
                     <div class="nk-sidebar-element">
                         <div class="nk-sidebar-content">
                             <div class="nk-sidebar-menu" data-simplebar>
                                 <ul class="nk-menu">
                                     <li class="nk-menu-item">
                                         <a href="/dashboard" class="nk-menu-link">
                                             <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                             <span class="nk-menu-text">Tableau de bord</span>
                                         </a>
                                     </li><!-- .nk-menu-item -->


                                     <li class="nk-menu-item">
                                         <a href="/client" class="nk-menu-link">
                                             <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                             <span class="nk-menu-text">Clients</span>
                                         </a>
                                     </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                         <a href="/corbeille/cl" class="nk-menu-link">
                                             <span class="nk-menu-icon"><em class="icon ni ni-archive"></em></span>
                                             <span class="nk-menu-text">Corbeille</span>
                                         </a>
                                     </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                         <a {{$user = Auth::user()}} href="{{route('user.profile', compact('user'))}}"class="nk-menu-link">
                                             <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                             <span class="nk-menu-text">Réglages</span>
                                         </a>
                                     </li><!-- .nk-menu-item -->

                                     <li class="nk-menu-heading">
                                         <h6 class="overline-title text-primary-alt">Trade</h6>
                                     </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                        <a href="/commande" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Commandes</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                         <a href="facture" class="nk-menu-link">
                                             <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                             <span class="nk-menu-text">Factures</span>
                                         </a>
                                     </li><!-- .nk-menu-item -->
                                 </ul><!-- .nk-menu -->
                             </div><!-- .nk-sidebar-menu -->
                         </div><!-- .nk-sidebar-content -->
                     </div><!-- .nk-sidebar-element -->
                 </div>
                 <!-- sidebar @e -->
                 <!-- wrap @s -->
                 <div class="nk-wrap ">
                     <!-- main header @s -->
                     <div class="nk-header nk-header-fixed is-light">
                         <div class="container-fluid">
                             <div class="nk-header-wrap">
                                 <div class="nk-menu-trigger d-xl-none ml-n1">
                                     <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                                 </div>
                                 <div class="nk-header-brand d-xl-none">
                                     <a href="html/index.html" class="logo-link">
                                         <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                         <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                     </a>
                                 </div><!-- .nk-header-brand -->
                                 <div class="nk-header-search ml-3 ml-xl-0">
                                 </div><!-- .nk-header-news -->
                                 <div class="nk-header-tools">
                                     <ul class="nk-quick-nav">
                                         {{-- <li class="dropdown notification-dropdown mr-n1"> --}}

                                     {{-- @if (Route::has('commande.create')) --}}
                                     <a href="{{route('cart')}}" class="btn btn-trigger btn-icon e mx-3" ">
                                         <div class="badge badge-circle badge-primary">{{Cart::content()->count()}}</div>
                                         <em class="icon ni ni-cart-fill"></em>
                                     </a>
                                     {{-- @else

                                     @endif --}}
                                         {{-- </li> --}}
                                         <li class="dropdown user-dropdown">
                                             <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                                 <div class="user-toggle">
                                                     <div class="user-avatar">
                                                         <img src="{{asset(Auth::user()->photo)}}" alt="">
                                                     </div>
                                                     <div class="user-info d-none d-xl-block">
                                                         <div class="user-status user-status-active">{{ Auth::user()->role }}</div>
                                                         <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                                     </div>
                                                 </div>
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                 <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                     <div class="user-card">
                                                         <div class="user-avatar">
                                                             <img src="{{asset(Auth::user()->photo)}}" alt="">
                                                         </div>
                                                         <div class="user-info">
                                                             <span class="lead-text"> {{ Auth::user()->name }}</span>
                                                             <span class="sub-text"> {{ Auth::user()->email }}</span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="dropdown-inner">
                                                     <ul class="link-list">
                                                         <li><a {{$user = Auth::user()}} href="{{route('user.profile', compact('user'))}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                         <li><a {{$user = Auth::user()}} href="{{route('user.settings', compact('user'))}}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                         <li><a wire:click="toggleDarkMode" class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                     </ul>
                                                 </div>
                                                 <div class="dropdown-inner">
                                                     <ul class="link-list">
                                                         <li>
                                                             <a href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"
                                                             >
                                                         <em class="icon ni ni-signout"></em><span>Se déconnecter</span></a>
                                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                             @csrf
                                                         </form>
                                                     </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </div><!-- .nk-header-wrap -->
                         </div><!-- .container-fliud -->
                     </div>
                     <!-- main header @e -->
                     <!-- content @s -->
                     <div class="nk-content ">
                         <div class="container-fluid">
                             <div class="nk-content-inner">
                                 <div class="nk-content-body">
                                     @if(session('success'))
                                         <div class="example-alert alert-container">
                                         <div class="alert alert-fill alert-success alert-dismissible alert-icon">
                                             <em class="icon ni ni-cross-circle"></em> <strong>Operation Réussie</strong>! {{ session('success') }}. <button class="close" data-dismiss="alert"></button>
                                         </div>
                                         </div>
                                     @endif
                                     @if(session('error'))
                                         <div class="example-alert alert-container">
                                         <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
                                             <em class="icon ni ni-cross-circle"></em> <strong>Operation echoué</strong>! {{ session('error') }}. <button class="close" data-dismiss="alert"></button>
                                         </div>
                                         </div>
                                      @endif

                                     @yield('body')
                                     {{-- {{$slot}} --}}
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- content @e -->
                     <!-- footer @s -->
                     <div class="nk-footer">
                         <div class="container-fluid">
                             <div class="nk-footer-wrap">
                                 <div class="nk-footer-copyright"> &copy; Malick_Tall {{ date('Y') }} Tous droit reserves</a>
                                 </div>
                                 <div class="nk-footer-links">
                                     <ul class="nav nav-sm">
                                         <li class="nav-item"><a class="nav-link" href="{{ url()->current() }}">Terms</a></li>
                                         <li class="nav-item"><a class="nav-link" href="{{ url()->current() }}">Privacy</a></li>
                                         <li class="nav-item"><a class="nav-link" href="{{ url()->current() }}">Help</a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- footer @e -->
                 </div>
                 <!-- wrap @e -->
             </div>
             <!-- main @e -->
         </div>
         <!-- app-root @e -->
         <!-- JavaScript -->
         <script src="./assets/js/bundle.js?ver=2.4.0"></script>
         <script src="./assets/js/scripts.js?ver=2.4.0"></script>
         <script src="./assets/js/charts/chart-ecommerce.js?ver=2.4.0"></script>
         <script>
            Livewire.on('reload-page', () => {
                alert('asdfghjk');
                window.location.reload();
            });
        </script>
         @livewireScripts
     </body>
    </div>
 </div>
