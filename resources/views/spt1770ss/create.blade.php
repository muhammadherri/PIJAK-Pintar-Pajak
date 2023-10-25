@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            SPT Orang Pribadi
        </div>
    </div>
@endsection
<script src="{{ asset('app-assets/js/scripts/spt1770ss.js') }}"></script>
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('sptSS') }}">SPT Orang Pribadi</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sptSS') }}">SPT 1770SS</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                       
                        <div class="card-body">
                            <form action="{{ route('sptSS/store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                                <h4 align="center">SPT TAHUNAN</p>
                                    PAJAK PENGHASILAN WAJIB PAJAK ORANG PRIBADI</h4>
                                <hr>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                    <div class="col-sm-9">
                                        <select id="tahun_pajak1770ss" name="tahun_pajak1770ss"
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
                                                class="form-control"id="spt_pembetulan_1770ss" name="spt_pembetulan_1770ss">
                                    </div>
                                </div>
                                <hr>
                                <h6>Identitas</h6>
                                <br>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">NPWP</label>
                                    <div class="col-sm-9">
                                        <input type="text" min="0" autocomplete="off" required
                                                placeholder="Masukkan NPWP"
                                                class="form-control"id="id_npwp_1770ss" name="id_npwp_1770ss">
                                        <span id="errorid_npwp_1770ss" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                    <div class="col-sm-9">
                                        <input type="text" min="0" autocomplete="off" required
                                                placeholder="Masukkan Nama Wajib Pajak"
                                                class="form-control"id="id_nama_npwp_1770ss" name="id_nama_npwp_1770ss">
                                    </div>
                                </div>
                                <hr>
                                <h6>A. Pajak Penghasilan</h6>
                                <br>
                                <label class="col-sm-12 col-form-label">1. Penghasilan Bruto dalam Negeri Sehubungan dengan Pekerjaan dan Penghasilan Netto dalam Negeri Lainnya</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                                placeholder="Masukkan Nilai"
                                                class="form-control"id="a1_pajak_1770ss" name="a1_pajak_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">2. Pengurangan  (Diisi jumlah pengurangan dari Formulir 1721-A1 angka 13 atau 1721-A2 angka 13)</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                                placeholder="Masukkan Nilai"
                                                class="form-control"id="a2_pajak_1770ss" name="a2_pajak_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">3. Penghasilan Tidak Kena Pajak   (Diisi jumlah PTKP dari Formulir 1721-A1 angka 17 atau 1721-A2 angka 16)</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <select id="a3_pajak_dd_1770ss"
                                            name="id_status_kewajiban" class="dropdown-groups">
                                            <option value="0">TK</option>
                                            <option value="1">K</option>
                                            <option value="2">K/I</option>
                                        </select>     
                                    </div>
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <input type="number" min="0" autocomplete="off" required
                                                placeholder="Masukkan Nilai"
                                                class="form-control"id="a3_pajak_1770ss" name="a3_pajak_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">4. Penghasilan Kena Pajak ( 1 - 2 - 3 )</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" readonly autocomplete="off" required
                                                class="form-control"id="a4_pajak_1770ss" name="a4_pajak_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">5. Pajak Penghasilan Terutang</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a5_pajak_1770ss" name="a5_pajak_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">6.  Pajak Penghasilan yang telah Dipotong oleh Pihak Lain</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a6_pajak_1770ss" name="a6_pajak_1770ss">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input id="a7pajak_1770s" class="form-check-input"
                                                type="radio" name="a7pajak_1770s" value="0" checked>
                                            <label class="form-check-label">
                                                Pajak Penghasilan yang harus Dibayar Sendiri 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input id="a7pajak_1770s" class="form-check-input"
                                                type="radio" name="a7pajak_1770s" value="1">
                                            <label class="form-check-label">
                                                Pajak Penghasilan yang Lebih Dipotong
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">7. Jumlah (5 - 6)</label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" readonly autocomplete="off" required
                                            {{-- placeholder="Masukkan Nilai" --}}
                                                class="form-control"id="a7_pajak_jumlah_1770ss" name="a7_pajak_jumlah_1770ss">
                                    </div>
                                </div>
                                <hr>
                                <h6>B. Penghasilan Yang Dikenakan PPh Final Dan Yang Dikecualikan Dari Objek Pajak</h6>
                                <label class="col-sm-12 col-form-label">8. Dasar Pengenaan Pajak/Penghasilan Bruto Pajak Penghasilan Final</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a8_penghasil_1770ss" name="a8_penghasil_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-13 col-form-label">9. Pajak Penghasilan Final Terutang</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a9_penghasil_1770ss" name="a9_penghasil_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">10. Penghasilan yang Dikecualikan dari Objek Pajak</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a10_penghasil_1770ss" name="a10_penghasil_1770ss">
                                    </div>
                                </div>
                                <hr>
                                <h6>C. Daftar Harta Dan Kewajiban</h6>
                                <label class="col-sm-12 col-form-label">11. Jumlah Keseluruhan Harta yang Dimiliki pada Akhir Tahun Pajak</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a11_daftar_1770ss" name="a11_daftar_1770ss">
                                    </div>
                                </div>
                                <label class="col-sm-12 col-form-label">12. Jumlah Keseluruhan Kewajiban/Utang pada Akhir Tahun Pajak</label>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="number" min="0" autocomplete="off" required
                                            placeholder="Masukkan Nilai"
                                                class="form-control"id="a12_daftar_1770ss" name="a12_daftar_1770ss">
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <button class="btn btn-primary btn-submit" id="add_all"
                                        type="submit"><i data-feather='save'></i>
                                        {{ 'Simpan' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection