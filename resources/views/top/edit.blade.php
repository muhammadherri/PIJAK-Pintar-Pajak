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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
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
                                <form action="{{ route('top/update',[$top->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Termin</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$top->jenis_termin}}" required id="termin" name="termin" type="text" class="form-control"
                                                    placeholder="Masukkan Jenis Termin">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan Termin</label>
                                            <div class="col-sm-9">
                                                <textarea autocomplete="off" value="{{$top->keterangan_termin}}" required placeholder="Silakan Keterangan Termin" class="form-control" rows="4" id="kettermin" name="kettermin"></textarea>
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
        var termin = document.getElementById("termin");
        var kettermin = document.getElementById("kettermin");

        termin.value = '';
        kettermin.value = '';
    }
</script>
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}