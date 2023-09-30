@extends('layouts.admin')
<head>
    <link rel="icon" href="{{ asset('images/umlogo.png') }}">
</head>
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Lainnya
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('neraca') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('neraca') }}">Akun</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Akun</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('neraca/update',[$neraca->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Akun</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$neraca->no_akun}}" required id="noakun" name="noakun" type="number" class="form-control"
                                                    placeholder="Masukkan No Akun">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Akun</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$neraca->nama_akun}}" required id="namaakun" name="namaakun" type="text" class="form-control"
                                                    placeholder="Masukkan Nama Akun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Saldo</label>
                                            <div class="col-sm-9">
                                                <input step="any" autocomplete="off" value="{{$neraca->saldo}}" required id="saldo" name="saldo" type="number" class="form-control"
                                                    placeholder="Masukkan saldo">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kategori Laporan Pajak</label>
                                            <div class="col-sm-9">
                                                <select id="kategori_pajak" name="kategori_pajak" class="dropdown-groups">
                                                    <optgroup label="Kategori">
                                                        <option value="{{$neraca->attribute3}}">{{$neraca->attribute3}}</option>
                                                    </optgroup>
                                                    <optgroup label="Kategori Laporan Pajak">
                                                        <option value="KAS DAN SETARA KAS">KAS DAN SETARA KAS</option>
                                                        <option value="PIUTANG USAHA PIHAK KETIGA">PIUTANG USAHA PIHAK KETIGA</option>
                                                        <option value="AKTIVA LANCAR LAINNYA">AKTIVA LANCAR LAINNYA</option>
                                                        <option value="PERSEDIAAN">PERSEDIAAN</option>
                                                        <option value="BEBAN DIBAYAR DI MUKA">BEBAN DIBAYAR DI MUKA</option>
                                                        <option value="AKTIVA TETAP LAINNYA">AKTIVA TETAP LAINNYA</option>
                                                        <option value="AKUMULASI PENYUSUTAN">AKUMULASI PENYUSUTAN</option>
                                                        <option value="HUTANG USAHA PIHAK KETIGA">HUTANG USAHA PIHAK KETIGA</option>
                                                        <option value="UANG MUKA PELANGGAN">UANG MUKA PELANGGAN</option>
                                                        <option value="HUTANG PAJAK">HUTANG PAJAK</option>
                                                        <option value="HUTANG BANK JANGKA PANJANG">HUTANG BANK JANGKA PANJANG</option>
                                                        <option value="MODAL SAHAM">MODAL SAHAM</option>
                                                        <option value="LABA DITAHAN TAHUN-TAHUN SEBELUMNYA">LABA DITAHAN TAHUN-TAHUN SEBELUMNYA</option>
                                                        <option value="LABA DITAHAN TAHUN INI">LABA DITAHAN TAHUN INI</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div></div>
                                        <button class="btn btn-primary btn-submit"name='action' value="create"
                                            id="add_all" type="submit"><i data-feather='save'></i>
                                            {{ 'Simpan' }}</button>
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
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}
