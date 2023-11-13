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
                    <li class="breadcrumb-item active"><a href="{{ route('kodejenissetoran') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kodejenissetoran') }}">Kode Jenis Setoran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kode Jenis Setoran</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('kodejenissetoran/update',[$kjs->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$kjs->kode}}" required id="kode" name="kode"type="text" class="form-control"
                                                    placeholder="Masukkan Kode">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Setoran</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required value="{{$kjs->jenis_setoran}}" id="jenis_setoran" name="jenis_setoran"type="text" class="form-control"
                                                    placeholder="Masukkan Jenis Setoran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div></div>
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
        var nomor = document.getElementById("kode");
        var jenisfasilitas = document.getElementById("jenis_setoran");
        nomor.value = '';
        jenisfasilitas.value = '';
    }
</script>
