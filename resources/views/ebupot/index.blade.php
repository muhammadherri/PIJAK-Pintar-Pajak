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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">PPH 22</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 22</h4>
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
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Transaksi</th>
                                            <th>Jenis PPh</th>
                                            <th>No Telp</th>
                                            <th>Fasilitas</th>
                                            <th>Kode Objek</th>
                                            <th>Tgl Bukti Potong</th>
                                            <th>Periode Pajak</th>
                                            <th>Tgl Pembuatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ebupot as $key => $row)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>{{ $row->pilih_transaksi }}</td>
                                                <td>{{ $row->jenis_pph }}</td>
                                                <td>{{ $row->no_tlp }}</td>
                                                <td>{{ $row->fasilitas }}</td>
                                                <td>{{ $row->kode_objek_pajak }}</td>
                                                <td>{{ date('d-M-Y',strtotime($row->tanggal_bukti_potong)) }}</td>
                                                <td>{{ date('d-M-Y',strtotime($row->periode_pajak)) }}</td>
                                                <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="ebupot/{{ $row->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a
                                                            class="btn btn-primary shadow btn-xs sharp me-1"href="{{ route('ebupot/edit', $row->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a
                                                            class="btn btn-success shadow btn-xs sharp me-1"href="{{ route('ebupot/show', $row->id) }}">
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
