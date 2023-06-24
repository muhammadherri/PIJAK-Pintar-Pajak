@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <h6 class="card-title">
                                {{ __('Hasil Filter') }}
                            </h6>
                           

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="btn btn-primary" href="{{ route('transaksi') }}">

                                    {{ __('Back') }}

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
