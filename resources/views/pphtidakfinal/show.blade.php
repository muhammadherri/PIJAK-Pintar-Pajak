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
                    <li class="breadcrumb-item active"><a href="{{ route('pphfinal') }}">PPH 21 Tidak Final</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21 Tidak Final</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Transaksi</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" value="{{$pphtidakfinal->trx}}" id="kop" name="kop"
                                                type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off"  value="{{$pphtidakfinal->kode_objek_pajak}}" id="kop" name="kop"
                                                type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jumlah Penghasilan Bruto</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" value="{{$pphtidakfinal->bruto}}" id="bruto" name="bruto"
                                                type="number" min="0" class="form-control" placeholder="Masukkan Jumlah Penghasilan Bruto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Dasar Pengenaan Pajak</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" value="{{$pphtidakfinal->dasar_pengenaan_pajak}}" id="pengenaan_pajak" name="pengenaan_pajak"
                                                type="number" min="0" class="form-control" placeholder="Masukkan Dasar Pengenaan Pajak">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tarif Lebih Tinggi</label>
                                        <div class="col-xl-4 col-xxl-6 col-6">
                                            <div class="form-check custom-checkbox mb-3">
                                                <input type="checkbox" class="form-check-input" checked id="customCheckBox3" required>
                                                <label class="form-check-label" for="customCheckBox3">Klik Centang</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tarif</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" value="{{$pphtidakfinal->tarif}}" id="tarif" name="tarif"
                                                type="number" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" value="{{$pphtidakfinal->potongan_pph}}" id="potongan_pph" name="potongan_pph"
                                                type="number" min="0" class="form-control" placeholder="Masukkan Jumlah Potongan PPH">
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

