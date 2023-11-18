@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pelaporan Keuangan Fiskal
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ url('printpdfneracafiskal') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-primary">PRINT PDF</button>
                                </form>
                                <table id="laporanfiskal" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th colspan="8" class="text-center">
                                                Neraca <br>
                                           </th>
                                        </tr>
                                        <tr>
                                            <th colspan="8" width="auto" class="text-center">Laporan Keuangan Fiskal</th>
                                        </tr>
                                        <tr>
                                            <th width="auto" class="text-center">Kode Akun</th>
                                            <th width="auto" class="text-center">Nama Akun Keuangan Fiskal</th>
                                            <th width="auto" class="text-center">Realting</th>
                                            <th width="auto" class="text-center">Debit</th>
                                            <th width="auto" class="text-center">Kredit</th>
                                            <th width="auto" class="text-center">Fiskal</th>
                                            <th width="auto" class="text-center">POS</th>
                                            <th width="auto" class="text-center">Nama Kategori Laporan Pajak</th>
                                        </tr>
                                      
                                    </thead>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">ASET LANCAR</th>
                                    </tr>
                                    @foreach ($asetlancar1110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1110)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1110)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1110)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1111 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1111)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1111)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1111)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1112 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1112)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1112)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1112)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1113 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1113)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1113)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1113)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1114 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1114)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1114)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1114)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1120 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1120)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1120)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1120)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1130 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1130)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1130)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1130)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PIUTANG</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar1210 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1210)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1210)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1210)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1220 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1220)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1220)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1220)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1230 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1230)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1230)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1230)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1240 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1240)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1240)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1240)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1250 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1250)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1250)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1250)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1251 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1251)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1251)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1251)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PAJAK</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar1260 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1260)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1260)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1260)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1270 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1270)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1270)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1270)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1271 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1271)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1271)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1271)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1272 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1272)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1272)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1272)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1273 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1273)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1273)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1273)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1274 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1274)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1274)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1274)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1275 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1275)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1275)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1275)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PERSEDIAAN</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar1310 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1310)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1310)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1310)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1312 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1312)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1312)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1312)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1313 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1313)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1313)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1313)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1314 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1314)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1314)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1314)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1330 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1330)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1330)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1330)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1340 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1340)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1340)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1340)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1341 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1341)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1341)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1341)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1342 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1342)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1342)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1342)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1360 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1360)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1360)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1360)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1361 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1361)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1361)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1361)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1362 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1362)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1362)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1362)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1380 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1380)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1380)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1380)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENGELUARAN DIBAYAR DI MUKA</th>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar1410 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1410)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1410)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1410)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1420 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1420)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1420)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1420)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1430 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1430)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1430)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1430)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1440 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1440)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1440)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1440)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1450 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1450)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1450)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1450)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1460 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1460)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1460)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1460)}}</td>
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
                                        <th class="text-center">{{number_format($totalaktivalancarfiskal)}}</th>
                                       
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">ASET TETAP</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar1510 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1510)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1510)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1510)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1520 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1520)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1520)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1520)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1530 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1530)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1530)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1530)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1540 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1540)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1540)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1540)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1550 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1550)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1550)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1550)}}</td>
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
                                        <th class="text-center">{{number_format($nilaiaktivatetapfiskal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                 
                                    @foreach ($asetlancar1600 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1600)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1600)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1600)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1610 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1610)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1610)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1610)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1620 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1620)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1620)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1620)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1630 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1630)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1630)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1630)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar1640 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit1640)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit1640)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal1640)}}</td>
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
                                        <th class="text-center">{{number_format($nilaipenyusutanfiskal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL AKTIVA </th>
                                        <th class="text-center">{{number_format($totalaktiva)}}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{number_format($totalaktivafiskal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LIABILITAS LANCAR</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar2110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2110)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2110)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2110)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2120 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2120)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2120)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2120)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2130 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2130)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2130)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2130)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2140 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2140)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2140)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2140)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2150 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2150)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2150)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2150)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2160 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2160)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2160)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2160)}}</td>
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
                                    @foreach ($asetlancar2310 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2310)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2310)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2310)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2330 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2330)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2330)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2330)}}</td>
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
                                    @foreach ($asetlancar2210 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2210)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2210)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2210)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2220 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2220)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2220)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2220)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2221 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2221)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2221)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2221)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2222 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2222)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2222)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2222)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2223 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2223)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2223)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2223)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2224 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2224)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2224)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2224)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2230 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2230)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2230)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2230)}}</td>
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
                                        <th class="text-center">{{number_format($totalliabilitislancarfiskal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LIABILITAS JANGKA PANJANG</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar2710 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2710)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2710)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2710)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2720 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2720)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2720)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2720)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2730 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2730)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2730)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2730)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2740 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2740)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2740)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2740)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2750 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2750)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2750)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2750)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar2760 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit2760)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit2760)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal2760)}}</td>
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
                                        <th class="text-center">{{number_format($totalliabilitisjangkapanjangfiskal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">MODAL PEMILIK</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar3100 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit3100)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit3100)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal3100)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar3110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit3110)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit3110)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal3110)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar3200 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit3200)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit3200)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal3200)}}</td>
                                            <td width="auto" class="text-center">AKTIVA</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar3300 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun,25) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{number_format($debit3300)}}</td>
                                            <td width="auto" class="text-center">{{number_format($kredit3300)}}</td>
                                            <td width="auto" class="text-center">{{ number_format($fiskal3300)}}</td>
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
                                        <th class="text-center">{{number_format($totalmodalfiskal)}}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL LIABLITAS & MODAL </th>
                                        <th class="text-center">{{number_format($totalliabilitasmodal)}}</th>
                                        <th class="text-center">{{number_format($totaldebit)}}</th>
                                        <th class="text-center">{{number_format($totalkredit)}}</th>
                                        <th class="text-center">{{number_format($totalkomersial)}}</th>
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