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
                    <li class="breadcrumb-item active"><a href="{{ route('hutangppn') }}">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('hutangppn') }}">Hutang PPN</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
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
                                <form action="{{ route('hutangppn/store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah PPN Masuk</label>
                                            <div class="col-sm-9">
                                                <input name="ppn_masuk" id="ppn_masuk" autocomplete="off" value="{{$ppnmasuk}}" type="number" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah PPN Keluar</label>
                                            <div class="col-sm-9">
                                                <input name="ppn_keluar" id="ppn_keluar" autocomplete="off" value="{{$ppnkeluar}}" type="number" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Hutang PPN</label>
                                            <div class="col-sm-9">
                                                <input name="jumlah" id="jumlah" autocomplete="off" value="{{$ppnmasuk-$ppnkeluar}}" type="number" class="form-control" readonly>
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
