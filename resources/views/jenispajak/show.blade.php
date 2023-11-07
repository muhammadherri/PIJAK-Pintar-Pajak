
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
                    <li class="breadcrumb-item active"><a href="{{ route('jenis_pajak') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jenis_pajak') }}">Jenis Pajak</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jenis Pajak</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kode</label>
                                        <div class="col-sm-9">
                                            <input autocomplete="off" value="{{$jensipajak->kode}}" required id="kode" name="kode" type="text" class="form-control"
                                                placeholder="Masukkan Kode Pajak">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jenis Pajak</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="jenis" value="{{$jensipajak->jenis_pajak}}" required class="form-control" name="jenis" placeholder="Masukkan Jenis Pajak">
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
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
