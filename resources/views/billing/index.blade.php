@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembayaran
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pembayaran</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Billing</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('billing/create') }}">
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
                                            <th>Kode Akun Pajak</th>
                                            <th>Kode Jenis Setoran</th>
                                            <th>NPWP</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($billing as $key => $row)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>{{ $row->kode_akun_pajak }}</td>
                                                <td>{{ $row->kode_jenis_setoran }}</td>
                                                <td>{{ $row->npwp }}</td>
                                                <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="billing/{{ $row->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a
                                                            class="btn btn-primary shadow btn-xs sharp me-1"href="{{ route('billing/edit', $row->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a
                                                            class="btn btn-success shadow btn-xs sharp me-1"href="{{ route('billing/show', $row->id) }}">
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

