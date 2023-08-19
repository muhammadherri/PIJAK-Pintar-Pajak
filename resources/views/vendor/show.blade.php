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
                    <li class="breadcrumb-item active"><a href="{{ route('vendor') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('vendor') }}">Vendor</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vendor</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('vendor/update',[$vendor->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Id Vendor</label>
                                            <div class="col-sm-9">
                                                <input readonly autocomplete="off" value="{{$vendor->no_id_vendor}}" required id="no_id_vendor"name="no_id_vendor" type="text" class="form-control"
                                                    placeholder="Masukkan No Identitas Vendor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Vendor</label>
                                            <div class="col-sm-9">
                                                <input readonly autocomplete="off" value="{{$vendor->nama_vendor}}" required id="nama_vendor"name="nama_vendor" type="text" class="form-control"
                                                    placeholder="Masukkan Nama Vendor">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat Vendor</label>
                                            <div class="col-sm-9">
                                                <textarea readonly autocomplete="off" value="{{$vendor->alamat_vendor}}" required placeholder="Masukkan Alamat Vendor" class="form-control" rows="4"
                                                id="alamat_vendor"name="alamat_vendor"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kontak Person</label>
                                            <div class="col-sm-9">
                                                <input readonly autocomplete="off" value="{{$vendor->contact_person}}" required id="contact_person"name="contact_person" type="number" class="form-control"
                                                    placeholder="Masukkan Kontak Person">
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
