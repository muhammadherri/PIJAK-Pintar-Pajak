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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
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
                                <form action="{{ route('ptkp/update',[$ptkp->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$ptkp->status}}" required id="status" name="status"type="number" class="form-control"
                                                    placeholder="Masukkan Status">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggungan</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$ptkp->tanggungan}}" autocomplete="off" required id="tanggungan" name="tanggungan"type="number" class="form-control"
                                                    placeholder="Masukkan Tanggungan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Besaran PTKP</label>
                                            <div class="col-sm-9">
                                                <input  readonly value="{{$ptkp->besaran_ptkp}}" autocomplete="off" required id="besaran_ptkp" name="besaran_ptkp" type="number" class="form-control"
                                                    placeholder="Masukkan Besaran PTKP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode PTKP</label>
                                            <div class="col-sm-9">
                                                <input value="{{$ptkp->kode_ptkp}}" autocomplete="off" required id="kode" name="kode" type="text" class="form-control"
                                                    placeholder="Masukkan Kode Huruf PTKP Tanpa Spasi">
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
        var status = document.getElementById("status");
        var tanggungan = document.getElementById("tanggungan");
        var besaran_ptkp = document.getElementById("besaran_ptkp");
        status.value = '';
        tanggungan.value = '';
        besaran_ptkp.value = '';
    }
</script>
