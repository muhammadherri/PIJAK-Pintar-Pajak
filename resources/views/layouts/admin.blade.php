<!DOCTYPE html>
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
    <title>Taxceed </title>
    <!-- FAVICONS ICON -->
    {{-- <link rel="shortcut icon" type="image/png" href="images/favicon.png" /> --}}
    <link rel="stylesheet" href="{{ asset('app-assets/vendor/jquery-nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendor/nouislider/nouislider.min.css') }}">
    {{-- <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="./vendor/nouislider/nouislider.min.css"> --}}
    <!-- Style css -->
    <link href="{{ asset('app-assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app-assets/css/style.css') }}">
    {{-- <link href="./css/style.css" rel="stylesheet"> --}}
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">L</span>
            <span style="--i:2">o</span>
            <span style="--i:3">a</span>
            <span style="--i:4">d</span>
            <span style="--i:5">i</span>
            <span style="--i:6">n</span>
            <span style="--i:7">g</span>
            <span style="--i:8">.</span>
            <span style="--i:9">.</span>
            <span style="--i:10">.</span>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                {{-- <img src="{{ asset('images/umlogo.png') }}" height="40"> --}}
                <img src="{{ asset('images/univum.png') }}" height="40">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        @yield('header')
                        <ul class="navbar-nav header-right">
                            <li class="nav-item">
                                <a class="btn btn-light d-sm-inline-block d-none" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    {{ __('Keluar') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/user.png') }}" width="20" alt="" />
                            <div class="header-info ms-3">
                                {{-- @if ($user == 'erp') --}}
                                <span class="font-w600 ">Hi,{{ Auth::user()->name }}</span>
                                {{-- @else --}}
                                {{-- <span class="font-w600 ">Hi</span> --}}
                                {{-- @endif --}}
                            </div>
                        </a>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">TRANSAKSI</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('transaksipph21') }}">PPH 21</a></li>
                            <li><a href="{{ route('ebupot') }}">PPH 22</a></li>
                            <li><a href="cards-center.html">PPH 23</a></li>
                            <li><a href="cards-center.html">PPH 4 AYAT 2</a></li>
                            <li><a href="cards-center.html">PPH 24</a></li>
                            <li><a href="cards-center.html">PPH 26</a></li>
                            <li><a href="cards-center.html">PPH 28/29</a></li>
                            <li><a href="cards-center.html">PPN MASUKAN</a></li>
                            <li><a href="cards-center.html">PPN KELUARAN</a></li>
                        </ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">PENJUALAN</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('invoice/create') }}">BUAT INVOICE</a></li>
                        </ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text">PEMBELIAN</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">INVOICE</a></li>
                            <li><a href="./post-details.html">SELFT PAID E-BUPOT</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span class="nav-text">PEMBAYARAN</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('billing') }}">ID BILLING</a></li>
                            <li><a href="./chart-morris.html">PEMBAYARAN</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span class="nav-text">Pelaporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">SPT Masa</a></li>
                            <li><a href="./chart-morris.html">SSPT TAHUNAN</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">TEST</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">KALKULATOR PAJAK</a></li>
                            <li><a href="./ui-accordion.html">KOREKSI FISKAL</a></li>
                            <li><a href="./ui-accordion.html">LIHAT SPT</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">Lainnya</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Impor & Ekspor data</a></li>
                            <li><a href="{{ route('fasilitas') }}">Fasilitas</a></li>
                            <li><a href="{{ route('kodeobjekpajak') }}">Kode Objek Pajak</a></li>
                            <li><a href="{{ route('neraca') }}">Neraca</a></li>
                            <li><a href="{{ route('top') }}">Top</a></li>
                            <li><a href="{{ route('vendor') }}">Vendor</a></li>
                            <li><a href="{{ route('dokumenreferensi') }}">Dokumen Referensi</a></li>
                            <li><a href="{{ route('ptkp') }}">PTKP</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="copyright">
                    <p><strong>Taxceed Dashboard</strong> </p>
                </div>
            </div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')

        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">TAXCEED</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/chart.js/Chart.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('app-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('app-assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/wnumb/wNumb.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('app-assets/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <!-- Form validate init -->
    <script src="{{ asset('app-assets/js/plugins-init/jquery.validate-init.js') }}"></script>
    <!-- Form Steps -->
    <script src="{{ asset('app-assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}

    <script src="{{ asset('app-assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('app-assets/js/plugins-init/material-date-picker-init.js') }}"></script>



    <script>
        $(document).ready(function() {
            // SmartWizard initialize
            $('#smartwizard').smartWizard();
        });
    </script>


</body>

</html>
