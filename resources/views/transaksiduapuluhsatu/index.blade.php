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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">PPH 21</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('transaksipph21/create') }}">

                                        {{ __('Create') }}

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pphduasatu" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama NPWP Terdaftar</th>
                                            <th>Nomor NPWP Terdaftar</th>
                                            <th>Masa Penghasilan</th>
                                            <th>Jumlah Tunjangan</th>
                                            <th>Jumlah Ketentuan PTKP</th>
                                            <th>Jumlah Ketentuan Tarif</th>
                                            <th>Jumlah Gaji Pensiun</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Status</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($pph21 as $key => $row)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>{{ $row->nama_wajib_pajak }}</td>
                                                <td>
                                                    @if($row->no_npwp==0 )
                                                        <span class="badge light badge-danger">Kosong</span>
                                                    @else
                                                        {{ $row->no_npwp }}
                                                    @endif
                                                </td>
                                                <td>{{ date('d-m-Y',strtotime($row->masa_penghasilan_start))}}</td>
                                                <td>{{ $row->tunjangan_pajak }}</td>
                                                <td>{{ $row->ketentuan_ptkp }}</td>
                                                <td>{{ $row->ketentuan_tarif }}</td>
                                                <td>{{ $row->gaji_pensiun }}</td>
                                                <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                                <td >
                                                    @if($row->status_npwp==0)
                                                    <span class="badge light badge-success">NPWP</span>
                                                    @else
                                                    <span class="badge light badge-warning">Non NPWP</span>
                                                    @endif
                                                </td>
                                                <td>{{ $row->users->name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="transaksipph21/{{ $row->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a
                                                            class="btn btn-primary shadow btn-xs sharp me-1"href="{{ route('transaksipph21/edit', $row->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a
                                                            class="btn btn-success shadow btn-xs sharp me-1"href="{{ route('transaksipph21/show', $row->id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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
        $('#pphduasatu').DataTable({
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
            // serverSide:true,
            // processing:true,
            "order":[[0,'desc']],

            ajax:"{{route('data.pph')}}",
            columnDefs:[
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
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.nama_wajib_pajak;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        if(row.no_npwp==null ){
                            var info = '<span class="badge light badge-danger">Kosong</span>';
                        }else{
                            var info = row.no_npwp;
                        }
                        return info;
                    }
                },
                {
                    "targets": 3
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        
                        return row.masa_penghasilan_start;
                    }
                },
                {
                    "targets": 4
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.tunjangan_pajak;
                    }
                },
                {
                    "targets": 5
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.ketentuan_ptkp;
                    }
                },
                {
                    "targets": 6
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.ketentuan_tarif;
                    }
                },
                {
                    "targets": 7
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.gaji_pensiun;
                    }
                },
                {
                    "targets": 8
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_at;
                    }
                },
                {
                    "targets": 9
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        if(row.status_npwp==0 ){
                            var info = '<span class="badge light badge-success">NPWP</span>';
                        }else{
                            var info = '<span class="badge light badge-warning">Non NPWP</span>';
                        }
                        return info;
                    }
                },
                {
                    "targets": 10
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.created_by;
                    }
                },
                
                {
                    "targets": 11
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <div class="d-flex">
                                <a class="btn btn-primary shadow btn-xs sharp me-1" href="transaksipph21/${row.id}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger shadow btn-xs sharp" href="transaksipph21/${row.id}/destroy">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success shadow btn-xs sharp" href="transaksipph21/${row.id}/show">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        `;
                        return content;
                    }
                }
            ]
        })
    });
</script>
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}
