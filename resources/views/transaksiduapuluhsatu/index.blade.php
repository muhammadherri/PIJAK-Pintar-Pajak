@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Transaksi
        </div>
    </div>
@endsection

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
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama</th>
                                            <th>No NPWP</th>
                                            <th>Status</th>
                                            <th>Tanggungan</th>
                                            <th>Masa Penghasilan</th>
                                            <th>Tunjangan</th>
                                            <th>Ketentuan PTKP</th>
                                            <th>Ketentuan Tarif</th>
                                            <th>Gaji Pensiun</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pph21 as $key => $row)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>{{ $row->nama_wajib_pajak }}</td>
                                            <td>{{ $row->no_npwp }}</td>
                                            <td>{{ $row->ptkp->status_pernikahan ??'' }}</td>
                                            <td>{{ $row->tanggungan }}</td>
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
                                    @endforeach
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pphduasatu').DataTable({
            "ajax": {
                url: "/search/pphduapuluhsatu/",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            columns:[
                {data:'id',name:'id'},
            ]
        })
    });
</script>
