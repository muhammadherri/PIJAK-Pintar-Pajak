@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Register
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Register</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Daftar Dosen</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Dosen</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('adminregister/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataDosen" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Lengkap Dosen</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Tanggal Terakhir Login</th>
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
        $('#dataDosen').DataTable({
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
            ajax: "{{ route('data.dosen') }}",
            columnDefs: [
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
                    "render": function(data, type, row, meta) {
                        return row.nama;
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta) {
                        return row.nama_lengkap;
                    }
                },
              
                {
                    "targets": 3,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        if (row.gender == 2) {
                            var info = `Perempuan`;
                        } else {
                            var info = `Laki-laki`;
                        }
                        return info;
                    }
                },
                {
                    "targets": 4
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <span class="badge badge-primary">Dosen</span>
                        `;
                        return content;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tgl;
                    }
                },
               
                
                
            ]
        });
        function refresh(){
            data.ajax.reload(null,false);
        }
        setInterval(function(){
            refresh();
        },2000);
    })
</script>
