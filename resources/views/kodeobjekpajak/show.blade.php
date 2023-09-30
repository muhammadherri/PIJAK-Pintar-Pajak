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
                    <li class="breadcrumb-item active"><a href="{{ route('kodeobjekpajak') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kodeobjekpajak') }}">Kode Objek Pajak</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kode Objek Pajak</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('kodeobjekpajak/update',[$kodepajak->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$kodepajak->kode_objek_pajak}}" required id="kodeobjekpajak" name="kodeobjekpajak" type="text" class="form-control"
                                                    placeholder="Masukkan Kode Objek Pajak">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$kodepajak->keterangan}}" required id="keterangan" name="keterangan" type="text" class="form-control"
                                                    placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$kodepajak->tarif}}" required id="tarif" name="tarif" type="number" class="form-control"
                                                    placeholder="Masukkan Tarif">
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
        var tarif = document.getElementById("tarif");
        var keterangan = document.getElementById("keterangan");
        var kodeobjekpajak = document.getElementById("kodeobjekpajak");
        tarif.value = '';
        keterangan.value = '';
        kodeobjekpajak.value = '';
    }
</script>
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}