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
                    <li class="breadcrumb-item active"><a href="">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="">Hutang PPN</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hutang PPN</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jumlah PPN Masuk</label>
                                        <div class="col-sm-9">
                                            <input autocomplete="off" value="{{number_format($ppnmasuk,2)}}" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jumlah PPN Keluar</label>
                                        <div class="col-sm-9">
                                            <input autocomplete="off" value="{{number_format($ppnkeluar,2)}}" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Hutang PPN</label>
                                        <div class="col-sm-9">
                                            <input autocomplete="off" value="{{number_format($ppnmasuk-$ppnkeluar,2)}}" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
