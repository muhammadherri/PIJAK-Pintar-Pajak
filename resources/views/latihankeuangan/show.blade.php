@extends('layouts.admin')
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
                    <li class="breadcrumb-item active"><a href="{{ route('latihankeuangan') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('latihankeuangan') }}">Akun Latihan</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Akun Latihan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No Akun</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$latihankeuangan->no_akun}}" required id="noakun" name="noakun" type="number" class="form-control"
                                                placeholder="Masukkan No Akun">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Akun</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$latihankeuangan->nama_akun}}" required id="namaakun" name="namaakun" type="text" class="form-control"
                                                placeholder="Masukkan Nama Akun">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Saldo</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$latihankeuangan->saldo}}" required id="saldo" name="saldo" type="number" class="form-control"
                                                placeholder="Masukkan saldo">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kategori Laporan Pajak</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$latihankeuangan->attribute3}}" required id="kategori" name="kategori" type="text" class="form-control"
                                                placeholder="Masukkan saldo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection