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
                    <li class="breadcrumb-item active"><a href="{{ route('fasilitas') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('fasilitas') }}">Fasilitas</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Fasilitas</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nomor</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$fasilitas->no}}" required id="nomor" name="nomor"type="number" class="form-control"
                                                    placeholder="Masukkan Nomor">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Fasilitas</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$fasilitas->jenis_fasilitas}}" required id="jenisfasilitas" name="jenisfasilitas"type="text" class="form-control"
                                                    placeholder="Masukkan Jenis Fasilitas">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Sertifikat</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$fasilitas->sertifikat}}" required id="sertifikat" name="sertifikat" type="text" class="form-control"
                                                    placeholder="Masukkan Sertifikat">
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
