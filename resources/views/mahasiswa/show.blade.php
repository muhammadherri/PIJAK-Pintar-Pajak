@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Riwayat Transaksi
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="m-b-0">{{$user->name}}</h5><span class="badge badge-primary">Mahasiswa</span>
                                    </div>
                                    <div class="col">
                                        <h5 class="m-b-0">{{$user->email}}</h5><span class="badge badge-primary">Email</span>
                                    </div>
                                    <div class="col">
                                        <h5 class="m-b-0">{{$timeDifferent}}</h5><span class="badge badge-primary">Terakhir Aktif</span>
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
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">PPh 21</a>
                                        </li>
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">E-Bupot</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Billing</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="my-posts" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
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
                                                                <td>
                                                                    {{ $no++ }}
                                                                </td>
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
                                        <div id="about-me" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Transaksi</th>
                                                                <th>Jenis PPh</th>
                                                                <th>No Telp</th>
                                                                <th>Fasilitas</th>
                                                                <th>Kode Objek</th>
                                                                <th>Tgl Bukti Potong</th>
                                                                <th>Periode Pajak</th>
                                                                <th>Tgl Pembuatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($ebupot as $key => $row)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $row->pilih_transaksi }}</td>
                                                                    <td>{{ $row->jenis_pph }}</td>
                                                                    <td>{{ $row->no_tlp }}</td>
                                                                    <td>{{ $row->fasilitas }}</td>
                                                                    <td>{{ $row->kode_objek_pajak }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->tanggal_bukti_potong)) }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->periode_pajak)) }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>ID Billing</th>
                                                                <th>Kode Akun Pajak</th>
                                                                <th>Kode Jenis Setoran</th>
                                                                <th>NPWP</th>
                                                                <th>Tanggal</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($billing as $key => $row)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $row->kode_billing }}</td>
                                                                    <td>{{ $row->kode_akun_pajak }}</td>
                                                                    <td>{{ $row->kode_jenis_setoran }}</td>
                                                                    <td>{{ $row->npwp }}</td>
                                                                    <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <form action="billing/{{ $row->id }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                                                        class="fa fa-trash"></i></button>
                                                                            </form>
                                                                            <a
                                                                                class="btn btn-primary shadow btn-xs sharp me-1"href="{{ route('billing/edit', $row->id) }}">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                            <a
                                                                                class="btn btn-success shadow btn-xs sharp me-1"href="{{ route('billing/show', $row->id) }}">
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
        </div>
    </div>
@endsection
