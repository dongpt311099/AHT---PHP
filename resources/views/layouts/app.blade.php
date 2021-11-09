<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>De1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- link css -->
    <link rel="stylesheet" href="/vendor/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/vendor/pe-icon/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/vendor/slick/slick.css">
    <link rel="stylesheet" href="/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- link script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="wapper">
        <!-- Header -->
        @include("layouts.header")
        <!-- End Header -->

        <!-- Main content -->
        <div class="main-content container">
            <!-- Banners -->
            @yield('banners')
            <!-- End Banners -->
            @yield('products')
        </div>
        <!-- End main content -->

        <!-- Blog -->
        @yield('blogs')
        <!-- End blog -->

        <!-- Footer -->
        @include("layouts.footer")
        <!-- End Footer -->
    </div>
    <div id="backdrop" class="backdrop"></div>

    <script src="{{ mix('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/script.js') }}"></script>
</body>

</html>