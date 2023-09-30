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
                                            <span class="coin-icon">
                                                <svg width="38" height="41" viewBox="0 0 38 41" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M14.0413 32.5832C15.7416 32.5934 17.4269 32.2659 18.9997 31.6199C20.5708 32.2714 22.2572 32.5991 23.958 32.5832C29.1218 32.5832 33.1663 29.8278 33.1663 26.3088V20.441C33.1663 16.922 29.1218 14.1666 23.958 14.1666C23.7186 14.1666 23.4834 14.1779 23.2497 14.1906V7.55498C23.2497 4.10823 19.2051 1.41656 14.0413 1.41656C8.87759 1.41656 4.83301 4.10823 4.83301 7.55498V26.4448C4.83301 29.8916 8.87759 32.5832 14.0413 32.5832ZM30.333 26.3088C30.333 27.9366 27.715 29.7499 23.958 29.7499C20.201 29.7499 17.583 27.9366 17.583 26.3088V24.9984C19.5015 26.1652 21.7131 26.7604 23.958 26.714C26.203 26.7604 28.4145 26.1652 30.333 24.9984V26.3088ZM23.958 16.9999C27.715 16.9999 30.333 18.8132 30.333 20.441C30.333 22.0687 27.715 23.8807 23.958 23.8807C20.201 23.8807 17.583 22.0673 17.583 20.441C17.583 18.8147 20.201 16.9999 23.958 16.9999ZM14.0413 4.2499C17.7983 4.2499 20.4163 5.9924 20.4163 7.55498C20.4163 9.11757 17.7983 10.8615 14.0413 10.8615C10.2843 10.8615 7.66634 9.11898 7.66634 7.55498C7.66634 5.99098 10.2843 4.2499 14.0413 4.2499ZM7.66634 12.0161C9.59282 13.1601 11.8012 13.7417 14.0413 13.6948C16.2814 13.7417 18.4899 13.1601 20.4163 12.0161V14.6341C18.8724 15.0232 17.4565 15.8078 16.308 16.9107C15.5631 17.0718 14.8034 17.1545 14.0413 17.1572C10.2843 17.1572 7.66634 15.4146 7.66634 13.8521V12.0161ZM7.66634 18.3132C9.59323 19.4561 11.8015 20.0371 14.0413 19.9905C14.2935 19.9905 14.5372 19.9593 14.7851 19.9466C14.764 20.1106 14.7522 20.2756 14.7497 20.441V23.3947C14.5117 23.4089 14.2822 23.4542 14.0413 23.4542C10.2843 23.4542 7.66634 21.7117 7.66634 20.1477V18.3132ZM7.66634 24.6088C9.59282 25.7529 11.8012 26.3344 14.0413 26.2876C14.2793 26.2876 14.5131 26.2692 14.7497 26.2578V26.3088C14.7699 27.5148 15.2334 28.6711 16.0516 29.5572C15.3887 29.6824 14.7159 29.7469 14.0413 29.7499C10.2843 29.7499 7.66634 28.0074 7.66634 26.4448V24.6088Z"
                                                            fill="#fff"></path>
                                                    </g>
                                                </svg>
                                            </span>
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
                    <div class="col-12">
                        <div class="card coin-card">
                            <div class="card-body d-sm-flex d-block align-items-center">
                                <span class="coin-icon">
                                    <svg width="38" height="41" viewBox="0 0 38 41" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M14.0413 32.5832C15.7416 32.5934 17.4269 32.2659 18.9997 31.6199C20.5708 32.2714 22.2572 32.5991 23.958 32.5832C29.1218 32.5832 33.1663 29.8278 33.1663 26.3088V20.441C33.1663 16.922 29.1218 14.1666 23.958 14.1666C23.7186 14.1666 23.4834 14.1779 23.2497 14.1906V7.55498C23.2497 4.10823 19.2051 1.41656 14.0413 1.41656C8.87759 1.41656 4.83301 4.10823 4.83301 7.55498V26.4448C4.83301 29.8916 8.87759 32.5832 14.0413 32.5832ZM30.333 26.3088C30.333 27.9366 27.715 29.7499 23.958 29.7499C20.201 29.7499 17.583 27.9366 17.583 26.3088V24.9984C19.5015 26.1652 21.7131 26.7604 23.958 26.714C26.203 26.7604 28.4145 26.1652 30.333 24.9984V26.3088ZM23.958 16.9999C27.715 16.9999 30.333 18.8132 30.333 20.441C30.333 22.0687 27.715 23.8807 23.958 23.8807C20.201 23.8807 17.583 22.0673 17.583 20.441C17.583 18.8147 20.201 16.9999 23.958 16.9999ZM14.0413 4.2499C17.7983 4.2499 20.4163 5.9924 20.4163 7.55498C20.4163 9.11757 17.7983 10.8615 14.0413 10.8615C10.2843 10.8615 7.66634 9.11898 7.66634 7.55498C7.66634 5.99098 10.2843 4.2499 14.0413 4.2499ZM7.66634 12.0161C9.59282 13.1601 11.8012 13.7417 14.0413 13.6948C16.2814 13.7417 18.4899 13.1601 20.4163 12.0161V14.6341C18.8724 15.0232 17.4565 15.8078 16.308 16.9107C15.5631 17.0718 14.8034 17.1545 14.0413 17.1572C10.2843 17.1572 7.66634 15.4146 7.66634 13.8521V12.0161ZM7.66634 18.3132C9.59323 19.4561 11.8015 20.0371 14.0413 19.9905C14.2935 19.9905 14.5372 19.9593 14.7851 19.9466C14.764 20.1106 14.7522 20.2756 14.7497 20.441V23.3947C14.5117 23.4089 14.2822 23.4542 14.0413 23.4542C10.2843 23.4542 7.66634 21.7117 7.66634 20.1477V18.3132ZM7.66634 24.6088C9.59282 25.7529 11.8012 26.3344 14.0413 26.2876C14.2793 26.2876 14.5131 26.2692 14.7497 26.2578V26.3088C14.7699 27.5148 15.2334 28.6711 16.0516 29.5572C15.3887 29.6824 14.7159 29.7469 14.0413 29.7499C10.2843 29.7499 7.66634 28.0074 7.66634 26.4448V24.6088Z"
                                                fill="#fff">
                                            </path>
                                        </g>
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="text-white">Aplikasi Perpajakan Taxceed</h3>
                                    <p>Adalah aplikasi yang terhubung secara langsung dengan sistem informasi yang dapat digunakan oleh wajib pajak untuk melaksanakan hak dan/atau kewajiban perpajakan</p>
                                    <a class="text-white" href="javascript:void(0);">Pelajari Lagi>></a>
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
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script>