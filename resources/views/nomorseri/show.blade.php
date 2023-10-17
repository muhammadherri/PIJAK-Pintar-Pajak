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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
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
                                <form action="{{ route('noseri/update',[$noseri->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Seri</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$noseri->no_seri}}" required id="noseri" name="noseri" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Serial</label>
                                            <div class="col-sm-9">
                                                <input readonly value="{{$noseri->serial_name}}" autocomplete="off" required id="nama_serial" name="nama_serial" type="number" class="form-control">
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