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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">PPH 21</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('transaksipph21/create') }}">

                                        {{ __('Tambah') }}

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pphduasatu" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama NPWP Terdaftar</th>
                                            <th>Nomor NPWP Terdaftar</th>
                                            <th>Masa Penghasilan</th>
                                            <th>Gaji Pensiun</th>
                                            <th>Penghasilan Bruto</th>
                                            <th>Total Pengurang</th>
                                            <th>Nilai PTKP</th>
                                            <th>PPh 21 PKP</th>
                                            <th>PPh 21 Potongan</th>
                                            <th>PPh 21 Terutang 1 Bulan</th>
                                            <th>PPh 21 Terutang 1 Tahun</th>
                                            <th>Status</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Status NPWP</th>
                                            <th>Dibuat Oleh</th>
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
        $('#pphduasatu').DataTable({
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

            ajax:"{{route('data.pph')}}",
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
                        return row.nama_wajib_pajak;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        if(row.no_npwp==null ){
                            var info = '<span class="badge light badge-danger">Kosong</span>';
                        }else{
                            var info = row.no_npwp;
                        }
                        return info;
                    }
                },
                {
                    "targets": 3
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        
                        return row.masa_penghasilan_start;
                    }
                },
                {
                    "targets": 4
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.gaji_pensiun;
                    }
                },
                {
                    "targets": 5
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.bruto;
                    }
                },
                {
                    "targets": 6
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.total_pengurang;
                    }
                },
                {
                    "targets": 7
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.ptkp;
                    }
                },
                {
                    "targets": 8
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.pph21pkp;
                    }
                },
                {
                    "targets": 9
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.pph21potongan;
                    }
                },
                {
                    "targets": 10
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.pph21perbulan;
                    }
                },
                {
                    "targets": 11
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.pph21terutang;
                    }
                },
                {
                    "targets": 12,
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
                    "targets": 13
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 14
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        if(row.status_npwp==0 ){
                            var info = '<span class="badge light badge-success">NPWP</span>';
                        }else{
                            var info = '<span class="badge light badge-warning">Non NPWP</span>';
                        }
                        return info;
                    }
                },
                {
                    "targets": 15
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                
                {
                    "targets": 16
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="transaksipph21/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp me-1" href="transaksipph21/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp me-1" href="transaksipph21/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        `;
                        return content;
                    }
                }
            ]
        })
    });
</script>
