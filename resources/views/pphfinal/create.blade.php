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
                    <li class="breadcrumb-item"><a href="{{ route('pphfinal') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pphfinal') }}">PPH 21 Final</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21 Final</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('pphfinal/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <input required autocomplete="off" id="kop" name="kop"
                                                    type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Penghasilan Bruto</label>
                                            <div class="col-sm-9">
                                                <input required autocomplete="off" id="bruto" name="bruto"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Jumlah Penghasilan Bruto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-9">
                                                <input required autocomplete="off" id="tarif" name="tarif"
                                                    type="number" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                            <div class="col-sm-9">
                                                <input required autocomplete="off" id="potongan_pph" name="potongan_pph"
                                                {{-- <input required onkeyup="this.value=addcommas(this.value);" autocomplete="off" id="potongan_pph" name="potongan_pph" --}}
                                                    type="text" min="0" class="form-control separator" placeholder="Masukkan Jumlah Potongan PPH">
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
    function addcommas(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

        //apply formatting
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function resetForm() {
        var kop = document.getElementById("kop");
        var bruto = document.getElementById("bruto");
        var tarif = document.getElementById("tarif");
        var potongan_pph = document.getElementById("potongan_pph");

        kop.value = '';
        bruto.value = '';
        tarif.value = '';
        potongan_pph.value = '';
    };
</script>

