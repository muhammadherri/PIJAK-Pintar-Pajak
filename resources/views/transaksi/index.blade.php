@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <form id="formship" action="{{ route('transaksi/filter') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div >
                                <div >
                                    <label class="form-label" for="segment1">From</label>
                                    <input type="date" id="from" name="from" class="form-control"
                                        required autocomplete="off">
                                </div>
                                <div >
                                    <label class="form-label" for="segment1">To</label>
                                    <input type="date" id="to" name="to" class="form-control"
                                        required autocomplete="off">
                                </div>
                                <br>
                                <button class="btn btn-primary btn-submit" value="create" type="submit"><i
                                    data-feather='save'></i> {{ trans('Search') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <h6 class="card-title">
                                {{ __('Transaksi') }}
                            </h6>
                            <h6 class="card-title">
                                {{ __('Saldo') }}={{ $totalsaldo }}
                            </h6>
                            <h6 class="card-title">
                                {{ __('Pemasukan') }}={{ $subtotalpemasukan }}
                            </h6>
                            <h6 class="card-title">
                                {{ __('Pengeluaran') }}={{ $subtotalpengeluaran }}
                            </h6>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="btn btn-primary" href="{{ route('transaksi/create') }}">

                                    {{ __('Create') }}

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover datatable-Transaction datatable">
                            <thead>
                                <tr>

                                    <th>
                                        NO
                                    </th>
                                    <th style="width: 10%">Jenis_ Transaksi</th>
                                    <th>Kategori</th>
                                    <th>Nominal</th>
                                    <th>Deskripsi</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trx as $key => $row)
                                    <tr>

                                        <td style="width: 0%">
                                            <h6>
                                                {{ $no++ }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                @if ($row->jenis_transaksi == 0)
                                                    {{ 'Pemasukan' }}
                                                @else
                                                    {{ 'Pengeluaran' }}
                                                @endif
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $row->kategori ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $row->nominal ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $row->deskripsi ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $row->created_at ?? '' }}
                                            </h6>
                                        </td>
                                        <td>
                                            <form action="transaksi/{{ $row->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <a class="btn btn-primary" href="{{ route('transaksi/show', $row->id) }}">
                                                Edit
                                            </a>
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
@endsection
