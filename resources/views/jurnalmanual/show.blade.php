@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Soal Tes
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('jurnalmanual') }}">Keuangan Fiskal</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Keuangan Fiskal</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('jurnalmanual/update',[$jurnalmanual->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <h5>Neraca</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Akun Debet</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control" value="{{$jurnalmanual->no_akun_debit}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Akun Kredit</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control" value="{{$jurnalmanual->no_akun_kredit}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Akun Debet</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nama_akun_debet" value="{{$jurnalmanual->nama_akun_debit}}" readonly class="form-control" name="nama_akun_debet">
                                                {{-- <select required id="nama_akun_debet" class="dropdown-groups" name="nama_akun_debet">
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Akun Kredit</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nama_akun_kredit" value="{{$jurnalmanual->nama_akun_kredit}}" readonly class="form-control" name="nama_akun_kredit">

                                                {{-- <select required id="nama_akun_kredit" class="dropdown-groups" name="nama_akun_kredit">
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nilai Debet</label>
                                            <div class="col-sm-9">
                                                <input required min="0" readonly value="{{$jurnalmanual->nilai_debit}}" autocomplete="off" type="number" id="nilai_debet"
                                                    name="nilai_debet" class="form-control"
                                                    placeholder="Masukkan Nilai Debet">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nilai Kredit</label>
                                            <div class="col-sm-9">
                                                <input required min="0" readonly value="{{$jurnalmanual->nilai_kredit}}" autocomplete="off" type="number" id="nilai_kredit"
                                                    name="nilai_kredit" class="form-control"
                                                    placeholder="Masukkan Nilai Kredit">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea required min="0" readonly value="{{$jurnalmanual->keterangan}}" autocomplete="off" id="keterangan" name="keterangan"
                                                    type="text" class="form-control"
                                                    placeholder="Masukkan Keterangan">{{$jurnalmanual->keterangan}}</textarea>
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
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
