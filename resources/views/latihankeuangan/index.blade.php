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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Akun Latihan</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Akun Latihan</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" href="{{ route('latihankeuangan/create') }}">
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
                                            {{-- <th></th> --}}
                                            <th>No Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Saldo</th>
                                            <th>Kategori</th>
                                            <th>Nama Pembuat</th>
                                            <th>Tanggal</th>
                                            @if(Auth::user()->status==1)
                                                <th>Action</th>
                                            @else
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latihankeuangan as $key => $row)
                                            <tr>
                                                {{-- <td>
                                                    {{ $no++ }}
                                                </td> --}}
                                                <td>{{ $row->no_akun }}</td>
                                                <td>{{ $row->nama_akun }}</td>
                                                <td>{{ number_format($row->saldo,2) }}</td>
                                                <td>{{ $row->attribute3 }}</td>
                                                <td>{{ $row->users->name }}</td>
                                                <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                @if(Auth::user()->status==1)
                                                    <td>
                                                        <div class="d-flex">

                                                            <form action="latihankeuangan/{{ $row->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                            <a
                                                                class="btn btn-primary shadow btn-xs sharp me-1"href="{{ route('latihankeuangan/edit', $row->id) }}">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a
                                                                class="btn btn-success shadow btn-xs sharp me-1"href="{{ route('latihankeuangan/show', $row->id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
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