@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pelaporan
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pelaporan</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">SPT 1771 I </a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar SPT 1771 I</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('spt1771I/create') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data1771I" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No NPWP</th>
                                            <th>Jenis Usaha</th>
                                            <th>No Telp</th>
                                            <th>Tahun Pajak</th>
                                            <th>Pembukuan</th>
                                            <th>Laporan Keuangan</th>
                                            <th>Negara</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <br>
                                   
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
        $('#data1771I').DataTable({
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
            ajax: "{{ route('data.1771') }}",
            columnDefs: [
                {
                    "targets": 0,
                    "render": function(data, type, row, meta) {
                        return row.nama;
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
                        return row.jenis_usaha;
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta) {
                        return row.no_telp;
                    }
                },
                
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tahun_pajak;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.pembukuan_terakhir;
                    }
                },
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.laporan_keuangan;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.negara;
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
                                <a class="btn btn-danger shadow btn-xs sharp" href="spttahunan/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="spttahunan/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp" href="spttahunan/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        `;
                        return content;
                    }
                }
            ]
        })
    })
</script>