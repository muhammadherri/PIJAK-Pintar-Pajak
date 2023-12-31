@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            SPT Orang Pribadi
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">SPT Orang Pribadi</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">SPT 1770s</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar SPT 1770s</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('sptS/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="sptPPN" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nomor NPWP</th>
                                            <th>Nama NPWP</th>
                                            <th>Pekerjaan</th>
                                            <th>Nomor KLU</th>
                                            <th>Nomor Telp</th>
                                            <th>Status Kewajiban</th>
                                            <th>NPWP Pasangan</th>
                                            <th>Dibuat Oleh</th>
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
        $('#sptPPN').DataTable({
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
            "order":[[0,'desc']],
            ajax: "{{ route('data.spt1770s') }}",
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
                    "render": function(data, type, row, meta) {
                        return row.no_npwp;
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta) {
                        return row.nama_npwp;
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta) {
                        return row.pekerjaan;
                    }
                },
                
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.klu;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.notelp;
                    }
                },
                
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        if (row.statuskewajiban == 0) {
                            var info = `<div class="d-flex"><a class="badge badge-rounded badge-outline-primary">
                                KK</a></div>`
                            ;
                        } else if (row.statuskewajiban == 1) {
                            var info = `<div class="d-flex">
                                <a class="badge badge-rounded badge-outline-primary">
		                        HB</a></div>`;
                        } else if (row.statuskewajiban == 2) {
                            var info = `<div class="d-flex">
                                <a class="badge badge-rounded badge-outline-primary">
		                        PH</a></div>`;
                        } else {
                            var info = `<a class="badge badge-rounded badge-outline-primary">MT</a>`;
                        }
                        return info;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.npwppasangan;
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
                        return row.tgl_pembuatan;
                    }
                },
                {
                    "targets": 10,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-danger shadow btn-xs sharp" href="sptS/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp" href="sptS/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        `;
                        return content;
                    }
                },
            ]
        })
    })
</script>