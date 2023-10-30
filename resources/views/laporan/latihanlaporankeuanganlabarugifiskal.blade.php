@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pelaporan Keuangan Fiskal
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
                                {{-- <form action="{{ url('printpdflabarugifiskal') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                <button type="submit" class="btn btn-primary">PRINT PDF</button>
                                </form> --}}
                                
                                <table id="laporanfiskal" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th colspan="8" class="text-center">
                                                Laba Rugi <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="8" width="auto" class="text-center">Laporan Keuangan Fiskal
                                            </th>
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
                                    @foreach ($asetlancar4100 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4100) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4100) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4100 - $kredit4100) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4101 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4101) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4101) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4101 - $kredit4101) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4102 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4102) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4102) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4102 - $kredit4102) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4103 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4103) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4103) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4103 - $kredit4103) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4104 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4104) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4104) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4104 - $kredit4104) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4200 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4200) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4200) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4200 - $kredit4200) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4201 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4201) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4201) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4201 - $kredit4201) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4202 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4202) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4202) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4202 - $kredit4202) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4203 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4203) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4203) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4203 - $kredit4203) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4300 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4300) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4300) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4300 - $kredit4300) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4310 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4310) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4310) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4310 - $kredit4310) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4320 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4320) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4320) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4320 - $kredit4320) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4330 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4330) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4330) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4330 - $kredit4330) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4340 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4340) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4340) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4340 - $kredit4340) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4350 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4350) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4350) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4350 - $kredit4350) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar4105 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit4105) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit4105) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit4105 - $kredit4105) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL PENJUALAN</th>
                                        <th class="text-center">{{ number_format($totalpenjualan) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($totalpenjualan) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">HARGA POKOK</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar5100 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5100) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5100) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5100 - $kredit5100) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5110) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5110) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5110 - $kredit5110) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5120 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5120) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5120) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5120 - $kredit5120) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5200 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5200) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5200) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5200 - $kredit5200) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5210 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5210) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5210) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5210 - $kredit5210) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5211 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5211) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5211) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5211 - $kredit5211) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5212 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5212) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5212) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5212 - $kredit5212) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5213 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5213) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5213) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5213 - $kredit5213) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5250 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5250) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5250) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5250 - $kredit5250) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5260 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5260) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5260) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5260 - $kredit5260) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5300 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5300) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5300) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5300 - $kredit5300) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5400 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5400) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5400) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5400 - $kredit5400) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5410 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5410) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5410) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5410 - $kredit5410) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5420 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5420) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5420) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5420 - $kredit5420) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5430 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5430) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5430) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5430 - $kredit5430) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5440 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5440) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5440) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5440 - $kredit5440) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5450 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5450) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5450) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5450 - $kredit5450) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5460 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5460) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5460) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5460 - $kredit5460) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5470 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5470) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5470) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5470 - $kredit5470) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5480 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5480) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5480) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5480 - $kredit5480) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar5600 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit5600) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit5600) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit5600 - $kredit5600) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">JUMLAH HARGA POKOK PENJUALAN</th>
                                        <th class="text-center">{{ number_format($totalharpok) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($totalharpok) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LABA KOTOR</th>
                                        <th class="text-center">{{ number_format($labakotor) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($labakotor) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENGELUARAN OPERASIONAL</th>
                                        <th class="text-center">{{ number_format($labakotor) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($labakotor) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar6100 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6100) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6100) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6110) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6110) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6110 - $kredit6110) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6120 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6120) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6120) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6120 - $kredit6120) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6130 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6130) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6130) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6130 - $kredit6130) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6140 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6140) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6140) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6140 - $kredit6140) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6150 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6150) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6150) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6150 - $kredit6150) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6160 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6160) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6160) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6160 - $kredit6160) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6170 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6170) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6170) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6170 - $kredit6170) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6180 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6180) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6180) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6180 - $kredit6180) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6190 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6190) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6190) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6190 - $kredit6190) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6200 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6200) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6200) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6200 - $kredit6200) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6210 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6210) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6210) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6210 - $kredit6210) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6220 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6220) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6220) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6220 - $kredit6220) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6230 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6230) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6230) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6230 - $kredit6230) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6240 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6240) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6240) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6240 - $kredit6240) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6250 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6250) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6250) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6250 - $kredit6250) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6260 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6260) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6260) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6260 - $kredit6260) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6270 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6270) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6270) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6270 - $kredit6270) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6280 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6280) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6280) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6280 - $kredit6280) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6290 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6290) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6290) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6290 - $kredit6290) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6300 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6300) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6300) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6300 - $kredit6300) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6310 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6310) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6310) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6310 - $kredit6310) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6320 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6320) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6320) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6320 - $kredit6320) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6330 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6330) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6330) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6330 - $kredit6330) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6340 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6340) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6340) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6340 - $kredit6340) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6350 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6350) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6350) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6350 - $kredit6350) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6360 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6360) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6360) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6360 - $kredit6360) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6370 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6370) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6370) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6370 - $kredit6370) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6380 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6380) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6380) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6380 - $kredit6380) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6390 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($debit6390) }}</td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6390) }}</td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6390 - $kredit6390) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6400 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6400) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6400) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6400 - $kredit6400) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6410 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6410) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6410) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6410 - $kredit6410) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6420 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6420) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6420) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6420 - $kredit6420) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6430 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6430) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6430) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6430 - $kredit6430) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6440 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6440) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6440) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6440 - $kredit6440) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6450 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6450) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6450) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6450 - $kredit6450) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6460 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6460) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6460) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6460 - $kredit6460) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6470 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6470) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6470) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6470 - $kredit6470) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6480 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6480) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6480) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6480 - $kredit6480) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6490 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6490) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6490) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6490 - $kredit6490) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6500 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6500) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6500) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6500 - $kredit6500) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6510 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6510) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6510) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6510 - $kredit6510) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6520 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6520) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6520) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6520 - $kredit6520) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6530 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6530) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6530) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6530 - $kredit6530) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6540 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6540) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6540) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6540 - $kredit6540) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar6600 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit6600) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit6600) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit6600 - $kredit6600) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL OPERASIONAL</th>
                                        <th class="text-center">{{ number_format($totalbiayaoperasional) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($totalbiayaoperasional) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">LABA OPERASIONAL</th>
                                        <th class="text-center">{{ number_format($labaoperasional) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($labaoperasional) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENDAPATAN LAIN</th>
                                        <th class="text-center">{{ number_format($labaoperasional) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($labaoperasional) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar7100 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit7100) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit7100) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit7100 - $kredit7100) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar7110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit7110) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit7110) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit7110 - $kredit7110) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">JUMLAH PENDAPATAN</th>
                                        <th class="text-center">{{ number_format($labaoperasional) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($labaoperasional) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PENGELUARAN LAIN</th>
                                        <th class="text-center"></th>
                                        <th colspan="5" class="text-center"></th>
                                    </tr>
                                    @foreach ($asetlancar8100 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit8100) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit8100) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit8100 - $kredit8100) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar8110 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit8110) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit8110) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit8110 - $kredit8110) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($asetlancar8120 as $key => $row)
                                        <tr>
                                            <td width="auto" class="text-center">{{ $row->no_akun }}</td>
                                            <td width="auto" class="text-left">{{ Str::limit($row->nama_akun, 18) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($row->saldo) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($debit8120) }}
                                            </td>
                                            <td width="auto" class="text-center">{{ number_format($kredit8120) }}
                                            </td>
                                            <td width="auto" class="text-center">
                                                {{ number_format($row->saldo + $debit8120 - $kredit8120) }}</td>
                                            <td width="auto" class="text-center">{{ $row->attribute3 }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">JUMLAH BEBAN LAIN</th>
                                        <th class="text-center">{{ number_format($jumlahbebanlain) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($jumlahbebanlain) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">TOTAL PENDAPATAN DAN BEBAN LAIN</th>
                                        <th class="text-center">{{ number_format($totalpendapatandanbebanlain) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($totalpendapatandanbebanlain) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">IKHTISAR LABA RUGI</th>
                                        <th class="text-center">{{ number_format($ikhtisarlabarugi) }}</th>
                                        <th class="text-center">{{ number_format($totaldebit) }}</th>
                                        <th class="text-center">{{ number_format($totalkredit) }}</th>
                                        <th class="text-center">{{ number_format($totalkomersial) }}</th>
                                        <th colspan="2" class="text-center"></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th width="auto" class="text-center">PAJAK PENGHASIL</th>
                                        <th class="text-center">{{ number_format($pajakpenghasiliktisarlabarugi) }}</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">{{ number_format($pajakpenghasiltotalkomersial) }}</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
