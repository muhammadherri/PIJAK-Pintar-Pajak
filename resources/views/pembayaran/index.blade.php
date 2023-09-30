@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembayaran
        </div>
    </div>
@endsection
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pembayaran E-Billing</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pembayaran</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                        data-bs-target=".bd-example-modal-sm">Bayar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Billing</th>
                                            <th>NPWP</th>
                                            <th>Jenis Pajak</th>
                                            <th>Jenis Setoran</th>
                                            <th>Masa Pajak</th>
                                            <th>Masa Aktif</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($billing as $key => $row)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>{{ $row->kode_billing }}</td>
                                                <td>{{ $row->npwp }}</td>
                                                <td>{{ $row->jenis_pajak }}</td>
                                                <td>{{ $row->kode_jenis_setoran }}</td>
                                                <td>{{ $row->masa_pajak }}</td>
                                                <td>{{ date('d-M',strtotime($row->end_periode_pajak)) }}</td>
                                                <td>{{ $row->users->name }}</td>
                                                <td>{{ $row->jumlah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form target="_blank" action="{{ url('pembayaranpdf') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title">Pembayaran E-Billing</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input autocomplete="off" required id="id_billing" name="id_billing" type="text"
                            class="form-control" placeholder="Masukkan ID Billing">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal --}}
@endsection
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}
