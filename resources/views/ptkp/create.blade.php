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
                    <li class="breadcrumb-item active"><a href="{{ route('ptkp') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ptkp') }}">PTKP</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PTKP</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('ptkp/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="status" name="status"type="text" class="form-control"
                                                    placeholder="Masukkan Status">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggungan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="tanggungan" name="tanggungan"type="number" class="form-control"
                                                    placeholder="Masukkan Tanggungan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Besaran PTKP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="besaran_ptkp" name="besaran_ptkp" type="number" class="form-control"
                                                    placeholder="Masukkan Besaran PTKP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode PTKP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="kode" name="kode" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Huruf PTKP Tanpa Spasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button onclick="resetForm()" class="btn btn-warning btn-submit"name='action' value="create"
                                            id="add_all" type="button"><i data-feather='save'></i>
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
        var status = document.getElementById("status");
        var tanggungan = document.getElementById("tanggungan");
        var besaran_ptkp = document.getElementById("besaran_ptkp");
        status.value = '';
        tanggungan.value = '';
        besaran_ptkp.value = '';
    }
</script>
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script>
