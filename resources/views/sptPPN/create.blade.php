@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Laporan
        </div>
    </div>
@endsection
<script src="{{ asset('app-assets/js/scripts/sptppn.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('sptmasapajak') }}">Laporan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sptmasapajak') }}">SPT PPN</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-1111-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111" type="button" role="tab"
                                            aria-controls="nav-1111" aria-selected="true">
                                            <span class="bs-stepper-box">1111<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1111AB-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111AB" type="button" role="tab"
                                            aria-controls="nav-1111AB" aria-selected="true">
                                            <span class="bs-stepper-box">1111-AB<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1111A1-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111A1" type="button" role="tab"
                                            aria-controls="nav-1111A1" aria-selected="true">
                                            <span class="bs-stepper-box">1111-A1<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1111A2-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111A2" type="button" role="tab"
                                            aria-controls="nav-1111A2" aria-selected="true">
                                            <span class="bs-stepper-box">1111-A2<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1111B1-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111B1" type="button" role="tab"
                                            aria-controls="nav-1111B1" aria-selected="true">
                                            <span class="bs-stepper-box">1111-B1<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1111B2-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111B2" type="button" role="tab"
                                            aria-controls="nav-1111B2" aria-selected="true">
                                            <span class="bs-stepper-box">1111-B2<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1111B3-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111B3" type="button" role="tab"
                                            aria-controls="nav-1111B3" aria-selected="true">
                                            <span class="bs-stepper-box">1111-B3<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sptPPN/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- 1111 --}}
                                        <div class="tab-pane fade show active" id="nav-1111" role="tabpanel"
                                            aria-labelledby="nav-1111-tab">
                                            <h4 align="center">Surat Pemberitahuan Masa Pajak Pertambahan Nilai </p>
                                                (SPT MASA PPN)</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111"
                                                        name="nama_pkp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="alamat_1111"
                                                        name="alamat_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Alamat">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">No Telp</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="no_telp_1111"
                                                        name="no_telp_1111"type="number" min="0"
                                                        class="form-control" placeholder="Masukkan No Telp">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">No Hp</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="no_hp_1111"
                                                        name="no_hp_1111"type="number" min="0"
                                                        class="form-control" placeholder="Masukkan No Handphone">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">KLU</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="klu_1111"
                                                        name="klu_1111"type="number" min="0"
                                                        class="form-control" placeholder="Masukkan Nilai KLU">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111"
                                                        name="npwp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan NPWP">
                                                        <span id="errornpwp_1111" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="start_masa_1111"
                                                    name="start_masa_1111"type="date" min="0"
                                                    class="form-control" placeholder="Masukkan Alamat">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="end_masa_1111"
                                                    name="end_masa_1111"type="date" min="0"
                                                    class="form-control" placeholder="Masukkan Alamat">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tahun Buku</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="start_thnbuku_1111"
                                                    name="start_thnbuku_1111"type="date" min="0"
                                                    class="form-control" placeholder="Masukkan Alamat">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="end_thnbuku_1111"
                                                    name="end_thnbuku_1111"type="date" min="0"
                                                    class="form-control" placeholder="Masukkan Alamat">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan-ke</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111"
                                                        name="pembetulan_1111"type="number" min="0"
                                                        class="form-control" placeholder="Masukkan Nilai Pembetulan">
                                                </div>
                                            </div>
                                            <br>
                                            <h4>I. PENYERAHAN BARANG DAN JASA</h4>
                                            <hr>
                                            <h6>A. Terutang PPN :</h6>
                                            <h6>1. Ekspor</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" onkeyup="this.value=sprator(this.value);"   id="ekspor_1111"
                                                    name="ekspor_1111"type="text" min="0"
                                                    class="form-control" placeholder="Masukkan Ekspor">
                                                </div>
                                            </div>
                                            <h6>2. Penyerahan yang PPN-nya harus dipungut sendiri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="a2_dpp_1111" 
                                                    onkeyup="this.value=sprator(this.value);"
                                                        name="a2_dpp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan DPP">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="a2_ppn_1111" 
                                                        name="a2_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>3. Penyerahan yang PPN-nya dipungut oleh Pemungut PPN</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="a3_dpp_1111"
                                                    onkeyup="this.value=sprator(this.value);"
                                                        name="a3_dpp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan DPP">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="a3_ppn_1111"
                                                        name="a3_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>4. Penyerahan yang PPN-nya tidak dipungut</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="a4_dpp_1111"
                                                    onkeyup="this.value=sprator(this.value);"
                                                        name="a4_dpp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan DPP">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="a4_ppn_1111"
                                                        name="a4_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>5. Penyerahan yang dibebaskan dari pengenaan PPN</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="a5_dpp_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="a5_dpp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan DPP">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="a5_ppn_1111"
                                                        name="a5_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>Jumlah (I.A.1+I.A.2+I.A.3+I.A.4+I.A.5)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="a_jumlah_dpp_1111"
                                                        name="a_jumlah_dpp_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="a_jumlah_ppn_1111"
                                                        name="a_jumlah_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>B. Tidak Terutang PPN</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="b_tidak_terutang_dpp_1111"
                                                    onkeyup="this.value=sprator(this.value);"
                                                        name="b_tidak_terutang_dpp_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan DPP Tidak Terutang">
                                                </div>
                                            </div>
                                            <h6>C. Jumlah Penyerahan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="c_jumlahpenyerahan_dpp_1111"
                                                        name="c_jumlahpenyerahan_dpp_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <h4>II. PENGHITUNGAN PPN KURANG BAYAR/LEBIH BAYAR</h4>
                                            <hr>
                                            <h6>A. Pajak Keluaran yang harus dipungut sendiri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="dua_a_pajak_keluaran_ppn_1111"
                                                        name="dua_a_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>B. PPN Disetor Dimuka Dalam Masa Pajak Yang Sama</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="dua_b_pajak_keluaran_ppn_1111"
                                                    onkeyup="this.value=sprator(this.value);"
                                                        name="dua_b_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <h6>C. Pajak Masukan yang dapat diperhitungkan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input onchange="pembayaran()" autocomplete="off"   id="dua_c_pajak_keluaran_ppn_1111"\
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="dua_c_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <h6>D. PPN yang kurang atau lebih bayar</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="dua_d_pajak_keluaran_ppn_1111"
                                                        name="dua_d_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>E. PPN yang kurang atau lebih bayar pada SPT yang dibetulkan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="dua_e_pajak_keluaran_ppn_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="dua_e_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <h6>F. PPN yang kurang atau lebih bayar pada SPT yang dibetulkan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="dua_f_pajak_keluaran_ppn_1111"
                                                        name="dua_f_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>G. PPN yang kurang dibayar dilunasi tanggal</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="dua_g_pajak_keluaran_ppn_1111"
                                                        name="dua_g_pajak_keluaran_ppn_1111"type="date" min="0"
                                                        class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">NTPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="dua_g_ntpp_pajak_keluaran_ppn_1111"
                                                        name="dua_g_ntpp_pajak_keluaran_ppn_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan NTPP">
                                                </div>
                                            </div>
                                            <div id=hidden_lebih_bayar style="display:none;" class="mb-3 row">
                                                <h6>H. PPN lebih bayar pada</h6>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">PPN Lebih</label>
                                                    <div class="col-sm-9">
                                                        <select  id="dua_h_ppn_lebih_1111" name="dua_h_ppn_lebih_1111"
                                                            class="dropdown-groups">
                                                            <option value="10">Pilih</option>
                                                            <option value="0">Butir II.D Diisi dalam hal SPT Bukan Pembetulan</option>
                                                            <option value="1">Butir II.D</option>
                                                            <option value="2">Butir II.F Diisi dalam hal SPT Pembetulan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Oleh</label>
                                                    <div class="col-sm-9">
                                                        <select  id="dua_h_oleh_1111" name="dua_h_oleh_1111"
                                                            class="dropdown-groups">
                                                            <option value="10">Pilih</option>
                                                            <option value="0">PKP Pasal 9 ayat (4b) PPN</option>
                                                            <option value="1">Selain PKP Pasal 9 ayat (4b) PPN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Diminta Untuk</label>
                                                    <div class="col-sm-9">
                                                        <select onchange="togglediminta()" id="dua_h_diminta_untuk_1111" name="dua_h_diminta_untuk_1111"
                                                            class="dropdown-groups">
                                                            <option value="10">Pilih</option>
                                                            <option value="0">Dikompensasikan ke Masa Pajak  berikutnya</option>
                                                            <option value="1">Dikembalikan (Restitusi)</option>
                                                            <option value="2">Dikompensasikan ke Masa Pajak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id=hidden_diminta_untuk style="display:none;" class="mb-3 row">
                                                    <div class="col-sm-12">
                                                        <input autocomplete="off" id="dua_h_diminta_untuk_date_1111"
                                                            name="dua_h_diminta_untuk_date_1111"type="date" min="0"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Khusus Restitusi untuk PKP</label>
                                                    <div class="col-sm-9">
                                                        <select onchange="togglePasal()" id="dua_h_khusus_1111" name="dua_h_khusus_1111"
                                                            class="dropdown-groups">
                                                            <option value=10>Pilih</option>
                                                            <option value="0">Pasal 9 ayat (4C) PPN dilakukan dengan Pengembalian Pendahuluan</option>
                                                            <option value="1">Pasal 17C KUP</option>
                                                            <option value="2">Pasal 17D KUP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id=hidden_h_pasal style="display:none;" class="mb-3 row">
                                                    <div class="col-sm-12">
                                                        <select id="dua_h_pasal_1111" name="dua_h_pasal_1111"
                                                            class="dropdown-groups">
                                                            <option value="0">Prosedur biasa</option>
                                                            <option value="1">Pengembalian Pendahuluan </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h6>III. PPN TERUTANG ATAS KEGIATAN MEMBANGUN SENDIRI</h6>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-8 col-form-label">A. Jumlah Dasar Pengenaan Pajak</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="tiga_a_ppn_terutang_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="tiga_a_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-8 col-form-label">B. PPN Terutang</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="tiga_b_ppn_terutang_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="tiga_b_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">C. Dilunasi Tanggal</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="tiga_c_date_ppn_terutang_1111"
                                                    name="tiga_c_date_ppn_terutang_1111"type="date" min="0"
                                                    class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">NTPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="tiga_c_ppn_terutang_1111"
                                                        name="tiga_c_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan NTPP">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>IV. PEMBAYARAN KEMBALI PAJAK MASUKAN BAGI PKP GAGAL BERPRODUKSI</h6>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">A. PPN yang wajib dibayar kembali</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="empat_a_ppn_terutang_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="empat_a_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN yang wajib dibayar kembali">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">B. Dilunasi Tanggal</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="empat_b_date_ppn_terutang_1111"
                                                        name="empat_b_date_ppn_terutang_1111"type="date" min="0"
                                                        class="form-control" placeholder="Masukkan PPN yang wajib dibayar kembali">
                                                </div>
                                                <label class="col-sm-1 col-form-label">NTPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="empat_b_ntpp_ppn_terutang_1111"
                                                        name="empat_b_ntpp_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan NTPP">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>V. PAJAK PENJUALAN ATAS BARANG MEWAH</h6>
                                            <hr>
                                            <h6>A. PPn BM yang harus dipungut sendiri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"  id="lima_a_ppn_terutang_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="lima_a_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <h6>B. PPn BM Disetor Dimuka Dalam Masa Pajak Yang Sama</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="lima_b_ppn_terutang_1111"
                                                        onkeyup="this.value=sprator(this.value);"
                                                        name="lima_b_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <h6>C. PPn BM yang kurang atau (lebih) bayar</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="lima_c_ppn_terutang_1111"
                                                        name="lima_c_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>D. PPn BM yang kurang atau (lebih) bayar pada SPT yang dibetulkan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="lima_d_ppn_terutang_1111"
                                                    onkeyup="this.value=sprator(this.value);"
                                                        name="lima_d_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan PPN">
                                                </div>
                                            </div>
                                            <h6>E. PPn BM yang kurang atau (lebih) bayar karena pembetulan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off" readonly   id="lima_e_ppn_terutang_1111"
                                                        name="lima_e_ppn_terutang_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <h6>F. PPn BM kurang dibayar dilunasi tanggal</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="lima_f_date_1111"
                                                        name="lima_f_date_1111"type="DATE" min="0"
                                                        class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">NTPP</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="lima_f_ntpp_1111"
                                                        name="lima_f_ntpp_1111"type="text" min="0"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>VI. KELENGKAPAN SPT</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Formulir</label>
                                                <div class="col-sm-9">
                                                    <select onchange="toggleformulir()" id="formulir_1111" name="formulir_1111" class="dropdown-groups">
                                                        <option value="0">Formulir 1111 AB</option>
                                                        <option value="1">Formulir 1111 A1</option>
                                                        <option value="2">Formulir 1111 A2</option>
                                                        <option value="3">Formulir 1111 B1</option>
                                                        <option value="4">Formulir 1111 B2</option>
                                                        <option value="5">Formulir 1111 B3</option>
                                                        <option value="6">SSP PPN</option>
                                                        <option value="7">SSP PpnBM</option>
                                                        <option value="8">Surat Kuasa Khusus</option>
                                                    </select>       
                                                </div>
                                            </div>
                                            <div id=hidden_formulir style="display:none;" class="mb-3 row">
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" id="lima_formulir_1111"
                                                        name="lima_formulir_1111"type="number" min="0"
                                                        class="form-control" placeholder="Lembar">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tempat</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="tempat_1111"
                                                        name="tempat_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama Tempat">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Penandatangan</label>
                                                <div class="col-sm-9">
                                                    <select id="ttd_1111" name="ttd_1111" class="dropdown-groups">
                                                        <option value="0">PKP</option>
                                                        <option value="1">Kuasa</option>
                                                    </select>       
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama Jelas</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="namattd_1111"
                                                        name="namattd_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama Jelas">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="jabatanttd_1111"
                                                        name="jabatanttd_1111"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Jabatan">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between">
                                                <div></div>
                                                <button class="btn btn-primary btn-submit" id="add_all"
                                                    type="submit"><i data-feather='save'></i>
                                                    {{ 'Simpan' }}</button>
                                            </div>
                                        </div>
                                        {{-- 1111 --}}
                                        {{-- 1111AB --}}
                                        <div class="tab-pane fade" id="nav-1111AB" role="tabpanel"
                                            aria-labelledby="nav-1111AB-tab">
                                            <h4 align="center">REKAPITULASI PENYERAHAN DAN PEROLEHAN</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111_AB"
                                                        name="nama_pkp_1111_AB"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111_AB"
                                                        name="npwp_1111_AB"type="text" min="0" class="form-control"
                                                        placeholder="Masukkan NPWP">
                                                    <span id="errornpwp_1111_AB" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_start_1111_AB"
                                                        name="masa_start_1111_AB"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_end_1111_AB"
                                                        name="masa_end_1111_AB"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111_AB"
                                                        name="pembetulan_1111_AB"type="text" class="form-control"
                                                        placeholder="Masukkan Pembetulan">
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>I. Rekapitulasi Penyerahan</h4>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">A. Ekspor BKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off" readonly id="ekspor_bkp_1111_AB"
                                                        name="ekspor_bkp_1111_AB"type="text" class="form-control totaldpp_1111A1">
                                                </div>
                                            </div>
                                            <h4>B. Penyerahan Dalam Negeri</h4>
                                            <h6>1. Penyerahan Dalam Negri Dengan Faktur Pajak Yang Di Gunggung</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly id="pdn_dpp_1111_AB"
                                                    name="pdn_dpp_1111_AB"type="text" class="form-control totaldpp_1111A2">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly id="pdn_ppn_1111_AB"
                                                    name="pdn_ppn_1111_AB"type="text" class="form-control totalppn_1111A2">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly id="pdn_ppnbm_1111_AB"
                                                    name="pdn_ppnbm_1111_AB"type="text" class="form-control totalppnbm_1111A2">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>2. Penyerahan Dalam Negeri dengan Faktur Pajak Yang Tidak Digunggung</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input min="0" 
                                                    onchange="kurang()" 
                                                    onkeyup="this.value=sprator(this.value);" placeholder="Masukkan DPP" autocomplete="off"   id="digunggung_dpp_1111_AB"
                                                    name="digunggung_dpp_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly id="digunggung_ppn_1111_AB"
                                                    name="digunggung_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input min="0" placeholder="Masukkan PPNBM"onkeyup="this.value=sprator(this.value);"  autocomplete="off"   id="digunggung_ppnbm_1111_AB"
                                                    name="digunggung_ppnbm_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <h4>C. Rincian Penyerahan Dalam Negeri</h4>
                                            <h6>1. Penyerahan yang PPN atau PPN dan PPn BM-nya harus dipungut sendiri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input min="0" placeholder="Masukkan DPP" autocomplete="off"   id="dipungut_dpp_1111_AB"
                                                    name="dipungut_dpp_1111_AB"type="text" onkeyup="this.value=sprator(this.value);" class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly id="dipungut_ppn_1111_AB"
                                                    name="dipungut_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input min="0" onkeyup="this.value=sprator(this.value);" placeholder="Masukkan PPNBM" autocomplete="off"   id="dipungut_ppnbm_1111_AB"
                                                    name="dipungut_ppnbm_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>2. Penyerahan yang PPN atau PPN dan PPn BM-nya dipungut oleh Pemungut PPN</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input min="0" onkeyup="this.value=sprator(this.value);" placeholder="Masukkan DPP" autocomplete="off"   id="pemungut_dpp_1111_AB"
                                                    name="pemungut_dpp_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly id="pemungut_ppn_1111_AB"
                                                    name="pemungut_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input min="0" placeholder="Masukkan PPNBM" onkeyup="this.value=sprator(this.value);" autocomplete="off"   id="pemungut_ppnbm_1111_AB"
                                                    name="pemungut_ppnbm_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>3. Penyerahan yang PPN atau PPN dan PPn BM-nya tidak dipungut</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input placeholder="Masukkan DPP" min="0" onkeyup="this.value=sprator(this.value);"autocomplete="off"   id="tidakdipungut_dpp_1111_AB"
                                                    name="tidakdipungut_dpp_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly id="tidakdipungut_ppn_1111_AB"
                                                    name="tidakdipungut_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input placeholder="Masukkan PPNBM" min="0" onkeyup="this.value=sprator(this.value);"autocomplete="off"   id="tidakdipungut_ppnbm_1111_AB"
                                                    name="tidakdipungut_ppnbm_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>4. Penyerahan yang dibebaskan dari pengenaan PPN atau PPN dan PPn BM</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input placeholder="Masukkan DPP" onkeyup="this.value=sprator(this.value);" min="0" autocomplete="off"   id="bebaspajak_dpp_1111_AB"
                                                    name="bebaspajak_dpp_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly id="bebaspajak_ppn_1111_AB"
                                                    name="bebaspajak_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input placeholder="Masukkan PPNBM" onkeyup="this.value=sprator(this.value);" min="0" autocomplete="off"   id="bebaspajak_ppnbm_1111_AB"
                                                    name="bebaspajak_ppnbm_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <h4>II. Rekapitulasi Perolehan</h4>
                                            <h6>A. Impor BKP</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">BPP</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" onkeyup="this.value=sprator(this.value);" readonly   id="impor_bkp_1111_AB"
                                                    name="impor_bkp_1111_AB"type="text" class="form-control totaldpp_1111b1">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly   id="impor_bkp_ppn_1111_AB"
                                                    name="impor_bkp_ppn_1111_AB"type="text" class="form-control totalppn_1111b1">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="impor_bkp_ppnbm_1111_AB"
                                                    name="impor_bkp_ppnbm_1111_AB"type="text" class="form-control totalppnbm_1111b1">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>B. Perolehan BKP</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="perolehan_bkp_1111_AB"
                                                    name="perolehan_bkp_1111_AB"type="text" class="form-control totaldpp_1111B2">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly   id="perolehan_bkp_ppn_1111_AB"
                                                    name="perolehan_bkp_ppn_1111_AB"type="text" class="form-control totalppn_1111B2">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="perolehan_bkp_ppnbm_1111_AB"
                                                    name="perolehan_bkp_ppnbm_1111_AB"type="text" class="form-control totalppnbm_1111B2">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>C. Impor atau Perolehan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="impor_perolehan_bkp_1111_AB"
                                                    name="impor_perolehan_bkp_1111_AB"type="text" class="form-control totaldpp_1111B3">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly   id="impor_perolehan_bkp_ppn_1111_AB"
                                                    name="impor_perolehan_bkp_ppn_1111_AB"type="text" class="form-control totalppn_1111B3">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="impor_perolehan_bkp_ppnbm_1111_AB"
                                                    name="impor_perolehan_bkp_ppnbm_1111_AB"type="text" class="form-control totalppnbm_1111B3">
                                                </div>
                                            </div>
                                            <br>
                                            <h6>D. Jumlah Perolehan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-1 col-form-label">DPP</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="jumlah_perolehan_1111_AB"
                                                    name="jumlah_perolehan_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-1 col-form-label">PPN</label>
                                                <div class="col-sm-2">
                                                    <input autocomplete="off" readonly   id="jumlah_perolehan_ppn_1111_AB"
                                                    name="jumlah_perolehan_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPnBM</label>
                                                <div class="col-sm-3">
                                                    <input autocomplete="off" readonly   id="jumlah_perolehan_ppnbm_1111_AB"
                                                    name="jumlah_perolehan_ppnbm_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <h4>III. Penghitungan PM Yang Dapat dikreditkan</h4>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">A. Pajak Masukan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off" readonly   id="jumlah_pajakmasukan_1111_AB"
                                                    name="jumlah_pajakmasukan_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <h6>B. Pajak Masukan Lainnya</h6>
                                            <label class="col-sm-12 col-form-label">1. Kompensasi kelebihan PPN Masa Pajak sebelumnya</label>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off" onkeyup="this.value=sprator(this.value);" placeholder="Masukkan Nilai Pajak Sebelumnya" min="0"    id="ppn_masa_pajak_sebelumnya_1111_AB"
                                                    name="ppn_masa_pajak_sebelumnya_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-sm-12 col-form-label">2. Kompensasi kelebihan PPN karena pembetulan SPT PPN Masa Pajak</label>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"     id="spt_ppn_date_1111_AB"
                                                    name="spt_ppn_date_1111_AB"type="date" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-form-label">PPN</label>
                                                <div class="col-sm-3">
                                                    <input placeholder="Masukkan PPN" onkeyup="this.value=sprator(this.value);" min="0" autocomplete="off"     id="spt_ppn_1111_AB"
                                                    name="spt_ppn_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-sm-12 col-form-label">3. Hasil Penghitungan Kembali Pajak Masukan yang telah dikreditkan sebagai penambah (pengurang) Pajak Masukan</label>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input placeholder="Masukkan Jumlah Pajak Masukan" onkeyup="this.value=sprator(this.value);" min="0" autocomplete="off"     id="pajak_masukan_1111_AB"
                                                    name="pajak_masukan_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-sm-12 col-form-label">Jumlah (III.B.1 + III.B.2 + III.B.3)</label>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off" readonly   id="jumlah_pajak_masukan_1111_AB"
                                                    name="jumlah_pajak_masukan_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <label class="col-sm-12 col-form-label">Jumlah Pajak Masukan yang Dapat Diperhitungkan( III.A + III.B.4)</label>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off" readonly   id="totaljumlah_pajak_masukan_1111_AB"
                                                    name="totaljumlah_pajak_masukan_1111_AB"type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 1111AB --}}
                                        {{-- 1111A1 --}}
                                        <div class="tab-pane fade" id="nav-1111A1" role="tabpanel"
                                            aria-labelledby="nav-1111A1-tab">
                                            <h4 align="center">DAFTAR EKSPOR BKP BERWUJUD, BKP TIDAK BERWUJUD, DAN ATAU JKP</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111_A1"
                                                        name="nama_pkp_1111_A1"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111_A1"
                                                        name="npwp_1111_A1"type="text" min="0" class="form-control"
                                                        placeholder="Masukkan NPWP">
                                                    <span id="errornpwp_1111_A1" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_start_1111_A1"
                                                        name="masa_start_1111_A1"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_end_1111_A1"
                                                        name="masa_end_1111_A1"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111_A1"
                                                        name="pembetulan_1111_A1"type="text" class="form-control"
                                                        placeholder="Masukkan Pembetulan">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="spt1111A1"class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Pembeli BKP</th>
                                                                <th class="text-center">No Dokumen Tertentu</th>
                                                                <th class="text-center">Tanggal</th>
                                                                <th class="text-center">DPP Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">Keterangan Daftar Ekspor</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="auto" class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_nama_pembeli_bkp_1111A1[]"
                                                                        id="pajak_nama_pembeli_bkp_1111A1[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_doc_1111A1[]" min="0"
                                                                        id="pajak_no_doc_1111A1[]"
                                                                        class="form-control"/>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="date"
                                                                        name="pajak_tanggal_1111A1[]"
                                                                        id="pajak_tanggal_1111A1[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                    onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_dpp_1111A1[]" id="pajak_dpp_1111A1[]"
                                                                        min="0"
                                                                        class="form-control subdpp_1111A1" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_keterangan_1111A1[]"
                                                                        id="pajak_keterangan_1111A1[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td><button type="button" class="btn btn-light"><i
                                                                            class="fa fa-trash"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-sptppn_1111A1"
                                                                        type="button"><i data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot class="footer">
                                                            <tr>
                                                                <td colspan="3"><b>JUMLAH</b></td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_dpp_1111A1" id="total_dpp_1111A1"
                                                                        class="form-control totaldpp_1111A1" />
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                   
                                                                </td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        {{-- 1111A1 --}}
                                        {{-- 1111A2 --}}
                                        <div class="tab-pane fade" id="nav-1111A2" role="tabpanel"
                                            aria-labelledby="nav-1111A2-tab">
                                            <h4 align="center">DAFTAR PAJAK KELUARAN ATAS PENYERAHAN DALAM NEGERI DENGAN FAKTUR PAJAK</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111_A1"
                                                        name="nama_pkp_1111_A2"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111_A2"
                                                        name="npwp_1111_A2"type="text" min="0" class="form-control"
                                                        placeholder="Masukkan NPWP">
                                                    <span id="errornpwp_1111_A2" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_start_1111_A2"
                                                        name="masa_start_1111_A2"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_end_1111_A2"
                                                        name="masa_end_1111_A2"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111_A2"
                                                        name="pembetulan_1111_A2"type="text" class="form-control"
                                                        placeholder="Masukkan Pembetulan">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="spt1111A2"class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Penjual BKP</th>
                                                                <th class="text-center">Nomor NPWP</th>
                                                                <th class="text-center">Kode Dan No.Seri Faktur Pajak</th>
                                                                <th class="text-center">Tanggal</th>
                                                                <th class="text-center">DPP Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPN Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPnBM Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">Kode dan NSFP Diganti</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="auto" class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_nama_penjual_bkp_1111A2[]"
                                                                        id="pajak_nama_penjual_bkp_1111A2[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_npwp_1111A2[]" min="0"
                                                                        id="pajak_no_npwp_1111A2[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_kode_dan_no_seri_1111A2[]"
                                                                        id="pajak_kode_dan_no_seri_1111A2[]"
                                                                        min="0" class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="date"
                                                                        name="pajak_tanggal_1111A2[]"
                                                                        id="pajak_tanggal_1111A2[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_dpp_1111A2[]" id="pajak_dpp_1111A2[]"
                                                                        min="0"
                                                                        class="form-control subdpp_1111A2" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   readonly autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_ppn_1111A2[]" id="pajak_ppn_1111A2[]"
                                                                        min="0"
                                                                        class="form-control subppn_1111A2" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input    autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_ppnBM_1111A2[]"
                                                                        id="pajak_ppnBM_1111A2[]" min="0"
                                                                        class="form-control subppnbm_1111A2" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_seri_1111A2[]"
                                                                        id="pajak_no_seri_1111A2[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td><button type="button" class="btn btn-light"><i
                                                                            class="fa fa-trash"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-sptppn_1111A2"
                                                                        type="button"><i data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot class="footer">
                                                            <tr>
                                                                <td colspan="4"><b>JUMLAH</b></td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_dpp_1111A2" id="total_dpp_1111A2"
                                                                        class="form-control totaldpp_1111A2" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppn_1111A2" id="total_ppn_1111A2"
                                                                        class="form-control totalppn_1111A2" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppnbm_1111A2" id="total_ppnbm_1111A2"
                                                                        class="form-control totalppnbm_1111A2" />
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 1111A2 --}}
                                        {{-- 1111B1 --}}
                                        <div class="tab-pane fade" id="nav-1111B1" role="tabpanel"
                                            aria-labelledby="nav-1111B1-tab">
                                            <h4 align="center">DAFTAR PAJAK MASUKAN YANG DAPAT ATAS IMPOR BKP DAN PEMANFAATAN BKP TIDAK BERWUJUD/JKP DARI LUAR DAERAH PABEAN</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111_b1"
                                                        name="nama_pkp_1111_b1"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111_b1"
                                                        name="npwp_1111_b1"type="text" min="0" class="form-control"
                                                        placeholder="Masukkan NPWP">
                                                    <span id="errornpwp_1111_b1" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_start_1111_b1"
                                                        name="masa_start_1111_b1"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_end_1111_b1"
                                                        name="masa_end_1111_b1"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111_b1"
                                                        name="pembetulan_1111_b1"type="text" class="form-control"
                                                        placeholder="Masukkan Pembetulan">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="spt1111b1"class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Penjual BKP</th>
                                                                <th class="text-center">Nomor Dokumen Tertentu</th>
                                                                <th class="text-center">Tanggal</th>
                                                                <th class="text-center">DPP Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPN Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPnBM Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">Keterangan Daftar Pajak</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="auto" class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_nama_penjual_bkp_1111b1[]"
                                                                        id="pajak_nama_penjual_bkp_1111b1[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_doc_1111b1[]" min="0"
                                                                        id="pajak_no_doc_1111b1[]"
                                                                        class="form-control" />
                                                                </td>
                                                               
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="date"
                                                                        name="pajak_tanggal_1111b1[]"
                                                                        id="pajak_tanggal_1111b1[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_dpp_1111b1[]" id="pajak_dpp_1111b1[]"
                                                                        min="0"
                                                                        class="form-control subdpp_1111b1" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   readonly autocomplete="off" type="text"
                                                                        name="pajak_ppn_1111b1[]" id="pajak_ppn_1111b1[]"
                                                                        min="0"
                                                                        class="form-control subppn_1111b1" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_ppnBM_1111b1[]"
                                                                        id="pajak_ppnBM_1111b1[]" min="0"
                                                                        class="form-control subppnbm_1111b1" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="keterangan_1111b1[]"
                                                                        id="keterangan_1111b1[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td><button type="button" class="btn btn-light"><i
                                                                            class="fa fa-trash"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-sptppn_1111b1"
                                                                        type="button"><i data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot class="footer">
                                                            <tr>
                                                                <td colspan="3"><b>JUMLAH</b></td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_dpp_1111b1" id="total_dpp_1111b1"
                                                                        class="form-control totaldpp_1111b1" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppn_1111b1" id="total_ppn_1111b1"
                                                                        class="form-control totalppn_1111b1" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppnbm_1111b1" id="total_ppnbm_1111b1"
                                                                        class="form-control totalppnbm_1111b1" />
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 1111B1 --}}
                                        {{-- 1111B2 --}}
                                        <div class="tab-pane fade" id="nav-1111B2" role="tabpanel"
                                            aria-labelledby="nav-1111B2-tab">
                                            <h4 align="center">DAFTAR PAJAK MASUKAN YANG DAPAT DIKREDITKAN ATAS PEROLEHAN BKP/JKP DALAM NEGERI</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111_b2"
                                                        name="nama_pkp_1111_b2"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111_b2"
                                                        name="npwp_1111_b2"type="text" min="0" class="form-control"
                                                        placeholder="Masukkan NPWP">
                                                    <span id="errornpwp_1111_b2" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_start_1111_b2"
                                                        name="masa_start_1111_b2"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_end_1111_b2"
                                                        name="masa_end_1111_b2"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111_b2"
                                                        name="pembetulan_1111_b2"type="text" class="form-control"
                                                        placeholder="Masukkan Pembetulan">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="spt1111B2"class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Penjual BKP</th>
                                                                <th class="text-center">Nomor NPWP</th>
                                                                <th class="text-center">Kode Dan No.Seri Faktur Pajak</th>
                                                                <th class="text-center">Tanggal</th>
                                                                <th class="text-center">DPP Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPN Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPnBM Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">Kode dan NSFP Diganti</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="auto" class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_nama_penjual_bkp_1111B2[]"
                                                                        id="pajak_nama_penjual_bkp_1111B2[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_npwp_1111B2[]" min="0"
                                                                        id="pajak_no_npwp_1111B2[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_kode_dan_no_seri_1111B2[]"
                                                                        id="pajak_kode_dan_no_seri_1111B2[]"
                                                                        min="0" class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="date"
                                                                        name="pajak_tanggal_1111B2[]"
                                                                        id="pajak_tanggal_1111B2[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input onkeyup="this.value=sprator(this.value);"   autocomplete="off" type="text"
                                                                        name="pajak_dpp_1111B2[]" id="pajak_dpp_1111B2[]"
                                                                        min="0"
                                                                        class="form-control subdpp_1111B2" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input onkeyup="this.value=sprator(this.value);"   readonly autocomplete="off" type="text"
                                                                        name="pajak_ppn_1111B2[]" id="pajak_ppn_1111B2[]"
                                                                        min="0"
                                                                        class="form-control subppn_1111B2" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input onkeyup="this.value=sprator(this.value);"    autocomplete="off" type="text"
                                                                        name="pajak_ppnBM_1111B2[]"
                                                                        id="pajak_ppnBM_1111B2[]" min="0"
                                                                        class="form-control subppnbm_1111B2" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_seri_1111B2[]"
                                                                        id="pajak_no_seri_1111B2[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td><button type="button" class="btn btn-light"><i
                                                                            class="fa fa-trash"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-sptppn_1111B2"
                                                                        type="button"><i data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot class="footer">
                                                            <tr>
                                                                <td colspan="4"><b>JUMLAH</b></td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_dpp_1111B2" id="total_dpp_1111B2"
                                                                        class="form-control totaldpp_1111B2" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppn_1111B2" id="total_ppn_1111B2"
                                                                        class="form-control totalppn_1111B2" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppnbm_1111B2" id="total_ppnbm_1111B2"
                                                                        class="form-control totalppnbm_1111B2" />
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 1111B2 --}}
                                        {{-- 1111B3 --}}
                                        <div class="tab-pane fade" id="nav-1111B3" role="tabpanel"
                                            aria-labelledby="nav-1111B3-tab">
                                            <h4 align="center">DAFTAR PAJAK MASUKAN YANG TIDAK DAPAT DIKREDITKAN ATAU YANG MENDAPAT FASILITAS</h4>
                                            <hr>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama PKP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="nama_pkp_1111_b3"
                                                        name="nama_pkp_1111_b3"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan Nama PKP">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="npwp_1111_b3"
                                                        name="npwp_1111_b3"type="text" min="0"
                                                        class="form-control" placeholder="Masukkan NPWP">
                                                    <span id="errornpwp_1111_b3" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_start_1111_b3"
                                                        name="masa_start_1111_b3"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                                <label class="col-sm-1 col-form-label">s/d</label>
                                                <div class="col-sm-4">
                                                    <input autocomplete="off"   id="masa_end_1111_b3"
                                                        name="masa_end_1111_b3"type="date" class="form-control"
                                                        placeholder="Masukkan Masa">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pembetulan</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off"   id="pembetulan_1111_b3"
                                                        name="pembetulan_1111_b3"type="text" class="form-control"
                                                        placeholder="Masukkan Pembetulan">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="spt1111B3"class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Nama Penjual BKP</th>
                                                                <th class="text-center">Nomor NPWP</th>
                                                                <th class="text-center">Kode Dan No.Seri Faktur Pajak</th>
                                                                <th class="text-center">Tanggal</th>
                                                                <th class="text-center">DPP Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPN Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">PPnBM Dalam Bentuk Rupiah</th>
                                                                <th class="text-center">Kode Dan NSFP Diganti </th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="auto" class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_nama_penjual_bkp_1111B3[]"
                                                                        id="pajak_nama_penjual_bkp_1111B3[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_npwp_1111B3[]" min="0"
                                                                        id="pajak_no_npwp_1111B3[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_kode_dan_no_seri_1111B3[]"
                                                                        id="pajak_kode_dan_no_seri_1111B3[]"
                                                                        min="0" class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="date"
                                                                        name="pajak_tanggal_1111B3[]"
                                                                        id="pajak_tanggal_1111B3[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_dpp_1111B3[]" id="pajak_dpp_1111B3[]"
                                                                        min="0"
                                                                        class="form-control subdpp_1111B3" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   readonly autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_ppn_1111B3[]" id="pajak_ppn_1111B3[]"
                                                                        min="0"
                                                                        class="form-control subppn_1111B3" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input    autocomplete="off" type="text" onkeyup="this.value=sprator(this.value);"
                                                                        name="pajak_ppnBM_1111B3[]"
                                                                        id="pajak_ppnBM_1111B3[]" min="0"
                                                                        class="form-control subppnbm_1111B3" />
                                                                </td>
                                                                <td class="text-center">
                                                                    <input   autocomplete="off" type="text"
                                                                        name="pajak_no_seri_1111B3[]"
                                                                        id="pajak_no_seri_1111B3[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td><button type="button" class="btn btn-light"><i
                                                                            class="fa fa-trash"></i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-sptppn_1111B3"
                                                                        type="button"><i data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot class="footer">
                                                            <tr>
                                                                <td colspan="4"><b>JUMLAH</b></td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_dpp_1111B3" id="total_dpp_1111B3"
                                                                        class="form-control totaldpp_1111B3" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppn_1111B3" id="total_ppn_1111B3"
                                                                        class="form-control totalppn_1111B3" />
                                                                </td>
                                                                <td>
                                                                    <input readonly autocomplete="off" type="text"
                                                                        name="total_ppnbm_1111B3" id="total_ppnbm_1111B3"
                                                                        class="form-control totalppnbm_1111B3" />
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 1111B3 --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
