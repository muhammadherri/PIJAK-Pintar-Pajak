@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembelian
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembelian</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Prepopulate</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Prepopulate</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('prepopulates/create') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataPrepopulate" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nomor NPWP Terdaftar</th>
                                            <th>Nama Wajib Pajak</th>
                                            <th>Alamat Wajib Pajak</th>
                                            <th>Nomor Faktur</th>
                                            <th>Jumlah DPP</th>
                                            <th>Jumlah PPN</th>
                                            <th>Tahun</th>
                                            <th>Masa PPN Terdaftar</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <br>
                                    <tfoot class="footer">
                                        <tr>
                                            <td><b>TOTAL PPN</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <b>{{ number_format($invcount,2) }}</b>
                                            </td>
                                            <td colspan="5"></td>
                                        </tr>
                                    </tfoot>
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
        $('#dataPrepopulate').DataTable({
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
            pageLength:10,
            "order":[[11,'desc']],
            ajax: "{{ route('data.prepopulate') }}",
            columnDefs: [{
                    "targets": 0,
                    "render": function(data, type, row, meta) {
                        return row.npwp;
                    }
                },
                {
                    "targets": 1,
                    "render": function(data, type, row, meta) {
                        return row.nama_npwp;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        return row.alamat_npwp;

                    }
                },
                {
                    "targets": 3,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.no_faktur;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.jumlah_dpp;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.jumlah_ppn;
                    }
                },
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tahun;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.masa_ppn;
                    }
                },
                {
                    "targets": 8,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                {
                    "targets": 9,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 10,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="prepopulates/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp" href="prepopulates/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp" href="prepopulates/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        `;
                        return content;
                    }
                },
                {
                    "targets": 11,
                    "visible":false,
                    "searchable":false,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.id;
                    }
                },
            ]
        })
    })
</script>
