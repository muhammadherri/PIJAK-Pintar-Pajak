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
                    <li class="breadcrumb-item active"><a href="{{ route('noseri') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('noseri') }}">No Seri</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">No Seri</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('noseri/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Seri</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="noseri" name="noseri" type="number" min="0" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Serial</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="nama_serial" name="nama_serial"type="text" class="form-control"
                                                    placeholder="Masukkan Nama Serial">
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
        var noseri = document.getElementById("noseri");
        var nama_serial = document.getElementById("nama_serial");
        noseri.value = '';
        nama_serial.value = '';
    }
</script>
