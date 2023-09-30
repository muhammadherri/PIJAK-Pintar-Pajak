@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Dashboard
        </div>
    </div>
@endsection
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row invoice-card-row">
                @if($user->status == null)
                    <div class="row">
                        <div class="col-xl-6 col-xxl-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card progress-card">
                                        <div class="card-body d-flex">
                                            <div class="me-auto">
                                                <h4 class="card-title">Transaksi PPh 21</h4>
                                                <div class="d-flex align-items-center">
                                                    <h2 class="fs-38 mb-0">{{$pph21}}</h2>
                                                    {{-- <div class="text-success transaction-caret">
                                                        <i class="fa fa-sort-asc"></i>
                                                        <p class="mb-0">+0.5%</p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Transaksi E-bupot</h4>
                                            <div class="d-flex align-items-center">
                                                {{-- <div class="me-auto">
                                                    <div class="progress mt-4" style="height:10px;">
                                                        <div class="progress-bar bg-primary progress-animated"
                                                            style="width: 45%; height:10px;" role="progressbar">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <p class="fs-16 mb-0 mt-2"><span class="text-danger">-0,8% </span>from
                                                        last month</p>
                                                </div> --}}
                                                <h2 class="fs-38">{{$ebupot}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mt-2">Transaksi Pembayaran</h4>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                                {{-- <h2 class="fs-38 mb-0 me-3">456</h2> --}}
                                                <span class="badge badge-success badge-xl">{{$billing}}</span>

                                            </div>
                                            {{-- <div class="d-flex align-items-center mt-3 mb-2">
                                                <span class="badge badge-danger badge-xl">Invoice - {{number_format($invcount)}}</span>

                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mt-2">Jumlah Mahasiswa</h4>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                                <h2 class="fs-38 mb-0 me-3">{{$jumlahmahasiswa}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card coin-card">
                                        <div class="card-body d-sm-flex d-block align-items-center">
                                            
                                            <div>
                                                <h3 class="text-white">Aplikasi Perpajakan Taxceed</h3>
                                                <p>Adalah aplikasi yang terhubung secara langsung dengan sistem informasi yang dapat digunakan oleh wajib pajak untuk melaksanakan hak dan/atau kewajiban perpajakan</p>
                                                <a class="text-white" href="javascript:void(0);">Pelajari Lagi>></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataMahasiswa" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Terakhir Login</th>
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
                    <div class="col-xl-6 col-xxl-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card coin-card">
                                <div class="card-body d-sm-flex d-block align-items-center">
                                    
                                    <div>
                                        <h3 class="text-white">Aplikasi Perpajakan Taxceed</h3>
                                        <p>Adalah aplikasi yang terhubung secara langsung dengan sistem informasi yang dapat digunakan oleh wajib pajak untuk melaksanakan hak dan/atau kewajiban perpajakan</p>
                                        <a class="text-white" href="javascript:void(0);">Pelajari Lagi>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function(){
        $('#dataMahasiswa').DataTable({
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                }
            },
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 300]
            ],
            ajax:"{{route('data.mahasiswa')}}",
            columnDefs:[
                {
                    "targets": 0
                    , "render": function(data, type, row, meta) {
                        return row.name;
                    }
                },
                {
                    "targets": 1
                    , "render": function(data, type, row, meta) {
                        return row.email;
                    }
                },
                
                {
                    "targets": 2
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <span class="badge badge-primary">Mahasiswa</span>
                        `;
                        return content;
                    }
                },
                {
                    "targets": 3
                    , "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 4
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="badge badge-rounded badge-outline-success" href="mahasiswa/${row.id}/show">
                                    Lihat History
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