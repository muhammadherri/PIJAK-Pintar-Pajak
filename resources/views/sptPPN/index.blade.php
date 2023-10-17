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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">SPT PPn</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar SPT PPn</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('sptPPN/create') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="sptPPN" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nama NPWP SPT Badan</th>
                                            <th>Nomor NPWP SPT Badan</th>
                                            <th>Alamat Lengkap SPT Badan</th>
                                            <th>Masa Pajak Bulan</th>
                                            <th>Masa Pajak Tahun</th>
                                            <th>Tempat Tinggal SPT Badan</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Action</th>
                                            <th></th>
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
            "order":[[9,'desc']],
            ajax: "{{ route('data.1721') }}",
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
                        return row.alamat;
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta) {
                        return row.masapajak;
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
                        return row.tempat;
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
                    "render": function(data, type, row, meta) {
                        return row.tgl_pembuatan;
                    }
                },
                {
                    "targets": 8,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-danger shadow btn-xs sharp" href="sptmasapajak/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp" href="sptmasapajak/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        `;
                        return content;
                    }
                },
                {
                    "targets": 9,
                    "visible":false,
                    "searchable":false,
                    "render": function(data, type, row, meta) {
                        return row.id;
                    }
                },
            ]
        })
    })
</script>