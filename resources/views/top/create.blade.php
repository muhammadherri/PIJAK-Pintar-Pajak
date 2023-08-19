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
                    <li class="breadcrumb-item active"><a href="{{ route('top') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('top') }}">Top</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>  
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Top</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('top/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Termin</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="termin" name="termin" type="text" class="form-control"
                                                    placeholder="Masukkan Jenis Termin">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan Termin</label>
                                            <div class="col-sm-9">
                                                <textarea autocomplete="off" required placeholder="Silakan Keterangan Termin" class="form-control" rows="4" id="kettermin" name="kettermin"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-submit"name='action' value="create"
                                            id="add_all" onclick="resetForm()" type="button"><i data-feather='save'></i>
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
        var termin = document.getElementById("termin");
        var kettermin = document.getElementById("kettermin");

        termin.value = '';
        kettermin.value = '';
    }
</script>
