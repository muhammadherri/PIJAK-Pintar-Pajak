@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Transaksi
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pphtidakfinal') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pphtidakfinal') }}">PPH 21 Tidak Final</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21 Tidak Final</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('pphtidakfinal/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <div class="col-sm-12">
                                                    <select id="kop" name="kop"
                                                        class="dropdown-groups">
                                                        @foreach ($koptidakfinal as $row)
                                                            <option value="{{ $row->id }}">
                                                                {{ $row->kode_objek }} - {{ $row->penerima_penghasilan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <input required autocomplete="off" id="kop" name="kop"
                                                    type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Penghasilan Bruto</label>
                                            <div class="col-sm-9">
                                                <input onkeyup="this.value=separator(this.value);"
                                                 required autocomplete="off" id="bruto" name="bruto"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Penghasilan Bruto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Dasar Pengenaan Pajak</label>
                                            <div class="col-sm-9">
                                                <input required onkeyup="this.value=separator(this.value);" required autocomplete="off" id="pengenaan_pajak" name="pengenaan_pajak"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Dasar Pengenaan Pajak">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif Lebih Tinggi</label>
                                            <div class="col-xl-4 col-xxl-6 col-6">
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox" class="form-check-input" id="customCheckBox1">
                                                    <label class="form-check-label" for="customCheckBox1">Klik Centang</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-3">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="tarif1" name="tarif1"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="persen1" name="persen1"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input readonly autocomplete="off" id="hasil1" name="hasil1"
                                                    type="text" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="tarif2" name="tarif2"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="persen2" name="persen2"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input readonly autocomplete="off" id="hasil2" name="hasil2"
                                                    type="text" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="tarif3" name="tarif3"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="persen3" name="persen3"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input readonly autocomplete="off" id="hasil3" name="hasil3"
                                                    type="text" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="tarif4" name="tarif4"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required onkeyup="this.value=separator(this.value);" autocomplete="off" id="persen4" name="persen4"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input readonly autocomplete="off" id="hasil4" name="hasil4"
                                                    type="text" min="0" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                            <div class="col-sm-9">
                                                <input required onkeyup="this.value=separator(this.value);"  
                                                autocomplete="off" id="potongan_pph" name="potongan_pph"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Potongan PPH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-submit"name='action' value="create"
                                            id="add_all" onclick="resetForm()" type="button"><i
                                                data-feather='save'></i>
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
     function separator(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

        const tarif1 = $('#tarif1').val();
        retVal_tarif1 =tarif1 ? parseFloat(tarif1.replace(/,/g, '')) : 0;
        const persen1 = $('#persen1').val();
        retVal_persen1 =persen1 ? parseFloat(persen1.replace(/,/g, '')) : 0;
        const jumlah1 = retVal_tarif1*retVal_persen1/100;
        const resulthasil1 = document.getElementById('hasil1');
        resulthasil1.value = jumlah1.toLocaleString();

        const tarif2 = $('#tarif2').val();
        retVal_tarif2 =tarif2 ? parseFloat(tarif2.replace(/,/g, '')) : 0;
        const persen2 = $('#persen2').val();
        retVal_persen2 =persen2 ? parseFloat(persen2.replace(/,/g, '')) : 0;
        const jumlah2 = retVal_tarif2*retVal_persen2/100;
        const resulthasil2 = document.getElementById('hasil2');
        resulthasil2.value = jumlah2.toLocaleString();

        const tarif3 = $('#tarif3').val();
        retVal_tarif3 =tarif3 ? parseFloat(tarif3.replace(/,/g, '')) : 0;
        const persen3 = $('#persen3').val();
        retVal_persen3 =persen3 ? parseFloat(persen3.replace(/,/g, '')) : 0;
        const jumlah3 = retVal_tarif3*retVal_persen3/100;
        const resulthasil3 = document.getElementById('hasil3');
        resulthasil3.value = jumlah3.toLocaleString();

        const tarif4 = $('#tarif4').val();
        retVal_tarif4 =tarif4 ? parseFloat(tarif4.replace(/,/g, '')) : 0;
        const persen4 = $('#persen4').val();
        retVal_persen4 =persen4 ? parseFloat(persen4.replace(/,/g, '')) : 0;
        const jumlah4 = retVal_tarif4*retVal_persen4/100;
        const resulthasil4 = document.getElementById('hasil4');
        resulthasil4.value = jumlah4.toLocaleString();


        //apply formatting
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function resetForm() {
        var kop = document.getElementById("kop");
        var bruto = document.getElementById("bruto");
        var pengenaan_pajak = document.getElementById("pengenaan_pajak");
        var tarif1 = document.getElementById("tarif1");
        var tarif2 = document.getElementById("tarif2");
        var tarif3 = document.getElementById("tarif3");
        var tarif4 = document.getElementById("tarif4");
        var persen1 = document.getElementById("persen1");
        var persen2 = document.getElementById("persen2");
        var persen3 = document.getElementById("persen3");
        var persen4 = document.getElementById("persen4");
        var hasil1 = document.getElementById("hasil1");
        var hasil2 = document.getElementById("hasil2");
        var hasil3 = document.getElementById("hasil3");
        var hasil4 = document.getElementById("hasil4");
        var potongan_pph = document.getElementById("potongan_pph");

        kop.value = '';
        bruto.value = '';
        pengenaan_pajak.value = '';
        tarif1.value = '';
        tarif2.value = '';
        tarif3.value = '';
        tarif4.value = '';
        persen1.value = '';
        persen2.value = '';
        persen3.value = '';
        persen4.value = '';
        hasil1.value = '';
        hasil2.value = '';
        hasil3.value = '';
        hasil4.value = '';
        potongan_pph.value = '';
    };
</script>

