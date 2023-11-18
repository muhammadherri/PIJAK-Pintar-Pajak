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
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <div class="card bg-warning invoice-card">
                                        <div class="card-body d-flex">
                                            
                                            <div>
                                                <h2 class="text-white invoice-num">Rp.{{number_format($fktrcount)}}</h2>
                                                <span class="text-white fs-18">Total Faktur PPn</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <div class="card bg-primary invoice-card">
                                        <div class="card-body d-flex">
                                            <div>
                                                <h2 class="text-white invoice-num">{{number_format($billing)}}</h2>
                                                <span class="text-white fs-18">Jumlah Transaksi Billing</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <div class="card bg-info invoice-card">
                                        <div class="card-body d-flex">
                                            <div>
                                                <h2 class="text-white invoice-num">{{number_format($stp1771)}}</h2>
                                                <span class="text-white fs-18">Jumlah Pelaporan 1771</span></p>
                                                {{-- <span class="text-white fs-18">SPT 1721 - {{number_format($stp1721)}}</span></p>
                                                <span class="text-white fs-18">SPT 1111 - {{number_format($stp1111)}}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <div class="card bg-light invoice-card">
                                        <div class="card-body d-flex">
                                            <div>

                                                <span class="text-white invoice-num">{{number_format($stp1721)}}</span>
                                                <h4 class="text-white fs-18">Jumlah Pelaporan 1721</h4>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <div class="card bg-success invoice-card">
                                        <div class="card-body d-flex">
                                            <div>

                                                <span class="text-white invoice-num">{{number_format($stp1111)}}</span>
                                                <h4 class="text-white fs-18">Jumlah Pelaporan 1111</h4>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <div class="card bg-secondary invoice-card">
                                        <div class="card-body d-flex">
                                            <div>

                                                <span class="text-white invoice-num">{{Str::limit($namadosen->nama_lengkap,11)}}</span>
                                                <h4 class="text-white fs-18">Dosen Pengajar</h4>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card coin-card">
                                        <div class="card-body d-sm-flex d-block align-items-center">
                                            
                                            <div>
                                                <h3 class="text-white">Aplikasi Perpajakan PIJAK</h3>
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
                                                    <th>Kelas</th>
                                                    <th>Nomor Induk Mahasiswa</th>
                                                    <th>Status</th>
                                                    <th>Terakhir Login</th>
                                                    <th>Action</th>
                                                    <th></th>
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
                                        <h3 class="text-white">Aplikasi Perpajakan PIJAK</h3>
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
            "order":[[6,'desc']],
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
                        return row.kelas;
                    }
                },
                {
                    "targets": 2
                    , "render": function(data, type, row, meta) {
                        return row.email;
                    }
                },
                
                {
                    "targets": 3
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <span class="badge badge-primary">Mahasiswa</span>
                        `;
                        return content;
                    }
                },
                {
                    "targets": 4
                    , "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 5
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
                },
                {
                    "targets": 6,
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