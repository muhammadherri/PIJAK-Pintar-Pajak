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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
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
                                <form action="{{ route('billing/update',[$billing->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP</label>
                                            <div class="col-sm-9">
                                                <input min="0" maxlength="15" autocomplete="off" required id="npwp" name="npwp"
                                                   value="{{$billing->npwp}}" type="text" class="form-control" placeholder="Masukkan NPWP">
                                                {{-- <span id="errorText" style="color: red;"></span> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->nama}}" autocomplete="off" required id="nama" name="nama"
                                                    type="text" class="form-control" placeholder="Masukkan Nama">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->alamat}}" autocomplete="off" required id="alamat" name="alamat"
                                                    type="text" class="form-control" placeholder="Masukkan Alamat">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pajak</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_pajak" name="jenis_pajak" class="dropdown-groups">
                                                    @foreach ($jenispajak as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ $billing->jenis_pajak == $row->id ? 'selected' : '' }}>
                                                            {{ $row->kode }} - {{ $row->jenis_pajak }}</option>
                                                    @endforeach
                                                </select>           
                                                {{-- <input value="{{$billing->jenis_pajak}}" autocomplete="off" required id="jenis_pajak" name="jenis_pajak"
                                                    type="text" class="form-control" placeholder="Masukkan Jenis Pajak"> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Jenis Setoran</label>
                                            <div class="col-sm-9">
                                                {{-- <input value="{{$billing->kode_jenis_setoran}}" autocomplete="off" required id="kode_jenis_setoran"
                                                    name="kode_jenis_setoran" type="text" class="form-control"
                                                    placeholder="Masukkan Kode Jenis Setoran"> --}}
                                                <select id="kode_jenis_setoran" name="kode_jenis_setoran" class="dropdown-groups">
                                                    @foreach ($kjs as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ $billing->kode_jenis_setoran == $row->id ? 'selected' : '' }}>
                                                            {{ $row->kode }} - {{ $row->jenis_setoran }}</option>
                                                    @endforeach
                                                </select>           
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa Pajak</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->kode_jenis_setoran}}" autocomplete="off" required id="masa_pajak" name="masa_pajak"
                                                    type="text" class="form-control" placeholder="Masukkan Masa Pajak">
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
                                                <input value="{{$billing->start_periode_pajak}}" autocomplete="off" required id="start_periode_pajak"
                                                    name="start_periode_pajak" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Setor</label>
                                            <div class="col-sm-9">
                                                <input value="{{number_format($billing->jumlah)}}" min="0" autocomplete="off" required id="jumlah" name="jumlah"
                                                type="text" onkeyup="this.value=addcommas(this.value);" class="form-control" placeholder="Masukkan Jumlah Setor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->keterangan}}" autocomplete="off" required id="keterangan" name="keterangan"
                                                    type="text" class="form-control" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NPWP Penyetor</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->npwp_penyetor}}" min="0" maxlength="15" autocomplete="off" required id="npwp_penyetor" name="npwp_penyetor"
                                                    type="text" class="form-control" placeholder="Masukkan NPWP Penyetor">
                                                <span id="errorpenyetor" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Penyetor</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->nama_penyetor}}" autocomplete="off" required id="nama_penyetor" name="nama_penyetor"
                                                    type="text" class="form-control" placeholder="Masukkan Nama Penyetor">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No.Ref Tagihan</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->no_ref}}" autocomplete="off" required id="no_ref" name="no_ref"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan No Referensi Tagihan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Rekening</label>
                                            <div class="col-sm-9">
                                                <select id="no_rek" name="no_rek" class="dropdown-groups">
                                                    @foreach ($vendor as $row)
                                                        <option value="{{ $row->id }}"
                                                            {{ $billing->no_rek == $row->id ? 'selected' : '' }}>
                                                            {{ $row->attribute3 }} - {{ $row->nama_vendor }}</option>
                                                    @endforeach
                                                </select>                                            
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Akun</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->akun}}" autocomplete="off" required id="akun" name="akun"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode Akun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No SK</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->no_sk}}" autocomplete="off" required id="no_sk" name="no_sk"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Nomor SK">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NOP</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->nop}}"  autocomplete="off" required id="nop" name="nop"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode NOP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NTPN</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->ntpn}}" autocomplete="off" required id="ntpn" name="ntpn"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Kode NTPN">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NTB</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->ntb}}" autocomplete="off" required id="ntb" name="ntb"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode NTB">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">STAN</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->stan}}" autocomplete="off" required id="stan" name="stan"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Kode STAN">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                                            <div class="col-sm-9">
                                                <input value="{{$billing->jenis_pembayaran}}" autocomplete="off" required id="jenis_pembayaran" name="jenis_pembayaran"
                                                    type="text" class="form-control" placeholder="Masukkan Jenis Pembayaran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                       <div></div>
                                       @if($billing->attribute3==null)
                                       <button class="btn btn-primary btn-submit"name='action' value="create"
                                       id="add_all" type="submit"><i data-feather='save'></i>
                                       {{ 'Simpan' }}</button>
                                       @else

                                       @endif
                                      
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
    // document.addEventListener('DOMContentLoaded', function() {
    //     const inputElement = document.getElementById('npwp');
    //     const inputpenyetor = document.getElementById('npwp_penyetor');
    //     const errorText = document.getElementById('errorText');
    //     const errorpenyetor = document.getElementById('errorpenyetor');
    //     inputElement.addEventListener('input',function(){
    //         const inputValue = inputElement.value;
            
    //         if(inputValue.length > 15){
    //             inputElement.value = inputValue.slice(0,15);
    //             errorText.textContent = 'Maksimal 15 digit';
    //         }else{
    //             errorText.textContent = '';
    //         }
    //     })
    //     inputpenyetor.addEventListener('input',function(){
    //         const inputValue = inputpenyetor.value;
            
    //         if(inputValue.length > 15){
    //             inputpenyetor.value = inputValue.slice(0,15);
    //             errorpenyetor.textContent = 'Maksimal 15 digit';
    //         }else{
    //             errorpenyetor.textContent = '';
    //         }
    //     })

    // });
</script>