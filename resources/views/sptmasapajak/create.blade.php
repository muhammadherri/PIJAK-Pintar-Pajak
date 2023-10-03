@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Laporan
        </div>
    </div>
@endsection
<script src="{{ asset('app-assets/js/scripts/default.js') }}"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('sptmasapajak') }}">Laporan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sptmasapajak') }}">SPT Masa Pajak</a></li>
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
                                        <button class="nav-link active" id="nav-1721-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721" type="button" role="tab"
                                            aria-controls="nav-1721" aria-selected="true">
                                            <span class="bs-stepper-box">1721<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span></button>
                                        <button class="nav-link" id="nav-1721I-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721I" type="button" role="tab"
                                            aria-controls="nav-1721I" aria-selected="true">
                                            <span class="bs-stepper-box">1721-I<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721II-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721II" type="button" role="tab"
                                            aria-controls="nav-1721II" aria-selected="true">
                                            <span class="bs-stepper-box">1721-II<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721III-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721III" type="button" role="tab"
                                            aria-controls="nav-1721III" aria-selected="true">
                                            <span class="bs-stepper-box">1721-III<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721IV-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721IV" type="button" role="tab"
                                            aria-controls="nav-1721IV" aria-selected="true">
                                            <span class="bs-stepper-box">1721-IV<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sptmasapajak/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- 1721 --}}
                                        <div class="tab-pane fade show active" id="nav-1721" role="tabpanel"
                                            aria-labelledby="nav-1721-tab">
                                            <div class="row">
                                                <h4>A. Identitas Pemotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" required id="id_npwp_1721"
                                                            name="id_npwp_1721"type="number" min="0"
                                                            class="form-control" placeholder="Masukkan No NPWP">
                                                        <span id="errorid_npwp_1721" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" required id="id_nama_1721"
                                                            name="id_nama_1721"type="text" class="form-control"
                                                            placeholder="Masukkan Nama">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Besaran PTKP</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" required id="besaran_ptkp"
                                                            name="besaran_ptkp" type="number" class="form-control"
                                                            placeholder="Masukkan Besaran PTKP">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea autocomplete="off" required id="id_alamat_1721" name="id_alamat_1721" type="text" class="form-control"
                                                            placeholder="Masukkan Alamat"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">No Telp</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" required id="id_no_telp_1721"
                                                            name="id_no_telp_1721" type="number" min="0"
                                                            class="form-control" placeholder="Masukkan Alamat">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>B. Objek Pajak</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea autocomplete="off" required id="id_alamat_1721" name="id_alamat_1721" type="text" class="form-control"
                                                            placeholder="Masukkan Alamat"></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="objekpajak_1721"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Penerima Penghasilan
                                                                    </th>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penerima Penghasilan
                                                                    </th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">Jumlah Pajak Dipotong</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center"
                                                                        value="">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="objek_penerima[]" id="objek_penerima[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="objek_kodeobjek[]"
                                                                            id="objek_kodeobjek[]" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="objek_jumlahpenerima[]"
                                                                            id="objek_jumlahpenerima[]" min="0"
                                                                            class="form-control penerima" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="objek_jumlahpenghasilan[]"
                                                                            id="objek_jumlahpenghasilan[]" min="0"
                                                                            class="form-control penghasilan" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="objek_jumlahpajak[]"
                                                                            id="objek_jumlahpajak[]" min="0"
                                                                            class="form-control pajak" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-addobjek_1721"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td><b>JUMLAH</b></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly autocomplete="off" type="text"
                                                                            name="total_jumlah_penerima1721" id="total_jumlah_penerima1721"
                                                                            class="form-control totalpenerima" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly autocomplete="off" type="text"
                                                                            name="total_jumlah_bruto1721" id="total_jumlah_bruto1721"
                                                                            class="form-control totalbruto" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly autocomplete="off" type="text"
                                                                            name="total_jumlah_pajak1721" id="total_jumlah_pajak1721"
                                                                            class="form-control totalpajak" />
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>

                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pokok Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" required id="pokokpajak_1721"
                                                            name="pokokpajak_1721" type="number" class="form-control"
                                                            placeholder="Masukkan Pokok Pajak" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                    <div class="col-sm-3">
                                                        <select id="masapajak" name="masapajak" class="dropdown-groups">
                                                            <option value="0">{{ 'Januari' }}</option>
                                                            <option value="1">{{ 'Febuari' }}</option>
                                                            <option value="2">{{ 'Maret' }}</option>
                                                            <option value="3">{{ 'April' }}</option>
                                                            <option value="4">{{ 'Mei' }}</option>
                                                            <option value="5">{{ 'Juni' }}</option>
                                                            <option value="6">{{ 'Juli' }}</option>
                                                            <option value="7">{{ 'Agustus' }}</option>
                                                            <option value="8">{{ 'September' }}</option>
                                                            <option value="9">{{ 'Oktober' }}</option>
                                                            <option value="10">{{ 'November' }}</option>
                                                            <option value="11">{{ 'Desember' }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
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
                                                    <div class="col-sm-3">
                                                        <input autocomplete="off" required id="kelebihanpenyetor_1721"
                                                            name="kelebihanpenyetor_1721" type="number"
                                                            class="form-control" placeholder="Pokok Pajak"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jumlah</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly id="jumlah_1721"
                                                            name="jumlah_1721" type="number" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kurang Lebih Setor</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly id="kuranglebihsetor_1721"
                                                            name="kuranglebihsetor_1721" type="number"
                                                            class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Spt Di Betulkan</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" required id="sptdibetulkan_1721"
                                                            name="sptdibetulkan_1721" type="number" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Spt Pembetulan</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly id="sptpembetulan_1721"
                                                            name="sptpembetulan_1721" type="number" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kompensasi</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" id="sptpembetulan_1721"
                                                            name="sptpembetulan_1721" type="date"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" id="npwppemotong_1721"
                                                            name="npwppemotong_1721" type="number" min="0"
                                                            class="form-control">
                                                        <span id="errorid_npwp_pemotong_1721" style="color: red;"></span>

                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>C. Objek Pajak Final</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="objekpajakfinal_1721"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Penerima Penghasilan
                                                                    </th>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penerima Penghasilan
                                                                    </th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">Jumlah Pajak Dipotong</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center"
                                                                        value="">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="objek_penerima_c[]"
                                                                            id="objek_penerima_c[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="objek_kodeobjek_c[]"
                                                                            id="objek_kodeobjek_c[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="objek_jumlahpenerima_c[]"
                                                                            id="objek_jumlahpenerima_c[]" min="0"
                                                                            class="form-control penerima_c" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="objek_jumlahpenghasilan_c[]"
                                                                            id="objek_jumlahpenghasilan_c[]"
                                                                            min="0" class="form-control penghasilan_c" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="objek_jumlahpajak_c[]"
                                                                            id="objek_jumlahpajak_c[]" min="0"
                                                                            class="form-control pajak_c" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-addobjekfinal_1721"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td><b>JUMLAH</b></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="jumlahpenerimapenghasilan_c"
                                                                            id="jumlahpenerimapenghasilan_c"
                                                                            min="0" class="form-control totalpenerima_c" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="jumlahpenghasilanbruot_c"
                                                                            id="jumlahpenghasilanbruot_c" min="0"
                                                                            class="form-control totalbruto_c" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="jumlahpajakdipotong_c"
                                                                            id="jumlahpajakdipotong_c" min="0"
                                                                            class="form-control totalpajak_c" />
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>D. Lampiran</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 I</label>
                                                    <div class="col-sm-5">
                                                        <input placeholder="Lembar Masa Pajak" autocomplete="off"
                                                            id="satumasapajak_1721" name="satumasapajak_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <input placeholder="Lembar Tahun Pajak" autocomplete="off"
                                                            id="satutahunpajak_1721" name="satutahunpajak_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 II</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Lembar" autocomplete="off"
                                                            id="formulirII_1721" name="formulirII_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 III</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Lembar" autocomplete="off"
                                                            id="formulirIII_1721" name="formulirIII_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 IV</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Lembar" autocomplete="off"
                                                            id="formulirIV_1721" name="formulirIV_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 V</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Lembar" autocomplete="off"
                                                            id="formulirV_1721" name="formulirV_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Surat Setoran Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Lembar" autocomplete="off"
                                                            id="setoranpajak_1721" name="setoranpajak_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Surat Kuasa Khusus</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Lembar" autocomplete="off"
                                                            id="suratkuasakhusus_1721" name="suratkuasakhusus_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Pernyataan Dan Tanda Tangan Pemotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pernyataan</label>
                                                    <div class="col-sm-9">
                                                        <select id="masapajakttd_1721" name="masapajakttd_1721"
                                                            class="dropdown-groups">
                                                            <option value="0">{{ 'Pemotong' }}</option>
                                                            <option value="1">{{ 'Kuasa' }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan NPWP Penandatangan"
                                                            autocomplete="off" id="npwpttd_1721" name="npwpttd_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan Nama Penandatangan"
                                                            autocomplete="off" id="namattd_1721" name="namattd_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" id="tglttd_1721" name="tglttd_1721"
                                                            type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tempat</label>
                                                    <div class="col-sm-9">
                                                        <textarea placeholder="Masukkan Tempat Penandatangan" autocomplete="off" id="tempatttd_1721" name="tempatttd_1721"
                                                            type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 1721 --}}

                                        {{-- Formulir-I --}}
                                        <div class="tab-pane fade" id="nav-1721I" role="tabpanel"
                                            aria-labelledby="nav-1721I-tab">
                                            <div class="row">
                                                <h4>Formulir I</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan Tempat Penandatangan"
                                                            autocomplete="off" id="masapajak_1721" name="masapajak_1721"
                                                            type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Daftar Potongan</label>
                                                    <div class="col-sm-9">
                                                        <select id="daftarpotongan_1721" name="daftarpotongan_1721"
                                                            class="dropdown-groups">
                                                            <option value="0">{{ 'Satu Masa Pajak' }}</option>
                                                            <option value="1">{{ 'Satu Tahun Pajak' }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_1721_formulirI" name="npwppemotong_1721_formulirI"
                                                            type="number" class="form-control">
                                                        <span id="error_npwppemotong_1721_formulirI" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="penerimapensiun_1721"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">NPWP Pegawai</th>
                                                                    <th class="text-center">Nama Pegawai</th>
                                                                    <th class="text-center">Nomor Bukti Pemotongan</th>
                                                                    <th class="text-center">Tanggal Bukti Pemotongan</th>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">PPh Dipotong</th>
                                                                    <th class="text-center">Masa Perolehan Penghasilan</th>
                                                                    <th class="text-center">Kode Negara Domisili</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_npwp_1721[]" id="pgt_npwp_1721[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="pgt_namapegawai_1721[]" id="pgt_namapegawai_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_nomor_1721[]" id="pgt_nomor_1721[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="pgt_tglbukti_1721[]" id="pgt_tglbukti_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_kodeobjek_1721[]" id="pgt_kodeobjek_1721[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_jumlahpenghasilanbruto_1721[]" id="pgt_jumlahpenghasilanbruto_1721[]"
                                                                            class="form-control bruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_pphdipotong_1721[]" id="pgt_pphdipotong_1721[]"
                                                                            class="form-control pph" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_masaperolehan_1721[]" id="pgt_masaperolehan_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_kodenegara_1721[]" id="pgt_kodenegara_1721[]"
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
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-adddaftarpotongan_1721"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="jumlahbruto_1721_formulirI" id="jumlahbruto_1721_formulirI" min="0"
                                                                            class="form-control totalbruto"/>
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="potonganpph" id="potonganpph" min="0"
                                                                            class="form-control totalpph"/>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto" class="text-center"><b>THT / JHT</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="tht_1721_formulirI" id="tht_1721_formulirI" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="auto" class="text-center"><b>Total Jumlah A+B</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="totaljumlah_1721_formulirI" id="totaljumlah_1721_formulirI" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Formulir-I --}}
                                        {{-- Formulir-II --}}
                                        <div class="tab-pane fade" id="nav-1721II" role="tabpanel"
                                            aria-labelledby="nav-1721II-tab">
                                            <div class="row">
                                                <h4>Formulir II</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan Tempat Penandatangan"
                                                            autocomplete="off" id="masapajak_formulirII_1721" name="masapajak_formulirII_1721"
                                                            type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirII_1721" name="npwppemotong_formulirII_1721"
                                                            type="text" class="form-control">
                                                        <span id="error_npwppemotong_1721_formulirII" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="formulir1721-II"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nomor NPWP Pemotong</th>
                                                                    <th class="text-center">Nama NPWP Pemotong</th>
                                                                    <th class="text-center">Nomor Bukti Pemotongan</th>
                                                                    <th class="text-center">Tanggal Bukti Pemotongan</th>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">PPh Yang Dipotong</th>
                                                                    <th class="text-center">Kode Negara Domisili</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_npwp_1721_formulirII[]" id="pgt_npwp_1721_formulirII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="pgt_namapegawai_1721_formulirII[]" id="pgt_namapegawai_1721_formulirII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_nomor_1721_formulirII[]" id="pgt_nomor_1721_formulirII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="pgt_tglbukti_1721_formulirII[]" id="pgt_tglbukti_1721_formulirII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_kodeobjek_1721_formulirII[]" id="pgt_kodeobjek_1721_formulirII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_jumlahpenghasilanbruto_1721_formulirII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirII[]"
                                                                            class="form-control penghasilanbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_pphdipotong_1721_formulirII[]" id="pgt_pphdipotong_1721_formulirII[]"
                                                                            class="form-control potonganpph" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_kodenegara_1721_formulirII[]" id="pgt_kodenegara_1721_formulirII[]"
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
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-adddaftarpotongan_1721_ii"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="jumlahbruto" id="jumlahbruto" min="0"
                                                                            class="form-control jumlahbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="potonganpph" id="potonganpph" min="0"
                                                                            class="form-control jumlahpotonganpph" />
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
                                        </div>
                                        {{-- Formulir-II --}}
                                        {{-- Formulir-III --}}
                                        <div class="tab-pane fade" id="nav-1721III" role="tabpanel"
                                            aria-labelledby="nav-1721III-tab">
                                            <div class="row">
                                                <h4>Formulir III</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan Tempat Penandatangan"
                                                            autocomplete="off" id="masapajak_formulirIII_1721" name="masapajak_formulirIII_1721"
                                                            type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirIII_1721" name="npwppemotong_formulirIII_1721"
                                                            type="text" class="form-control">
                                                        <span id="error_npwppemotong_1721_formulirIII" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="formulir1721-III"class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nomor NPWP Bukti Potong</th>
                                                                    <th class="text-center">Nama Bukti Potong</th>
                                                                    <th class="text-center">Nomor Bukti Pemotongan</th>
                                                                    <th class="text-center">Tanggal Bukti Pemotongan</th>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">PPh Yang Dipotong</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_npwp_1721_formulirIII[]" id="pgt_npwp_1721_formulirIII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="text"
                                                                            name="pgt_namapegawai_1721_formulirIII[]" id="pgt_namapegawai_1721_formulirIII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_nomor_1721_formulirIII[]" id="pgt_nomor_1721_formulirIII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="date"
                                                                            name="pgt_tglbukti_1721_formulirIII[]" id="pgt_tglbukti_1721_formulirIII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number"
                                                                            name="pgt_kodeobjek_1721_formulirIII[]" id="pgt_kodeobjek_1721_formulirIII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_jumlahpenghasilanbruto_1721_formulirIII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirIII[]"
                                                                            class="form-control penghasilanbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input required autocomplete="off" type="number" min="0"
                                                                            name="pgt_pphdipotong_1721_formulirIII[]" id="pgt_pphdipotong_1721_formulirIII[]"
                                                                            class="form-control potonganpph" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-adddaftarpotongan_1721_iii"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="jumlahbruto" id="jumlahbruto" min="0"
                                                                            class="form-control jumlahbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly autocomplete="off" type="number"
                                                                            name="potonganpph" id="potonganpph" min="0"
                                                                            class="form-control jumlahpotonganpph" />
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                
                                                            </tfoot>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Formulir-III --}}
                                        {{-- Formulir-IV --}}
                                        <div class="tab-pane fade" id="nav-1721IV" role="tabpanel"
                                        aria-labelledby="nav-1721IV-tab">
                                        <div class="row">
                                            <h4>Formulir IV</h4>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                <div class="col-sm-9">
                                                    <input autocomplete="off" id="masapajak_formulirIV_1721" name="masapajak_formulirIV_1721"
                                                        type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                <div class="col-sm-9">
                                                    <input placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                        id="npwppemotong_formulirIV_1721" name="npwppemotong_formulirIV_1721"
                                                        type="number" class="form-control">
                                                    <span id="error_npwppemotong_1721_formulirIV" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="formulir1721-IV"class="display"
                                                        style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Kode Akun Pajak</th>
                                                                <th class="text-center">Kode Jenis Setoran</th>
                                                                <th class="text-center">Tanggal Bukti</th>
                                                                <th class="text-center">Nomor Bukti</th>
                                                                <th class="text-center">Jumlah PPh Disetor</th>
                                                                <th class="text-center">Keterangan</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="auto" class="text-center">
                                                                    <input required autocomplete="off" type="number"
                                                                        name="ssp_kapIV[]" id="ssp_kapIV[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td width="auto" class="text-center">
                                                                    <input required autocomplete="off" type="number"
                                                                        name="ssp_kjsIV[]" id="ssp_kjsIV[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td width="auto" class="text-center">
                                                                    <input required autocomplete="off" type="date"
                                                                        name="ssp_tglIV[]" id="ssp_tglIV[]" min="0"
                                                                        class="form-control" />
                                                                </td>
                                                                <td width="auto" class="text-center">
                                                                    <input required autocomplete="off" type="date"
                                                                        name="ssp_ntpnIV[]" id="ssp_ntpnIV[]"
                                                                        class="form-control" />
                                                                </td>
                                                                <td width="auto" class="text-center">
                                                                    <input required autocomplete="off" type="number"
                                                                        name="ssp_pphIV[]" id="ssp_pphIV[]" min="0"
                                                                        class="form-control jumlahpph" />
                                                                </td>
                                                                <td width="auto" class="text-center">
                                                                    <input required autocomplete="off" type="number" min="0"
                                                                        name="ssp_ketIV[]" id="ssp_ketIV[]"
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
                                                                    <button
                                                                        class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-adddaftarpotongan_1721_iv"
                                                                        type="button"><i data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot class="footer">
                                                            <tr>
                                                                <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td width="auto" class="text-center">
                                                                    <input readonly autocomplete="off" type="number"
                                                                        name="totalpph_1721_iv" id="totalpph_1721_iv" min="0"
                                                                        class="form-control totalpph" />
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
                                    </div>
                                        {{-- Formulir-IV --}}
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
