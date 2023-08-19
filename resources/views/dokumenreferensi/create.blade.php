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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
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
                                <form action="{{ route('dokumenreferensi/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="no" name="no" type="number" class="form-control"
                                                    placeholder="Masukkan Nomor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="jenisdokumen" name="jenisdokumen" type="text" class="form-control"
                                                    placeholder="Masukkan Jenis Dokumen">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Sertifikat</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="sertifikat" name="sertifikat" type="text" class="form-control"
                                                    placeholder="Masukkan Sertifikat">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button onclick="resetForm()" class="btn btn-warning btn-submit"name='action' value="create"
                                            id="remove" type="button"><i data-feather='save'></i>
                                            {{ 'Bersihkan' }}</button>
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
