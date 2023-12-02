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
                                <h6 class="m-b-0">{{$user->nama_lengkap}}-{{$user->namakelas->nama_kelas}}</h6><span class="badge badge-primary">Mahasiswa</span>
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
                <div class="col-xl-12">
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
                                        <li class="nav-item"><a href="#pph-tahunan" data-bs-toggle="tab" class="nav-link">PPh 25/29</a>
                                        </li>
                                        
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
                                                                    <th>Nomor NPWP Terdaftar</th>
                                                                    <th>Masa Penghasilan</th>
                                                                    <th>Gaji Pensiun</th>
                                                                    <th>Penghasilan Bruto</th>
                                                                    <th>Total Pengurang</th>
                                                                    <th>Nilai PTKP</th>
                                                                    <th>PPh 21 PKP</th>
                                                                    <th>PPh 21 Potongan</th>
                                                                    <th>PPh 21 Terutang 1 Bulan</th>
                                                                    <th>PPh 21 Terutang 1 Tahun</th>
                                                                    <th>Status</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Status NPWP</th>
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
                                                                    <td>{{ number_format($row->gaji_pensiun) }}</td>
                                                                    <td>{{ number_format($row->penghasilan_bruto) }}</td>
                                                                    <td>{{ number_format($row->total_pengurangan) }}</td>
                                                                    <td>{{ number_format($row->ptkp) }}</td>
                                                                    <td>{{ number_format($row->pph21ataspkp) }}</td>
                                                                    <td>{{ number_format($row->pph21_dipotong_sebelumnya) }}</td>
                                                                    <td>{{ number_format($row->pph21_perbulan) }}</td>
                                                                    <td>{{ number_format($row->pph21_terutang) }}</td>
                                                                    <td>
                                                                        @if($row->status==null )
                                                                            <a class="badge badge-rounded badge-outline-danger">Belum Dibayar</a>
                                                                        @elseif($row->status==1)
                                                                            <a class="badge badge-rounded badge-outline-warning">Menunggu Pembayaran</a>
                                                                        @else
                                                                            <a class="badge badge-rounded badge-outline-primary">Sudah Dibayar</a>
                                                                        @endif
                                                                    </td>
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
                                        <div id="pph-tahunan" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>No Transaksi</th>
                                                                <th>Dasar Pengenaan Pajak</th>
                                                                <th>PPh Terutang</th>
                                                                <th>Mendapat Fasilitas</th>
                                                                <th>Tidak Mendapat Fasilitas</th>
                                                                <th>Jumlah DPP</th>
                                                                <th>Jumlah PPh Terutang</th>
                                                                <th>Status</th>
                                                                <th>Tanggal Pembuatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pphtahunan as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->trx }}</td>
                                                                    <td>{{ number_format($row->dasar_pengenaan_pajak) }}</td>
                                                                    <td>
                                                                        @if($row->pph_terutang==0)
                                                                            <a class="badge badge-rounded badge-outline-primary">Tarif 31E</a>
                                                                        @else
                                                                            <a class="badge badge-rounded badge-outline-primary">Tarif Pasal 17(1)b</a>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ number_format($row->mendapat_fasilitas) }}</td>
                                                                    <td>{{ number_format($row->tidak_mendapat_fasilitas )}}</td>
                                                                    <td>{{ number_format($row->dpp) }}</td>
                                                                    <td>{{ number_format($row->jumlah_pph_terutang) }}</td>
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>PENJUALAN</h4>
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
                                                                        {{number_format($row->ppn )}}
                                                                    </td>
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>PEMBELIAN</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#prepopulate" data-bs-toggle="tab" class="nav-link active show">Prepopulate</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="prepopulate" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nomor NPWP Terdaftar</th>
                                                                    <th>Nama Wajib Pajak</th>
                                                                    <th>Alamat Wajib Pajak</th>
                                                                    <th>Nomor Faktur</th>
                                                                    <th>Jumlah DPP</th>
                                                                    <th>Jumlah PPN</th>
                                                                    <th>Tahun</th>
                                                                    <th>Masa PPN Terdaftar</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($prepopulate as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ $row->nama_npwp }}</td>
                                                                    <td>{{ $row->alamat_npwp }}</td>
                                                                    <td>{{ $row->no_faktur }}</td>
                                                                    <td>{{ number_format($row->jumlah_dpp ) }}</td>
                                                                    <td>{{ number_format($row->jumlah_ppn ) }}</td>
                                                                    <td>{{ $row->tahun }}</td>
                                                                    <td>{{ date('d-m-Y',strtotime($row->masa_ppn)) }}</td>
                                                                    <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>PEMBAYARAN</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#hutangppn" data-bs-toggle="tab" class="nav-link active show">Hutang PPn</a>
                                        </li>
                                        <li class="nav-item"><a href="#e-billing" data-bs-toggle="tab" class="nav-link">Billing</a>
                                        </li>
                                        <li class="nav-item"><a href="#pembayaran" data-bs-toggle="tab" class="nav-link">Pembayaran</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="hutangppn" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nomor Transaksi</th>
                                                                    <th>Jumlah PPN Masuk</th>
                                                                    <th>Jumlah PPN Keluar</th>
                                                                    <th>Hutang PPN</th>
                                                                    <th>Tgl Pembuatan</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($hutangppn as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->trx }}</td>
                                                                    <td>{{ number_format($row->jumlah_ppn_masuk) }}</td>
                                                                    <td>{{ number_format($row->jumlah_ppn_keluar) }}</td>
                                                                    <td>{{ number_format($row->hutang_ppn) }}</td>
                                                                    <td>{{ $row->created_at->format('d-M-Y') }}</td>
                                                                    <td>
                                                                        @if($row->attribute3==null)
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
                                        </div>
                                        <div id="e-billing" class="tab-pane fade">
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
                                                                <th>Tanggal Pembuatan</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($billing as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->kode_billing }}</td>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ $row->jenispajak->kode}} - {{$row->jenispajak->jenis_pajak}}</td>
                                                                    <td>{{ $row->jenissetoran->kode}} - {{$row->jenissetoran->jenis_setoran}}</td>
                                                                    <td>{{ $row->masa_pajak }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->end_periode_pajak)) }}</td>
                                                                    <td>{{ number_format($row->jumlah) }}</td>
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
                                        </div>
                                        <div id="pembayaran" class="tab-pane fade">
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
                                                                <th>Tanggal Pembuatan</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($billing as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->kode_billing }}</td>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ $row->jenispajak->kode}} - {{$row->jenispajak->jenis_pajak}}</td>
                                                                    <td>{{ $row->jenissetoran->kode}} - {{$row->jenissetoran->jenis_setoran}}</td>
                                                                    <td>{{ $row->masa_pajak }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->end_periode_pajak)) }}</td>
                                                                    <td>{{ number_format($row->jumlah) }}</td>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>PELAPORAN</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#spt-badan" data-bs-toggle="tab" class="nav-link active show">1771</a>
                                        </li>
                                        <li class="nav-item"><a href="#spt-masa" data-bs-toggle="tab" class="nav-link">1721</a>
                                        </li>
                                        <li class="nav-item"><a href="#spt-PPN" data-bs-toggle="tab" class="nav-link">1111</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="spt-badan" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama NPWP SPT Badan</th>
                                                                    <th>Nomor NPWP SPT Badan</th>
                                                                    <th>Nama Jenis Usaha SPT Badan</th>
                                                                    <th>Nomor Telepon</th>
                                                                    <th>Tahun Pajak</th>
                                                                    <th>Tanggal Pembukuan</th>
                                                                    <th>Laporan Keuangan</th>
                                                                    <th>Nama Negara Domisili</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($spt1771 as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->nama_npwp }}</td>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ $row->jenis_usaha }}</td>
                                                                    <td>{{ $row->no_telp }}</td>
                                                                    <td>{{ $row->tahun_pajak }}</td>
                                                                    <td>{{ $row->end_periode_pembukuan}}</td>
                                                                    <td>{{ number_format($row->laporan_keuangan) }}</td>
                                                                    <td>{{ $row->negara_domisili }}</td>
                                                                    <td>{{ $row->created_at->format('d-M-Y') }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a class="btn btn-success shadow btn-xs sharp" href="{{ route('spttahunan/show', $row->formulir_id) }}">
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
                                        <div id="spt-masa" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama NPWP SPT Badan</th>
                                                                    <th>Nomor NPWP SPT Badan</th>
                                                                    <th>Alamat Lengkap SPT Badan</th>
                                                                    <th>Masa Pajak Bulan</th>
                                                                    <th>Masa Pajak Tahun</th>
                                                                    <th>Tempat Tinggal SPT Badan</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($spt1721 as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->nama }}</td>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ $row->alamat }}</td>
                                                                    <td>{{ $row->bulan->nama_bulan }}</td>
                                                                    <td>{{ $row->masa_pajak_tahun }}</td>
                                                                    <td>{{ $row->tempat_ttd}}</td>
                                                                    <td>{{ $row->created_at->format('d-M-Y') }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a class="btn btn-success shadow btn-xs sharp" href="{{ route('sptmasapajak/show', $row->formulir_id) }}">
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
                                        <div id="spt-PPN" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Tertera PKP</th>
                                                                    <th>Alamat Lengkap Tertera</th>
                                                                    <th>Nomor Telp</th>
                                                                    <th>Nomor KLU</th>
                                                                    <th>Nomor NPWP</th>
                                                                    <th>Tanggal Mulai Masa</th>
                                                                    <th>Tanggal Akhir Masa</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($spt1111 as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->nama_ptkp_1111 }}</td>
                                                                    <td>{{ $row->alamat_1111 }}</td>
                                                                    <td>{{ $row->no_telp_1111 }}</td>
                                                                    <td>{{ $row->no_klu_1111 }}</td>
                                                                    <td>{{ $row->no_npwp_1111 }}</td>
                                                                    <td>{{ $row->start_masa_1111}}</td>
                                                                    <td>{{ $row->end_masa_1111}}</td>
                                                                    <td>{{ $row->created_at->format('d-M-Y') }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a class="btn btn-success shadow btn-xs sharp" href="{{ route('sptPPN/show', $row->formulir_id) }}">
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>PELAPORAN PRIBADI</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#spt-1770S" data-bs-toggle="tab" class="nav-link active show">1770S</a>
                                        </li>
                                        <li class="nav-item"><a href="#spt-1770SS" data-bs-toggle="tab" class="nav-link">1770SS</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="spt-1770S" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nomor NPWP</th>
                                                                    <th>Nama NPWP</th>
                                                                    <th>Pekerjaan</th>
                                                                    <th>Nomor KLU</th>
                                                                    <th>Nomor Telp</th>
                                                                    <th>Status Kewajiban</th>
                                                                    <th>NPWP Pasangan</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($spt1770s as $key => $row)
                                                                    <tr>
                                                                        <td>{{ $row->npwp }}</td>
                                                                        <td>{{ $row->nama_npwp }}</td>
                                                                        <td>{{ $row->pekerjaan }}</td>
                                                                        <td>{{ $row->klu }}</td>
                                                                        <td>{{ $row->no_telp }}</td>
                                                                        <td>
                                                                            @if($row->status_kewajiban==0)
                                                                                <div class="d-flex"><a class="badge badge-rounded badge-outline-primary">KK</a></div>
                                                                            @elseif($row->status_kewajiban==1)
                                                                                <div class="d-flex"><a class="badge badge-rounded badge-outline-primary">HB</a></div>
                                                                            @elseif($row->status_kewajiban==2)
                                                                                <div class="d-flex"><a class="badge badge-rounded badge-outline-primary">PH</a></div>
                                                                            @else
                                                                                <div class="d-flex"><a class="badge badge-rounded badge-outline-primary">MT</a></div>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $row->npwp_pasangan}}</td>
                                                                        <td>{{ $row->created_at->format('d-M-Y') }}</td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <a class="btn btn-success shadow btn-xs sharp" href="{{ route('sptS/show', $row->formulir_id) }}">
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
                                        <div id="spt-1770SS" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nomor NPWP</th>
                                                                    <th>Nama NPWP</th>
                                                                    <th>Penghasilan Kena Pajak</th>
                                                                    <th>Jumlah Pajak</th>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($spt1770ss as $key => $row)
                                                                <tr>
                                                                    <td>{{ $row->id_npwp }}</td>
                                                                    <td>{{ $row->id_nama_npwp }}</td>
                                                                    <td>{{ number_format($row->a4_pajak) }}</td>
                                                                    <td>{{ number_format($row->a7_jumlah_pajak) }}</td>
                                                                    <td>{{ $row->created_at->format('d-M-Y') }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a class="btn btn-success shadow btn-xs sharp" href="{{ route('sptSS/show', $row->formulir_id) }}">
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>FISKAL LATIHAN</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#neraca" data-bs-toggle="tab" class="nav-link active show">Neraca</a>
                                        </li>
                                        <li class="nav-item"><a href="#labarugi" data-bs-toggle="tab" class="nav-link">Laba-Rugi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="neraca" class="tab-pane fade active show">
                                            <br>
                                            <form action="{{ url('printpdflatihanneracafiskalshow') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name='user_id' value="{{$user->id}}">
                                                <button type="submit" class="btn btn-primary">Neraca PDF</button>
                                            </form>
                                        </div>
                                        <div id="labarugi" class="tab-pane fade">
                                            <br>
                                            <form action="{{ url('printpdflatihanneracafiskalshow') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name='user_id' value="{{$user->id}}">
                                                <button type="submit" class="btn btn-primary">Laba-Rugi PDF</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="text-center">
                                        <h4>FISKAL TES</h4>
                                    </div>
                                    <hr>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#neracates" data-bs-toggle="tab" class="nav-link active show">Neraca</a>
                                        </li>
                                        <li class="nav-item"><a href="#labarugites" data-bs-toggle="tab" class="nav-link">Laba-Rugi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="neracates" class="tab-pane fade active show">
                                            <br>
                                            <form action="{{ url('printpdfneracafiskalshow') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name='user_id' value="{{$user->id}}">
                                                <button type="submit" class="btn btn-primary">Neraca PDF</button>
                                            </form>
                                        </div>
                                        <div id="labarugites" class="tab-pane fade">
                                            <br>
                                            <form action="{{ url('printpdflabarugifiskalshow') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name='user_id' value="{{$user->id}}">
                                                <button type="submit" class="btn btn-primary">Laba-Rugi PDF</button>
                                            </form>
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
