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
                    <li class="breadcrumb-item"><a href="{{ route('pphbadantahunan') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pphbadantahunan') }}">PPH 25/29</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 25/29</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Dasar Pengenaan Pajak</label>
                                        <div class="col-sm-9">
                                            <input value="{{number_format($pph->dasar_pengenaan_pajak)}}" required autocomplete="off" id="dasar_pengenaan_pajak" name="dasar_pengenaan_pajak"onkeyup="this.value=separator(this.value);" 
                                                type="text" class="form-control" placeholder="Masukkan Dasar Pengenaan Pajak">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">PPh Terutang</label>
                                        <div class="col-sm-9">
                                            <select onchange="hide()" id="pph_terutang" name="pph_terutang"
                                                class="dropdown-groups">
                                                @if($pph->pph_terutang==1)
                                                    <option value="1">Tarif 31E</option>
                                                    <option value="2">Tarif Pasal 17(1)b</option>
                                                @else
                                                    <option value="2">Tarif Pasal 17(1)b</option>
                                                    <option value="1">Tarif 31E</option>
                                                @endif
                                            </select>               
                                        </div>
                                    </div>
                                </div>
                                @if($pph->pph_terutang==1)
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Mendapat Fasilitas</label>
                                        <div class="col-sm-9">
                                            <input value="{{number_format($pph->mendapat_fasilitas)}}" onkeyup="this.value=separator(this.value);" autocomplete="off" id="mendapat_fasilitas" name="mendapat_fasilitas"
                                            type="text" min="0" class="form-control separator" placeholder="Masukkan Mendapat Fasilitas">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tidak Mendapat Fasilitas</label>
                                        <div class="col-sm-9">
                                            <input value="{{number_format($pph->tidak_mendapat_fasilitas)}}" onkeyup="this.value=separator(this.value);" autocomplete="off" id="tidak_mendapat_fasilitas" name="tidak_mendapat_fasilitas"
                                                type="text" min="0" class="form-control separator" placeholder="Masukkan Tidak Mendapat Fasilitas">
                                        </div>
                                    </div>
                                </div>
                                @else
                               
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <input value="{{number_format($pph->dpp)}}" readonly autocomplete="off" id="hasildpp" name="hasildpp"
                                                type="text" min="0" class="form-control separator">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jumlah PPh Terutang</label>
                                        <div class="col-sm-9">
                                            <input value="{{number_format($pph->jumlah_pph_terutang)}}" required onkeyup="this.value=separator(this.value);"  autocomplete="off" id="jumlahpph" name="jumlahpph"
                                                type="text" min="0" class="form-control separator" placeholder="Masukkan Jumlah PPh Terutang">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

