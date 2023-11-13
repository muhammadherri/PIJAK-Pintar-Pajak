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
                                <a class="btn btn-warning d-sm-inline-block d-none" href="{{ route('logout') }}"
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
                            @if(Auth::user()->gender==1)
                            <img src="{{ asset('images/user.png') }}" width="20" alt="" />
                            @else
                            <img src="{{ asset('images/female.png') }}" width="20" alt="" />
                            @endif
                            <div class="header-info ms-3">
                                {{-- @if ($user == 'erp') --}}
                                <span class="font-w600 ">Hi,{{ Auth::user()->name }}</span>
                                {{-- @else --}}
                                {{-- <span class="font-w600 ">Hi</span> --}}
                                {{-- @endif --}}
                            </div>
                        </a>

                    </li>

                    <li><a class="has-arrow ai-icon" href="{{ route('home') }}" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-017-clipboard"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('transaksipph21') }}">PPh 21</a></li>
                            <li><a href="{{ route('pphfinal') }}">PPh Final</a></li>
                            <li><a href="{{ route('pphtidakfinal') }}">PPh Tidak Final</a></li>
                            <li><a href="{{ route('ebupot') }}">E-Bupot</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span class="nav-text">Penjualan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('invoice') }}">Buat Invoice</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text">Pembelian</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('prepopulates') }}">Prepopulate</a></li>
                        </ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Pembayaran</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('hutangppn') }}">Hutang PPn</a></li>
                            <li><a href="{{ route('billing') }}">ID Billing</a></li>
                            <li><a href="{{ route('pembayaran') }}">Pembayaran</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Pelaporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('spttahunan') }}" >SPT Badan 1771</a></li>
                            <li><a href="{{ route('sptmasapajak') }}" >SPT 1721</a></li>
                            <li><a href="{{ route('sptPPN') }}" >SPT PPN 1111</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-042-menu"></i>
                            <span class="nav-text">Latihan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <span class="nav-text">Laporan Keuangan Komersial</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('latihankeuangankomersil') }}">&emsp; - Neraca</a></li>
                                    <li><a href="{{ route('latihankeuanganlabarugikomersil') }}">&emsp; - Laba
                                            Rugi</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('latihan') }}">Latihan Fiskal</a></li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <span class="nav-text">Latihan Laporan Keuangan Fiskal</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('latihankeuanganfiskal') }}">&emsp; - Neraca</a></li>
                                    <li><a href="{{ route('latihankeuanganlabarugifiskal') }}">&emsp; - Laba Rugi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Soal Tes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <span class="nav-text">Laporan Keuangan Komersial</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('laporankeuangankomersil') }}">&emsp; - Neraca</a></li>
                                    <li><a href="{{ route('laporankeuanganlabarugikomersil') }}">&emsp; - Laba
                                            Rugi</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('jurnalmanual') }}">Koreksi Fiskal</a></li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <span class="nav-text">Laporan Keuangan Fiskal</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('laporankeuanganfiskal') }}">&emsp; - Neraca</a></li>
                                    <li><a href="{{ route('laporankeuanganlabarugifiskal') }}">&emsp; - Laba Rugi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-022-copy"></i>
                        <span class="nav-text">SPT Orang Pribadi</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('sptS') }}" >1770S</a></li>
                        <li><a href="{{ route('sptSS') }}" >1770SS</a></li>
                    </ul>
                </li>
                    @if (Auth::user()->status == 1)

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Lainnya</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('latihankeuangan') }}">Akun Latihan</a></li>
                            <li><a href="{{ route('neraca') }}">Akun Tes</a></li>
                            {{-- <li><a href="{{ route('dokumenreferensi') }}">Dokumen Referensi</a></lim> --}}
                            <li><a href="{{ route('fasilitas') }}">Fasilitas</a></li>
                            <li><a href="{{ route('jenis_pajak') }}">Jenis Pajak</a></li>
                            <li><a href="{{ route('jenispph') }}">Jenis PPh</a></li>
                            <li><a href="{{ route('kodejenissetoran') }}">Kode Jenis Setoran</a></li>
                            <li><a href="{{ route('kodeobjekpajak') }}">Kode Objek Pajak</a></li>
                            <li><a href="{{ route('kodeobjekpphfinal') }}">Kode Objek Pajak PPh Final</a></li>
                            <li><a href="{{ route('kodeobjekpphtidakfinal') }}">Kode Objek Pajak PPh Tidak Final</a></li>
                            <li><a href="{{ route('namakelas') }}">Nama Kelas</a></li>
                            <li><a href="{{ route('noseri') }}">No Seri</a></li>
                            <li><a href="{{ route('penandatanganan') }}">Penandatanganan</a></li>
                            <li><a href="{{ route('ptkp') }}">PTKP</a></li>
                            <li><a href="{{ route('top') }}">Top</a></li>
                            <li><a href="{{ route('vendor') }}">Vendor</a></li>
                            {{-- <li><a href="{{ route('penerimapenghasilan') }}">Penerima Penghasilan</a></li> --}}
                        </ul>

                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="{{ route('adminregister') }}" aria-expanded="false">
                            <i>
                                <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" class="text-light"
                                    width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </i>
                            <span class="nav-text">Register</span>
                        </a>
                    </li>
                    @else
                    @endif
                  
                    <li><a class="has-arrow ai-icon" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="flaticon-007-bulleye"></i>
                            
                        {{ __('Keluar') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

                <div class="copyright">
                    <p><strong>PIJAK DASHBOARD</strong></p>
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
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">PIJAK</a> 2023 <p style="color:#f3f3f3"></p></p>
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

    <script src="{{ asset('app-assets/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/plugins-init/select2-init.js') }}"></script>

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
    function addcommas(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

        //apply formatting
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
</body>

</html>
