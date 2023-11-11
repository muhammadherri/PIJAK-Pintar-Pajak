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
                    <li class="breadcrumb-item active"><a href="{{ route('namakelas') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('namakelas') }}">Nama Kelas</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Nama Kelas</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('namakelas/update',[$namakelas->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Kelas</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$namakelas->nama_kelas}}" required id="namakelas" name="namakelas" type="text" min="0" class="form-control">
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
        var noseri = document.getElementById("namakelas");
        noseri.value = '';
    }
</script>
