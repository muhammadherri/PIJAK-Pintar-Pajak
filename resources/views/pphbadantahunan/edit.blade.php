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
                    <li class="breadcrumb-item"><a href="{{ route('pphbadantahunan') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pphbadantahunan') }}">PPH 25/29</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 25/29</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('pphbadantahunan/update',[$pph->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Dasar Pengenaan Pajak</label>
                                            <div class="col-sm-9">
                                                <input required value="{{number_format($pph->dasar_pengenaan_pajak)}}" autocomplete="off" id="dasar_pengenaan_pajak" name="dasar_pengenaan_pajak"onkeyup="this.value=separator(this.value);" 
                                                    type="text" class="form-control" placeholder="Masukkan Dasar Pengenaan Pajak">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPh Terutang</label>
                                            <div class="col-sm-9">
                                                <select onchange="hide()" id="pph_terutang" name="pph_terutang"
                                                    class="dropdown-groups">
                                                        <option value="0">Pilih Tarif</option>
                                                        <option value="1">Tarif 31E</option>
                                                        <option value="2">Tarif Pasal 17(1)b</option>
                                                </select>               
                                            </div>
                                        </div>
                                    </div>
                                    <div id=hidden_dptfas style="display:none;">
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Mendapat Fasilitas</label>
                                                <div class="col-sm-9">
                                                    <input value="{{number_format($pph->mendapat_fasilitas)}}" onkeyup="this.value=separator(this.value);" autocomplete="off" id="mendapat_fasilitas" name="mendapat_fasilitas"
                                                    type="text" min="0" class="form-control separator" placeholder="Masukkan Mendapat Fasilitas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id=hidden_tdptfas style="display:none;">
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tidak Mendapat Fasilitas</label>
                                                <div class="col-sm-9">
                                                    <input value="{{number_format($pph->tidak_mendapat_fasilitas)}}" onkeyup="this.value=separator(this.value);" autocomplete="off" id="tidak_mendapat_fasilitas" name="tidak_mendapat_fasilitas"
                                                        type="text" min="0" class="form-control separator" placeholder="Masukkan Tidak Mendapat Fasilitas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id=hidden_dpp style="display:none;">
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">DPP</label>
                                                <div class="col-sm-9">
                                                    <input onkeyup="this.value=separator(this.value);" autocomplete="off" id="dpp" name="dpp"
                                                        type="text" min="0" class="form-control separator" placeholder="Masukkan Tidak Mendapat Fasilitas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id=hidden_hasildpp style="display:none;">
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <input readonly value="{{number_format($pph->dpp)}}" autocomplete="off" id="hasildpp" name="hasildpp"
                                                        type="text" min="0" class="form-control separator">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah PPh Terutang</label>
                                            <div class="col-sm-9">
                                                <input value="{{number_format($pph->jumlah_pph_terutang)}}" required onkeyup="this.value=separator(this.value);"  autocomplete="off" id="jumlahpph" name="jumlahpph"
                                                    type="text" min="0" class="form-control separator" placeholder="Masukkan Jumlah PPh Terutang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div></div>
                                        @if($pph->attribute3==2)
                                        @else
                                        <button class="btn btn-primary btn-submit"name='action' value="create"
                                            id="add_all" type="submit"><i data-feather='save'></i>
                                            {{ 'Simpan' }}</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#potongan_pph").on("input",function(){
            var value = $(this).val();
            value =value.replace(/\D/g,"");
            value = Number(value).toLocaleString();
            $(this).val(value);
        });
    });
    function hide() {
        var pph_terutang = document.getElementById("pph_terutang");
        var hidden_dptfas = document.getElementById("hidden_dptfas");
        var hidden_tdptfas = document.getElementById("hidden_tdptfas");
        var hidden_dpp = document.getElementById("hidden_dpp");
        var hidden_hasildpp = document.getElementById("hidden_hasildpp");
       
        if (pph_terutang.value === "1") {
            hidden_dptfas.style.display = 'block';
            hidden_tdptfas.style.display = 'block';
            hidden_dpp.style.display = 'none';
            hidden_hasildpp.style.display = 'none';
        }else if(pph_terutang.value === "2"){
            hidden_dptfas.style.display = 'none';
            hidden_tdptfas.style.display = 'none';
            hidden_dpp.style.display = 'block';
            hidden_hasildpp.style.display = 'block';
        }else{
            hidden_dptfas.style.display = 'none';
            hidden_tdptfas.style.display = 'none';
            hidden_dpp.style.display = 'none';
            hidden_hasildpp.style.display = 'none';
        }
    }
    function separator(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

        const dasar_pengenaan_pajak = $('#dasar_pengenaan_pajak').val();
        retVal_dasar_pengenaan_pajak =dasar_pengenaan_pajak ? parseFloat(dasar_pengenaan_pajak.replace(/,/g, '')) : 0;

        const mendapat_fasilitas = $('#mendapat_fasilitas').val();
        retVal_mendapat_fasilitas =mendapat_fasilitas ? parseFloat(mendapat_fasilitas.replace(/,/g, '')) : 0;
        
        const tidak_mendapat_fasilitas = $('#tidak_mendapat_fasilitas').val();
        retVal_tidak_mendapat_fasilitas =tidak_mendapat_fasilitas ? parseFloat(tidak_mendapat_fasilitas.replace(/,/g, '')) : 0;
        
        const jumlahpph = $('#jumlahpph').val();
        retVal_jumlahpph =jumlahpph ? parseFloat(jumlahpph.replace(/,/g, '')) : 0;
        
        const dpp = $('#dpp').val();
        retVal_dpp =dpp ? parseFloat(dpp.replace(/,/g, '')) : 0;
        
        const jumlahdpp = retVal_dpp*22/100;
        const result_hasildpp = document.getElementById('hasildpp');
        result_hasildpp.value = jumlahdpp.toLocaleString();

        //apply formatting
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function resetForm() {
        var dasar_pengenaan_pajak = document.getElementById("dasar_pengenaan_pajak");
        var mendapat_fasilitas = document.getElementById("mendapat_fasilitas");
        var tidak_mendapat_fasilitas = document.getElementById("tidak_mendapat_fasilitas");
        var dpp = document.getElementById("dpp");
        var hasildpp = document.getElementById("hasildpp");
        var jumlahpph = document.getElementById("jumlahpph");

        dasar_pengenaan_pajak.value = '';
        mendapat_fasilitas.value = '';
        tidak_mendapat_fasilitas.value = '';
        dpp.value = '';
        hasildpp.value = '';
        jumlahpph.value = '';
    };
</script>

