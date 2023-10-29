@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Transaksi
        </div>
    </div>
@endsection
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">PPH 21 Final</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21 Final</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('pphfinal/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pphfinal" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No Transaksi</th>
                                            <th>Kode Objek Pajak</th>
                                            <th>Jumlah Penghasilan Bruto</th>
                                            <th>Jumlah Tarif</th>
                                            <th>Jumlah Potongan PPH</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#pphfinal').DataTable({
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                }
            },
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 300]
            ],
            "order":[[0,'desc']],

            ajax:"{{route('data.pphfinal')}}",
            columnDefs:[
                {
                    "targets": 0,
                    "visible":false,
                    "searchable":false,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.id;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.transaksi;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.kop;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.bruto;
                    }
                },
                
                {
                    "targets": 4
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        return row.tarif;
                    }
                },
                {
                    "targets": 5
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.potongan_pph;
                    }
                },
                {
                    "targets": 6
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 7
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                {
                    "targets": 8,
                    render: function(data, type, row, index) {
                        if (row.status == null) {
                            var info = `<div class="d-flex"><a class="badge badge-rounded badge-outline-danger">
                                Belum Dibayar</a></div>`
                            ;
                        } else if (row.status == 1) {
                            var info = `<div class="d-flex">
                                <a class="badge badge-rounded badge-outline-warning">
		                        Menunggu Pembayaran</a></div>`;
                        } else {
                            var info = `<a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>`;
                        }
                        return info;
                    }
                },
                {
                    "targets": 9
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        if (row.attribute3 == 1) {
                            var info = `<div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="pphfinal/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                             
                                <a class="btn btn-success shadow btn-xs sharp" href="pphfinal/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>`
                            ;
                        } else {
                            var info = `<div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="pphfinal/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp me-1" href="pphfinal/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp me-1" href="pphfinal/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>`;
                        }
                        return info;
                    }
                }
            ]
        })
    });
</script>