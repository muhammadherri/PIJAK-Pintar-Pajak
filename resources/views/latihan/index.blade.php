
@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Latihan
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
                    <li class="breadcrumb-item active"><a href="{{ route('latihan') }}">Latihan</a></li>
                    <li class="breadcrumb-item"><a href="">Keuangan Fiskal</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Keuangan Fiskal</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('latihan/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="table-responsive">
                                    <table id="fiskalTable" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No Akun Debet</th>
                                                <th>No Akun Kredit</th>
                                                <th>Nama Akun Debet</th>
                                                <th>Nama Akun Kredit</th>
                                                <th>Nilai Debet</th>
                                                <th>Nilai Kredit</th>
                                                <th>Dibuat Oleh</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Action</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
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
        $('#fiskalTable').DataTable({
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
            ajax: "{{ route('data.latihan') }}",
            columnDefs: [{
                    "targets": 0,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        if(row.no_akun_debit==null ){
                            var info = '-';
                        }else{
                            var info = row.no_akun_debit;
                        }
                        return info;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        if(row.no_akun_kredit==null ){
                            var info = '-';
                        }else{
                            var info = row.no_akun_kredit;
                        }
                        return info;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        if(row.nama_akun_debit==null ){
                            var info = '-';
                        }else{
                            var info = row.nama_akun_debit;
                        }
                        return info;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        if(row.nama_akun_kredit==null ){
                            var info = '-';
                        }else{
                            var info = row.nama_akun_kredit;
                        }
                        return info;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.nilai_debit;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.nilai_kredit;
                    }
                },
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.attribute1;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 8,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="latihan/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp me-1" href="latihan/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp me-1" href="latihan/${row.id}/show">
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
