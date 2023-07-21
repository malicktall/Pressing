<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href={{url('assets/css/dashlite.css?ver=2.4.0')}}>
    <link rel="stylesheet" type="text/css" href="./assets/css/libs/fontawesome-icons.css">
    <link id="skin-default" rel="stylesheet" href={{url('assets/css/theme.css?ver=2.4.0')}}>
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
    @livewireStyles
</head>

    @livewire('theme-component')

</html>
