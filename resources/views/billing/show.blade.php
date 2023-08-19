@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembayaran
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('billing') }})">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('billing') }}">Billing</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Billing</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('billing/update',[$billing->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Akun Pajak</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$billing->kode_akun_pajak}}" autocomplete="off" required id="kode_akun_pajak"
                                                    name="kode_akun_pajak" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Akun Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Jenis Setoran</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$billing->kode_jenis_setoran}}" autocomplete="off" required id="kode_jenis_setoran"
                                                    name="kode_jenis_setoran" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Jenis Setoran">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$billing->npwp}}"  autocomplete="off" required id="npwp" name="npwp"
                                                    type="number" class="form-control" placeholder="Masukkan NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-4">
                                                <input readonly value="{{$billing->start_periode_pajak}}" autocomplete="off" required id="start_periode_pajak"
                                                    name="start_periode_pajak" type="text" class="form-control">
                                            </div>
                                            <label class="col-sm-1 col-form-label">s/d</label>
                                            <div class="col-sm-4">
                                                <input readonly value="{{old('end_periode_pajak',$billing->end_periode_pajak)}}" autocomplete="off" required id="end_periode_pajak"
                                                    name="end_periode_pajak" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$billing->keterangan}}" autocomplete="off" required id="keterangan" name="keterangan"
                                                    type="number" class="form-control" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$billing->jumlah}}" autocomplete="off" required id="jumlah" name="jumlah"
                                                    type="number" class="form-control" placeholder="Masukkan Jumlah">
                                            </div>
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
