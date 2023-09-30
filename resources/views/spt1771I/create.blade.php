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
<script src="{{ asset('app-assets/js/scripts/default.js') }}"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .footer {
        background-color: darkgrey;
        color: black;
    }
</style>
@php
    $tahunsekarang = date('Y');
@endphp
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('spt1771I') }}">Pelaporan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('spt1771I') }}">SPT</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">1771 I</a></li>
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
                                <form action="{{ route('spt1771I/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- TAB 1771 --}}
                                        <div class="tab-pane fade show active" id="nav-1771" role="tabpanel"
                                            aria-labelledby="nav-1771-tab">
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis SPT</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_spt" name="jenis_spt" class="dropdown-groups">
                                                            <option value="1771I">1771 I</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Identitas</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                                    <div class="col-sm-9">
                                                        <select id="tahun_pajak" name="tahun_pajak" class="dropdown-groups">
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
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp" name="npwp">
                                                        <span id="errorNpwp" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" required
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp" name="nama_npwp">
                                                        <span id="errornamaNpwp" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="start_periode_pembukuan"
                                                            name="start_periode_pembukuan">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="end_periode_pembukuan"
                                                            name="end_periode_pembukuan">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penghasilan Neto Komersial Dalam Negeri</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">A. Peredaran Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Peredaran Usaha..."
                                                            class="form-control"id="1a_penghasilan_netto"
                                                            name="1a_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">B. Harga Pokok Penjualan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Harga Pokok Penjualan..."
                                                            class="form-control"id="1b_penghasilan_netto"
                                                            name="1b_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">C. Biaya Usaha Lainnya</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Biaya Usaha Lainnya..."
                                                            class="form-control"id="1c_penghasilan_netto"
                                                            name="1c_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">D. Penghasilan Neto Dari
                                                        Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" readonly
                                                            class="form-control"id="1d_penghasilan_netto"
                                                            name="1d_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">E. Penghasilan Dari Luar
                                                        Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penghasilan Dari Luar Usaha..."
                                                            class="form-control"id="1e_penghasilan_netto"
                                                            name="1e_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">F. Biaya Dari Luar Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Biaya Dari Luar Usaha..."
                                                            class="form-control"id="1f_penghasilan_netto"
                                                            name="1f_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">G. Penghasilan Neto Dari Luar
                                                        Usaha</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" readonly
                                                            class="form-control"id="1g_penghasilan_netto"
                                                            name="1g_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">H. Jumlah</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" readonly
                                                            class="form-control"id="1h_penghasilan_netto"
                                                            name="1h_penghasilan_netto">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penghasilan Neto Komersial Luar Negeri</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Penghasilan Netto</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penghasilan Netto..."
                                                            class="form-control"id="2_penghasilan_netto_luar_negeri"
                                                            name="2_penghasilan_netto_luar_negeri">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Jumlah Penghasilan Neto Komersial</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jumlah Penghasilan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" readonly
                                                            class="form-control"id="3_jumlah" name="3_jumlah">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penghasilan Yang Dikenakan PPh Final</h4>
                                                <p>*Tidak termasuk objek pajak</p>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Penghasilan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penghasilan Yand Dikanakan PPh..."
                                                            class="form-control"id="4_penghasilan" name="4_penghasilan">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penyesuaian Fiskal Positif</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">A. Biaya Di Bebankan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Biaya Di Bebankan / Dikeluarkan Untuk Ke..."
                                                            class="form-control"id="5a_penyesuaian_fiskal"
                                                            name="5a_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">B. Dana Cadangan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Dana Cadangan..."
                                                            class="form-control"id="5b_penyesuaian_fiskal"
                                                            name="5b_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">C. Natura</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penggantian / Imbalan Pekerjaan..."
                                                            class="form-control"id="5c_penyesuaian_fiskal"
                                                            name="5c_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">D. Jumlah Melebihi
                                                        Kewajaran</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Jumlah Melebihi Kewajaran..."
                                                            class="form-control"id="5d_penyesuaian_fiskal"
                                                            name="5d_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">E. Harta Yang Di
                                                        Hibahkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Harta Yang Di Hibahkan..."
                                                            class="form-control"id="5e_penyesuaian_fiskal"
                                                            name="5e_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">F. Pajak Penghasilan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Pajak Penghasilan..."
                                                            class="form-control"id="5f_penyesuaian_fiskal"
                                                            name="5f_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">G. Gaji Yang Dibayarkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Gaji Yang Dibayarkan Kepada Anggota Persekutuan..."
                                                            class="form-control"id="5g_penyesuaian_fiskal"
                                                            name="5g_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">H. Sanksi Administrasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Sanksi Administrasi..."
                                                            class="form-control"id="5h_penyesuaian_fiskal"
                                                            name="5h_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">I. Selisih Penyusutan
                                                        Komersial</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Selisih Penyusutan Komersial..."
                                                            class="form-control"id="5i_penyesuaian_fiskal"
                                                            name="5i_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">J. Selisih Amortisasi
                                                        Komersial</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Selisih Amortisasi Komersial..."
                                                            class="form-control"id="5j_penyesuaian_fiskal"
                                                            name="5j_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">K. Biaya Yang
                                                        Ditangguhkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Biaya Yang Ditangguhkan..."
                                                            class="form-control"id="5k_penyesuaian_fiskal"
                                                            name="5k_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">L. Penyesuaian Fiskal</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penyesuaian Fiskal Positif Lainnya..."
                                                            class="form-control"id="5l_penyesuaian_fiskal"
                                                            name="5l_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">M. Jumlah Penyesuaian</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" readonly
                                                            class="form-control"id="5m_penyesuaian_fiskal"
                                                            name="5m_penyesuaian_fiskal">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penyesuaian Fiskal Negatif</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">A. Selisih Penyusutan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Selisih Penyusutan..."
                                                            class="form-control"id="6a_fiskal_negatif"
                                                            name="6a_fiskal_negatif">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">B. Selisih Amortisasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Selisih Amortisasi..."
                                                            class="form-control"id="6b_fiskal_negatif"
                                                            name="6b_fiskal_negatif">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">C. Penghasilan
                                                        Ditangguhkan</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penghasilan Ditangguhkan..."
                                                            class="form-control"id="6c_fiskal_negatif"
                                                            name="6c_fiskal_negatif">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">D. Penyesuaian Fiskal
                                                        Negatif</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Penyesuaian Fiskal Negatif..."
                                                            class="form-control"id="6d_fiskal_negatif"
                                                            name="6d_fiskal_negatif">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">E. Jumlah</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" readonly
                                                            class="form-control"id="6e_fiskal_negatif"
                                                            name="6e_fiskal_negatif">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Fasilitas Penanaman Modal </h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pengurangan Penghasilan
                                                        Netto</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan Pengurangan Penghasilan Netto..."
                                                            class="form-control"id="7_fasilitas" name="7_fasilitas">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penghasilan Netto Fiskal</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Netto Fiskal</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" min="0" autocomplete="off" readonly
                                                            class="form-control"id="8_netto_fiskal"
                                                            name="8_netto_fiskal">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <p>D.1.1.32.31</p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- TAB 1771 --}}

                                        {{-- TAB 1771 II --}}
                                        <div class="tab-pane fade " id="nav-1771II" role="tabpanel"
                                            aria-labelledby="nav-1771II-tab">
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
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771II" name="npwp_1771II">
                                                        <span id="errornpwp_1771II" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" required
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771II"
                                                            name="nama_npwp_1771II">
                                                        <span id="errornamaNpwp_1771II" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="start_periode_pembukuan_1771II"
                                                            name="start_periode_pembukuan_1771II">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="end_periode_pembukuan_1771II"
                                                            name="end_periode_pembukuan_1771II">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771II"class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th class="text-center">Perincian Pembelian Barang</th>
                                                                    <th class="text-center">Harga Pokok</th>
                                                                    <th class="text-center">Biaya Usaha</th>
                                                                    <th class="text-center">Biaya Luar Usaha</th>
                                                                    <th class="text-center">Sub Jumlah</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="sales_order_detail_container">
                                                                <tr>
                                                                    <td width="auto">1</td>
                                                                    <td width="auto" class="text-center">Pembelian Bahan
                                                                        / Barang</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">2</td>
                                                                    <td width="auto" class="text-center">Gaji</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">3</td>
                                                                    <td width="auto" class="text-center">Biaya
                                                                        Transportasi</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">4</td>
                                                                    <td width="auto" class="text-center">Biaya
                                                                        Penyusutan Dan Amortisasi</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">5</td>
                                                                    <td width="auto" class="text-center">Biaya Sewa</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">6</td>
                                                                    <td width="auto" class="text-center">Biaya Bunga
                                                                        Pinjam</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">7</td>
                                                                    <td width="auto" class="text-center">Biaya
                                                                        Sehubungan Dengan Jasa</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">8</td>
                                                                    <td width="auto" class="text-center">Biaya Piutang
                                                                        Tak Tertagih</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">9</td>
                                                                    <td width="auto" class="text-center">Biaya Royalti
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">10</td>
                                                                    <td width="auto" class="text-center">Biaya Pemasaran
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">11</td>
                                                                    <td width="auto" class="text-center">Biaya Lainnya
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">12</td>
                                                                    <td width="auto" class="text-center">Persediaan Awal
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control sub_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control sub_biaya_usaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control sub_biaya_luar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control jumlahtotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto">13</td>
                                                                    <td width="auto" class="text-center">Persediaan
                                                                        Akhir</td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkaharpok1[]" id="angkaharpok1[]"
                                                                            min="0"
                                                                            class="form-control pengurangan_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_usaha1[]"
                                                                            id="angkabiaya_usaha1[]" min="0"
                                                                            class="form-control pengurangan_biayausaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="angkabiaya_luar1[]"
                                                                            id="angkabiaya_luar1[]" min="0"
                                                                            class="form-control pengurangan_biayaluar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subjum1[]" id="subjum1[]"
                                                                            min="0"
                                                                            class="form-control pengurangan_subjum" />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td width="auto"><b>14</b></td>
                                                                    <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subangkaharpok1" id="angkaharpok1"
                                                                            min="0"
                                                                            class="form-control total_harpok" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subangkabiaya_usaha1"
                                                                            id="angkabiaya_usaha1" min="0"
                                                                            class="form-control total_biayausaha" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="subangkabiaya_luar1"
                                                                            id="angkabiaya_luar1" min="0"
                                                                            class="form-control total_biayaluar" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="total" id="subjum1" min="0"
                                                                            class="form-control total" />
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- TAB 1771 II --}}

                                        {{-- TAB 1771 III --}}
                                        <div class="tab-pane fade " id="nav-1771III" role="tabpanel"
                                            aria-labelledby="nav-1771III-tab">
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
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771III" name="npwp_1771III">
                                                        <span id="errornpwp_1771III" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" required
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771III"
                                                            name="nama_npwp_1771III">
                                                        <span id="errornamaNpwp_1771III" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="start_periode_pembukuan_1771III"
                                                            name="start_periode_pembukuan_1771III">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
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
                                                                        <th class="text-center">Bukti Nomor Pemotongan</th>
                                                                        <th class="text-center">Tanggal Bukti Pemotongan
                                                                        </th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
                                                                                type="text" name="kreditnama[]"
                                                                                id="kreditnama[]" class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
                                                                                type="number" name="kreditnpwp[]"
                                                                                id="kreditnpwp[]" min="0"
                                                                                class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
                                                                                type="text" name="kredittrx[]"
                                                                                id="kredittrx[]" class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
                                                                                type="number" name="kreditrp[]"
                                                                                id="kreditrp[]" min="0"
                                                                                class="form-control subrupiah" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
                                                                                type="number" name="kreditpajak[]"
                                                                                id="kreditpajak[]" min="0"
                                                                                class="form-control subpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
                                                                                type="number" name="kreditnomor[]"
                                                                                id="kreditnomor[]" min="0"
                                                                                class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off"
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
                                                                                type="number" name="kreditsubrp[]"
                                                                                id="kreditsubrp[]" min="0"
                                                                                class="form-control jumlahrupiah" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off"
                                                                                type="number"
                                                                                name="kreditpenghasilan[]"
                                                                                id="kreditpenghasilan[]" min="0"
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
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771IV" name="npwp_1771IV">
                                                        <span id="errornpwp_1771IV" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" required
                                                            placeholder="Masukkan Nama Wajib Pajak"
                                                            class="form-control"id="nama_npwp_1771IV"
                                                            name="nama_npwp_1771IV">
                                                        <span id="errornamaNpwp_1771IV" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="start_periode_pembukuan_1771IV"
                                                            name="start_periode_pembukuan_1771IV">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="end_periode_pembukuan_1771IV"
                                                            name="end_periode_pembukuan_1771IV">
                                                    </div>
                                                    <hr>
                                                    <h4>Bagian A : PPh Final</h4>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="list_1771IV"class="display" style="min-width: 845px">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th class="text-center">Jenis Penghasilan</th>
                                                                        <th class="text-center">Dasar Pengenaan Pajak</th>
                                                                        <th class="text-center">Potongan Tarif %</th>
                                                                        <th class="text-center">PPh Terutang</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="sales_order_detail_container">
                                                                    <tr>
                                                                        <td width="auto">1</td>
                                                                        <td width="auto" class="text-center">Bunga Deposito</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">2</td>
                                                                        <td width="auto" class="text-center">Diskonto Obligasi</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">3</td>
                                                                        <td width="auto" class="text-center">Saham Bursa Efek</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">4</td>
                                                                        <td width="auto" class="text-center">Modal Ventura</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">5</td>
                                                                        <td width="auto" class="text-center">Penghasilan Usaha Penyalur</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">6</td>
                                                                        <td width="auto" class="text-center">Penghasilan Pengalihan</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">7</td>
                                                                        <td width="auto" class="text-center">Penghasilan Persewaan</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">8</td>
                                                                        <td width="auto" class="text-center">A.Pelaksana Konstruksi</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">8</td>
                                                                        <td width="auto" class="text-center">B.Perencana Konstruksi</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">8</td>
                                                                        <td width="auto" class="text-center">C.Pengawas Konstruksi</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">9</td>
                                                                        <td width="auto" class="text-center">Perwakilan Dagang Asing
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">10</td>
                                                                        <td width="auto" class="text-center">Pelayaran Asing
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">11</td>
                                                                        <td width="auto" class="text-center">Pelayaran Dalam Negeri
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">12</td>
                                                                        <td width="auto" class="text-center">Penilaian Aktiva Tetap
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">13</td>
                                                                        <td width="auto" class="text-center">Transaksi Derivatif</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">14</td>
                                                                        <td width="auto" class="text-center"> <input required autocomplete="off" type="text"
                                                                            name="subangkaharpok1" id="angkaharpok1"
                                                                            min="0"
                                                                            class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pengenaan_pajak[]" id="angka_pengenaan_pajak[]"
                                                                                min="0"
                                                                                class="form-control sub_pengenaanpajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_tarif_potongan[]"
                                                                                id="angka_tarif_potongan[]" min="0"
                                                                                class="form-control sub_tarifpotongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_pph_terutang[]"
                                                                                id="angka_pph_terutang[]" min="0"
                                                                                class="form-control sub_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="footer">
                                                                    <tr>
                                                                        <td width="auto"></td>
                                                                        <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off" type="number"
                                                                                name="sub_angka_pengenaan_pajak" id="sub_angka_pengenaan_pajak"
                                                                                min="0"
                                                                                class="form-control total_kena_pajak" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off" type="number"
                                                                                name="sub_tarif"
                                                                                id="sub_tarif" min="0"
                                                                                class="form-control total_tarif_potongan" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off" type="number"
                                                                            name="sub_tarif"
                                                                            id="sub_tarif" min="0"
                                                                            class="form-control total_terutang" />
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                    <hr>
                                                    <h4>Bagian B : Penghasilan Bukan Objek Pajak</h4>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="list_1771IVB"class="display" style="min-width: 845px">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th class="text-center">Jenis Penghasilan</th>
                                                                        <th class="text-center">Penghasilan Bruto</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="sales_order_detail_container">
                                                                    <tr>
                                                                        <td width="auto">1</td>
                                                                        <td width="auto" class="text-center">Bantuan / Sumbangan</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">2</td>
                                                                        <td width="auto" class="text-center">Hibah</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">3</td>
                                                                        <td width="auto" class="text-center">Dividen</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">4</td>
                                                                        <td width="auto" class="text-center">Dana Pensiun</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">5</td>
                                                                        <td width="auto" class="text-center">Ventura</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">6</td>
                                                                        <td width="auto" class="text-center">Sisa Lebih Yang Diterima</td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="auto">7</td>
                                                                        <td width="auto" class="text-center">
                                                                            <input required autocomplete="off" type="text"
                                                                            name="jenis_penghasilan" id="jenis_penghasilan"
                                                                            class="form-control" />
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input required autocomplete="off" type="number"
                                                                                name="angka_penghasilan_bruto[]" id="angka_penghasilan_bruto[]"
                                                                                min="0"
                                                                                class="form-control sub_penghasilan_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="footer">
                                                                    <tr>
                                                                        <td width="auto"></td>
                                                                        <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <input readonly autocomplete="off" type="number"
                                                                                name="totalbruto" id="totalbruto"
                                                                                min="0"
                                                                                class="form-control total_bruto" />
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
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
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771V" name="npwp_1771V">
                                                        <span id="errornpwp_1771V" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" required
                                                        placeholder="Masukkan Nama Wajib Pajak"
                                                        class="form-control"id="nama_npwp_1771V"
                                                        name="nama_npwp_1771V">
                                                        <span id="errornamaNpwp_1771V" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="start_periode_pembukuan_1771V"
                                                            name="start_periode_pembukuan_1771V">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
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
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangsh_nama_1771V[]" id="pemegangsh_nama_1771V[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangsh_alamat_nama_1771V[]" id="pemegangsh_alamat_nama_1771V[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangsh_npwp_1771V[]"
                                                                            id="pemegangsh_npwp_1771V[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangsh_modalsetor_1771V[]"
                                                                            id="pemegangsh_modalsetor_1771V[]" min="0"
                                                                            class="form-control submodalsetor"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangsh_persen_1771V[]"
                                                                            id="pemegangsh_persen_1771V[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangsh_dividen_1771V[]"
                                                                            id="pemegangsh_dividen_1771V[]" min="0"
                                                                            class="form-control"/>
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
                                                                            type="button"><i
                                                                                data-feather='save'></i>
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
                                                                        <input required autocomplete="off" type="number"
                                                                            name="jumlahmodalsetor"
                                                                            id="jumlahmodalsetor" min="0"
                                                                            class="form-control total_modalsetor"/>
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input required autocomplete="off" type="number"
                                                                            name="jumlahdividen"
                                                                            id="jumlahdividen" min="0"
                                                                            class="form-control"/>
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
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangshb_nama_1771V[]" id="pemegangshb_nama_1771V[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangshb_alamat_nama_1771V[]" id="pemegangshb_alamat_nama_1771V[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangshb_npwp_1771V[]"
                                                                            id="pemegangsh_npwpb_1771V[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pemegangshb_jabatan_1771V[]"
                                                                            id="pemegangshb_jabatan_1771V[]" min="0"
                                                                            class="form-control submodalsetor"/>
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
                                                                            type="button"><i
                                                                                data-feather='save'></i>
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
                                                        <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan No N P W P"
                                                            class="form-control"id="npwp_1771VI" name="npwp_1771VI">
                                                        <span id="errornpwp_1771VI" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" autocomplete="off" required
                                                        placeholder="Masukkan Nama Wajib Pajak"
                                                        class="form-control"id="nama_npwp_1771VI"
                                                        name="nama_npwp_1771VI">
                                                        <span id="errornamaNpwp_1771VI" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Periode Pembukuan</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
                                                            class="form-control"id="start_periode_pembukuan_1771VI"
                                                            name="start_periode_pembukuan_1771VI">
                                                    </div>
                                                    <label class="col-sm-1 col-form-label">s.d</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" autocomplete="off" required
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
                                                                    <th class="text-center">Alamat Perusahaan Afiliasi</th>
                                                                    <th class="text-center">Nomor NPWP Perusahaan Afiliasi</th>
                                                                    <th class="text-center">Modal Setor Pemilik Saham</th>
                                                                    <th class="text-center">Modal Persen %</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="penyertaan_nama[]" id="penyertaan_nama[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="penyertaan_alamat[]" id="penyertaan_alamat[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_npwp[]"
                                                                            id="penyertaan_npwp[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_modal[]"
                                                                            id="penyertaan_modal[]" min="0"
                                                                            class="form-control submodalafiliasi"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_persen[]"
                                                                            id="penyertaan_persen[]" min="0"
                                                                            class="form-control"/>
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
                                                                            type="button"><i
                                                                                data-feather='save'></i>
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
                                                                        <input required autocomplete="off" type="number"
                                                                            name="jumlahmodalafiliasi"
                                                                            id="jumlahmodalafiliasi" min="0"
                                                                            class="form-control total_modalafiliasi"/>
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
                                                        <table id="list_1771VIb"class="display" style="min-width: 845px">
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
                                                                        <input required autocomplete="off" type="text"
                                                                            name="penyertaan_namab[]" id="penyertaan_namab[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_npwpb[]"
                                                                            id="penyertaan_npwpb[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_jumlahpinjamanb[]"
                                                                            id="penyertaan_jumlahpinjamanb[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="penyertaan_thnpinjamanb[]"
                                                                            id="penyertaan_thnpinjamanb[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_bungapinjamanb[]"
                                                                            id="penyertaan_bungapinjamanb[]" min="0"
                                                                            class="form-control"/>
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
                                                                            type="button"><i
                                                                                data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Bagian C : Daftar Piutang Kepada Pemegang Saham / Perusahaan Afiliasi</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1771VIc"class="display" style="min-width: 845px">
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
                                                                        <input required autocomplete="off" type="text"
                                                                            name="penyertaan_namac[]" id="penyertaan_namac[]"
                                                                            min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_npwpc[]"
                                                                            id="penyertaan_npwpc[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_jumlahpinjamanc[]"
                                                                            id="penyertaan_jumlahpinjamanc[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="penyertaan_thnpinjamanc[]"
                                                                            id="penyertaan_thnpinjamanc[]" min="0"
                                                                            class="form-control"/>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="penyertaan_bungapinjamanc[]"
                                                                            id="penyertaan_bungapinjamanc[]" min="0"
                                                                            class="form-control"/>
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
                                                                            type="button"><i
                                                                                data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        {{-- TAB 1771 VI --}}
                                        <div class="d-flex justify-content-between">
                                            <div></div>
                                            <button class="btn btn-primary btn-submit" id="add_all" type="submit"><i data-feather='save'></i>
                                                {{ 'Simpan' }}</button>
                                        </div>
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
