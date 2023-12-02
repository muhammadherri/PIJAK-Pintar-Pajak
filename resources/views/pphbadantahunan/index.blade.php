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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">PPH 25/29</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 25/29 Final</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('pphbadantahunan/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pphbadan" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No Transaksi</th>
                                            <th>Dasar Pengenaan Pajak</th>
                                            <th>PPh Terutang</th>
                                            <th>Mendapat Fasilitas</th>
                                            <th>Tidak Mendapat Fasilitas</th>
                                            <th>Jumlah DPP</th>
                                            <th>Jumlah PPh Terutang</th>
                                            <th>Nama Pembuat</th>
                                            <th>Status</th>
                                            <th>Tanggal Pembuatan</th>
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
        $('#pphbadan').DataTable({
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

            ajax:"{{route('data.pphbadantahunan')}}",
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
                        return row.trx;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.dasar_pengenaan_pajak;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        if (row.pph_terutang == 0) {
                            var info = `<a class="badge badge-rounded badge-outline-primary">Tarif 31E</a>`
                            ;
                        }else {
                            var info = `<a class="badge badge-rounded badge-outline-primary">Tarif Pasal 17(1)b</a>`;
                        }
                        return info;
                    }
                },
                
                {
                    "targets": 4
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        return row.mendapat_fasilitas;
                    }
                },
                {
                    "targets": 5
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.tidak_mendapat_fasilitas;
                    }
                },
                {
                    "targets": 6
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.dpp;
                    }
                },
                {
                    "targets": 7
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.jumlah_pph_terutang;
                    }
                },
                {
                    "targets": 8
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.namapembuat;
                    }
                },
                {
                    "targets": 9
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
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
                    "targets": 10
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                
                {
                    "targets": 11
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        if (row.attribute3 == 1) {
                            var info = `<div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="pphbadantahunan/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                             
                                <a class="btn btn-success shadow btn-xs sharp" href="pphbadantahunan/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>`
                            ;
                        } else {
                            var info = `<div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="pphbadantahunan/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp me-1" href="pphbadantahunan/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp me-1" href="pphbadantahunan/${row.id}/show">
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