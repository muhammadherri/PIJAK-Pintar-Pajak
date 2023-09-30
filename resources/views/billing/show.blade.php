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
                    <li class="breadcrumb-item active"><a href="{{ route('billing') }}">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('billing') }}">Billing</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Billing</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('billing/update',[$billing->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="npwp" name="npwp"
                                                    type="number" value="{{$billing->npwp}}" class="form-control" placeholder="Masukkan NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nama" name="nama"
                                                    type="text" value="{{$billing->nama}}" class="form-control" placeholder="Masukkan Nama">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="alamat" name="alamat"
                                                    type="text" value="{{$billing->alamat}}" class="form-control" placeholder="Masukkan Alamat">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->jenis_pajak}}" required id="jenis_pajak" name="jenis_pajak"
                                                    type="number" class="form-control" placeholder="Masukkan Jenis Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Jenis Setoran</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->kode_jenis_setoran}}" required id="kode_jenis_setoran"
                                                    name="kode_jenis_setoran" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Jenis Setoran">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->masa_pajak}}" required id="masa_pajak" name="masa_pajak"
                                                    type="number" class="form-control" placeholder="Masukkan Masa Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                            <div class="col-sm-9">
                                                
                                                <input autocomplete="off" readonly required id="tahun_pajak" name="tahun_pajak"
                                                    type="number" class="form-control"value="{{$billing->tahun_pajak}}">
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{date('d-M-Y',strtotime($billing->start_periode_pajak))}}"required id="start_periode_pajak"
                                                    name="start_periode_pajak" type="text" class="form-control">
                                            </div>
                                           
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Setor</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->jumlah}}" required id="jumlah" name="jumlah"
                                                type="number" class="form-control" placeholder="Masukkan Jumlah">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->keterangan}}" required id="keterangan" name="keterangan"
                                                    type="text" class="form-control" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP Penyetor</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->npwp_penyetor}}" required id="npwp_penyetor" name="npwp_penyetor"
                                                    type="number" class="form-control" placeholder="Masukkan NPWP Penyetor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Penyetor</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{$billing->nama_penyetor}}" required id="nama_penyetor" name="nama_penyetor"
                                                    type="text" class="form-control" placeholder="Masukkan Nama Penyetor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">GUNAKAN KODE BILLING DI BAWAH INI UNTUK MELAKUKAN PEMBAYARAN</label>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">ID BILLING</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" readonly value="{{$billing->kode_billing}}" required id="nama_penyetor" name="nama_penyetor"
                                                    type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">MASA AKTIF</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" readonly value="{{date('d-M-Y',strtotime($billing->end_periode_pajak))}}" required id="nama_penyetor" name="nama_penyetor"
                                                    type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">Catatan: Apabila ada kesalahan dalam isian Kode Billing atau masa berlakunya berakhir, Kode Billing dapat dibuat kembali. Tanggung jawab isian Kode Billing ada pada Wajib Pajak yang namanya tercantum di dalamnya.</label>
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
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script>
