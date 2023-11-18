@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Penjualan
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Penjualan</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Invoice</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Invoice</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('invoice/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataInv" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama Vendor Faktur</th>
                                            <th>Total PPN Faktur</th>
                                            <th>Nilai Transaksi Faktur</th>
                                            <th>Total Faktur</th>
                                            <th>Nama Vendor Invoice</th>
                                            <th>Nomor Faktur Invoice</th>
                                            <th>Termin Pembayaran Invoice</th>
                                            <th>Nilai Transaksi Invoice</th>
                                            <th>Potongan Harga Invoice</th>
                                            <th>Jenis Pembayaran Invoice</th>
                                            <th>Tanggal Invoice</th>
                                            <th>Total PPN Invoice</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <br>
                                    <tfoot class="footer">
                                        <tr>
                                            <td></td>
                                            <td><b>TOTAL PPN</b></td>
                                            <td>
                                                <b>{{ number_format($fktrcount) }}</b>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
        $('#dataInv').DataTable({
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
            ajax: "{{ route('data.inv') }}",
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
                        return row.fktr_vendor;
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta) {
                        return row.fktr_ppn;
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta) {
                        return row.fktr_nilaitrx;
                    }
                },
               
                {
                    "targets": 4,
                    "render": function(data, type, row, meta) {
                        return row.fktr_total;
                    }
                },
                {
                    "targets": 5,
                    "render": function(data, type, row, meta) {
                        return row.nama_vendor;
                    }
                },
                {
                    "targets": 6,
                    "render": function(data, type, row, meta) {
                        return row.no_faktur;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        if (row.termin == 0) {
                            var info = `Normal`;
                        } else if (row.termin == 1) {
                            var info = `Uang Muka`;
                        } else {
                            var info = `Pelunasan`;
                        }
                        return info;
                    }
                },
                {
                    "targets": 8,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.trx;
                    }
                },
                {
                    "targets": 9,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.potongan_harga;
                    }
                },
                {
                    "targets": 10,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.informasi;
                    }
                },
                {
                    "targets": 11,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.tgl_pembuatan;
                    }
                },
                {
                    "targets": 12,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.ppn;
                    }
                },
                {
                    "targets": 13,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                {
                    "targets": 14,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-danger shadow btn-xs sharp me-1" href="invoice/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp me-1" href="invoice/${row.id}/show">
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
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}
