@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Pembelian
        </div>
    </div>
@endsection
@php
    $tahunsekarang = date('Y');
@endphp
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('prepopulates') }}">Pembelian</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('prepopulates') }}">Prepopulate</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPN Masuk</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('prepopulates/update',[$prep->id]) }}" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa PPn</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" value="{{ date('d-M-Y',strtotime($prep->masa_ppn))}}" required id="masa_ppn" name="masa_ppn"type="text" class="form-control"
                                                    placeholder="Masukkan Masa PPn">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tahun</label>
                                            <div class="col-sm-9">
                                                <select id="tahun" name="tahun"
                                                    class="default-select form-control wide">
                                                    <option value="{{ $tahunsekarang }}">Sekarang - {{ $tahunsekarang }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP</label>
                                            <div class="col-sm-9">
                                                <input value="{{$prep->npwp}}" autocomplete="off" min="0" required id="npwp" name="npwp" type="number" class="form-control"
                                                    placeholder="Masukkan NPWP">
                                                    <span id="errorText" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                            <div class="col-sm-9">
                                                <input value="{{$prep->nama_npwp}}" autocomplete="off" required id="nama_wajib_pajak" name="nama_wajib_pajak" type="text" class="form-control"
                                                    placeholder="Masukkan Nama Wajib Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat Wajib Pajak</label>
                                            <div class="col-sm-9">
                                                <input value="{{$prep->alamat_npwp}}" autocomplete="off" required id="alamat_wajib_pajak" name="alamat_wajib_pajak" type="text" class="form-control"
                                                    placeholder="Masukkan Alamat Wajib Pajak">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nomor Faktur</label>
                                            <div class="col-sm-9">
                                                <input value="{{$prep->no_faktur}}" autocomplete="off" required id="nomor_faktur" name="nomor_faktur" type="number" min="0" class="form-control"
                                                    placeholder="Masukkan Nomor Faktur">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah DPP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" onkeyup="this.value=sprator(this.value);"
                                                value="{{number_format($prep->jumlah_dpp)}}" required id="jumlah_dpp" 
                                                name="jumlah_dpp" type="text" min="0" class="form-control"
                                                    placeholder="Masukkan Jumlah DPP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah PPN</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" onkeyup="this.value=sprator(this.value);" 
                                                value="{{number_format($prep->jumlah_ppn)}}" required id="jumlah_ppn" 
                                                name="jumlah_ppn" type="text" min="0" class="form-control"
                                                    placeholder="Masukkan Jumlah PPN">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea autocomplete="off" value="{{$prep->keterangan}}" required id="keterangan" name="keterangan" type="text" class="form-control"
                                                    placeholder="Masukkan Keterangan">{{$prep->keterangan}}</textarea>
                                            </div>
                                        </div>
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
    function sprator(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
        
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    }
    document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.getElementById('npwp');
        const errorText = document.getElementById('errorText');
        inputElement.addEventListener('input',function(){
            const inputValue = inputElement.value;
            
            if(inputValue.length > 15){
                inputElement.value = inputValue.slice(0,15);
                errorText.textContent = 'Maksimal 15 digit';
            }else{
                errorText.textContent = '';
            }
        })
    });
    function resetForm() {
        var masa_ppn = document.getElementById("masa_ppn");
        var tahun = document.getElementById("tahun");
        var npwp = document.getElementById("npwp");
        var nama_wajib_pajak = document.getElementById("nama_wajib_pajak");
        var alamat_wajib_pajak = document.getElementById("alamat_wajib_pajak");
        var nomor_faktur = document.getElementById("nomor_faktur");
        var jumlah_dpp = document.getElementById("jumlah_dpp");
        var jumlah_ppn = document.getElementById("jumlah_ppn");
        var keterangan = document.getElementById("keterangan");

        masa_ppn.value = '';
        tahun.value = '';
        npwp.value = '';
        nama_wajib_pajak.value = '';
        alamat_wajib_pajak.value = '';
        nomor_faktur.value = '';
        jumlah_dpp.value = '';
        jumlah_ppn.value = '';
        keterangan.value = '';
    }
</script>
