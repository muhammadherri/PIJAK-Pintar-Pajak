@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pelaporan
        </div>
    </div>
@endsection
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('app-assets/js/scripts/spttahunan.js') }}"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('spttahunan') }}">Pelaporan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('spttahunan') }}">SPT Masa</a></li>
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
                                        <button class="nav-link active" id="nav-1771-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771" type="button" role="tab"
                                            aria-controls="nav-1771" aria-selected="true">
                                            <span class="bs-stepper-box">1771<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span></button>
                                        <button class="nav-link" id="nav-1771I-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771I" type="button" role="tab"
                                            aria-controls="nav-1771I" aria-selected="true">
                                            <span class="bs-stepper-box">1771 I<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1771II-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771II" type="button" role="tab"
                                            aria-controls="nav-1771II" aria-selected="false">
                                            <span class="bs-stepper-box">1771 II
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-1771III-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771III" type="button" role="tab"
                                            aria-controls="nav-1771III" aria-selected="false">
                                            <span class="bs-stepper-box">1771 III
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-1771IV-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771IV" type="button" role="tab"
                                            aria-controls="nav-1771IV" aria-selected="false">
                                            <span class="bs-stepper-box">1771 IV
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-1771V-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771V" type="button" role="tab"
                                            aria-controls="nav-1771V" aria-selected="false">
                                            <span class="bs-stepper-box">1771 V
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-1771VI-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1771VI" type="button" role="tab"
                                            aria-controls="nav-1771VI" aria-selected="false">
                                            <span class="bs-stepper-box">1771 VI
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form action="{{ route('spttahunan/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- TAB 1771 --}}
                                        <div class="tab-pane fade show active" id="nav-1771" role="tabpanel"
                                            aria-labelledby="nav-1771-tab">
                                            <h4 align="center">SPT TAHUNAN </p>
                                                PAJAK PENGHASILAN WAJIB PAJAK BADAN</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_spt" name="jenis_spt" class="dropdown-groups">
                                                            <option value="1771">1771</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajak" name="tahun_pajak"
                                                            class="dropdown-groups">
                                                            @php
                                                                $tahunsekarang = date('Y');
                                                            @endphp
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}">{{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">N P W P</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp" name="npwp">
                                                        <span id="errorNpwp" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp" name="nama_npwp">
                                                        <span id="errornamaNpwp" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Jenis Usaha"
                                                            class="form-control"id="jenis_usaha" name="jenis_usaha">
                                                        <span id="errorjenis_usaha" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">KLU</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan KLU" class="form-control"id="klu"
                                                            name="klu">
                                                        <span id="errorklu" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">No. Telp</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Jenis Usaha"
                                                            class="form-control"id="no_telp" name="no_telp">
                                                        <span id="errorno_telp" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">No. Faks</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Jenis Usaha"
                                                            class="form-control"id="no_fak" name="no_fak">
                                                        <span id="errorno_fak" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="start_periode_pembukuan"
                                                            name="start_periode_pembukuan">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="end_periode_pembukuan"
                                                            name="end_periode_pembukuan">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Negara Domisili</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"
                                                            placeholder="Masukkan NEGARA DOMISILI KANTOR PUSAT (khusus BUT)..."
                                                            autocomplete="off"  
                                                            class="form-control"id="negara_domisili"
                                                            name="negara_domisili">
                                                        <span id="errornegara_domisili" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pembukuan / Laporan
                                                        Keuangan</label>
                                                    <div class="col-sm-9">
                                                        <select onchange="laporankeuangan()" id="laporan_keuangan"
                                                            name="laporan_keuangan" class="dropdown-groups">
                                                            <option value="0">Diaudit</option>
                                                            <option value="1">Opini Akuntan</option>
                                                            <option value="2">Tidak Diaudit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Kantor Akuntan
                                                        Publik</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"
                                                            placeholder="Masukkan Nama Kantor Akuntan Publik..."
                                                            autocomplete="off" class="form-control"id="kantor_akuntan"
                                                            name="kantor_akuntan">
                                                        <span id="errorkantor_akuntan" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Kantor Akuntan
                                                        Publik</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan NPWP Kantor Akuntan Publik..."
                                                            autocomplete="off"
                                                            class="form-control"id="npwp_kantor_akuntan"
                                                            name="npwp_kantor_akuntan">
                                                        <span id="errornpwp_kantor_akuntan" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Akuntan Publik</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"
                                                            placeholder="Masukkan Nama Akuntan Publik..."
                                                            autocomplete="off" class="form-control"id="akuntan_publik"
                                                            name="akuntan_publik">
                                                        <span id="errorakuntan_publik" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Akuntan Publik</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan NPWP Akuntan Publik..."
                                                            autocomplete="off"
                                                            class="form-control"id="nama_akuntan_publik"
                                                            name="nama_akuntan_publik">
                                                        <span id="errornama_akuntan_publik" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Kantor Konsultan
                                                        Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"
                                                            placeholder="Masukkan Nama Kantor Konsultan Pajak..."
                                                            autocomplete="off"
                                                            class="form-control"id="nama_kantor_konsultan_pajak"
                                                            name="nama_kantor_konsultan_pajak">
                                                        <span id="errornama_kantor_konsultan_pajak"
                                                            style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Kantor Konsultan
                                                        Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan NPWP Kantor Konsultan Pajak..."
                                                            autocomplete="off"
                                                            class="form-control"id="npwp_kantor_konsultan_pajak"
                                                            name="npwp_kantor_konsultan_pajak">
                                                        <span id="errorpwp_kantor_konsultan_pajak"
                                                            style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Konsultan Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"
                                                            placeholder="Masukkan Nama Konsultan Pajak..."
                                                            autocomplete="off"
                                                            class="form-control"id="nama_konsultan_pajak"
                                                            name="nama_konsultan_pajak">
                                                        <span id="errornama_konsultan_pajak" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Konsultan Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan NPWP Konsultan Pajak..."
                                                            autocomplete="off"
                                                            class="form-control"id="npwp_konsultan_pajak"
                                                            name="npwp_konsultan_pajak">
                                                        <span id="errornpwp_konsultan_pajak" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <h4>A.Penghasilan Kena Pajak</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1.Netto Fiskal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Penghasilan Netto Fiskal..."
                                                            autocomplete="off"  
                                                            class="form-control"id="a1_kena_pajak" name="a1_kena_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2.Kerugian Fiskal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan Kompensasi Kerugian Fiskal..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            autocomplete="off"  
                                                            class="form-control"id="a2_kena_pajak" name="a2_kena_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3.Penghasilan Kena Pajak
                                                        (1-2)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" readonly autocomplete="off"
                                                              class="form-control"id="a3_kena_pajak"
                                                            name="a3_kena_pajak">
                                                    </div>
                                                </div>
                                                <h4>B.PPh Terutang</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4.PPh Terutang</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" readonly autocomplete="off"
                                                              class="form-control"id="b4_pph_terutang"
                                                            name="b4_pph_terutang">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">5.Pengembalian / Pengurangan
                                                        Kredit</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan Pengembalian / Pengurangan Kredit Pajak Luar Negeri..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            autocomplete="off"  
                                                            class="form-control"id="b5_pph_terutang"
                                                            name="b5_pph_terutang">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">6.Jumlah PPh Terutang
                                                        (4+5)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly autocomplete="off"  
                                                            class="form-control"id="b6_pph_terutang"
                                                            name="b6_pph_terutang">
                                                    </div>
                                                </div>
                                                <h4>C.Kredit Pajak</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">7.PPh Ditanggung
                                                        Pemerintah</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan PPh Ditanggung Pemerintah..."
                                                            autocomplete="off"  
                                                            class="form-control"id="c7_kredit_pajak"
                                                            name="c7_kredit_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8a.Kredit Pajak Dalam
                                                        Negeri</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan Kredit Pajak Dalam Negeri..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            autocomplete="off"  
                                                            class="form-control"id="c8a_kredit_pajak"
                                                            name="c8a_kredit_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8b.Kredit Pajak Luar
                                                        Negeri</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan Kredit Pajak Luar Negeri..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            autocomplete="off"  
                                                            class="form-control"id="c8b_kredit_pajak"
                                                            name="c8b_kredit_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8c.Jumlah (8a +8b)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly autocomplete="off"  
                                                            class="form-control"id="c8c_kredit_pajak"
                                                            name="c8c_kredit_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <input id="c9a_kredit_pajak" class="form-check-input"
                                                                    type="radio" name="c9a_kredit_pajak" value="0"
                                                                    checked>
                                                                <label class="form-check-label">
                                                                    PPh Yang Harus Dibayar Sendiri
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <input id="c9a_kredit_pajak" class="form-check-input"
                                                                    type="radio" name="c9a_kredit_pajak"
                                                                    value="1">
                                                                <label class="form-check-label">
                                                                    PPh Yang Lebih Dipotong / Dipungut
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-sm-4">
                                                        <input type="number" autocomplete="off" min="0"
                                                            placeholder="Masukkan PPh Yang Harus Dibayar Sendiri"  
                                                            class="form-control"id="c9a_kredit_pajak"
                                                            name="c9a_kredit_pajak">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">b.</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" min="0"
                                                            placeholder="Masukkan Nilai K" autocomplete="off"  
                                                            class="form-control"id="c9b_kredit_pajak"
                                                            name="c9b_kredit_pajak">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label"></label> --}}
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">9. Jumlah (6-7-8c)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" min="0" readonly
                                                            class="form-control"id="c9_kredit_pajak"
                                                            name="c9_kredit_pajak">
                                                    </div>

                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">10a.PPh Ps.25 Bulanan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" min="0"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan PPh Ps.25 Bulanan"  
                                                            class="form-control"id="c10a_kredit_pajak"
                                                            name="c10a_kredit_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">10b.STP Ps.25 Pokok
                                                        Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan STP Ps.25 Pokok Pajak"  
                                                            class="form-control"id="c10b_kredit_pajak"
                                                            name="c10b_kredit_pajak">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">10c.Jumlah (10a + 10b)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly autocomplete="off"  
                                                            class="form-control"id="c10c_kredit_pajak"
                                                            name="c10c_kredit_pajak">
                                                    </div>
                                                </div>
                                                <h4>D.PPh Kurang Lebih Bayar</h4>
                                                <div class="mb-3 row">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <input id="d11a_pph_kurang" class="form-check-input"
                                                                    type="radio" name="d11a_pph_kurang" value="0"
                                                                    checked>
                                                                <label class="form-check-label">
                                                                    PPh YANG KURANG DIBAYAR (PPh Ps. 29)
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <input id="d11a_pph_kurang" class="form-check-input"
                                                                    type="radio" name="d11a_pph_kurang" value="1">
                                                                <label class="form-check-label">
                                                                    PPh YANG LEBIH DIBAYAR (PPh Ps. 28A)
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <label class="col-sm-3 col-form-label">11a.PPh Kurang Di Bayar</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0"
                                                            placeholder="Masukkan PPh Kurang Di Bayar..."
                                                            autocomplete="off"  
                                                            class="form-control"id="d11a_pph_kurang"
                                                            name="d11a_pph_kurang">
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">11b.PPh Lebih Di Bayar</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0"
                                                            placeholder="Masukkan PPh Ditanggung Pemerintah..."
                                                            autocomplete="off"  
                                                            class="form-control"id="d11b_pph_kurang"
                                                            name="d11b_pph_kurang">
                                                    </div>
                                                </div> --}}
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">11. Jumlah (9 - 10c)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off" readonly
                                                            class="form-control"id="d11_pph_kurang" name="d11_pph_kurang">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">12.Tanggal Setor</label>
                                                    <div class="col-sm-9">
                                                        <input type="date"  
                                                            class="form-control"id="d12_pph_kurang" name="d12_pph_kurang">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">13 PPh Yang Lebih
                                                        Dibayar</label>
                                                    <div class="col-sm-9">
                                                        <select id="d13_pph_kurang" name="d13_pph_kurang"
                                                            class="dropdown-groups">
                                                            <option value="0">Direstitusikan</option>
                                                            <option value="1">Diperhitungkan Dengan Utang Pajak
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4>E. Angsuran PPh Pasal 25 Tahun Berjalan</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14a. Penghitungan
                                                        Angsuran</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan Penghitungan Angsuran..."  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="e14a_angsuran_pph"
                                                            name="e14a_angsuran_pph">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14b. Kompensasi Kerugian
                                                        Fiskal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"
                                                            placeholder="Masukkan Kompensasi Kerugian Fiskal..."  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="e14b_angsuran_pph"
                                                            name="e14b_angsuran_pph">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14c. Penghasilan Kena
                                                        Pajak (14a - 14b)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly
                                                            class="form-control"id="e14c_angsuran_pph"
                                                            name="e14c_angsuran_pph">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14d. PPh Yang Terutang (Tarif
                                                        PPh dari Bagian B Nomor 4 X 14c)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly
                                                            class="form-control"id="e14d_angsuran_pph"
                                                            name="e14d_angsuran_pph">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14e. Kredit Pajak Tahun
                                                        Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0"
                                                            placeholder="Masukkan Kredit Pajak Tahun Pajak..."  
                                                            class="form-control"id="e14e_angsuran_pph"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            name="e14e_angsuran_pph">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14f. PPh Yang Harus Dibayar
                                                        Sendiri (1/2 x 14f)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly
                                                            class="form-control"id="e14f_angsuran_pph"
                                                            name="e14f_angsuran_pph">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14g. PPh Pasal 25</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly
                                                            class="form-control"id="e14g_angsuran_pph"
                                                            name="e14g_angsuran_pph">
                                                    </div>
                                                </div>
                                                <h4>F. PPh Final Dan Penghasilan Bukan Objek Pajak</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">15a. PPh Final</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"   min="0"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan PPh Final..."
                                                            class="form-control"id="f15a_pph_final" name="f15a_pph_final">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">15b. Penghasilan Bruto</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"   min="0"
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Penghasilan Bruto..."
                                                            class="form-control"id="f15b_pph_final" name="f15b_pph_final">
                                                    </div>
                                                </div>
                                                <h4>G. Pernyataan Transaksi Dalam Hubungan Istimewa</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">16. Penghasilan Bruto</label>
                                                    <div class="col-sm-9">
                                                        <select id="g16_pernyataan_trx" name="g16_pernyataan_trx"
                                                            class="dropdown-groups">
                                                            <option value="0">Transaksi Dalam Hubungan Istimewa
                                                            </option>
                                                            <option value="1">Transaksi Tidak Dalam Hubungan Istimewa
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4>H. Lampiran</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">17. Lampiran-lampiran</label>
                                                    <div class="col-sm-9">
                                                        <select id="h17_lampiran" name="h17_lampiran"
                                                            class="dropdown-groups">
                                                            <option value="0">SURAT SETORAN PAJAK LEMBAR KE-3 PPh
                                                                PASAL 29</option>
                                                            <option value="1">LAPORAN KEUANGAN</option>
                                                            <option value="2">TRANSKRIP KUTIPAN ELEMEN-ELEMEN DARI
                                                                LAPORAN KEUANGAN</option>
                                                            <option value="3">DAFTAR PENYUSUTAN DAN AMORTISASI FISKAL
                                                            </option>
                                                            <option value="4">PERHITUNGAN KOMPENSASI KERUGIAN FISKAL
                                                            </option>
                                                            <option value="5">DAFTAR FASILITAS PENANAMAN MODAL
                                                            </option>
                                                            <option value="6">DAFTAR CABANG UTAMA PERUSAHAAN</option>
                                                            <option value="7">SURAT SETORAN PAJAK</option>
                                                            <option value="8">PERHITUNGAN PPh PASAL 26</option>
                                                            <option value="9">KREDIT PAJAK LUAR NEGERI</option>
                                                            <option value="10">SURAT KUASA KHUSUS (Bila dikuasakan)
                                                            </option>
                                                            <option value="11">RINCIAN JUMLAH PENGHASILAN DAN
                                                                PEMBAYARAN PPh FINAL PP 46/2013</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p>*Wajib Pajak dapat langsung mengunduh dari situs Direktorat Jenderal
                                                    Pajak dengan alamat <a href="http://www.pajak.go.id"
                                                        target="_blank">http://www.pajak.go.id</a> atau mengambil di
                                                    KPP/KP2KP</p>
                                                <p>Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi
                                                    sesuai dengan ketentuan perundang-undangan yang berlaku, saya menyatakan
                                                    bahwa apa yang telah saya beritahukan di atas beserta
                                                    lampiran-lampirannya adalah benar, lengkap dan jelas.</p>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input id="wajib_pajak" class="form-check-input"
                                                                type="radio" name="wajib_pajak" value="0" checked>
                                                            <label class="form-check-label">
                                                                Wajib Pajak
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input id="wajib_pajak" class="form-check-input"
                                                                type="radio" name="wajib_pajak" value="1">
                                                            <label class="form-check-label">
                                                                Kuasa
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tempat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"   placeholder="Masukkan Tempat..."
                                                            class="form-control"id="tempat" name="tempat">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Lengkap Pengurus</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"  
                                                            placeholder="Masukkan Nama Lengkap Pengurus..."
                                                            class="form-control"id="nama_lengkap" name="nama_lengkap">
                                                        <span id="errornama_lengkap" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pengurus</label>
                                                    <div class="col-sm-9">
                                                        <input type="text"  
                                                            placeholder="Masukkan NPWP Pengurus..."
                                                            class="form-control"id="npwp_pengurus" name="npwp_pengurus">
                                                        <span id="errornpwp_pengurus" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <p>F.1.1.32.14</p>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <div></div>
                                                    <button class="btn btn-primary btn-submit" id="add_all"
                                                        type="submit"><i data-feather='save'></i>
                                                        {{ 'Simpan' }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- TAB 1771 --}}
                                        {{-- TAB 1771 I --}}
                                        <div class="tab-pane fade" id="nav-1771I" role="tabpanel"
                                            aria-labelledby="nav-1771I-tab">
                                            <h4 align="center">LAMPIRAN - I</p>
                                                SPT TAHUNAN PAJAK PENGHASILAN WAJIB PAJAK BADAN</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_sptI" name="jenis_sptI"
                                                            class="dropdown-groups">
                                                            <option value="1771I">1771 I</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajakI" name="tahun_pajakI"
                                                            class="dropdown-groups">
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}">{{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">N P W P</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771i" name="npwp_1771i">
                                                        <span id="errorNpwp_1771i" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771i"
                                                            name="nama_npwp_1771i">
                                                        <span id="errornamaNpwp_1771i" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="start_periode_pembukuan_1771i"
                                                            name="start_periode_pembukuan_1771i">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="end_periode_pembukuan_1771i"
                                                            name="end_periode_pembukuan_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>1. Penghasilan Neto Komersial Dalam Negeri</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">A. Peredaran Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Peredaran Usaha..."
                                                            class="form-control"id="a1_penghasilan_netto_1771i"
                                                            name="a1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">B. Harga Pokok Penjualan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Harga Pokok Penjualan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="b1_penghasilan_netto_1771i"
                                                            name="b1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">C. Biaya Usaha Lainnya</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Biaya Usaha Lainnya..."
                                                            class="form-control"id="c1_penghasilan_netto_1771i"
                                                            name="c1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">D. Penghasilan Neto Dari
                                                        Usaha ( 1a - 1b - 1c )</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" readonly
                                                            class="form-control"id="d1_penghasilan_netto_1771i"
                                                            name="d1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">E. Penghasilan Dari Luar
                                                        Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Penghasilan Dari Luar Usaha..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="e1_penghasilan_netto_1771i"
                                                            name="e1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">F. Biaya Dari Luar Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Biaya Dari Luar Usaha..."
                                                            class="form-control"id="f1_penghasilan_netto_1771i"
                                                            name="f1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">G. Penghasilan Neto Dari Luar
                                                        Usaha ( 1e - 1f )</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" readonly
                                                            class="form-control"id="g1_penghasilan_netto_1771i"
                                                            name="g1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">H. Jumlah  ( 1d + 1g )</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" readonly
                                                            class="form-control"id="h1_penghasilan_netto_1771i"
                                                            name="h1_penghasilan_netto_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>2. Penghasilan Neto Komersial Luar Negeri</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Penghasilan Netto</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Penghasilan Netto..."
                                                            class="form-control"id="penghasilan_netto_luar_negeri_1771i"
                                                            name="penghasilan_netto_luar_negeri_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>3. Jumlah Penghasilan Neto Komersial</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jumlah Penghasilan (1h + 2)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off" readonly
                                                            class="form-control"id="jumlah_1771i" name="jumlah_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>4. Penghasilan Yang Dikenakan PPh Final</h4>
                                                <p>*Tidak termasuk objek pajak</p>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Penghasilan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Penghasilan Yand Dikanakan PPh..."
                                                            class="form-control"id="penghasilan_1771i"
                                                            name="penghasilan_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>5. Penyesuaian Fiskal Positif</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">A. Biaya Di Bebankan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Biaya Di Bebankan / Dikeluarkan Untuk Ke..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="a5_penyesuaian_fiskal_1771i"
                                                            name="a5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">B. Dana Cadangan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Dana Cadangan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="b5_penyesuaian_fiskal_1771i"
                                                            name="b5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">C. Natura</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Penggantian / Imbalan Pekerjaan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="c5_penyesuaian_fiskal_1771i"
                                                            name="c5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">D. Jumlah Melebihi
                                                        Kewajaran</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Jumlah Melebihi Kewajaran..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="d5_penyesuaian_fiskal_1771i"
                                                            name="d5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">E. Harta Yang Di
                                                        Hibahkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Harta Yang Di Hibahkan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="e5_penyesuaian_fiskal_1771i"
                                                            name="e5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">F. Pajak Penghasilan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Pajak Penghasilan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="f5_penyesuaian_fiskal_1771i"
                                                            name="f5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">G. Gaji Yang Dibayarkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Gaji Yang Dibayarkan Kepada Anggota Persekutuan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="g5_penyesuaian_fiskal_1771i"
                                                            name="g5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">H. Sanksi Administrasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Sanksi Administrasi..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="h5_penyesuaian_fiskal_1771i"
                                                            name="h5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">I. Selisih Penyusutan
                                                        Komersial</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Selisih Penyusutan Komersial..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="i5_penyesuaian_fiskal_1771i"
                                                            name="i5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">J. Selisih Amortisasi
                                                        Komersial</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Selisih Amortisasi Komersial..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="j5_penyesuaian_fiskal_1771i"
                                                            name="j5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">K. Biaya Yang
                                                        Ditangguhkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            onkeyup="this.value=sprator(this.value);"
                                                            placeholder="Masukkan Biaya Yang Ditangguhkan..."
                                                            class="form-control"id="k5_penyesuaian_fiskal_1771i"
                                                            name="k5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">L. Penyesuaian Fiskal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Penyesuaian Fiskal Positif Lainnya..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="l5_penyesuaian_fiskal_1771i"
                                                            name="l5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">M. Jumlah 5a  s.d. 5l </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off" readonly
                                                            class="form-control"id="m5_penyesuaian_fiskal_1771i"
                                                            name="m5_penyesuaian_fiskal_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>6. Penyesuaian Fiskal Negatif</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">A. Selisih Penyusutan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Selisih Penyusutan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="a6_fiskal_negatif_1771i"
                                                            name="a6_fiskal_negatif_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">B. Selisih Amortisasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Selisih Amortisasi..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="b6_fiskal_negatif_1771i"
                                                            name="b6_fiskal_negatif_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">C. Penghasilan
                                                        Ditangguhkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Penghasilan Ditangguhkan..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="c6_fiskal_negatif_1771i"
                                                            name="c6_fiskal_negatif_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">D. Penyesuaian Fiskal
                                                        Negatif</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Penyesuaian Fiskal Negatif..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="d6_fiskal_negatif_1771i"
                                                            name="d6_fiskal_negatif_1771i">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">E. Jumlah 6a  s.d.  6d </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off" readonly
                                                            class="form-control"id="e6_fiskal_negatif_1771i"
                                                            name="e6_fiskal_negatif_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>7. Fasilitas Penanaman Modal </h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pengurangan Penghasilan
                                                        Netto</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"  
                                                            placeholder="Masukkan Pengurangan Penghasilan Netto..."
                                                            onkeyup="this.value=sprator(this.value);"
                                                            class="form-control"id="fasilitas_1771i"
                                                            name="fasilitas_1771i">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>8. Penghasilan Netto Fiskal</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Netto Fiskal (3 - 4 + 5m - 6e - 7b)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off" readonly
                                                            class="form-control"id="netto_fiskal_1771i"
                                                            name="netto_fiskal_1771i">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <p>D.1.1.32.31</p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- TAB 1771 I --}}

                                        {{-- TAB 1771 II --}}
                                        <div class="tab-pane fade " id="nav-1771II" role="tabpanel"
                                                aria-labelledby="nav-1771II-tab">
                                                <h4 align="center">LAMPIRAN - II</p>
                                                    SPT TAHUNAN PAJAK PENGHASILAN WAJIB PAJAK BADAN</p>
                                                    PERINCIAN HARGA POKOK PENJUALAN, BIAYA USAHA LAINNYA DAN BIAYA DARI LUAR
                                                    USAHA SECARA KOMERSIAL</h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                        <div class="col-sm-9">
                                                            <select id="jenis_spt_1771II" name="jenis_spt_1771II"
                                                                class="dropdown-groups">
                                                                <option value="1771II">1771 II</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                        <div class="col-sm-9">
                                                            <select id="tahun_pajak_1771II" name="tahun_pajak_1771II"
                                                                class="dropdown-groups">
                                                                @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                    <option value="{{ $tahunsekarang }}">{{ $tahunsekarang }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4>Identitas</h4>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">N P W P</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" min="0" autocomplete="off"  
                                                                placeholder="Masukkan No N P W P"
                                                                class="form-control"id="npwp_1771II" name="npwp_1771II">
                                                            <span id="errornpwp_1771II" style="color: red;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" autocomplete="off"  
                                                                placeholder="Masukkan Nama Wajib Pajak"
                                                                class="form-control"id="nama_npwp_1771II"
                                                                name="nama_npwp_1771II">
                                                            <span id="errornamaNpwp_1771II" style="color: red;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" autocomplete="off"  
                                                                class="form-control"id="start_periode_pembukuan_1771II"
                                                                name="start_periode_pembukuan_1771II">
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">s.d</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" autocomplete="off"  
                                                                class="form-control"id="end_periode_pembukuan_1771II"
                                                                name="end_periode_pembukuan_1771II">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <label>1. Pembelian Bahan/Barang Dagangan</label>
                                                    <div class="mb-3 row">
                                                       <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp1_1771ii" placeholder="HPP"
                                                                name="hpp1_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha1_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha1_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha1_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha1_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah1_1771ii" placeholder="Jumlah"
                                                                name="jumlah1_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>2. Gaji, Upah, Bonus, Gratifikasi, Honorarium, THR, DSB</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp2_1771ii" placeholder="HPP"
                                                                name="hpp2_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha2_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha2_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha2_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha2_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah2_1771ii" placeholder="Jumlah"
                                                                name="jumlah2_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>3. Biaya Transportasi</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp3_1771ii" placeholder="HPP"
                                                                name="hpp3_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha3_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha3_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha3_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha3_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah3_1771ii" placeholder="Jumlah"
                                                                name="jumlah3_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>4. Biaya Penyusutan Dan Amortisasi</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp4_1771ii" placeholder="HPP"
                                                                name="hpp4_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha4_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha4_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha4_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha4_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah4_1771ii" placeholder="Jumlah"
                                                                name="jumlah4_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>5. Biaya Sewa</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp5_1771ii" placeholder="HPP"
                                                                name="hpp5_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha5_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha5_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha5_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha5_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah5_1771ii" placeholder="Jumlah"
                                                                name="jumlah5_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>6. Biaya Bunga Pinjaman</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp6_1771ii" placeholder="HPP"
                                                                name="hpp6_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha6_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha6_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha6_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha6_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah6_1771ii" placeholder="Jumlah"
                                                                name="jumlah6_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>7. Biaya Sehubungan Dengan Jasa</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp7_1771ii" placeholder="HPP"
                                                                name="hpp7_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha7_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha7_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha7_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha7_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah7_1771ii" placeholder="Jumlah"
                                                                name="jumlah7_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>8. Biaya Piutang Tat Tertagih</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp8_1771ii" placeholder="HPP"
                                                                name="hpp8_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha8_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha8_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha8_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha8_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah8_1771ii" placeholder="Jumlah"
                                                                name="jumlah8_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>9. Biaya Royalti</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp9_1771ii" placeholder="HPP"
                                                                name="hpp9_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha9_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha9_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha9_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha9_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah9_1771ii" placeholder="Jumlah"
                                                                name="jumlah9_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>10. Biaya Pemasaran/Promosi</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp10_1771ii" placeholder="HPP"
                                                                name="hpp10_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha10_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha10_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha10_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha10_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah10_1771ii" placeholder="Jumlah"
                                                                name="jumlah10_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>11. Biaya Lainnya</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp11_1771ii" placeholder="HPP"
                                                                name="hpp11_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha11_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha11_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha11_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha11_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah11_1771ii" placeholder="Jumlah"
                                                                name="jumlah11_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>12. Persediaan Awal</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp12_1771ii" placeholder="HPP"
                                                                name="hpp12_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha12_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha12_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha12_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha12_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah12_1771ii" placeholder="Jumlah"
                                                                name="jumlah12_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>13. Persediaan Akhir (-/-)</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp13_1771ii" placeholder="HPP"
                                                                name="hpp13_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha13_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha13_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha13_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha13_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah13_1771ii" placeholder="Jumlah"
                                                                name="jumlah13_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>14. Jumlah  1 S.D. 12 Dikurangi 13</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="hpp14_1771ii" placeholder="HPP"
                                                                name="hpp14_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayausaha14_1771ii"placeholder="Biaya Usaha"
                                                                name="biayausaha14_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="biayaluarusaha14_1771ii" placeholder="Biaya Luar Usaha"
                                                                name="biayaluarusaha14_1771ii">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="jumlah14_1771ii" placeholder="Jumlah"
                                                                name="jumlah14_1771ii">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        {{-- TAB 1771 II --}}

                                        {{-- TAB 1771 III --}}
                                        <div class="tab-pane fade " id="nav-1771III" role="tabpanel"
                                            aria-labelledby="nav-1771III-tab">
                                            <h4 align="center">LAMPIRAN - III</p>
                                                SPT TAHUNAN PAJAK PENGHASILAN WAJIB PAJAK BADAN</p>
                                                KREDIT PAJAK DALAM NEGERI</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_spt_1771III" name="jenis_spt_1771III"
                                                            class="dropdown-groups">
                                                            <option value="1771III">1771 III</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajak_1771III" name="tahun_pajak_1771III"
                                                            class="dropdown-groups">
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}">
                                                                    {{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">N P W P</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"
                                                              placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771III" name="npwp_1771III">
                                                        <span id="errornpwp_1771III" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771III"
                                                            name="nama_npwp_1771III">
                                                        <span id="errornamaNpwp_1771III" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="start_periode_pembukuan_1771III"
                                                            name="start_periode_pembukuan_1771III">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="end_periode_pembukuan_1771III"
                                                            name="end_periode_pembukuan_1771III">
                                                    </div>
                                                    <hr>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="list_1771III" class="display"
                                                                style="min-width: 845px">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Nama Wajib Pajak</th>
                                                                        <th class="text-center">Nomor Wajib NPWP</th>
                                                                        <th class="text-center">Jenis Transaksi</th>
                                                                        <th class="text-center">Biaya Dalam Rupiah</th>
                                                                        <th class="text-center">Pajak Penghasilan Yang Di
                                                                            Potong</th>
                                                                        <th class="text-center">Bukti Nomor Pemotongan
                                                                        </th>
                                                                        <th class="text-center">Tanggal Bukti Pemotongan
                                                                        </th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                type="text" name="kreditnama[]"
                                                                                id="kreditnama[]"
                                                                                class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                type="text" name="kreditnpwp[]"
                                                                                id="kreditnpwp[]" min="0"
                                                                                class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                type="text" name="kredittrx[]"
                                                                                id="kredittrx[]" class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                onkeyup="this.value=sprator(this.value);"
                                                                                type="text" name="kreditrp[]"
                                                                                id="kreditrp[]" min="0"
                                                                                class="form-control subrupiah" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                onkeyup="this.value=sprator(this.value);"
                                                                                type="text" name="kreditpajak[]"
                                                                                id="kreditpajak[]" min="0"
                                                                                class="form-control subpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                type="number" name="kreditnomor[]"
                                                                                id="kreditnomor[]" min="0"
                                                                                class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input   autocomplete="off"
                                                                                type="date" name="kredittgl[]"
                                                                                id="kredittgl[]" class="form-control" />
                                                                        </td>
                                                                        <td><button type="button"
                                                                                class="btn btn-light btn-submit"><i
                                                                                    class="fa fa-trash"></i>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td>
                                                                            <button
                                                                                class="btn btn-primary btn-submit"name='action'
                                                                                value="create" id="btn-addkredit"
                                                                                type="button"><i
                                                                                    data-feather='save'></i>
                                                                                {{ 'Tambah Item' }}</button>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                                <tfoot class="footer">
                                                                    <tr>
                                                                        <td><b>JUMLAH</b></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off"
                                                                                type="text" name="kreditsubrp"
                                                                                id="kreditsubrp" min="0"
                                                                                class="form-control jumlahrupiah" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off"
                                                                                type="text" name="kreditpenghasilan"
                                                                                id="kreditpenghasilan" min="0"
                                                                                class="form-control jumlahpenghasilan" />
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        {{-- TAB 1771 III --}}

                                        {{-- TAB 1771 IV --}}
                                        <div class="tab-pane fade " id="nav-1771IV" role="tabpanel"
                                            aria-labelledby="nav-1771IV-tab">
                                            <h4 align="center">LAMPIRAN - IV</p>
                                                SPT TAHUNAN PAJAK PENGHASILAN WAJIB PAJAK BADAN</p>
                                                PPh FINAL DAN PENGHASILAN YANG TIDAK TERMASUK OBJEK PAJAK</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_spt_1771IV" name="jenis_spt_1771IV"
                                                            class="dropdown-groups">
                                                            <option value="1771IV">1771 IV</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajak_1771IV" name="tahun_pajak_1771IV"
                                                            class="dropdown-groups">
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}">
                                                                    {{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">N P W P</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"
                                                              placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771IV" name="npwp_1771IV">
                                                        <span id="errornpwp_1771IV" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771IV"
                                                            name="nama_npwp_1771IV">
                                                        <span id="errornamaNpwp_1771IV" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="start_periode_pembukuan_1771IV"
                                                            name="start_periode_pembukuan_1771IV">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="end_periode_pembukuan_1771IV"
                                                            name="end_periode_pembukuan_1771IV">
                                                    </div>
                                                    <h4>Bagian A : PPh Final</h4>
                                                    <label>1. Bunga Deposito / Tabungan, Dan Diskonto SBI / SBN</label>
                                                    <div class="mb-3 row">
                                                       <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="dpp1_1771iv" placeholder="DPP"
                                                                name="dpp1_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="tarif1_1771ii"placeholder="Tarif %"
                                                                name="tarif1_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="pph1_1771ii" placeholder="PPh Terutang"
                                                                name="pph1_1771ii">
                                                        </div>
                                                       
                                                    </div>
                                                    <label>2. Bunga / Diskonto Obligasi</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp2_1771iv" placeholder="DPP"
                                                                 name="dpp2_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif2_1771ii"placeholder="Tarif %"
                                                                 name="tarif2_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph2_1771ii" placeholder="PPh Terutang"
                                                                 name="pph2_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>3. Penghasilan Penjualan Saham Yang Diperdagangkan Di Bursa Efek</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp3_1771iv" placeholder="DPP"
                                                                 name="dpp3_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif3_1771ii"placeholder="Tarif %"
                                                                 name="tarif3_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                             class="form-control"id="pph3_1771ii" placeholder="PPh Terutang"
                                                             name="pph3_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>4. Penghasilan Penjualan Saham Milik Perusahaan Modal Ventura</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp4_1771iv" placeholder="DPP"
                                                                 name="dpp4_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif4_1771ii"placeholder="Tarif %"
                                                                 name="tarif4_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                             class="form-control"id="pph4_1771ii" placeholder="PPh Terutang"
                                                                 name="pph4_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>5. Penghasilan Usaha Penyalur / Dealer / Agen Produk BBM</label>
													<div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp5_1771iv" placeholder="DPP"
                                                                 name="dpp5_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif5_1771ii"placeholder="Tarif %"
                                                                 name="tarif5_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph5_1771ii" placeholder="PPh Terutang"
                                                                 name="pph5_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>6. Penghasilan Pengalihan Hak Atas Tanah / Bangunan</label>
													<div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp6_1771iv" placeholder="DPP"
                                                                 name="dpp6_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif6_1771ii"placeholder="Tarif %"
                                                                 name="tarif6_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph6_1771ii" placeholder="PPh Terutang"
                                                                 name="pph6_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>7. Penghasilan Pengalihan Hak Atas Tanah / Bangunan</label>
													<div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp7_1771iv" placeholder="DPP"
                                                                 name="dpp7_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="tarif7_1771ii"placeholder="Tarif %"
                                                                name="tarif7_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="pph7_1771ii" placeholder="PPh Terutang"
                                                                name="pph7_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>8. Imbalan Jasa Konstruksi :</label>
                                                    <label>8a. Pelaksana Konstruksi</label>
													<div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp8a_1771iv" placeholder="DPP"
                                                                 name="dpp8a_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif8a_1771ii"placeholder="Tarif %"
                                                                 name="tarif8a_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph8a_1771ii" placeholder="PPh Terutang"
                                                                 name="pph8a_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>8b. Perencana Konstruksi</label>
													<div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp8b_1771iv" placeholder="DPP"
                                                                 name="dpp8b_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif8b_1771ii"placeholder="Tarif %"
                                                                 name="tarif8b_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph8b_1771ii" placeholder="PPh Terutang"
                                                                 name="pph8b_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>8c. Pengawas Konstruksi</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp8c_1771iv" placeholder="DPP"
                                                                 name="dpp8c_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif8c_1771ii"placeholder="Tarif %"
                                                                 name="tarif8c_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph8c_1771ii" placeholder="PPh Terutang"
                                                                 name="pph8c_1771ii">
                                                         </div>
                                                    </div>                                                        
                                                    <label>9. Perwakilan Dagang Asing</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp9_1771iv" placeholder="DPP"
                                                                 name="dpp9_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif9_1771ii"placeholder="Tarif %"
                                                                 name="tarif9_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph9_1771ii" placeholder="PPh Terutang"
                                                                 name="pph9_1771ii">
                                                        </div>
                                                    </div>        
                                                    <label class="col-sm-4">10. Pelayaran / Penerbangan Asing</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp10_1771iv" placeholder="DPP"
                                                                 name="dpp10_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif10_1771ii"placeholder="Tarif %"
                                                                 name="tarif10_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph10_1771ii" placeholder="PPh Terutang"
                                                                 name="pph10_1771ii">
                                                         </div>
                                                    </div>     
                                                    <label class="col-sm-4">11. Pelayaran Dalam Negeri</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="dpp11_1771iv" placeholder="DPP"
                                                                name="dpp11_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="tarif11_1771ii"placeholder="Tarif %"
                                                                name="tarif11_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="pph11_1771ii" placeholder="PPh Terutang"
                                                                name="pph11_1771ii">
                                                        </div>
                                                    </div>  
                                                    <label class="col-sm-4">12. Penilaian Kembali Aktiva Tetap</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp12_1771iv" placeholder="DPP"
                                                                 name="dpp12_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif12_1771ii"placeholder="Tarif %"
                                                                 name="tarif12_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph12_1771ii" placeholder="PPh Terutang"
                                                                 name="pph12_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>13. Transaksi Derivatif Yang Diperdagangkan Di Bursa</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="dpp13_1771iv" placeholder="DPP"
                                                                name="dpp13_1771iv">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"  
                                                                onkeyup="this.value=sprator(this.value);"
                                                                class="form-control"id="tarif13_1771ii"placeholder="Tarif %"
                                                                name="tarif13_1771ii">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" autocomplete="off"   readonly
                                                                class="form-control"id="pph13_1771ii" placeholder="PPh Terutang"
                                                                name="pph13_1771ii">
                                                        </div>
                                                    </div>
                                                    <label>14.....</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="dpp14_1771iv" placeholder="DPP"
                                                                 name="dpp14_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="tarif14_1771ii"placeholder="Tarif %"
                                                                 name="tarif14_1771ii">
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="pph14_1771ii" placeholder="PPh Terutang"
                                                                 name="pph14_1771ii">
                                                         </div>
                                                    </div>
                                                    <label>Jumlah</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="jumlahdpp14_1771iv" placeholder="DPP"
                                                                 name="jumlahdpp14_1771iv">
                                                         </div>
                                                         <div class="col-sm-4">
                                                            
                                                         </div>
                                                         <div class="col-sm-4">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 class="form-control"id="jumlahpph14_1771ii" placeholder="PPh Terutang"
                                                                 name="jumlahpph14_1771ii">
                                                         </div>
                                                    </div>
													
													
                                                    <hr>
                                                    <h4>Bagian B : Penghasilan Bukan Objek Pajak</h4>
                                                    <label>1. Bantuan / Sumbangan</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto1_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto1_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>2. Hibah</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto2_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto2_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>3. Dividen / Bagian Laba Dari Penyertaan Modal</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto3_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto3_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>4. Iuran Dan Penghasilan Tertentu Yang Diterima Dana Pensiun</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto4_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto4_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>5. Bagian Laba Yang Diterima Perusahaan Modal Ventura Dari BAdan Pasangan Usaha</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto5_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto5_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>6. Sisa Lebih Yang Diterima Atau Diperoleh Badan Atau Lembaga</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto6_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto6_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>7....</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"  
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="bruto7_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="bruto7_1771iv">
                                                         </div>
                                                    </div>
                                                    <label>Jumlah</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                             <input type="text" autocomplete="off"   readonly
                                                                 onkeyup="this.value=sprator(this.value);"
                                                                 class="form-control"id="jumlahbruto_1771iv" placeholder="Penghasilan Bruto"
                                                                 name="jumlahbruto_1771iv">
                                                         </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        {{-- TAB 1771 IV --}}

                                        {{-- TAB 1771 V --}}
                                        <div class="tab-pane fade " id="nav-1771V" role="tabpanel"
                                            aria-labelledby="nav-1771V-tab">
                                            <h4 align="center">LAMPIRAN - V</p>
                                                SPT TAHUNAN PAJAK PENGHASILAN WAJIB PAJAK BADAN</p>
                                                - DAFTAR PEMEGANG SAHAM/PEMILIK MODAL DAN JUMLAH DIVIDEN YANG DIBAGIKAN</p>
                                                - DAFTAR SUSUNAN PENGURUS DAN KOMISARIS</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_spt_1771V" name="jenis_spt_1771V"
                                                            class="dropdown-groups">
                                                            <option value="1771V">1771 V</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajak_1771V" name="tahun_pajak_1771V"
                                                            class="dropdown-groups">
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}">
                                                                    {{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">N P W P</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"
                                                              placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771V" name="npwp_1771V">
                                                        <span id="errornpwp_1771V" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771V"
                                                            name="nama_npwp_1771V">
                                                        <span id="errornamaNpwp_1771V" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="start_periode_pembukuan_1771V"
                                                            name="start_periode_pembukuan_1771V">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="end_periode_pembukuan_1771V"
                                                            name="end_periode_pembukuan_1771V">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Bagian A : Daftar Pemegang Saham</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771V"class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nama Pemegang Saham</th>
                                                                    <th class="text-center">Alamat Pemegang Saham</th>
                                                                    <th class="text-center">Nomor NPWP Pemilik Saham</th>
                                                                    <th class="text-center">Modal Setor Pemilik Saham</th>
                                                                    <th class="text-center">Modal Persen %</th>
                                                                    <th class="text-center">Jumlah Dividen</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangsh_nama_1771V[]"
                                                                            id="pemegangsh_nama_1771V[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangsh_alamat_nama_1771V[]"
                                                                            id="pemegangsh_alamat_nama_1771V[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangsh_npwp_1771V[]"
                                                                            id="pemegangsh_npwp_1771V[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="pemegangsh_modalsetor_1771V[]"
                                                                            id="pemegangsh_modalsetor_1771V[]"
                                                                            min="0"
                                                                            class="form-control submodalsetor1771v_a" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="pemegangsh_persen_1771V[]"
                                                                            id="pemegangsh_persen_1771V[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="pemegangsh_dividen_1771V[]"
                                                                            id="pemegangsh_dividen_1771V[]"
                                                                            min="0"
                                                                            class="form-control subdividen177v_a" />
                                                                    </td>
                                                                    <td><button type="button"
                                                                            class="btn btn-light btn-submit"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-add1771V"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>

                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <b>Jumlah Bagian A</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly autocomplete="off"
                                                                            type="text" name="jumlahmodalsetor"
                                                                            id="jumlahmodalsetor" min="0"
                                                                            class="form-control total_modalsetor" />
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly autocomplete="off"
                                                                            type="text" name="jumlahdividen"
                                                                            id="jumlahdividen" min="0"
                                                                            class="form-control total_dividen" />
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>

                                                    </div>

                                                </div>
                                                <hr>
                                                <h4>Bagian B : Daftar Susunan Pengurus Dan Komisaris</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771Vb"class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nama Pengurus Saham</th>
                                                                    <th class="text-center">Alamat Pengurus Saham</th>
                                                                    <th class="text-center">Nomor NPWP Pengurus Saham</th>
                                                                    <th class="text-center">Jabatan Pengurus</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangshb_nama_1771V[]"
                                                                            id="pemegangshb_nama_1771V[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangshb_alamat_nama_1771V[]"
                                                                            id="pemegangshb_alamat_nama_1771V[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangshb_npwp_1771V[]"
                                                                            id="pemegangsh_npwpb_1771V[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text"
                                                                            name="pemegangshb_jabatan_1771V[]"
                                                                            id="pemegangshb_jabatan_1771V[]"
                                                                            min="0"
                                                                            class="form-control submodalsetor" />
                                                                    </td>
                                                                    <td><button type="button"
                                                                            class="btn btn-light btn-submit"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-add1771Vb"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- TAB 1771 V --}}

                                        {{-- TAB 1771 VI --}}
                                        <div class="tab-pane fade " id="nav-1771VI" role="tabpanel"
                                            aria-labelledby="nav-1771VI-tab">
                                            <h4 align="center">LAMPIRAN - VI</p>
                                                SPT TAHUNAN PAJAK PENGHASILAN WAJIB PAJAK BADAN</p>
                                                - DAFTAR PENYERTAAN MODAL PADA PERUSAHAAN AFILIASI</p>
                                                - DAFTAR UTANG DARI PEMEGANG SAHAM DAN/ATAU PERUSAHAAN AFILIASI </p>
                                                - DAFTAR PIUTANG KEPADA PEMEGANG SAHAM DAN/ATAU PERUSAHAAN AFILIASI </h4>
                                            <hr>
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_spt_1771VI" name="jenis_spt_1771VI"
                                                            class="dropdown-groups">
                                                            <option value="1771VI">1771 VI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajak_1771VI" name="tahun_pajak_1771VI"
                                                            class="dropdown-groups">
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}">
                                                                    {{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">N P W P</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" min="0" autocomplete="off"
                                                              placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771VI" name="npwp_1771VI">
                                                        <span id="errornpwp_1771VI" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off"  
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771VI"
                                                            name="nama_npwp_1771VI">
                                                        <span id="errornamaNpwp_1771VI" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="start_periode_pembukuan_1771VI"
                                                            name="start_periode_pembukuan_1771VI">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off"  
                                                            class="form-control"id="end_periode_pembukuan_1771VI"
                                                            name="end_periode_pembukuan_1771VI">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Bagian A : Daftar Penyertaan Modal Afiliasi</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771VI"class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nama Perusahaan Afiliasi</th>
                                                                    <th class="text-center">Alamat Perusahaan Afiliasi
                                                                    </th>
                                                                    <th class="text-center">Nomor NPWP Perusahaan Afiliasi
                                                                    </th>
                                                                    <th class="text-center">Modal Setor Pemilik Saham</th>
                                                                    <th class="text-center">Modal Persen %</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_nama[]"
                                                                            id="penyertaan_nama[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_alamat[]"
                                                                            id="penyertaan_alamat[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_npwp[]"
                                                                            id="penyertaan_npwp[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_modal[]"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            id="penyertaan_modal[]" min="0"
                                                                            class="form-control submodalafiliasi" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text" name="penyertaan_persen[]"
                                                                            id="penyertaan_persen[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td><button type="button"
                                                                            class="btn btn-light btn-submit"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-add1771VI"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>

                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <b>Jumlah Bagian A</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly autocomplete="off"
                                                                            type="text" name="jumlahmodalafiliasi"
                                                                            id="jumlahmodalafiliasi" min="0"
                                                                            class="form-control total_modalafiliasi" />
                                                                    </td>
                                                                    <td></td>
                                                                    <td>

                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Bagian B : Daftar Hutang Dari Pemegang Saham / Perusahaan Afiliasi</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771VIb"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nama Peminjam Saham</th>
                                                                    <th class="text-center">Nomor NPWP Peminjam Saham</th>
                                                                    <th class="text-center">Jumlah Pinjaman</th>
                                                                    <th class="text-center">Tahun Pinjaman</th>
                                                                    <th class="text-center">Bunga Pinjaman</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_namab[]"
                                                                            id="penyertaan_namab[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_npwpb[]"
                                                                            id="penyertaan_npwpb[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="penyertaan_jumlahpinjamanb[]"
                                                                            id="penyertaan_jumlahpinjamanb[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="date"
                                                                            name="penyertaan_thnpinjamanb[]"
                                                                            id="penyertaan_thnpinjamanb[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="penyertaan_bungapinjamanb[]"
                                                                            id="penyertaan_bungapinjamanb[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td><button type="button"
                                                                            class="btn btn-light btn-submit"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-add1771VIb"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>

                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Bagian C : Daftar Piutang Kepada Pemegang Saham / Perusahaan Afiliasi
                                                </h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771VIc"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nama Peminjam Saham</th>
                                                                    <th class="text-center">Nomor NPWP Peminjam Saham</th>
                                                                    <th class="text-center">Jumlah Pinjaman</th>
                                                                    <th class="text-center">Tahun Pinjaman</th>
                                                                    <th class="text-center">Bunga Pinjaman</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_namac[]"
                                                                            id="penyertaan_namac[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="text" name="penyertaan_npwpc[]"
                                                                            id="penyertaan_npwpc[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="penyertaan_jumlahpinjamanc[]"
                                                                            id="penyertaan_jumlahpinjamanc[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            type="date"
                                                                            name="penyertaan_thnpinjamanc[]"
                                                                            id="penyertaan_thnpinjamanc[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input   autocomplete="off"
                                                                            onkeyup="this.value=sprator(this.value);"
                                                                            type="text"
                                                                            name="penyertaan_bungapinjamanc[]"
                                                                            id="penyertaan_bungapinjamanc[]"
                                                                            min="0" class="form-control" />
                                                                    </td>
                                                                    <td><button type="button"
                                                                            class="btn btn-light btn-submit"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-add1771VIc"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>

                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        {{-- TAB 1771 VI --}}
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputa1 = document.getElementById('a1_kena_pajak');
        const inputa2 = document.getElementById('a2_kena_pajak');
        const resulta3 = document.getElementById('a3_kena_pajak');

        const resultb4 = document.getElementById('b4_pph_terutang');
        const inputb5 = document.getElementById('b5_pph_terutang');
        const resultb6 = document.getElementById('b6_pph_terutang');

        const inputc7 = document.getElementById('c7_kredit_pajak');

        const inputc8a = document.getElementById('c8a_kredit_pajak');
        const inputc8b = document.getElementById('c8b_kredit_pajak');
        const resultc8c = document.getElementById('c8c_kredit_pajak');

        const inputc9a = document.getElementById('c9a_kredit_pajak');
        // const inputc9b = document.getElementById('c9b_kredit_pajak');
        const resultc9 = document.getElementById('c9_kredit_pajak');

        const inputc10a = document.getElementById('c10a_kredit_pajak');
        const inputc10b = document.getElementById('c10b_kredit_pajak');
        const resultc10c = document.getElementById('c10c_kredit_pajak');

        // const inputd11a = document.getElementById('d11a_pph_kurang');
        // const inputd11b = document.getElementById('d11b_pph_kurang');
        const resultd11 = document.getElementById('d11_pph_kurang');

        const inpute14a = document.getElementById('e14a_angsuran_pph');
        const inpute14b = document.getElementById('e14b_angsuran_pph');
        const resulte14c = document.getElementById('e14c_angsuran_pph');
        const resulte14d = document.getElementById('e14d_angsuran_pph');
        const inpute14e = document.getElementById('e14e_angsuran_pph');
        const resulte14f = document.getElementById('e14f_angsuran_pph');
        const resulte14g = document.getElementById('e14g_angsuran_pph');

        [inputa1, inputa2, inputb5, inputc7, inputc8a, inputc8b, inputc9a,
            inputc10a, inputc10b, inpute14a, inpute14b, inpute14e
        ]
        .forEach(input => {
            input.addEventListener('input', updateResult);
        });

        function updateResult() {
            const a1 = parseFloat(inputa1.value) || 0;
            const a2 = parseFloat(inputa2.value) || 0;
            const hasila3 = a1 - a2;
            if (hasila3 < 0) {
                resulta3.value = 0;
            } else {
                resulta3.value = hasila3;
            }
            const hasilb4 = hasila3 * 22 / 100;
            if (hasilb4 < 0) {
                resultb4.value = 0;
            } else {
                resultb4.value = hasilb4;
            }
            const b5 = parseFloat(inputb5.value) || 0;
            const hasilb6 = hasilb4 + b5;
            if (hasilb6 < 0) {
                resultb6.value = 0;
            } else {
                resultb6.value = hasilb6;
            }

            const c8a = parseFloat(inputc8a.value) || 0;
            const c8b = parseFloat(inputc8b.value) || 0;
            const hasilc8c = c8a + c8b;
            resultc8c.value = hasilc8c;

            const c7 = parseFloat(inputc7.value) || 0;
            const c9a = parseFloat(inputc9a.value) || 0;
            // const c9b = parseFloat(inputc9b.value) || 0;
            // const hasilpembagianc9 = c9a / c9b;
            const potonganc9 = hasilb6 - c7 - hasilc8c;
            const hasilc9 = potonganc9;
            if (hasilc9 < 0) {
                resultc9.value = 0;
            } else {
                resultc9.value = hasilc9;
            }

            const c10a = parseFloat(inputc10a.value) || 0;
            const c10b = parseFloat(inputc10b.value) || 0;
            const hasilc10c = c10a + c10b;
            resultc10c.value = hasilc10c;

            // const d11a = parseFloat(inputd11a.value) || 0;
            // const d11b = parseFloat(inputd11b.value) || 0;
            // const hasilpembagiand11 = d11a / d11b;
            const potongand11 = hasilc9 - hasilc10c;
            const hasild11 = potongand11;
            if (hasild11 < 0) {
                resultd11.value = 0;
            } else {
                resultd11.value = hasild11;
            }
            const e14a = parseFloat(inpute14a.value) || 0;
            const e14b = parseFloat(inpute14b.value) || 0;
            const e14e = parseFloat(inpute14e.value) || 0;
            const hasile14c = e14a - e14b;
            if (hasile14c < 0) {
                resulte14c.value = 0;
            } else {
                resulte14c.value = hasile14c;
            }
            const hasile14d = hasilb4 * hasile14c;
            if (hasile14d < 0) {
                resulte14d.value = 0;
            } else {
                resulte14d.value = e14a*22/100;
            }
            const hasile14f = hasile14d - e14e;
            if (hasile14f < 0) {
                resulte14f.value = 0;
            } else {
                resulte14f.value = hasile14f;
            }
            const hasile14g = hasile14f * 1 / 12;
            resulte14g.value = hasile14g;
            if (hasile14g < 0) {
                resulte14g.value = 0;
            } else {
                resulte14g.value = hasile14g;
            }

        };
        // const nama_lengkapinput = document.getElementById('nama_lengkap');
        // const errornama_lengkapText = document.getElementById('errornama_lengkap');
        // nama_lengkapinput.addEventListener('input', function() {
        //     const inputValue = nama_lengkapinput.value;

        //     if (inputValue.length > 27) {
        //         nama_lengkapinput.value = inputValue.slice(0, 27);
        //         errornama_lengkapText.textContent = 'Maksimal 27 digit';
        //     } else {
        //         errornama_lengkapText.textContent = '';
        //     }
        // });
        // const npwp_pengurusinput = document.getElementById('npwp_pengurus');
        // const errornpwp_pengurusText = document.getElementById('errornpwp_pengurus');
        // npwp_pengurusinput.addEventListener('input', function() {
        //     const inputValue = npwp_pengurusinput.value;

        //     if (inputValue.length > 15) {
        //         npwp_pengurusinput.value = inputValue.slice(0, 15);
        //         errornpwp_pengurusText.textContent = 'Maksimal 15 digit';
        //     } else {
        //         errornpwp_pengurusText.textContent = '';
        //     }
        // });
        // const npwp_konsultan_pajakinput = document.getElementById('npwp_konsultan_pajak');
        // const errornpwp_konsultan_pajakText = document.getElementById('errornpwp_konsultan_pajak');
        // npwp_konsultan_pajakinput.addEventListener('input', function() {
        //     const inputValue = npwp_konsultan_pajakinput.value;

        //     if (inputValue.length > 15) {
        //         npwp_konsultan_pajakinput.value = inputValue.slice(0, 15);
        //         errornpwp_konsultan_pajakText.textContent = 'Maksimal 15 digit';
        //     } else {
        //         errornpwp_konsultan_pajakText.textContent = '';
        //     }
        // });
        // const nama_konsultan_pajakinput = document.getElementById('nama_konsultan_pajak');
        // const errornama_konsultan_pajakText = document.getElementById('errornama_konsultan_pajak');
        // nama_konsultan_pajakinput.addEventListener('input', function() {
        //     const inputValue = nama_konsultan_pajakinput.value;

        //     if (inputValue.length > 27) {
        //         nama_konsultan_pajakinput.value = inputValue.slice(0, 27);
        //         errornama_konsultan_pajakText.textContent = 'Maksimal 27 digit';
        //     } else {
        //         errornama_konsultan_pajakText.textContent = '';
        //     }
        // });
        // const nama_kantor_konsultan_pajakinput = document.getElementById('nama_kantor_konsultan_pajak');
        // const errornama_kantor_konsultan_pajakText = document.getElementById(
        //     'errornama_kantor_konsultan_pajak');
        // nama_kantor_konsultan_pajakinput.addEventListener('input', function() {
        //     const inputValue = nama_kantor_konsultan_pajakinput.value;

        //     if (inputValue.length > 27) {
        //         nama_kantor_konsultan_pajakinput.value = inputValue.slice(0, 27);
        //         errornama_kantor_konsultan_pajakText.textContent = 'Maksimal 27 digit';
        //     } else {
        //         errornama_kantor_konsultan_pajakText.textContent = '';
        //     }
        // });
        // const npwp_kantor_konsultan_pajakinput = document.getElementById('npwp_kantor_konsultan_pajak');
        // const errornpwp_kantor_konsultan_pajakText = document.getElementById(
        //     'errornpwp_kantor_konsultan_pajak');
        // npwp_kantor_konsultan_pajakinput.addEventListener('input', function() {
        //     const inputValue = npwp_kantor_konsultan_pajakinput.value;

        //     if (inputValue.length > 15) {
        //         npwp_kantor_konsultan_pajakinput.value = inputValue.slice(0, 15);
        //         errornpwp_kantor_konsultan_pajakText.textContent = 'Maksimal 15 digit';
        //     } else {
        //         errornpwp_kantor_konsultan_pajakText.textContent = '';
        //     }
        // });
        // const nama_akuntan_publikinput = document.getElementById('nama_akuntan_publik');
        // const errornama_akuntan_publikText = document.getElementById('errornama_akuntan_publik');
        // nama_akuntan_publikinput.addEventListener('input', function() {
        //     const inputValue = nama_akuntan_publikinput.value;

        //     if (inputValue.length > 15) {
        //         nama_akuntan_publikinput.value = inputValue.slice(0, 15);
        //         errornama_akuntan_publikText.textContent = 'Maksimal 15 digit';
        //     } else {
        //         errornama_akuntan_publikText.textContent = '';
        //     }
        // });

        // const akuntan_publikinput = document.getElementById('akuntan_publik');
        // const errorakuntan_publikText = document.getElementById('errorakuntan_publik');
        // akuntan_publikinput.addEventListener('input', function() {
        //     const inputValue = akuntan_publikinput.value;

        //     if (inputValue.length > 27) {
        //         akuntan_publikinput.value = inputValue.slice(0, 27);
        //         errorakuntan_publikText.textContent = 'Maksimal 27 digit';
        //     } else {
        //         errorakuntan_publikText.textContent = '';
        //     }
        // });

        // const npwp_kantor_akuntaninput = document.getElementById('npwp_kantor_akuntan');
        // const errornpwp_kantor_akuntanText = document.getElementById('errornpwp_kantor_akuntan');
        // npwp_kantor_akuntaninput.addEventListener('input', function() {
        //     const inputValue = npwp_kantor_akuntaninput.value;

        //     if (inputValue.length > 15) {
        //         npwp_kantor_akuntaninput.value = inputValue.slice(0, 15);
        //         errornpwp_kantor_akuntanText.textContent = 'Maksimal 15 digit';
        //     } else {
        //         errornpwp_kantor_akuntanText.textContent = '';
        //     }
        // });

        // const kantor_akuntaninput = document.getElementById('kantor_akuntan');
        // const errorkantor_akuntanText = document.getElementById('errorkantor_akuntan');
        // kantor_akuntaninput.addEventListener('input', function() {
        //     const inputValue = kantor_akuntaninput.value;

        //     if (inputValue.length > 27) {
        //         kantor_akuntaninput.value = inputValue.slice(0, 27);
        //         errorkantor_akuntanText.textContent = 'Maksimal 27 digit';
        //     } else {
        //         errorkantor_akuntanText.textContent = '';
        //     }
        // });

        // const inputElement = document.getElementById('npwp');
        // const errorText = document.getElementById('errorNpwp');
        // inputElement.addEventListener('input', function() {
        //     const inputValue = inputElement.value;

        //     if (inputValue.length > 15) {
        //         inputElement.value = inputValue.slice(0, 15);
        //         errorText.textContent = 'Maksimal 15 digit';
        //     } else {
        //         errorText.textContent = '';
        //     }
        // });

        // const nama_npwpInput = document.getElementById('nama_npwp');
        // const errornamaNpwpText = document.getElementById('errornamaNpwp');
        // nama_npwpInput.addEventListener('input', function() {
        //     const inputValue = nama_npwpInput.value;

        //     if (inputValue.length > 30) {
        //         nama_npwpInput.value = inputValue.slice(0, 30);
        //         errornamaNpwpText.textContent = 'Maksimal 30 digit';
        //     } else {
        //         errornamaNpwpText.textContent = '';
        //     }
        // });

        // const jenis_usahaInput = document.getElementById('jenis_usaha');
        // const errorjenis_usahaText = document.getElementById('errorjenis_usaha');
        // jenis_usahaInput.addEventListener('input', function() {
        //     const inputValue = jenis_usahaInput.value;

        //     if (inputValue.length > 21) {
        //         jenis_usahaInput.value = inputValue.slice(0, 21);
        //         errorjenis_usahaText.textContent = 'Maksimal 21 digit';
        //     } else {
        //         errorjenis_usahaText.textContent = '';
        //     }
        // });

        // const kluInput = document.getElementById('klu');
        // const errorkluText = document.getElementById('errorklu');
        // kluInput.addEventListener('input', function() {
        //     const inputValue = kluInput.value;

        //     if (inputValue.length > 6) {
        //         kluInput.value = inputValue.slice(0, 6);
        //         errorkluText.textContent = 'Maksimal 6 digit';
        //     } else {
        //         errorkluText.textContent = '';
        //     }
        // });
        // const no_telpInput = document.getElementById('no_telp');
        // const errorno_telpText = document.getElementById('errorno_telp');
        // no_telpInput.addEventListener('input', function() {
        //     const inputValue = no_telpInput.value;

        //     if (inputValue.length > 12) {
        //         no_telpInput.value = inputValue.slice(0, 12);
        //         errorno_telpText.textContent = 'Maksimal 12 digit';
        //     } else {
        //         errorno_telpText.textContent = '';
        //     }
        // });
        // const no_fakInput = document.getElementById('no_fak');
        // const errorno_fakText = document.getElementById('errorno_fak');
        // no_fakInput.addEventListener('input', function() {
        //     const inputValue = no_fakInput.value;

        //     if (inputValue.length > 12) {
        //         no_fakInput.value = inputValue.slice(0, 12);
        //         errorno_fakText.textContent = 'Maksimal 12 digit';
        //     } else {
        //         errorno_fakText.textContent = '';
        //     }
        // });
        // const negara_domisiliInput = document.getElementById('negara_domisili');
        // const errornegara_domisiliText = document.getElementById('errornegara_domisili');
        // negara_domisiliInput.addEventListener('input', function() {
        //     const inputValue = negara_domisiliInput.value;

        //     if (inputValue.length > 23) {
        //         negara_domisiliInput.value = inputValue.slice(0, 23);
        //         errornegara_domisiliText.textContent = 'Maksimal 23 digit';
        //     } else {
        //         errornegara_domisiliText.textContent = '';
        //     }
        // });
    });
</script>
