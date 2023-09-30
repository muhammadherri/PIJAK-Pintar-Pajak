@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pelaporan Keuangan Komersial
        </div>
    </div>
@endsection
<style>
    th {
        width: 100px;
    }
</style>
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="laporanfiskal" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th colspan="8" class="text-center">
                                                Laba Rugi <br>
                                           </th>
                                        </tr>
                                        <tr>
                                            <th colspan="8" width="auto" class="text-center">Laporan Keuangan</th>
                                        </tr>
                                        <tr>
                                            <th width="auto" class="text-center">Kode Akun</th>
                                            <th width="width: 100px;" class="text-center">Deskripsi Nama Akun</th>
                                            <th width="auto" class="text-center">Realting</th>
                                            <th width="auto" class="text-center">Debit</th>
                                            <th width="auto" class="text-center">Kredit</th>
                                            <th width="auto" class="text-center">Komersial</th>
                                            <th width="auto" class="text-center">Kategori Laporan Pajak</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENDAPATAN</th>
                                    </tr>
                                    @foreach ($pendapatan as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,18) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL PENJUALAN</th>
                                        <th class="text-center">{{number_format($totalpenjualan)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">HARGA POKOK</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">JUMLAH HARGA POKOK PENJUALAN</th>
                                        <th class="text-center">{{number_format($totalharpok)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LABA KOTOR</th>
                                        <th class="text-center">{{number_format($labakotor)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENGELUARAN OPERASIONAL</th>
                                        <th class="text-center">{{number_format($labakotor)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL OPERASIONAL</th>
                                        <th class="text-center">{{number_format($totalbiayaoperasional)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LABA OPERASIONAL</th>
                                        <th class="text-center">{{number_format($labaoperasional)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENDAPATAN LAIN</th>
                                        <th class="text-center">{{number_format($labaoperasional)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">JUMLAH PENDAPATAN</th>
                                        <th class="text-center">{{number_format($labaoperasional)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENGELUARAN LAIN</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">JUMLAH BEBAN LAIN</th>
                                        <th class="text-center">{{number_format($jumlahbebanlain)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL PENDAPATAN DAN BEBAN LAIN</th>
                                        <th class="text-center">{{number_format($totalpendapatandanbebanlain)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">IKHTISAR LABA RUGI</th>
                                        <th class="text-center">{{number_format($ikhtisarlabarugi)}}</th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
@endsection