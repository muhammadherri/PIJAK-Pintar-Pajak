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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pembayaran E-Billing</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pembayaran</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                        data-bs-target=".bd-example-modal-sm">Bayar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="listBilling" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID Billing</th>
                                            <th>Nomor NPWP Terdaftar</th>
                                            <th>Jenis Pajak</th>
                                            <th>Jenis Setoran</th>
                                            <th>Masa Pajak</th>
                                            <th>Tanggal Masa Aktif</th>
                                            <th>Jumlah</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Status</th>
                                            <th>Tanggal Pembuatan</th>
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
    {{-- modal --}}
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form target="_blank" action="{{ url('pembayaranpdf') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title">Pembayaran E-Billing</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input autocomplete="off" required id="id_billing" name="id_billing" type="text"
                            class="form-control" placeholder="Masukkan ID Billing">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal --}}
@endsection
<script>
    $(document).ready(function() {
        $('#listBilling').DataTable({
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
            "order":[[0,'desc']],
            ajax: "{{ route('data.billing') }}",
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
                        return row.trxbilling;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center",
                    render: function(data, type, row, index) {
                        return row.npwp;

                    }
                },
                {
                    "targets": 3,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.jenispajak;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.jenis_setoran;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.masapajak;
                    }
                },
                {
                    "targets": 6,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.masaaktif;
                    }
                },
                {
                    "targets": 7,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.jumlah;
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
                    render: function(data, type, row, index) {
                        if (row.status == null) {
                            var info = `<a class="badge badge-rounded badge-outline-warning">
                                Menunggu Pembayaran</a>`;
                        } else {
                            var info = `<a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>`;
                        }
                        return info;
                    }
                },
                {
                    "targets": 10,
                    "class": "text-center",
                    "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
            ]
        })
    })
</script>
