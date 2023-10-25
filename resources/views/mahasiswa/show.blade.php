@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Riwayat
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12">
                <div class="row page-titles">
                    <div class="text-center">
                        <div class="row">
                            <div class="col">
                                <h6 class="m-b-0">{{$user->nama_lengkap}}-{{$user->kelas}}</h6><span class="badge badge-primary">Mahasiswa</span>
                            </div>
                            <div class="col">
                                <h6 class="m-b-0">{{$user->name}} - {{$user->email}}</h6><span class="badge badge-primary">Nomor Induk Mahasiswa</span>
                            </div>
                            <div class="col">
                                <h6 class="m-b-0">{{$timeDifferent}}</h6><span class="badge badge-primary">Terakhir Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>TRANSAKSI</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#my-pph21" data-bs-toggle="tab" class="nav-link active show">PPh 21</a>
                                        </li>
                                        <li class="nav-item"><a href="#pph-final" data-bs-toggle="tab" class="nav-link">PPh Final</a>
                                        </li>
                                        <li class="nav-item"><a href="#pph-tidakfinal" data-bs-toggle="tab" class="nav-link">PPh Tidak Final</a>
                                        </li>
                                        <li class="nav-item"><a href="#e-bupot" data-bs-toggle="tab" class="nav-link">E-Bupot</a>
                                        </li>
                                        {{-- <li class="nav-item"><a href="#e-billing" data-bs-toggle="tab" class="nav-link">Billing</a>
                                        </li> --}}
                                    </ul>
                                    <div class="tab-content">
                                        <div id="my-pph21" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama NPWP Terdaftar</th>
                                                                    <th>No NPWP</th>
                                                                    <th>Masa Penghasilan</th>
                                                                    <th>Tunjangan</th>
                                                                    <th>Ketentuan PTKP</th>
                                                                    <th>Ketentuan Tarif</th>
                                                                    <th>Gaji Pensiun</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($trx as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->nama_wajib_pajak }}</td>
                                                                    <td>
                                                                        @if($row->no_npwp==0 )
                                                                            <span class="badge light badge-danger">Kosong</span>
                                                                        @else
                                                                            {{ $row->no_npwp }}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ date('d-m-Y',strtotime($row->masa_penghasilan_start))}}</td>
                                                                    <td>{{ $row->tunjangan_pajak }}</td>
                                                                    <td>{{ $row->ketentuan_ptkp }}</td>
                                                                    <td>{{ $row->ketentuan_tarif }}</td>
                                                                    <td>{{ $row->gaji_pensiun }}</td>
                                                                    <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                                                    <td >
                                                                        @if($row->status_npwp==0)
                                                                        <span class="badge light badge-success">NPWP</span>
                                                                        @else
                                                                        <span class="badge light badge-warning">Non NPWP</span>
                                                                        @endif
                                                                    </td>
                                                                    
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pph-final" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Nomor Transaksi</th>
                                                                <th>Kode Objek Pajak</th>
                                                                <th>Jumlah Penghasilan Bruto</th>
                                                                <th>Jumlah Tarif</th>
                                                                <th>Jumlah Potongan PPH</th>
                                                                <th>Tanggal Pembuatan</th>
                                                                <th>Dibuat Oleh</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pphfinal as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->transaksi }}</td>
                                                                    <td>{{ $row->kode_objek_pajak }}</td>
                                                                    <td>{{ $row->bruto }}</td>
                                                                    <td>{{ $row->tarif }}</td>
                                                                    <td>{{ $row->potongan_pph }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                                    <td>{{ $row->users->name }}</td>
                                                                    <td >
                                                                        @if($row->attribute3==NULL)
                                                                        <div class="d-flex"><a class="badge badge-rounded badge-outline-danger">
                                                                            Belum Dibayar</a></div>
                                                                        @elseif($row->attribute3==1)
                                                                        <div class="d-flex">
                                                                            <a class="badge badge-rounded badge-outline-warning">
                                                                            Menunggu Pembayaran</a></div>
                                                                        @else
                                                                        <a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pph-tidakfinal" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Nomor Transaksi</th>
                                                                <th>Kode Objek Pajak</th>
                                                                <th>Jumlah Penghasilan Bruto</th>
                                                                <th>Jumlah Tarif</th>
                                                                <th>Pengenaan Pajak</th>
                                                                <th>Jumlah Potongan PPH</th>
                                                                <th>Tanggal Pembuatan</th>
                                                                <th>Dibuat Oleh</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pphtidakfinal as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->trx }}</td>
                                                                    <td>{{ $row->kode_objek_pajak }}</td>
                                                                    <td>{{ $row->bruto }}</td>
                                                                    <td>{{ $row->tarif_lebih_tinggi }}</td>
                                                                    <td>{{ $row->dasar_pengenaan_pajak }}</td>
                                                                    <td>{{ $row->potongan_pph }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                                    <td>{{ $row->users->name }}</td>
                                                                    <td >
                                                                        @if($row->attribute3==NULL)
                                                                        <div class="d-flex"><a class="badge badge-rounded badge-outline-danger">
                                                                            Belum Dibayar</a></div>
                                                                        @elseif($row->attribute3==1)
                                                                        <div class="d-flex">
                                                                            <a class="badge badge-rounded badge-outline-warning">
                                                                            Menunggu Pembayaran</a></div>
                                                                        @else
                                                                        <a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="e-bupot" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Nomor Transaksi</th>
                                                                <th>Jenis PPh</th>
                                                                <th>Nomor Telepone</th>
                                                                <th>Nama Jenis Fasilitas</th>
                                                                <th>Kode Objek</th>
                                                                <th>Nama Pembuat</th>
                                                                <th>Tgl Bukti Potong</th>
                                                                <th>Periode Pajak</th>
                                                                <th>Tgl Pembuatan</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ebupot as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->trx }}</td>
                                                                    <td>{{ $row->jenis_pph }}</td>
                                                                    <td>{{ $row->no_tlp }}</td>
                                                                    <td>{{ $row->fasilitas }}</td>
                                                                    <td>{{ $row->kode_objek_pajak }}</td>
                                                                    <td>{{ $row->users->name }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->tanggal_bukti_potong)) }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->periode_pajak)) }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                                    <td >
                                                                        @if($row->attribute3==NULL)
                                                                        <div class="d-flex"><a class="badge badge-rounded badge-outline-danger">
                                                                            Belum Dibayar</a></div>
                                                                        @elseif($row->attribute3==1)
                                                                        <div class="d-flex">
                                                                            <a class="badge badge-rounded badge-outline-warning">
                                                                            Menunggu Pembayaran</a></div>
                                                                        @else
                                                                        <a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div id="e-billing" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Billing</th>
                                                                <th>Nomor NPWP Terdaftar</th>
                                                                <th>Jenis Pajak</th>
                                                                <th>Jenis Setoran</th>
                                                                <th>Masa Pajak</th>
                                                                <th>Tanggal Masa Aktif</th>
                                                                <th>Jumlah</th>
                                                                <th>Dibuat Oleh</th>
                                                                <th>Tanggal Pembuatan</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($billing as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->kode_billing }}</td>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ $row->jenis_pajak }}</td>
                                                                    <td>{{ $row->kode_jenis_setoran }}</td>
                                                                    <td>{{ $row->masa_pajak }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->end_periode_pajak)) }}</td>
                                                                    <td>{{ $row->jumlah }}</td>
                                                                    <td>{{ $row->users->name }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                                    <td>
                                                                        @if($row->attribute3==NULL)
                                                                        <a class="badge badge-rounded badge-outline-warning">
                                                                            Menunggu Pembayaran</a>
                                                                        @else
                                                                        <a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>Penjualan</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#invoice" data-bs-toggle="tab" class="nav-link active show">Invoice</a>
                                        </li>
                                        <li class="nav-item"><a href="#e-Faktur" data-bs-toggle="tab" class="nav-link">E-Faktur</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="invoice" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Vendor Terdaftar</th>
                                                                    <th>Nomor Faktur Terdaftar</th>
                                                                    <th>Termin Pembayaran</th>
                                                                    <th>Nilai Transaksi</th>
                                                                    <th>Potongan Harga</th>
                                                                    <th>Jenis Pembayaran</th>
                                                                    <th>Tanggal Invoice</th>
                                                                    <th>Total PPN</th>
                                                                    <th>Dibuat Oleh</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($invoice as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->vendor->no_id_vendor }} - {{ $row->vendor->nama_vendor }}</td>
                                                                    <td>{{ $row->no_faktur }}</td>
                                                                    <td>{{ $row->termin_pembayaran }}</td>
                                                                    <td>{{ $row->nilai_transaksi }}</td>
                                                                    <td>{{ $row->potongan_harga }}</td>
                                                                    <td>{{ $row->informasi_pembayaran }}</td>
                                                                    <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                                                    <td >
                                                                        {{number_format($row->ppn,2)}}
                                                                    </td>
                                                                    <td>{{ $row->users->name }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="e-Faktur" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Vendor</th>
                                                                <th>Jenis Dokumen</th>
                                                                <th>Nomor Dokumen</th>
                                                                <th>Catatan</th>
                                                                <th>Tanggal Pembuatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($faktur as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->vendor->no_id_vendor }} - {{ $row->vendor->nama_vendor }}</td>
                                                                    <td>
                                                                        @if($row->jenis_dok==0)
                                                                        Faktur Pajak Normal
                                                                        @else
                                                                        Dokumen Lain
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $row->no_dok }}</td>
                                                                    <td>{{ $row->catatan }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
