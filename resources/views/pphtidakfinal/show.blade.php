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
                    <li class="breadcrumb-item"><a href="{{ route('pphtidakfinal') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pphtidakfinal') }}">PPH 21 Tidak Final</a></li>
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
                                            <select id="kop" name="kop"
                                                class="dropdown-groups">
                                                @foreach ($koptidakfinal as $row)
                                                    <option value="{{ $row->id }}"  {{$pphtidakfinal->kode_objek_pajak == $row->id ? 'selected' : '' }}>
                                                        {{ $row->kode_objek }} - {{ $row->penerima_penghasilan }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input required autocomplete="off"  value="{{$pphtidakfinal->kode_objek_pajak}}" id="kop" name="kop"
                                                type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jumlah Penghasilan Bruto</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" readonly value="{{number_format($pphtidakfinal->bruto)}}" id="bruto" name="bruto"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Penghasilan Bruto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Dasar Pengenaan Pajak</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" readonly value="{{number_format($pphtidakfinal->dasar_pengenaan_pajak)}}" id="pengenaan_pajak" name="pengenaan_pajak"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Dasar Pengenaan Pajak">
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
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->tarif1)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->persen1)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->hasil1)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->tarif2)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->persen2)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off"readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->hasil2)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->tarif3)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->persen3)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->hasil3)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->tarif4)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->persen4)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required autocomplete="off" readonly id="tarif" name="tarif" value="{{number_format($pphtidakfinal->hasil4)}}"
                                                type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                        <div class="col-sm-9">
                                            <input required autocomplete="off" readonly value="{{number_format($pphtidakfinal->potongan_pph)}}" id="potongan_pph" name="potongan_pph"
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

