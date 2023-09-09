@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembayaran
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('billing') }})">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('billing') }}">Billing</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Billing</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('billing/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Akun Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="kode_akun_pajak"
                                                    name="kode_akun_pajak" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Akun Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Jenis Setoran</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="kode_jenis_setoran"
                                                    name="kode_jenis_setoran" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Jenis Setoran">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="npwp" name="npwp"
                                                    type="number" class="form-control" placeholder="Masukkan NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-4">
                                                <input autocomplete="off" required id="start_periode_pajak"
                                                    name="start_periode_pajak" type="date" class="form-control">
                                            </div>
                                            <label class="col-sm-1 col-form-label">s/d</label>
                                            <div class="col-sm-4">
                                                <input autocomplete="off" required id="end_periode_pajak"
                                                    name="end_periode_pajak" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="keterangan" name="keterangan"
                                                    type="number" class="form-control" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="jumlah" name="jumlah"
                                                    type="number" class="form-control" placeholder="Masukkan Jumlah">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button onclick="resetForm()" class="btn btn-warning btn-submit"name='action'
                                            value="create" id="remove" type="button"><i data-feather='save'></i>
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
        var kode_akun_pajak = document.getElementById("kode_akun_pajak");
        var kode_jenis_setoran = document.getElementById("kode_jenis_setoran");
        var npwp = document.getElementById("npwp");
        var start_periode_pajak = document.getElementById("start_periode_pajak");
        var end_periode_pajak = document.getElementById("end_periode_pajak");
        var keterangan = document.getElementById("keterangan");
        var jumlah = document.getElementById("jumlah");
        
        kode_akun_pajak.value = '';
        kode_jenis_setoran.value = '';
        npwp.value = '';
        start_periode_pajak.value = '';
        end_periode_pajak.value = '';
        keterangan.value = '';
        jumlah.value = '';
    }
</script>