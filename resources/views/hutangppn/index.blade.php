@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembayaran
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Hutang PPn</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hutang PPn</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('hutangppn/create') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="hutangppnList" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nomor Transaksi</th>
                                            <th>Jumlah PPN Masuk</th>
                                            <th>Jumlah PPN Keluar</th>
                                            <th>Hutang PPN</th>
                                            <th>Tgl Pembuatan</th>
                                            <th>Pembuat</th>
                                            <th>Status</th>
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
        $('#hutangppnList').DataTable({
            language: {
                paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                }
            },
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],

            ajax: "{{ route('data.hutangppn') }}",
            "order":[[0,'desc']],
            columnDefs: [
                {
                    "targets": 0,
                    "visible":false,
                    "searchable":false,
                    "render": function(data, type, row, meta) {
                        return row.id;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.trx;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.ppn_masuk;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.ppn_keluar;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.hutang_ppn;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                
                {
                    "targets": 7,
                    "class": "text-center",
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
                
            ]
        })
    })
</script>
