
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
                    <li class="breadcrumb-item active"><a href="{{ route('penerimapenghasilan') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penerimapenghasilan') }}">Penerima Penghasilan</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Penerima Penghasilan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('penerimapenghasilan/update',[$penerimahasil->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penerima Penghasilan</label>
                                            <div class="col-sm-9">
                                                <input type="text" autocomplete="off" value="{{$penerimahasil->penerima_penghasilan}}"id="penerima_penghasilan" class="form-control" name="penerima_penghasilan" placeholder="Masukkan Penerima Penghasilan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <input type="text" autocomplete="off" value="{{$penerimahasil->kode_objek_pajak}}" id="kop" class="form-control" name="kop" placeholder="Masukkan Kode Objek Pajak">
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