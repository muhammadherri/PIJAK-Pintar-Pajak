@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembayaran
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('billing') }}">Pembayaran</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('billing') }}">Billing</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Billing</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('billing/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP</label>
                                            <div class="col-sm-9">
                                                <input min="0" maxlength="15" autocomplete="off" required id="npwp" name="npwp"
                                                    type="number" class="form-control" placeholder="Masukkan NPWP">
                                                <span id="errorText" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nama" name="nama"
                                                    type="text" class="form-control" placeholder="Masukkan Nama">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="alamat" name="alamat"
                                                    type="text" class="form-control" placeholder="Masukkan Alamat">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="jenis_pajak" name="jenis_pajak"
                                                    type="number" class="form-control" placeholder="Masukkan Jenis Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Jenis Setoran</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="kode_jenis_setoran"
                                                    name="kode_jenis_setoran" type="number" class="form-control"
                                                    placeholder="Masukkan Kode Jenis Setoran">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="masa_pajak" name="masa_pajak"
                                                    type="number" class="form-control" placeholder="Masukkan Masa Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tahun Pajak</label>
                                            <div class="col-sm-9">
                                                @php
                                                    $tahunsekarang = date('Y');
                                                @endphp
                                                <input autocomplete="off" readonly required id="tahun_pajak" name="tahun_pajak"
                                                    type="number" class="form-control"value="{{$tahunsekarang}}" placeholder="{{$tahunsekarang}}">
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="start_periode_pajak"
                                                    name="start_periode_pajak" type="date" class="form-control">
                                            </div>
                                           
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Setor</label>
                                            <div class="col-sm-9">
                                                <input min="0" autocomplete="off" required id="jumlah" name="jumlah"
                                                type="number" class="form-control" placeholder="Masukkan Jumlah">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="keterangan" name="keterangan"
                                                    type="text" class="form-control" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP Penyetor</label>
                                            <div class="col-sm-9">
                                                <input min="0" maxlength="15" autocomplete="off" required id="npwp_penyetor" name="npwp_penyetor"
                                                    type="number" class="form-control" placeholder="Masukkan NPWP Penyetor">
                                                <span id="errorpenyetor" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Penyetor</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nama_penyetor" name="nama_penyetor"
                                                    type="text" class="form-control" placeholder="Masukkan Nama Penyetor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No.Ref Tagihan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="no_ref" name="no_ref"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan No Referensi Tagihan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Rekening</label>
                                            <div class="col-sm-9">
                                                <select id="no_rek" name="no_rek"
                                                class="default-select form-control wide">
                                                @foreach ($vendor as $row)
                                                    <option value="{{ $row->id }}">
                                                        {{ $row->attribute3 }} - {{ $row->nama_vendor }}</option>
                                                @endforeach
                                            </select>                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Akun</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="akun" name="akun"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode Akun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No SK</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="no_sk" name="no_sk"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Nomor SK">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NOP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nop" name="nop"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode NOP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NTPN</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="ntpn" name="ntpn"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Kode NTPN">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NTB</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="ntb" name="ntb"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode NTB">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">STAN</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="stan" name="stan"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode STAN">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="jenis_pembayaran" name="jenis_pembayaran"
                                                    type="text" class="form-control" placeholder="Masukkan Jenis Pembayaran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button onclick="resetForm()" class="btn btn-warning btn-submit"name='action'
                                            value="create" id="remove" type="button"><i data-feather='save'></i>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.getElementById('npwp');
        const inputpenyetor = document.getElementById('npwp_penyetor');
        const errorText = document.getElementById('errorText');
        const errorpenyetor = document.getElementById('errorpenyetor');
        inputElement.addEventListener('input',function(){
            const inputValue = inputElement.value;
            
            if(inputValue.length > 15){
                inputElement.value = inputValue.slice(0,15);
                errorText.textContent = 'Maksimal 15 digit';
            }else{
                errorText.textContent = '';
            }
        })
        inputpenyetor.addEventListener('input',function(){
            const inputValue = inputpenyetor.value;
            
            if(inputValue.length > 15){
                inputpenyetor.value = inputValue.slice(0,15);
                errorpenyetor.textContent = 'Maksimal 15 digit';
            }else{
                errorpenyetor.textContent = '';
            }
        })

    });
    function resetForm() {
        var npwp = document.getElementById("npwp");
        var nama = document.getElementById("nama");
        var alamat = document.getElementById("alamat");
        var jenis_pajak = document.getElementById("jenis_pajak");
        var kode_jenis_setoran = document.getElementById("kode_jenis_setoran");
        var masa_pajak = document.getElementById("masa_pajak");
        var tahun_pajak = document.getElementById("tahun_pajak");
        var start_periode_pajak = document.getElementById("start_periode_pajak");
        var jumlah = document.getElementById("jumlah");
        var keterangan = document.getElementById("keterangan");
        var npwp_penyetor = document.getElementById("npwp_penyetor");
        var nama_penyetor = document.getElementById("nama_penyetor");
       
        npwp.value = '';
        nama.value = '';
        alamat.value = '';
        jenis_pajak.value = '';
        kode_jenis_setoran.value = '';
        masa_pajak.value = '';
        tahun_pajak.value = '';
        start_periode_pajak.value = '';
        jumlah.value = '';
        keterangan.value = '';
        npwp_penyetor.value = '';
        nama_penyetor.value = '';
    }
</script>
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script>
