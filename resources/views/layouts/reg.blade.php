<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Taxceed" />
    <meta property="og:title" content="Taxceed" />
    <meta property="og:description" content="Taxceed" />
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <!-- PAGE TITLE HERE -->
    <link rel="icon" href="{{ asset('images/umlogo.png') }}">
    <title>PIJAK | Pintar Pajak </title>
    <!-- FAVICONS ICON -->
    {{-- <link rel="shortcut icon" type="image/png" href="images/favicon.png" /> --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendor/jquery-nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendor/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendor/select2/css/select2.min.css') }}">

    <!-- Style css -->
    <link href="{{ asset('app-assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app-assets/css/style.css') }}">
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/pijakum.png') }}"width="100" >
                    <img src="images/log.svg" alt="Image" class="img-fluid">
                </div>
                @yield('register')
               

            </div>
        </div>
    </div>
    <script src="{{ asset('app-assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/main.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/plugins-init/select2-init.js') }}"></script>
</body>

</html>
