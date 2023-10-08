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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
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
                                        <button class="nav-link" id="nav-1721V-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721V" type="button" role="tab"
                                            aria-controls="nav-1721V" aria-selected="true">
                                            <span class="bs-stepper-box">1721-V<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721VI-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721VI" type="button" role="tab"
                                            aria-controls="nav-1721VI" aria-selected="true">
                                            <span class="bs-stepper-box">1721-VI<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721VII-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721VII" type="button" role="tab"
                                            aria-controls="nav-1721VII" aria-selected="true">
                                            <span class="bs-stepper-box">1721-VII<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721A1-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721A1" type="button" role="tab"
                                            aria-controls="nav-1721A1" aria-selected="true">
                                            <span class="bs-stepper-box">1721-A1<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                        <button class="nav-link" id="nav-1721A2-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1721A2" type="button" role="tab"
                                            aria-controls="nav-1721A2" aria-selected="true">
                                            <span class="bs-stepper-box">1721-A2<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">
                               
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- 1721 --}}
                                        <div class="tab-pane fade show active" id="nav-1721" role="tabpanel"
                                            aria-labelledby="nav-1721-tab">
                                            <div class="row">
                                                <h4>A. Identitas Pemotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->npwp}}" id="id_npwp_1721"
                                                            name="id_npwp_1721"type="number" min="0"
                                                            class="form-control" placeholder="Masukkan No NPWP">
                                                        <span id="errorid_npwp_1721" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input  autocomplete="off" readonly value="{{$spt->nama}}" id="id_nama_1721"
                                                            name="id_nama_1721"type="text" class="form-control"
                                                            placeholder="Masukkan Nama">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Besaran PTKP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" autocomplete="off" readonly value="{{$spt->ptkp}}" id="besaran_ptkp"
                                                            name="besaran_ptkp" type="number" class="form-control"
                                                            placeholder="Masukkan Besaran PTKP">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea autocomplete="off" readonly  id="id_alamat_1721" name="id_alamat_1721" type="text" class="form-control"
                                                            placeholder="Masukkan Alamat">{{$spt->alamat}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">No Telp</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->no_telp}}" id="id_no_telp_1721"
                                                            name="id_no_telp_1721" type="number" min="0"
                                                            class="form-control" placeholder="Masukkan Alamat">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>B. Objek Pajak</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea autocomplete="off" readonly id="id_alamat_1721" name="id_alamat_1721" type="text" class="form-control"
                                                            placeholder="Masukkan Alamat">{{$spt->alamat_objekpajak}}</textarea>
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
                                                                @foreach ($sptLineB as $key => $row)
                                                                <tr>
                                                                    <td width="auto" class="text-center"
                                                                        value="">
                                                                        <input readonly value="{{$row->penerima_penghasilan}}"  autocomplete="off" type="text"
                                                                            name="objek_penerima[]" id="objek_penerima[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{date('d-M-Y',strtotime($row->kode_objek))}}" autocomplete="off" type="text"
                                                                            name="objek_kodeobjek[]"
                                                                            id="objek_kodeobjek[]" class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->jumlah_penerima_penghasilan}}" autocomplete="off" type="number"
                                                                            name="objek_jumlahpenerima[]"
                                                                            id="objek_jumlahpenerima[]" min="0"
                                                                            class="form-control penerima" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off" type="number"
                                                                            name="objek_jumlahpenghasilan[]"
                                                                            id="objek_jumlahpenghasilan[]" min="0"
                                                                            class="form-control penghasilan" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->jumlah_pajak_dipotong}}" autocomplete="off" type="number"
                                                                            name="objek_jumlahpajak[]"
                                                                            id="objek_jumlahpajak[]" min="0"
                                                                            class="form-control pajak" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td><b>JUMLAH</b></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly value="{{$spt->jumlah_penerima_penghasilan_b}}" autocomplete="off" type="text"
                                                                            name="total_jumlah_penerima1721" id="total_jumlah_penerima1721"
                                                                            class="form-control totalpenerima" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly value="{{$spt->jumlah_penghasilan_bruto_b}}" autocomplete="off" type="text"
                                                                            name="total_jumlah_bruto1721" id="total_jumlah_bruto1721"
                                                                            class="form-control totalbruto" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly value="{{$spt->jumlah_pajak_dipotong_b}}" autocomplete="off" type="text"
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
                                                        <input autocomplete="off" readonly value="{{$spt->pokok_pajak}}" id="pokokpajak_1721"
                                                            name="pokokpajak_1721" type="number" class="form-control"
                                                            placeholder="Masukkan Pokok Pajak" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                    <div class="col-sm-3">
                                                        <select id="masapajak" name="masapajak" class="dropdown-groups">
                                                            @foreach ($masa as $row)
                                                            <option value="{{ $row->value }}"
                                                                {{ $spt->masa_pajak_bulan == $row->value ? 'selected' : '' }}>
                                                                {{ $row->nama_bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select id="tahun_pajak" name="tahun_pajak"
                                                            class="dropdown-groups">
                                                            @php
                                                                $tahunsekarang = date('Y');
                                                            @endphp
                                                            @for ($tahunsekarang = date('Y'); $tahunsekarang >= date('Y') - 15; $tahunsekarang--)
                                                                <option value="{{ $tahunsekarang }}"
                                                                {{ $spt->masa_pajak_tahun == $tahunsekarang ? 'selected' : '' }}>
                                                                {{ $tahunsekarang }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input autocomplete="off" readonly value="{{$spt->masa_pajak_pokok}}" id="kelebihanpenyetor_1721"
                                                            name="kelebihanpenyetor_1721" type="number"
                                                            class="form-control" placeholder="Pokok Pajak"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jumlah</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->jumlah_objekpajak}}" id="jumlah_1721"
                                                            name="jumlah_1721" type="number" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kurang Lebih Setor</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->kurang_lebih_setor}}" id="kuranglebihsetor_1721"
                                                            name="kuranglebihsetor_1721" type="number"
                                                            class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Spt Di Betulkan</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->spt_dibetulkan}}" id="sptdibetulkan_1721"
                                                            name="sptdibetulkan_1721" type="number" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Spt Pembetulan</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->spt_pembetulan}}" id="sptpembetulan_1721"
                                                            name="sptpembetulan_1721" type="number" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kompensasi</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($spt->kompensasi))}}"autocomplete="off" id="kompensasi_1721"
                                                            name="kompensasi_1721" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input autocomplete="off" readonly value="{{$spt->npwp_pemotong}}" id="npwppemotong_1721"
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
                                                                @foreach ($sptLineC as $key => $row)
                                                                <tr>
                                                                    <td width="auto" class="text-center"
                                                                        value="">
                                                                        <input readonly value="{{$row->penerima_penghasilan}}" autocomplete="off" type="text"
                                                                            name="objek_penerima_c[]"
                                                                            id="objek_penerima_c[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{date('d-M-Y',strtotime($row->kode_objek))}}" autocomplete="off" type="text"
                                                                            name="objek_kodeobjek_c[]"
                                                                            id="objek_kodeobjek_c[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->jumlah_penerima_penghasilan}}" autocomplete="off" type="number"
                                                                            name="objek_jumlahpenerima_c[]"
                                                                            id="objek_jumlahpenerima_c[]" min="0"
                                                                            class="form-control penerima_c" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off" type="number"
                                                                            name="objek_jumlahpenghasilan_c[]"
                                                                            id="objek_jumlahpenghasilan_c[]"
                                                                            min="0" class="form-control penghasilan_c" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->jumlah_pajak_dipotong}}" autocomplete="off" type="number"
                                                                            name="objek_jumlahpajak_c[]"
                                                                            id="objek_jumlahpajak_c[]" min="0"
                                                                            class="form-control pajak_c" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td><b>JUMLAH</b></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <input readonly value="{{$spt->jumlah_penerima_penghasilan_c}}" autocomplete="off" type="number"
                                                                            name="jumlahpenerimapenghasilan_c"
                                                                            id="jumlahpenerimapenghasilan_c"
                                                                            min="0" class="form-control totalpenerima_c" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly value="{{$spt->jumlah_penghasilan_bruto_c}}" autocomplete="off" type="number"
                                                                            name="jumlahpenghasilanbruot_c"
                                                                            id="jumlahpenghasilanbruot_c" min="0"
                                                                            class="form-control totalbruto_c" />
                                                                    </td>
                                                                    <td>
                                                                        <input readonly value="{{$spt->jumlah_pajak_dipotong_c}}" autocomplete="off" type="number"
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
                                                        <input readonly value="{{$spt->lembar_formulir_1721I}}" placeholder="Lembar Masa Pajak" autocomplete="off"
                                                            id="satumasapajak_1721" name="satumasapajak_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <input readonly value="{{$spt->lembar_formulir_1721IB}}" placeholder="Lembar Tahun Pajak" autocomplete="off"
                                                            id="satutahunpajak_1721" name="satutahunpajak_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 II</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->lembar_formulir_1721II}}" placeholder="Lembar" autocomplete="off"
                                                            id="formulirII_1721" name="formulirII_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 III</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->lembar_formulir_1721III}}" placeholder="Lembar" autocomplete="off"
                                                            id="formulirIII_1721" name="formulirIII_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 IV</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->lembar_formulir_1721IV}}" placeholder="Lembar" autocomplete="off"
                                                            id="formulirIV_1721" name="formulirIV_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Formulir 1721 V</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->lembar_formulir_1721V}}" placeholder="Lembar" autocomplete="off"
                                                            id="formulirV_1721" name="formulirV_1721" type="number"
                                                            min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Surat Setoran Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->surat_setoran_pajak}}" placeholder="Lembar" autocomplete="off"
                                                            id="setoranpajak_1721" name="setoranpajak_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Surat Kuasa Khusus</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->surat_kuasa_khusus}}" placeholder="Lembar" autocomplete="off"
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
                                                            @if($spt->pernyataan_ttd==0)
                                                            <option value="0">{{ 'Pemotong' }}</option>
                                                            <option value="1">{{ 'Kuasa' }}</option>
                                                            @else
                                                            <option value="1">{{ 'Kuasa' }}</option>
                                                            <option value="0">{{ 'Pemotong' }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->npwp_ttd}}" placeholder="Masukkan NPWP Penandatangan"
                                                            autocomplete="off" id="npwpttd_1721" name="npwpttd_1721"
                                                            type="number" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$spt->nama_ttd}}" placeholder="Masukkan Nama Penandatangan"
                                                            autocomplete="off" id="namattd_1721" name="namattd_1721"
                                                            type="text" min="0" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($spt->tanggal_ttd))}}" autocomplete="off" id="tglttd_1721" name="tglttd_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tempat</label>
                                                    <div class="col-sm-9">
                                                        <textarea placeholder="Masukkan Tempat Penandatangan" autocomplete="off" id="tempatttd_1721" name="tempatttd_1721"
                                                            type="text" class="form-control">{{$spt->tempat_ttd}}</textarea>
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
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptI->masa_pajak))}}" placeholder="Masukkan Tempat Penandatangan"
                                                            autocomplete="off" id="masapajak_1721" name="masapajak_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Daftar Potongan</label>
                                                    <div class="col-sm-9">
                                                        <select id="daftarpotongan_1721" name="daftarpotongan_1721"
                                                            class="dropdown-groups">
                                                            @if($sptI->daftar_potongan==0)
                                                            <option value="0">{{ 'Satu Masa Pajak' }}</option>
                                                            <option value="1">{{ 'Satu Tahun Pajak' }}</option>
                                                            @else
                                                            <option value="1">{{ 'Satu Tahun Pajak' }}</option>
                                                            <option value="0">{{ 'Satu Masa Pajak' }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptI->npwp_pemotong}}" min="0" placeholder="Masukkan NPWP Pemotong" autocomplete="off"
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
                                                                    <th class="text-center">Nomor NPWP Pegawai</th>
                                                                    <th class="text-center">Nama NPWP Pegawai</th>
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
                                                                @foreach($sptLineI as $key =>$row)
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->npwp_pegawai}}" autocomplete="off" type="number"
                                                                            name="pgt_npwp_1721[]" id="pgt_npwp_1721[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->nama_pegawai}}" autocomplete="off" type="text"
                                                                            name="pgt_namapegawai_1721[]" id="pgt_namapegawai_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->no_bukti_pemotongan}}" autocomplete="off" type="number"
                                                                            name="pgt_nomor_1721[]" id="pgt_nomor_1721[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{date('d-M-Y',strtotime($row->tgl_bukti_pemotongan))}}" autocomplete="off" type="text"
                                                                            name="pgt_tglbukti_1721[]" id="pgt_tglbukti_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->kode_objek_pajak}}" autocomplete="off" type="number"
                                                                            name="pgt_kodeobjek_1721[]" id="pgt_kodeobjek_1721[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input  readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_jumlahpenghasilanbruto_1721[]" id="pgt_jumlahpenghasilanbruto_1721[]"
                                                                            class="form-control bruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->pph_dipotong}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_pphdipotong_1721[]" id="pgt_pphdipotong_1721[]"
                                                                            class="form-control pph" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->masa_perolehan_penghasilan}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_masaperolehan_1721[]" id="pgt_masaperolehan_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->kode_negara}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_kodenegara_1721[]" id="pgt_kodenegara_1721[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            
                                                            <tfoot class="footer">
                                                                <tr>
                                                                    <td width="auto" class="text-center"><b>JUMLAH</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$sptI->jumlah_penghasilan_bruto}}" autocomplete="off" type="number"
                                                                            name="jumlahbruto_1721_formulirI" id="jumlahbruto_1721_formulirI" min="0"
                                                                            class="form-control totalbruto"/>
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$sptI->jumlah_pph_dipotong}}" autocomplete="off" type="number"
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
                                                                        <input readonly value="{{$sptI->jht_penghasilan_bruto}}" autocomplete="off" type="number"
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
                                                                        <input readonly value="{{$sptI->jumlah_total}}" autocomplete="off" type="number"
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
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptII->masa_pajak))}}" placeholder="Masukkan Tempat Penandatangan"
                                                            autocomplete="off" id="masapajak_formulirII_1721" name="masapajak_formulirII_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptII->npwp_pemotong}}" placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirII_1721" name="npwppemotong_formulirII_1721"
                                                            type="number" class="form-control">
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
                                                                @foreach($sptLineII as $key => $row)
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->npwp_pemotong}}" autocomplete="off" type="text"
                                                                            name="pgt_npwp_1721_formulirII[]" id="pgt_npwp_1721_formulirII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->nama_pemotong}}" autocomplete="off" type="text"
                                                                            name="pgt_namapegawai_1721_formulirII[]" id="pgt_namapegawai_1721_formulirII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->no_bukti_pemotong}}" autocomplete="off" type="number"
                                                                            name="pgt_nomor_1721_formulirII[]" id="pgt_nomor_1721_formulirII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->tgl_bukti_pemotong}}" autocomplete="off" type="text"
                                                                            name="pgt_tglbukti_1721_formulirII[]" id="pgt_tglbukti_1721_formulirII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->kode_objek_pajak}}" autocomplete="off" type="number"
                                                                            name="pgt_kodeobjek_1721_formulirII[]" id="pgt_kodeobjek_1721_formulirII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_jumlahpenghasilanbruto_1721_formulirII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirII[]"
                                                                            class="form-control penghasilanbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->jumlah_pph_yang_dipotong}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_pphdipotong_1721_formulirII[]" id="pgt_pphdipotong_1721_formulirII[]"
                                                                            class="form-control potonganpph" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->jumlah_pph_yang_dipotong}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_kodenegara_1721_formulirII[]" id="pgt_kodenegara_1721_formulirII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        
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
                                                                        <input readonly value="{{$sptII->jumlah_penghasilan_bruto}}" autocomplete="off" type="number"
                                                                            name="jumlahbruto_1721II" id="jumlahbruto_1721II" min="0"
                                                                            class="form-control jumlahbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$sptII->pph_yang_dipotong}}"  autocomplete="off" type="number"
                                                                            name="potonganpph_1721II" id="potonganpph_1721II" min="0"
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
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptIII->masa_pajak))}}" placeholder="Masukkan Tempat Penandatangan"
                                                            autocomplete="off" id="masapajak_formulirIII_1721" name="masapajak_formulirIII_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptIII->npwp_pemotong}}" placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirIII_1721" name="npwppemotong_formulirIII_1721"
                                                            type="number" class="form-control">
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
                                                                @foreach($sptLineIII as $key =>$row)
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->nomor_npwp_pemotong}}" autocomplete="off" type="number"
                                                                            name="pgt_npwp_1721_formulirIII[]" id="pgt_npwp_1721_formulirIII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->nama_npwp_pemotong}}" autocomplete="off" type="text"
                                                                            name="pgt_namapegawai_1721_formulirIII[]" id="pgt_namapegawai_1721_formulirIII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->nomor_bukti_pemotong}}" autocomplete="off" type="number"
                                                                            name="pgt_nomor_1721_formulirIII[]" id="pgt_nomor_1721_formulirIII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{date('d-M-Y',strtotime($row->tgl_bukti_pemotong))}}" autocomplete="off" type="rext"
                                                                            name="pgt_tglbukti_1721_formulirIII[]" id="pgt_tglbukti_1721_formulirIII[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->kode_objek_pajak}}" autocomplete="off" type="number"
                                                                            name="pgt_kodeobjek_1721_formulirIII[]" id="pgt_kodeobjek_1721_formulirIII[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_jumlahpenghasilanbruto_1721_formulirIII[]" id="pgt_jumlahpenghasilanbruto_1721_formulirIII[]"
                                                                            class="form-control penghasilanbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->pph_yang_dipotong}}" autocomplete="off" type="number" min="0"
                                                                            name="pgt_pphdipotong_1721_formulirIII[]" id="pgt_pphdipotong_1721_formulirIII[]"
                                                                            class="form-control potonganpph" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        {{-- <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-adddaftarpotongan_1721_iii"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button> --}}
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
                                                                        <input readonly value="{{$sptIII->jumlah_penghasilan_bruto}}" autocomplete="off" type="number"
                                                                            name="jumlahbruto_1721III" id="jumlahbruto_1721III" min="0"
                                                                            class="form-control jumlahbruto" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$sptIII->pph_yang_dipotong}}" autocomplete="off" type="number"
                                                                            name="potonganpph_1721III" id="potonganpph_1721III" min="0"
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
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptIV->masa_pajak))}}" autocomplete="off" id="masapajak_formulirIV_1721" name="masapajak_formulirIV_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptIV->npwp_pemotong}}" min="0" placeholder="Masukkan NPWP Pemotong" autocomplete="off"
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
                                                                @foreach($sptLineIV as $key =>$row)
                                                                <tr>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->kode_akun_pajak}}" autocomplete="off" type="number"
                                                                            name="ssp_kapIV[]" id="ssp_kapIV[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->kode_jenis_setoran}}" min="0" required autocomplete="off" type="number"
                                                                            name="ssp_kjsIV[]" id="ssp_kjsIV[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{date('d-M-Y',strtotime($row->tgl_bukti))}}" autocomplete="off" type="text"
                                                                            name="ssp_tglIV[]" id="ssp_tglIV[]" min="0"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->nomo_bukti}}" autocomplete="off" type="number"
                                                                            name="ssp_ntpnIV[]" id="ssp_ntpnIV[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->jumlah_pph_setor}}" autocomplete="off" type="number"
                                                                            name="ssp_pphIV[]" id="ssp_pphIV[]" min="0"
                                                                            class="form-control jumlahpph" />
                                                                    </td>
                                                                    <td width="auto" class="text-center">
                                                                        <input readonly value="{{$row->keterangan}}"  autocomplete="off" type="text" min="0"
                                                                            name="ssp_ketIV[]" id="ssp_ketIV[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                                class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        {{-- <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-adddaftarpotongan_1721_iv"
                                                                            type="button"><i data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button> --}}
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
                                                                        <input readonly value="{{$sptIV->jumlah_pph_disetor}}" autocomplete="off" type="number"
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
                                        {{-- Formulir-V --}}
                                        <div class="tab-pane fade" id="nav-1721V" role="tabpanel"
                                            aria-labelledby="nav-1721V-tab">
                                            <div class="row">
                                                <h4>Formulir V</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptV->masa_pajak))}}" autocomplete="off" id="masapajak_formulirV_1721" name="masapajak_formulirV_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptV->npwp_pemotong}}" placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirV_1721" name="npwppemotong_formulirV_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwppemotong_1721_formulirV" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Rincian</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Gaji</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->gaji}}" placeholder="Masukkan Gaji,Upah,Bonus,Gratifikasi,Honorarium,THR dll..." autocomplete="off"
                                                            id="gaji_formulirV_1721" name="gaji_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Transportasi</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_transport}}" placeholder="Masukkan Biaya Transportasi..." autocomplete="off"
                                                            id="biayatransportasi_formulirV_1721" name="biayatransportasi_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Penyusutan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_penyusutan}}" placeholder="Masukkan Biaya Penyusutan Dan Amortasi..." autocomplete="off"
                                                            id="biayaPenyusutan_formulirV_1721" name="biayaPenyusutan_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Sewa</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_sewa}}" placeholder="Masukkan Biaya Sewa..." autocomplete="off"
                                                            id="biayaSewa_formulirV_1721" name="biayaSewa_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Bunga Pinjaman</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_bunga_pinjaman}}" placeholder="Masukkan Biaya Bunga Pinjaman..." autocomplete="off"
                                                            id="biayaBungaPinjam_formulirV_1721" name="biayaBungaPinjam_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Jasa</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_jasa}}" placeholder="Masukkan Biaya Sehubungan Dengan Jasa..." autocomplete="off"
                                                            id="biayaSehubunganDenganJasa_formulirV_1721" name="biayaSehubunganDenganJasa_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Piutang</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_piutang}}" placeholder="Masukkan Biaya Piutang Tak Tertagih..." autocomplete="off"
                                                            id="biayaPiutangTakTertagih_formulirV_1721" name="biayaPiutangTakTertagih_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Royalti</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_royalti}}" placeholder="Masukkan Biaya Royalti..." autocomplete="off"
                                                            id="biayaRoyalti_formulirV_1721" name="biayaRoyalti_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Pemasaran</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_pemasaran}}" placeholder="Masukkan Biaya Pemasaran / Promosi..." autocomplete="off"
                                                            id="biayaPemasaran_formulirV_1721" name="biayaPemasaran_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Biaya Lainnya</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->biaya_lain}}" placeholder="Masukkan Biaya Lain..." autocomplete="off"
                                                            id="biayaLain_formulirV_1721" name="biayaLain_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jumlah</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptV->jumlah}}" autocomplete="off"
                                                            id="jumlah_formulirV_1721" name="jumlah_formulirV_1721" min="0"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Formulir-V --}}
                                        {{-- Formulir-VI --}}
                                        <div class="tab-pane fade" id="nav-1721VI" role="tabpanel"
                                            aria-labelledby="nav-1721VI-tab">
                                            <div class="row">
                                                <h4>Formulir VI</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nomor</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVI->nomor}}" placeholder="Masukkan Nomor" autocomplete="off" id="nomor_formulirVI_1721" name="nomor_formulirVI_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>A.Identitas Penerima Penghasilan Yang Dipotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVI->npwp_identitas}}" placeholder="Masukkan NPWP" autocomplete="off"
                                                            id="npwp_formulirVI_1721" name="npwp_formulirVI_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwp_1721_formulirVI" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. NIK</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVI->nik_identitas}}" placeholder="Masukkan NIK / No.Paspor" autocomplete="off"
                                                            id="nik_formulirVI_1721" name="nik_formulirVI_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptVI->nama_identitas}}" placeholder="Masukkan Nama" autocomplete="off"
                                                            id="nama_formulirVI_1721" name="nama_formulirVI_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea readonly value="{{$sptVI->alamat_identitas}}" placeholder="Masukkan Alamat" autocomplete="off"
                                                            id="alamat_formulirVI_1721" name="alamat_formulirVI_1721"
                                                            type="text" class="form-control">{{$sptVI->alamat_identitas}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">5. Wajib Pajak Luar Negeri</label>
                                                    <div class="col-sm-9">
                                                        <select id="wajibpajak_formulirVI_1721" name="wajibpajak_formulirVI_1721"
                                                            class="dropdown-groups">
                                                            @if($sptVI->wajib_pajak_identitas==0)
                                                            <option value="0">Ya</option>
                                                            <option value="1">Tidak</option>
                                                            @else
                                                            <option value="1">Tidak</option>
                                                            <option value="0">Ya</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">6. Kode Negara Domisili</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVI->kode_negara}}" placeholder="Masukkan Kode Negara Domisili" autocomplete="off"
                                                            id="kodeNegara_formulirVI_1721" name="kodeNegara_formulirVI_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>B. PPh Pasal 21 Dan Pasal 26 Yang Dipotong</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="list_1721VI_pasal21" class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">Dasar Pengenaan Pajak</th>
                                                                    <th class="text-center">Tarif Lebih Tinggi</th>
                                                                    <th class="text-center">Tarif Yang Dipotong</th>
                                                                    <th class="text-center">PPh Yang Dipotong</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="">
                                                                @foreach($sptLineVI as $key => $row)
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->kode_objek_pajak}}" autocomplete="off"
                                                                            type="number" name="pph_KOPVI[]"
                                                                            id="pph_KOPVI[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0"  readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off"
                                                                            type="number" name="pph_JPBVI[]"
                                                                            id="pph_JPBVI[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0"  readonly value="{{$row->dasar_pengenaan_pajak}}" autocomplete="off"
                                                                            type="number" name="pph_DPPVI[]"
                                                                            id="pph_DPPVI[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0"  readonly value="{{$row->tarif}}" autocomplete="off"
                                                                            type="number" name="pph_TLTVI[]"
                                                                            id="pph_TLTVI[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0" readonly value="{{$row->potongan}}" autocomplete="off"
                                                                            type="number" name="pph_tarifVI[]"
                                                                            id="pph_tarifVI[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0" readonly value="{{$row->potongan_pph}}"  autocomplete="off"
                                                                            type="number" name="pph_potongVI[]"
                                                                            id="pph_potongVI[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td><button type="button" class="btn btn-light"><i
                                                                        class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        {{-- <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-addPphPasal"
                                                                            type="button"><i
                                                                                data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button> --}}
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <h4>C. Identitas Pemotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVI->npwp_pemotong}}" placeholder="Masukkan NPWP Identitas Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirVI_1721" name="npwppemotong_formulirVI_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwppemotong_formulirVI_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptVI->nama_pemotong}}" placeholder="Masukkan Nama Identitas Pemotong" autocomplete="off"
                                                            id="namapemotong_formulirVI_1721" name="namapemotong_formulirVI_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptVI->tgl_pemotong))}}" placeholder="Masukkan Tanggal Dan Tanda Tangan" autocomplete="off"
                                                            id="ttdpemotong_formulirVI_1721" name="ttdpemotong_formulirVI_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Formulir-VI --}}
                                        {{-- Formulir-VII --}}
                                        <div class="tab-pane fade" id="nav-1721VII" role="tabpanel"
                                            aria-labelledby="nav-1721VII-tab">
                                            <div class="row">
                                                <h4>Formulir VII</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nomor</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVII->nomor}}" placeholder="Masukkan Nomor" autocomplete="off" id="nomor_formulirVII_1721" name="nomor_formulirVII_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>A. Identitas Penerima Penghasilan Yang Dipotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVII->npwp_identitas}}" placeholder="Masukkan NPWP" autocomplete="off"
                                                            id="npwp_formulirVII_1721" name="npwp_formulirVII_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwp_1721_formulirVII" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. NIK </label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVII->nik_identitas}}" placeholder="Masukkan NIK / No.Paspor" autocomplete="off"
                                                            id="nik_formulirVII_1721" name="nik_formulirVII_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Nama </label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptVII->nama_identitas}}" placeholder="Masukkan Nama" autocomplete="off"
                                                            id="nama_formulirVII_1721" name="nama_formulirVII_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Alamat </label>
                                                    <div class="col-sm-9">
                                                        <textarea readonly value="{{$sptVII->alamat_identitas}}" placeholder="Masukkan Alamat" autocomplete="off"
                                                            id="alamat_formulirVII_1721" name="alamat_formulirVII_1721"
                                                            type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>B. PPh Pasal 21 Yang Dipotong</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="formulir1721-VII" class="display"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Kode Objek Pajak</th>
                                                                    <th class="text-center">Jumlah Penghasilan Bruto</th>
                                                                    <th class="text-center">Tarif Potongan</th>
                                                                    <th class="text-center">PPh Yang Dipotong</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="">
                                                                @foreach($sptLineVII as $key => $row)
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <input readonly value="{{$row->kode_objek_pajak}}" autocomplete="off"
                                                                            type="number" name="pph_kop_formulir_Vii[]"
                                                                            id="pph_kop_formulir_Vii[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0" readonly value="{{$row->jumlah_penghasilan_bruto}}" autocomplete="off"
                                                                            type="number" name="pph_jpb_formulir_Vii[]"
                                                                            id="pph_jpb_formulir_Vii[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0" readonly value="{{$row->tarif}}" autocomplete="off"
                                                                            type="number" name="pph_tp_formulir_Vii[]"
                                                                            id="pph_tp_formulir_Vii[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input min="0" readonly value="{{$row->pph}}" autocomplete="off"
                                                                            type="number" name="pph_pph_formulir_Vii[]"
                                                                            id="pph_pph_formulir_Vii[]"
                                                                            class="form-control" />
                                                                    </td>
                                                                    <td><button type="button"
                                                                        class="btn btn-light btn-submit"><i
                                                                            class="fa fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        {{-- <button
                                                                            class="btn btn-primary btn-submit"name='action'
                                                                            value="create" id="btn-addpphformulir1721-vii"
                                                                            type="button"><i
                                                                                data-feather='save'></i>
                                                                            {{ 'Tambah Item' }}</button>
                                                                    </td> --}}
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>C. Identitas Pemotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptVII->npwp_pemotong}}" placeholder="Masukkan NPWP Pemotong" autocomplete="off"
                                                            id="npwppemotong_formulirVII_1721" name="npwppemotong_formulirVII_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptVII->nama_pemotong}}" placeholder="Masukkan Nama Pemotong" autocomplete="off"
                                                            id="namapemotong_formulirVII_1721" name="namapemotong_formulirVII_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Tanggal TTD</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptVII->nama_pemotong))}}" placeholder="Masukkan Nama Pemotong" autocomplete="off"
                                                            id="tglpemotong_formulirVII_1721" name="tglpemotong_formulirVII_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Formulir-VII --}}
                                        {{-- Formulir-A1 --}}
                                        <div class="tab-pane fade" id="nav-1721A1" role="tabpanel"
                                            aria-labelledby="nav-1721A1-tab">
                                            <div class="row">
                                                <h4>Formulir A1</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nomor</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->nomor}}" placeholder="Masukkan Nomor" autocomplete="off" id="nomor_formulirA1_1721" name="nomor_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Perolehan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptA->masa_perolehan))}}" placeholder="Masukkan Masa Perolehan" 
                                                            autocomplete="off" id="masaperolehan_formulirA1_1721" name="masaperolehan_formulirA1_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->npwp_pemotong}}" placeholder="Masukkan NPWP Pemotong" 
                                                            autocomplete="off" id="npwppemotong_formulirA1_1721" name="npwppemotong_formulirA1_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwppemotong_formulirA1_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Pemotong</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->nama_pemotong}}" placeholder="Masukkan Nama Pemotong" 
                                                            autocomplete="off" id="namapemotong_formulirA1_1721" name="namapemotong_formulirA1_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>A. Identitas Penerima Penghasilan Yang Dipotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->npwp_identitas}}" placeholder="Masukkan NPWP Penerima" min="0"
                                                            autocomplete="off" id="npwppenerima_formulirA1_1721" name="npwppenerima_formulirA1_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwppenerima_formulirA1_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. NIK</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->nik_identitas}}" placeholder="Masukkan NIK / No Paspor" min="0"
                                                            autocomplete="off" id="nikpenerima_formulirA1_1721" name="nikpenerima_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->nama_identitas}}" placeholder="Masukkan Nama Penerima" 
                                                            autocomplete="off" id="namapenerima_formulirA1_1721" name="namapenerima_formulirA1_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea readonly value="{{$sptA->alamat_identitas}}" placeholder="Masukkan Alamat Penerima" 
                                                            autocomplete="off" id="alamatpenerima_formulirA1_1721" name="alamatpenerima_formulirA1_1721"
                                                            type="text" class="form-control">{{$sptA->alamat_identitas}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">5. Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenisKelaminPenerima_formulirA1_1721" name="jenisKelaminPenerima_formulirA1_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA->jenis_kelamin_identitas==0)
                                                            <option value="0">Laki-laki</option>
                                                            <option value="1">Perempuan</option>
                                                            @else
                                                            <option value="1">Perempuan</option>
                                                            <option value="0">Laki-laki</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">6. Status</label>
                                                    <div class="col-sm-4">
                                                        <select id="statuspernikahanPenerima_formulirA1_1721" name="statuspernikahanPenerima_formulirA1_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA->status_pernikahan==0)
                                                            <option value="0">Kawin</option>
                                                            <option value="1">Tidak Kawin</option>
                                                            <option value="2">Kawin Penghasilan Istri Digabung</option>
                                                            @elseif($sptA->status_pernikahan==1)
                                                            <option value="1">Tidak Kawin</option>
                                                            <option value="2">Kawin Penghasilan Istri Digabung</option>
                                                            <option value="0">Kawin</option>
                                                            @else
                                                            <option value="2">Kawin Penghasilan Istri Digabung</option>
                                                            <option value="0">Kawin</option>
                                                            <option value="1">Tidak Kawin</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input readonly value="{{$sptA->status_tanggungan}}" min="0"
                                                            autocomplete="off" id="statuspenerima_formulirA1_1721" name="statuspenerima_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">7. Nama Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->nama_jabatan}}" placeholder="Masukkan Nama Jabatan" 
                                                            autocomplete="off" id="namaJabatan_formulirA1_1721" name="namaJabatan_formulirA1_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8. Karyawan Asing</label>
                                                    <div class="col-sm-9">
                                                        <select id="karyawanAsing_formulirA1_1721" name="karyawanAsing_formulirA1_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA->karyawan==0)
                                                            <option value="0">Ya</option>
                                                            <option value="1">Tidak</option>
                                                            @else
                                                            <option value="1">Tidak</option>
                                                            <option value="0">Ya</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">9. Kode Negara</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->kode_negara}}" placeholder="Masukkan Kode Negara" 
                                                            autocomplete="off" id="kodeNegara_formulirA1_1721" name="kodeNegara_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>B. Rincian Penghasilan Dan Penghitungan PPh Pasal 21</h4>
                                                <h4>Penghasilan Bruto</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. Gaji</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->gaji_rincian}}" placeholder="Masukkan Gaji,Pensiun dan THT" 
                                                            autocomplete="off" id="gaji_formulirA1_1721" name="gaji_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. Tunjangan PPh</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->tunjungan_pph_rincian}}" placeholder="Masukkan Tunjangan PPh" 
                                                            autocomplete="off" id="tunjanganPph_formulirA1_1721" name="tunjanganPph_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Tunjangan Lain</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->tunjungan_rincian}}" placeholder="Masukkan Tunjangan Lain" 
                                                            autocomplete="off" id="tunjanganlain_formulirA1_1721" name="tunjanganlain_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Honorarium</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->honorarium_rincian}}" placeholder="Masukkan Honorarium" 
                                                            autocomplete="off" id="honorarium_formulirA1_1721" name="honorarium_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">5. Premi Asuransi</label>
                                                    <div class="col-sm-9">
                                                        <input min="0"  readonly value="{{$sptA->premi_asuransi_rincian}}" placeholder="Masukkan Preim Asuransi" 
                                                            autocomplete="off" id="premiAsuransi_formulirA1_1721" name="premiAsuransi_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">6. Natura</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->natura_rincian}}" placeholder="Masukkan Preim Asuransi" 
                                                            autocomplete="off" id="natura_formulirA1_1721" name="natura_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">7. Tantiem</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->tantiem_rincian}}" placeholder="Masukkan Tantiem,Bonus,Gratifikasi,Jasa Produksi dan THR" 
                                                            autocomplete="off" id="tantiem_formulirA1_1721" name="tantiem_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8. Jumlah</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->jumlah_rincian}}"
                                                            autocomplete="off" id="jumlahbruto_formulirA1_1721" name="jumlahbruto_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Pengurangan</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">9. Biaya Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->biaya_jabatan_pengurangan}}" placeholder="Masukkan Biaya Jabatan / Biaya Pensiun"
                                                            autocomplete="off" id="biayajabatan_formulirA1_1721" name="biayajabatan_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">10. Iuran Pensiun</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->iuran_pensiun_pengurangan}}" placeholder="Masukkan Iuran Pensiun, Iuran JHT/THT"
                                                            autocomplete="off" id="iuranPensiun_formulirA1_1721" name="iuranPensiun_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">11. Jumlah Pengurangan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->jumlah_pengurangan}}" autocomplete="off" id="jumlahpengurangan_formulirA1_1721" name="jumlahpengurangan_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penghitungan PPh Pasal 21:</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">12. Jumlah Penghasilan Neto</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->jumlah_neto_penghitungan}}" autocomplete="off" id="jumlahPenghasilanNeto_formulirA1_1721" name="jumlahPenghasilanNeto_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">13. Penghasilan Neto Masa Sebelumnya</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->penghasilan_neto_penghitungan}}" placeholder="Masukkan Penghasilan Neto Masa" autocomplete="off" id="penghasilanNetoMasa_formulirA1_1721" name="penghasilanNetoMasa_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14. Jumlah Penghasilan Neto</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->jumlah_penghasilan_neto_penghitungan}}" placeholder="Masukkan Jumlah Penghasilan Neto" autocomplete="off" id="jumlahPenghasilanNetoSetaun_formulirA1_1721" name="jumlahPenghasilanNetoSetaun_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">15. PTKP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->ptkp_penghitungan}}" placeholder="Masukkan PTKP" autocomplete="off" id="ptkp_formulirA1_1721" name="ptkp_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">16. PKP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->pkp_penghitungan}}" autocomplete="off" id="pkp_formulirA1_1721" name="pkp_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">17. Atas PKP</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->pkp_atas_penghitungan}}" placeholder="Masukkan PKP" autocomplete="off" id="ataspkp_formulirA1_1721" name="ataspkp_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">18. Masa Yang Dipotong</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->potongan_masa_penghitungan}}" placeholder="Masukkan Masa Yang Dipotong" autocomplete="off" id="masayngDipotong_formulirA1_1721" name="masayngDipotong_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">19. Terutang</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->terutang_penghitungan}}" placeholder="Masukkan Terutang" autocomplete="off" id="terutang_formulirA1_1721" name="terutang_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">20. Terlunasi</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA->terlunasi_penghitungan}}" placeholder="Masukkan Terlunasi" autocomplete="off" id="terlunasi_formulirA1_1721" name="terlunasi_formulirA1_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>C. Identitas Pemotong</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->npwp_identitas_pemotong}}" placeholder="Masukkan NPWP Pemotong" autocomplete="off" id="npwpIdPem_formulirA1_1721" name="npwpIdPem_formulirA1_1721"
                                                            type="number" class="form-control" min="0">
                                                        <span id="error_npwpIdPem_formulirA1_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA->nama_identitas_pemotong}}" placeholder="Masukkan Nama Pemotong" autocomplete="off" id="namaIdPem_formulirA1_1721" name="namaIdPem_formulirA1_1721"
                                                            type="text" class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Tgl-TTD</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptA->tgl_identitas_pemotong))}}" autocomplete="off" id="tglIdPem_formulirA1_1721" name="tglIdPem_formulirA1_1721"
                                                            type="text" class="form-control" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Formulir-A1 --}}
                                        {{-- Formulir-A2 --}}
                                        <div class="tab-pane fade" id="nav-1721A2" role="tabpanel"
                                            aria-labelledby="nav-1721A2-tab">
                                            <div class="row">
                                                <h4>Formulir A2</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nomor</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA2->nomor}}" placeholder="Masukkan Nomor" autocomplete="off" id="nomor_formulirA2_1721" name="nomor_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Masa Perolehan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptA2->masa_perolehan))}}" placeholder="Masukkan Masa Perolehan" 
                                                            autocomplete="off" id="masaperolehan_formulirA2_1721" name="masaperolehan_formulirA2_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Instansi</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->nama_instansi}}"  placeholder="Masukkan Nama Instansi" 
                                                            autocomplete="off" id="namaInstansi_formulirA2_1721" name="namaInstansi_formulirA2_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Bendahara</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->nama_bendahara}}" placeholder="Masukkan Nama Bendahara" 
                                                            autocomplete="off" id="namaBendahara_formulirA2_1721" name="namaBendahara_formulirA2_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NPWP Bendahara</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA2->npwp_bendahara}}" placeholder="Masukkan NPWP Bendahara" 
                                                            autocomplete="off" id="npwpBendahara_formulirA2_1721" name="npwpBendahara_formulirA2_1721"
                                                            type="number" class="form-control">
                                                        <span id="error_npwpBendahara_formulirA2_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <hr>     
                                                <h4>A. Identitas Penerima</h4>                                       
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP Penerima</label>
                                                    <div class="col-sm-9">
                                                        <input  readonly value="{{$sptA2->npwp_identitas}}" placeholder="Masukkan NPWP Penerima" 
                                                            autocomplete="off" id="npwpPenerima_formulirA2_1721" name="npwpPenerima_formulirA2_1721"
                                                            type="number" class="form-control" min="0">
                                                        <span id="error_npwpPenerima_formulirA2_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. NIP/NRP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->nip_identitas}}" placeholder="Masukkan NIP/NRP" min="0"
                                                            autocomplete="off" id="nip_formulirA2_1721" name="nip_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Nama Penerima</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->nama_penerima_identitas}}" placeholder="Masukkan Nama Penerima" 
                                                            autocomplete="off" id="namaPenerima_formulirA2_1721" name="namaPenerima_formulirA2_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Pangkat / Golongan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->pangkat_identitas}}" placeholder="Masukkan Pangkat / Golongan" 
                                                            autocomplete="off" id="pangkat_formulirA2_1721" name="pangkat_formulirA2_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">5. Alamat</label>
                                                    <div class="col-sm-9">
                                                        <textarea readonly value="{{$sptA2->alamat_identitas}}" placeholder="Masukkan Alamat" 
                                                            autocomplete="off" id="alamat_formulirA2_1721" name="alamat_formulirA2_1721"
                                                            type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">6. Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select id="jeniskelamin_formulirA2_1721" name="jeniskelamin_formulirA2_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA2->jenis_kelamin_identitas==0)
                                                            <option value="0">Laki-laki</option>
                                                            <option value="1">Perempuan</option>
                                                            @else
                                                            <option value="1">Perempuan</option>
                                                            <option value="0">Laki-laki</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">7. NIK</label>
                                                    <div class="col-sm-9">
                                                        <input min="0" readonly value="{{$sptA2->nik_identitas}}" placeholder="Masukkan NIK Penerima" 
                                                            autocomplete="off" id="nik_formulirA2_1721" name="nik_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8. Status</label>
                                                    <div class="col-sm-5">
                                                        <select id="statusIdentitasPernikahan_formulirA2_1721" name="statusIdentitasPernikahan_formulirA2_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA2->status_pernikahan_identitas==0)
                                                            <option value="0">Kawin</option>
                                                            <option value="1">Tidak Kawin</option>
                                                            <option value="2">Kawin Penghasilan Istri Digabung</option>
                                                            @elseif($sptA2->status_pernikahan_identitas==1)
                                                            <option value="1">Tidak Kawin</option>
                                                            <option value="0">Kawin</option>
                                                            <option value="2">Kawin Penghasilan Istri Digabung</option>
                                                            @else
                                                            <option value="2">Kawin Penghasilan Istri Digabung</option>
                                                            <option value="1">Tidak Kawin</option>
                                                            <option value="0">Kawin</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input readonly value="{{$sptA2->status_jumlah_identitas}}"  placeholder="Masukkan Jumlah" min="0" 
                                                            autocomplete="off" id="statusJumlah_formulirA2_1721" name="statusJumlah_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">9. Nama Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->jabatan_identitas}}"  placeholder="Masukkan Nama Jabatan" 
                                                            autocomplete="off" id="namaJabatan_formulirA2_1721" name="namaJabatan_formulirA2_1721"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>B. Rincian Penghasilan Dan Penghitungan PPh Pasal 21</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kode Objek</label>
                                                    <div class="col-sm-9">
                                                        <select id="kode_objek_formulirA2_1721" name="kode_objek_formulirA2_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA2->kode_objek_rincian==0)
                                                            <option value="0">21-100-01</option>
                                                            <option value="1">21-100-02</option>
                                                            @else
                                                            <option value="1">21-100-02</option>
                                                            <option value="0">21-100-01</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. Gaji Pokok</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->gaji_pokok_rincian}}" placeholder="Masukkan Gaji Pokok" min="0" 
                                                            autocomplete="off" id="gajiPokok_formulirA2_1721" name="gajiPokok_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. Tunjangan Isteri</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_istri_rincian}}" placeholder="Masukkan Tunjangan Isteri" min="0" 
                                                            autocomplete="off" id="tunjanganIsteri_formulirA2_1721" name="tunjanganIsteri_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. Tunjangan Anak</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_anak_rincian}}" placeholder="Masukkan Tunjangan Isteri" min="0" 
                                                            autocomplete="off" id="tunjanganAnak_formulirA2_1721" name="tunjanganAnak_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Tunjangan Keluarga</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_keluarga_rincian}}" placeholder="Masukkan Tunjangan Keluarga" min="0" 
                                                            autocomplete="off" id="keluarga_formulirA2_1721" name="keluarga_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">5. Tunjangan Perbaikan Penghasilan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_perbaikan_rincian}}" placeholder="Masukkan Tunjangan Perbaikan" min="0" 
                                                            autocomplete="off" id="tunjanganPerbaikan_formulirA2_1721" name="tunjanganPerbaikan_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">6. Tunjangan Struktural</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_struktural_rincian}}" placeholder="Masukkan Tunjangan Struktural" min="0" 
                                                            autocomplete="off" id="tunjanganStruktural_formulirA2_1721" name="tunjanganStruktural_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">7. Tunjangan Beras</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_beras_rincian}}" placeholder="Masukkan Tunjangan Beras" min="0" 
                                                            autocomplete="off" id="tunjanganBeras_formulirA2_1721" name="tunjanganBeras_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">8. Tunjangan Khusus</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_khusus_rincian}}" placeholder="Masukkan Tunjangan Khusus" min="0" 
                                                            autocomplete="off" id="tunjanganKhusus_formulirA2_1721" name="tunjanganKhusus_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">9. Tunjangan Lain-lain</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->tunjangan_lain_rincian}}" placeholder="Masukkan Tunjangan Lain-lain" min="0" 
                                                            autocomplete="off" id="tunjanganLain_formulirA2_1721" name="tunjanganLain_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">10. Penghasilan Tetap</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->penghasilan_tetap_rincian}}" placeholder="Masukkan Tunjangan Lain-lain" min="0" 
                                                            autocomplete="off" id="penghasilanTetap_formulirA2_1721" name="penghasilanTetap_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">11. Jumlah Penghasilan Bruto</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->jumlah_bruto_rincian}}" placeholder="Masukkan Jumlah Penghasilan Bruto" min="0" 
                                                            autocomplete="off" id="penghasilanBruto_formulirA2_1721" name="penghasilanBruto_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Pengurangan</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">12. Biaya Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->biaya_jabatan_pengurangan}}" placeholder="Masukkan Biaya Jabatan/Biaya Pensiun" min="0" 
                                                            autocomplete="off" id="biayaJabatan_formulirA2_1721" name="biayaJabatan_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">13. Iuran Pensiun</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->iuran_pensiun_pengurangan}}" placeholder="Masukkan Iuran Pensiun/Iuran THT" min="0" 
                                                            autocomplete="off" id="iuranPensi_formulirA2_1721" name="iuranPensi_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">14. Jumlah Pengurangan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->jumlah_pengurangan}}" min="0" 
                                                            autocomplete="off" id="jumlahPengurangan_formulirA2_1721" name="jumlahPengurangan_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>Penghitungan PPh Pasal 21</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">15. Jumlah Penghasilan Neto</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->jumlah_penghasilan_neto_penghitung}}" min="0" 
                                                            autocomplete="off" id="jumlahPenghasilan_formulirA2_1721" name="jumlahPenghasilan_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">16. Jumlah Penghasilan Neto Masa</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->jumlah_penghasilan_neto_masa_penghitung}}" min="0" placeholder="Masukkan Jumlah Penghasilan Neto Masa"
                                                            autocomplete="off" id="jumlahPenghasilanMasa_formulirA2_1721" name="jumlahPenghasilanMasa_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">17. Jumlah Penghasilan Penghitungan</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->jumlah_penghasilan_penghitung}}" min="0" placeholder="Masukkan Jumlah Penghasilan Penghitungan"
                                                            autocomplete="off" id="jumlahPenghasilanPenghitungan_formulirA2_1721" name="jumlahPenghasilanPenghitungan_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">18. PTKP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->ptkp_penghitung}}" min="0" placeholder="Masukkan Jumlah PTKP"
                                                            autocomplete="off" id="ptkp_formulirA2_1721" name="ptkp_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">19. PKP</label>
                                                    <div class="col-sm-9">
                                                        <input  readonly value="{{$sptA2->pkp_penghitung}}" min="0" 
                                                            autocomplete="off" id="pkp_formulirA2_1721" name="pkp_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">20. PKP Setahun</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->pkp_setahun_penghitung}}" min="0" placeholder="Masukkan PKP Setahun"
                                                            autocomplete="off" id="pkpSetahun_formulirA2_1721" name="pkpSetahun_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">21. Potongan Masa Sebelumnya</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->potongan_masa_penghitung}}" min="0" placeholder="Masukkan Potongan Masa Sebelumnya"
                                                            autocomplete="off" id="potonganMasaSebelumnya_formulirA2_1721" name="potonganMasaSebelumnya_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">22. Terutang</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->terutang_penghitung}}" min="0" placeholder="Masukkan Terutang"
                                                            autocomplete="off" id="terutang_formulirA2_1721" name="terutang_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">23. Dilunasi</label>
                                                    <div class="col-sm-3">
                                                        <input readonly value="{{$sptA2->dilunasi_gaji_penghitung}}" min="0" placeholder="Masukkan Gaji"
                                                            autocomplete="off" id="gaji_formulirA2_1721" name="gaji_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input readonly value="{{$sptA2->dilunasi_tetap_penghitung}}" min="0" placeholder="Masukkan Penghasilan"
                                                            autocomplete="off" id="pengtetap_formulirA2_1721" name="pengtetap_formulirA2_1721"
                                                            type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4>C. Pegawai Tersebut</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Status Pegawai</label>
                                                    <div class="col-sm-9">
                                                        <select id="statusPernikahan_formulirA2_1721" name="statusPernikahan_formulirA2_1721"
                                                            class="dropdown-groups">
                                                            @if($sptA2->status_pegawai==0)
                                                            <option value="0">Dipindahkan</option>
                                                            <option value="1">Pindahan</option>
                                                            <option value="2">Baru</option>
                                                            <option value="3">Pensiun</option>
                                                            @elseif($sptA2->status_pegawai==1)
                                                            <option value="1">Pindahan</option>
                                                            <option value="0">Dipindahkan</option>
                                                            <option value="2">Baru</option>
                                                            <option value="3">Pensiun</option>
                                                            @elseif($sptA2->status_pegawai==2)
                                                            <option value="2">Baru</option>
                                                            <option value="1">Pindahan</option>
                                                            <option value="0">Dipindahkan</option>
                                                            <option value="3">Pensiun</option>
                                                            @else
                                                            <option value="3">Pensiun</option>
                                                            <option value="2">Baru</option>
                                                            <option value="1">Pindahan</option>
                                                            <option value="0">Dipindahkan</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                   
                                                </div>
                                               
                                                <hr>
                                                <h4>D. Tanda Tangan Bendahara</h4>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">1. NPWP</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->npwp_ttd}}" placeholder="Masukkan NPWP Penandatangan" 
                                                            autocomplete="off" id="npwpttdben_formulirA2_1721" name="npwpttdben_formulirA2_1721"
                                                            type="number" class="form-control" min="0">
                                                        <span id="error_npwpttdben_formulirA2_1721" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">2. Nama</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{$sptA2->nama_ttd}}" placeholder="Masukkan Nama Penandatangan" 
                                                            autocomplete="off" id="namapttdben_formulirA2_1721" name="namattdben_formulirA2_1721"
                                                            type="text" class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">3. NIP/NRP</label>
                                                    <div class="col-sm-9">
                                                        <input  readonly value="{{$sptA2->nip_ttd}}" placeholder="Masukkan NIP/NRP" 
                                                            autocomplete="off" id="nipnrppttdben_formulirA2_1721" name="nipnrppttdben_formulirA2_1721"
                                                            type="number" class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">4. Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input readonly value="{{date('d-M-Y',strtotime($sptA2->tgl_ttd))}}"
                                                            autocomplete="off" id="tglrppttdben_formulirA2_1721" name="tglrppttdben_formulirA2_1721"
                                                            type="text" class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <hr>
                                                {{-- <div class="d-flex justify-content-between">
                                                    <div></div>
                                                    <button class="btn btn-primary btn-submit" id="add_all"
                                                        type="submit"><i data-feather='save'></i>
                                                        {{ 'Simpan' }}</button>
                                                </div> --}}
                                            </div>

                                        </div>
                                        {{-- Formulir-A2 --}}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
