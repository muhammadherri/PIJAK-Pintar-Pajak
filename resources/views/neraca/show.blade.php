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
                    <li class="breadcrumb-item active"><a href="{{ route('neraca') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('neraca') }}">Neraca</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Neraca</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('neraca/update',[$neraca->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Akun</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$neraca->no_akun}}" required id="noakun" name="noakun" type="number" class="form-control"
                                                    placeholder="Masukkan No Akun">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Akun</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$neraca->nama_akun}}" required id="namaakun" name="namaakun" type="text" class="form-control"
                                                    placeholder="Masukkan Nama Akun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Saldo</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$neraca->saldo}}" required id="saldo" name="saldo" type="number" class="form-control"
                                                    placeholder="Masukkan saldo">
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
        var noakun = document.getElementById("noakun");
        var namaakun = document.getElementById("namaakun");
        var saldo = document.getElementById("saldo");

        noakun.value = '';
        namaakun.value = '';
        saldo.value = '';
    }
</script>
