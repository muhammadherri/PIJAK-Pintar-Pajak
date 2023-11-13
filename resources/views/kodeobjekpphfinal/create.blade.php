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
                    <li class="breadcrumb-item active"><a href="{{ route('kodeobjekpphfinal') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kodeobjekpphfinal') }}">Kode Objek PPh Final</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kode Objek PPh Final</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('kodeobjekpphfinal/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="kode" name="kode"type="text" class="form-control"
                                                    placeholder="Masukkan Kode">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penerima Penghasilan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="penerima_penghasilan" name="penerima_penghasilan"type="text" class="form-control"
                                                    placeholder="Masukkan Penerima Penghasilan">
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
        var nomor = document.getElementById("penerima_penghasilan");
        var jenisfasilitas = document.getElementById("kode");
        nomor.value = '';
        jenisfasilitas.value = '';
    }
</script>
