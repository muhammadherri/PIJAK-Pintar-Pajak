<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('app-assets/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.min.css') }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/style.css') }}">

    <title>Taxceed</title>
</head>
<body>
    <br>
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
</body>

</html>
