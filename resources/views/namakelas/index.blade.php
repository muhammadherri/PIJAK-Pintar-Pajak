@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Lainnya
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Nama Kelas</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Nama Kelas</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('namakelas/create') }}">
                                        {{ __('Tambah') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nama Kelas</th>
                                            <th>Nama Pembuat</th>
                                            <th>Tanggal Pembuatan</th>
                                            @if(Auth::user()->status==1)
                                            <th>Action</th>
                                            @else
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($namakelas as $key => $row)
                                            <tr>
                                                <td>{{ $row->nama_kelas }}</td>
                                                <td>{{ $row->users->name }}</td>
                                                <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                @if(Auth::user()->status==1)
                                                <td>
                                                    <div class="d-flex">
                                                        <a
                                                            class="btn btn-primary shadow btn-xs sharp me-1"href="{{ route('namakelas/edit', $row->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="namakelas/{{ $row->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp me-1"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                                @else
                                                @endif
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
