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
                    <li class="breadcrumb-item active"><a href="{{ route('dokumenreferensi') }})">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dokumenreferensi') }}">Dokumen Referensi</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dokumen Referensi</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('dokumenreferensi/update',[$doc->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$doc->no}}" autocomplete="off" required id="no" name="no" type="number" class="form-control"
                                                    placeholder="Masukkan Nomor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$doc->jenis_dokumen}}" autocomplete="off" required id="jenisdokumen" name="jenisdokumen" type="text" class="form-control"
                                                    placeholder="Masukkan Jenis Dokumen">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Sertifikat</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$doc->sertifikat}}" autocomplete="off" required id="sertifikat" name="sertifikat" type="text" class="form-control"
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
<script>
    function resetForm() {
        var no = document.getElementById("no");
        var jenisdokumen = document.getElementById("jenisdokumen");
        var sertifikat = document.getElementById("sertifikat");
        no.value = '';
        jenisdokumen.value = '';
        sertifikat.value = '';
    }
</script>
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script>
