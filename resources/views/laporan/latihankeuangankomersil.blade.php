@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Latihan Pelaporan Keuangan Komersial
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
                                                Neraca <br>
                                           </th>
                                        </tr>
                                        <tr>
                                            <th colspan="8" width="auto" class="text-center">Laporan Keuangan</th>
                                        </tr>
                                        <tr>
                                            <th width="auto" class="text-center">Kode Akun</th>
                                            <th width="width: 100px;" class="text-center">Nama Akun Komersial</th>
                                            <th width="auto" class="text-center">Realting</th>
                                            <th width="auto" class="text-center">Positif</th>
                                            <th width="auto" class="text-center">Negatif</th>
                                            <th width="auto" class="text-center">Fiskal</th>
                                            <th width="auto" class="text-center">POS</th>
                                            <th width="auto" class="text-center">Nama Kategori Laporan Pajak</th>
                                        </tr>
                                      
                                    </thead>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">ASET LANCAR</th>
                                    </tr>
                                    @foreach ($asetlancar as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PIUTANG</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($piutang as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PAJAK</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($pajakaktiva as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PERSEDIAAN</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($persediaan as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENGELUARAN DIBAYAR DI MUKA</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($pengeluarandibayar as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL AKTIVA LANCAR </th>
                                        <th class="text-center">{{number_format($totalaktivalancar)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalaktivalancar)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">ASET TETAP</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asettetap as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">NILAI AKTIVA TETAP </th>
                                        <th class="text-center">{{number_format($nilaiaktivatetap)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($nilaiaktivatetap)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    @foreach ($penyusutan as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                 
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">NILAI PENYUSUTAN</th>
                                        <th class="text-center">{{number_format($nilaipenyusutan)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($nilaipenyusutan)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL AKTIVA TETAP</th>
                                        <th class="text-center">{{number_format($totalaktivatetap)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalaktivatetap)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL AKTIVA</th>
                                        <th class="text-center">{{number_format($totalaktiva)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalaktiva)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LIABILITAS LANCAR</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($liabilitaslancar as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENDAPATAN DITERIMA DI MUKA</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($pengeluarandibayar as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PAJAK</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($pajak as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL LIABILITAS LANCAR</th>
                                        <th class="text-center">{{number_format($totalliabilitislancar)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalliabilitislancar)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LIABILITAS JANGKA PANJANG</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($liabilitisjangkapanjang as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL LIABILITAS JANGKA PANJANG</th>
                                        <th class="text-center">{{number_format($totalliabilitisjangkapanjang)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalliabilitisjangkapanjang)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">MODAL PEMILIK</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($modalpemilik as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,15) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center"></td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL MODAL</th>
                                        <th class="text-center">{{number_format($totalmodal)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalmodal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL LIABLITAS & MODAL </th>
                                        <th class="text-center">{{number_format($totalliabilitasmodal)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalliabilitasmodal)}}</th>
                                        <th colspan="2" class="text-center"></th>
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