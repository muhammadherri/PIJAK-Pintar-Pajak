
@extends('layouts.admin')
<head>
    <link rel="icon" href="{{ asset('images/umlogo.png') }}">
</head>
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
                    <li class="breadcrumb-item active"><a href="{{ route('latihankeuangan') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('latihankeuangan') }}">Akun Latihan</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Akun Latihan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('latihankeuangan/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Akun</label>
                                            <div class="col-sm-9">
                                                <select id="noakun" name="noakun"
                                                class="dropdown-groups">
                                                @foreach ($akun as $row)
                                                    <option value="{{ $row->no_akun }}">{{ $row->no_akun }} - {{$row->nama_akun}}
                                                    </option>
                                                @endforeach
                                                </select>
                                                {{-- <input autocomplete="off" required id="noakun" name="noakun" type="number" class="form-control"
                                                    placeholder="Masukkan No Akun"> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Akun</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="namaakun" readonly class="form-control" name="namaakun" placeholder="Masukkan Nama Akun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Saldo</label>
                                            <div class="col-sm-9">
                                                <input min="0" step="any" autocomplete="off" required id="saldo" name="saldo" type="number" class="form-control"
                                                    placeholder="Masukkan saldo">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kategori Laporan Pajak</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="kategori_pajak" readonly class="form-control" name="kategori_pajak" placeholder="Masukkan Nama Kategori">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-submit"name='action' value="create"
                                            id="add_all" onclick="resetForm()" type="button"><i data-feather='save'></i>
                                            {{ 'Bersihkan' }}</button>
                                        <button class="btn btn-primary btn-submit"name='action' value="create"
                                            id="add_all" type="submit"><i data-feather='save'></i>
                                            {{ 'Simpan' }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#noakun').on('change', function() {
            let akun = $('#noakun').val();
            $.ajax({
                url: "{{ route('get.akun') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    akun: akun,
                },
                success: function(data) {
                    $('#kategori_pajak').empty();
                    $.each(data, function(key, value){
                        $('#kategori_pajak').val(value.keterangan);
                    });
                    $('#namaakun').empty();
                    $.each(data, function(key, value){
                        $('#namaakun').val(value.nama_akun);
                    });
                }
            });
        })});
        
    function resetForm() {
        var noakun = document.getElementById("noakun");
        var namaakun = document.getElementById("namaakun");
        var saldo = document.getElementById("saldo");

        noakun.value = '';
        namaakun.value = '';
        saldo.value = '';
    }
</script>