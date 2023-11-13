@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Laporan
        </div>
    </div>
@endsection
<script src="{{ asset('app-assets/js/scripts/spt1770s.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('sptS') }}">SPT Orang Pribadi</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sptS') }}">SPT 1770s</a></li>
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
                                        <button class="nav-link active" id="1770s" data-bs-toggle="tab"
                                            data-bs-target="#nav-1770s" type="button" role="tab"
                                            aria-controls="nav-1770s" aria-selected="true">
                                            <span class="bs-stepper-box">1770S<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        {{-- <button class="nav-link" id="nav-1111AB-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1111AB" type="button" role="tab"
                                            aria-controls="nav-1111AB" aria-selected="true">
                                            <span class="bs-stepper-box">1111-AB<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button> --}}
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sptS/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- 1770s --}}
                                        <div class="tab-pane fade show active" id="1770s" role="tabpanel"
                                            aria-labelledby="1770s">
                                            <h4 align="center">SPT TAHUNAN</p>
                                                PAJAK PENGHASILAN WAJIB PAJAK ORANG PRIBADI</h4>
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
                                                <label class="col-sm-3 col-form-label">SPT Pembetulan Ke -</label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                            placeholder="Masukkan SPT Pembetulan"
                                                            class="form-control"id="spt_pembetulan_1770s" name="spt_pembetulan_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">N P W P</label>
                                                <div class="col-sm-9">
                                                    <input type="text" min="0" autocomplete="off" required
                                                        placeholder="Masukkan No N P W P"
                                                        class="form-control"id="id_npwp_1770s" name="id_npwp_1770s">
                                                    <span id="errorid_npwp_1770s" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                                <div class="col-sm-9">
                                                    <input type="text" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nama Wajib Pajak"
                                                        class="form-control"id="id_nama_wajib_pajak_1770s" name="id_nama_wajib_pajak_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                                <div class="col-sm-4">
                                                    <input type="text" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Pekerjaan"
                                                        class="form-control"id="id_pekerjaan_1770s" name="id_pekerjaan_1770s">
                                                </div>
                                                <label class="col-sm-1 col-form-label">KLU</label>
                                                <div class="col-sm-4">
                                                    <input type="text" min="0" autocomplete="off" required
                                                        placeholder="Masukkan KLU"
                                                        class="form-control"id="id_klu_1770s" name="id_klu_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">No.Telepon</label>
                                                <div class="col-sm-4">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan No.Telepon"
                                                        class="form-control"id="id_no_telp_1770s" name="id_no_telp_1770s">
                                                </div>
                                                <label class="col-sm-1 col-form-label">Faks</label>
                                                <div class="col-sm-4">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan No.Faks"
                                                        class="form-control"id="id_no_faks_1770s" name="id_no_faks_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <select id="id_status_kewajiban"
                                                        name="id_status_kewajiban" class="dropdown-groups">
                                                        <option value="0">KK</option>
                                                        <option value="1">HB</option>
                                                        <option value="2">PH</option>
                                                        <option value="3">MT</option>
                                                    </select>                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP Pasangan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" min="0" autocomplete="off" required
                                                        placeholder="Masukkan No N P W P Pasangan"
                                                        class="form-control"id="id_npwp_pasangan_1770s" name="id_npwp_pasangan_1770s">
                                                    <span id="errorid_npwp_pasangan_1770s" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>A. Penghasilan Netto</h4>
                                            <h6>1. Penghasilan Neto Dalam Negeri Sehubungan Dengan Pekerjaan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="a1_rupiah_1770s" name="a1_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>2. Penghasilan Neto Dalam Negeri Lainnya</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="a2_rupiah_1770s" name="a2_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>3. Penghasilan Neto Luar Negeri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="a3_rupiah_1770s" name="a3_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>4. Jumlah Penghasilan Neto (1+2+3)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        class="form-control"id="a4_rupiah_1770s" name="a4_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>5. Zakat/Sumbangan Keagamaan Yang Sifatnya Wajib</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="a5_rupiah_1770s" name="a5_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>6. Jumlah Penghasilan Neto Setelah Pengurangan Zakat /Sumbangan Keagamaan Yang Sifatnya Wajib (4-5)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        class="form-control"id="a6_rupiah_1770s" name="a6_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h4>B. PENGHASILAN KENA PAJAK</h4>
                                            <h6>7. Penghasilan Tidak Kena Pajak</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <select id="b7_penghasilankenapajak"
                                                        name="b7_penghasilankenapajak" class="dropdown-groups">
                                                        <option value="0">TK</option>
                                                        <option value="1">K</option>
                                                        <option value="2">K/I</option>
                                                    </select>                                                
                                                </div>
                                                <label class="col-sm-1 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="b7_rupiah_1770s" name="b7_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>8. Penghasilan Kena Pajak (6-7)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        class="form-control"id="b8_rupiah_1770s" name="b8_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h4>C. PPh Terutang</h4>
                                            <h6>9. PPh Terutang</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="c9_rupiah_1770s" name="c9_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>10. Pengembalian / Pengurangan PPh Pasal 24 Yang Telah Dikreditkan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="c10_rupiah_1770s" name="c10_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>11. Jumlah PPh Terutang (9+10)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        class="form-control"id="c11_rupiah_1770s" name="c11_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h4>D. Kredit Pajak</h4>
                                            <h6>12. PPh Yang Dipotong / Dipungut Pihak Lain / Ditanggung Pemerintah Dan / Atau Kredit Pajak Luar Negeri Dan / Atau Terutang Di Luar Negeri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="d12_rupiah_1770s" name="d12_rupiah_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-5">
                                                    <div class="form-check">
                                                        <input id="d13_pph_1770s" class="form-check-input"
                                                            type="radio" name="d13_pph_1770s" value="0" checked>
                                                        <label class="form-check-label">
                                                            a. PPh Yang Harus Dibayar Sendiri
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input id="d13_pph_1770s" class="form-check-input"
                                                            type="radio" name="d13_pph_1770s" value="1">
                                                        <label class="form-check-label">
                                                            b. PPh Yang Lebih Dipotong
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>13. Jumlah (11-12)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        class="form-control"id="d13_jumlah_1770s" name="d13_jumlah_1770s">
                                                </div>
                                            </div>
                                            <h6>14. PPh Yang Dibayar Sendiri</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">a. PPh Pasal 25</label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="d14a_rupiah_1770s" name="d14a_rupiah_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">b. STP PPh Pasal 25 (Hanya Pokok Pajak)</label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="d14b_rupiah_1770s" name="d14b_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>15. Jumlah Kredit Pajak (14a + 14b)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="d15_rupiah_1770s" name="d15_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h4>E. PPh Kurang/Lebih Bayar</h4>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-5">
                                                    <div class="form-check">
                                                        <input id="e16_pph_1770s" class="form-check-input"
                                                            type="radio" name="e16_pph_1770s" value="0" checked>
                                                        <label class="form-check-label">
                                                            a. PPh Yang Kurang Dibayar (PPh Pasal 29)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input id="e16_pph_1770s" class="form-check-input"
                                                            type="radio" name="e16_pph_1770s" value="1">
                                                        <label class="form-check-label">
                                                            b. PPh Yang Lebih Dibayar (PPh Pasal 28 A)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>16. Jumlah (13-15)</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <input type="date" min="0" autocomplete="off" required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="e16_date_1770s" name="e16_date_1770s">
                                                </div>
                                                <label class="col-sm-1 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <input type="number" min="0" autocomplete="off" readonly required
                                                        placeholder="Masukkan Nilai Rupiah"
                                                        class="form-control"id="e16_rupiah_1770s" name="e16_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h6>17. Permohonan</h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">PPh Lebih Bayar</label>
                                                <div class="col-sm-9">
                                                    <select id="e17_permohonan_1770s" name="e17_permohonan_1770s"
                                                        class="dropdown-groups">
                                                       <option value="0">A. Direstitusikan</option>
                                                       <option value="1">B. Diperhitungkan Dengan Utang Pajak</option>
                                                       <option value="2">C. DIKEMBALIKAN DENGAN SKPPKP PASAL 17C </option>
                                                       <option value="3">D. DIKEMBALIKAN DENGAN SKKPP PASAL 17D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h4>F. Angsuran PPh Pasal 25 Tahun Pajak Berikutnya</h4>
                                            <h6>18. Angsuran PPh Pasal 25 Tahun Pajak Berikutnya Sebesar </h6>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">PPh Lebih Bayar</label>
                                                <div class="col-sm-4">
                                                    <select id="f18_permohonan_1770s" name="f18_permohonan_1770s"
                                                        class="dropdown-groups">
                                                       <option value="0">A. 1/12 x Jumlah Pada Angka 13 </option>
                                                       <option value="1">B. Penghitungan Dalam Lampiran Tersendiri</option>
                                                    </select>
                                                </div>
                                                <label class="col-sm-1 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <input type="number" min="0" autocomplete="off" required
                                                    placeholder="Masukkan Nilai Rupiah"
                                                    class="form-control"id="f18_rupiah_1770s" name="f18_rupiah_1770s">
                                                </div>
                                            </div>
                                            <h4>G. Lampiran</h4>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <select id="g_lampiran_1770s" name="g_lampiran_1770s"
                                                        class="dropdown-groups">
                                                       <option value="0">A. Fotokopi Formulir 1721-A1 atau 1721-A2 atau Bukti Potong PPh Pasal 21 </option>
                                                       <option value="1">B. Surat Setoran Pajak Lembar Ke-3 PPh Pasal 29</option>
                                                       <option value="2">C. Surat Kuasa Khusus (Bila dikuasakan)</option>
                                                       <option value="3">D. Perhitungan PPh Terutang bagi Wajib Pajak dengan status perpajakan PH atau MT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-5">
                                                    <div class="form-check">
                                                        <input id="pernyataan_1770s" class="form-check-input"
                                                            type="radio" name="pernyataan_1770s" value="0" checked>
                                                        <label class="form-check-label">
                                                            Wajib Pajak
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input id="pernyataan_1770s" class="form-check-input"
                                                            type="radio" name="pernyataan_1770s" value="1">
                                                        <label class="form-check-label">
                                                            Kuasa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input type="date" min="0" autocomplete="off" required
                                                    class="form-control"id="pernyataan_date_1770s" name="pernyataan_date_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" min="0" autocomplete="off" required
                                                    placeholder="Masukkan Nama Lengkap"
                                                    class="form-control"id="pernyataan_nama_lengkap_1770s" name="pernyataan_nama_lengkap_1770s">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" min="0" autocomplete="off" required
                                                    placeholder="Masukkan NPWP"
                                                    class="form-control"id="pernyataan_npwp_1770s" name="pernyataan_npwp_1770s">
                                                    <span id="errorpernyataan_npwp_1770s" style="color: red;"></span>
                                                    
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
                                        {{-- 1770s --}}
                                        {{--  --}}
                                        {{-- <div class="tab-pane fade" id="nav-1111AB" role="tabpanel"
                                            aria-labelledby="nav-1111AB-tab">
                                            <h4 align="center">REKAPITULASI PENYERAHAN DAN PEROLEHAN</h4>
                                            <hr>
                                        </div> --}}
                                        {{--  --}}
                                       
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
