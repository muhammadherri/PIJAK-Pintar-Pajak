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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">E-Bupot</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">E-Bupot</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('ebupot/create') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="ebupotList" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nomor Transaksi</th>
                                            <th>Jenis PPh</th>
                                            <th>Nomor Telepone</th>
                                            <th>Nama Jenis Fasilitas</th>
                                            <th>Kode Objek</th>
                                            <th>Nama Pembuat</th>
                                            <th>Tgl Bukti Potong</th>
                                            <th>Periode Pajak</th>
                                            <th>Tgl Pembuatan</th>
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
        $('#ebupotList').DataTable({
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
            // serverSide:true,
            // processing:true,

            ajax: "{{ route('data.ebupot') }}",
            "order":[[0,'desc']],
            columnDefs: [
                {
                    "targets": 0,
                    "render": function(data, type, row, meta) {
                        return row.trx;
                    }
                },
                {
                    "targets": 1,
                    "render": function(data, type, row, meta) {
                        return row.jenis_pph;
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta) {
                        return row.no_tlp;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.fasilitas;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.kop;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tgl_buktiPotong;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tgl_periodePajak;
                    }
                },
                {
                    "targets": 8,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tgl_pembuat;
                    }
                },
                {
                    "targets": 9,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        if (row.status == 'NULL') {
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
                    "targets": 10,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp" href="ebupot/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp" href="ebupot/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp" href="ebupot/${row.id}/show">
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
