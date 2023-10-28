@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Transaksi
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pphfinal') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pphfinal') }}">PPH 21 Final</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21 Final</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Transaksi</label>
                                        <div class="col-sm-9">
                                            <input readonly autocomplete="off" id="" name="" value="{{$pphfinal->transaksi}}"
                                                type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" id="kop" name="kop" value="{{$pphfinal->kode_objek_pajak}}"
                                                type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jumlah Penghasilan Bruto</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" id="bruto" name="bruto" value="{{number_format($pphfinal->bruto)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Penghasilan Bruto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tarif</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" id="tarif" name="tarif" value="{{number_format($pphfinal->tarif)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" id="potongan_pph" name="potongan_pph" value="{{number_format($pphfinal->potongan_pph)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Potongan PPH">
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

