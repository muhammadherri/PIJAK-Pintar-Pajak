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
                                <form action="{{ route('pphtidakfinal/update',[$pphtidakfinal->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <select id="kop" name="kop"
                                                    class="dropdown-groups">
                                                    @foreach ($koptidakfinal as $row)
                                                        <option value="{{ $row->id }}"  {{$pphtidakfinal->kode_objek_pajak == $row->id ? 'selected' : '' }}>
                                                            {{ $row->kode_objek }} - {{ $row->penerima_penghasilan }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input required autocomplete="off" value="{{$pphtidakfinal->kode_objek_pajak}}" id="kop" name="kop"
                                                    type="text" class="form-control" placeholder="Masukkan Kode Objek Pajak"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Penghasilan Bruto</label>
                                            <div class="col-sm-9">
                                                <input required autocomplete="off"required onkeyup="this.value=addcommas(this.value);" value="{{number_format($pphtidakfinal->bruto)}}" id="bruto" name="bruto"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Penghasilan Bruto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Dasar Pengenaan Pajak</label>
                                            <div class="col-sm-9">
                                                <input required required onkeyup="this.value=addcommas(this.value);" autocomplete="off" value="{{number_format($pphtidakfinal->dasar_pengenaan_pajak)}}" id="pengenaan_pajak" name="pengenaan_pajak"
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
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="tarif1" name="tarif1" value="{{number_format($pphtidakfinal->tarif1)}}"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="persen1" name="persen1" value="{{number_format($pphtidakfinal->persen1)}}"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" id="hasil1" name="hasil1" value="{{number_format($pphtidakfinal->hasil1)}}"
                                                    type="text" min="0" class="form-control" placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="tarif2" name="tarif2" value="{{number_format($pphtidakfinal->tarif2)}}"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="persen2" name="persen2" value="{{number_format($pphtidakfinal->persen2)}}"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" id="hasil2" name="hasil2" value="{{number_format($pphtidakfinal->hasil2)}}"
                                                    type="text" min="0" class="form-control" placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="tarif3" name="tarif3" value="{{number_format($pphtidakfinal->tarif3)}}"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="persen3" name="persen3" value="{{number_format($pphtidakfinal->persen3)}}"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" id="hasil3" name="hasil3" value="{{number_format($pphtidakfinal->hasil3)}}"
                                                    type="text" min="0" class="form-control" placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="tarif4" name="tarif4" value="{{number_format($pphtidakfinal->tarif4)}}"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Tarif">
                                            </div>
                                            <div class="col-sm-2">
                                                <input required autocomplete="off" onkeyup="this.value=separator(this.value);" id="persen4" name="persen4" value="{{number_format($pphtidakfinal->persen4)}}"
                                                    type="text" min="0" class="form-control" placeholder="Persen">
                                            </div>
                                            <label class="col-sm-1 col-form-label">%</label>
                                            <div class="col-sm-3">
                                                <input required autocomplete="off" id="hasil4" name="hasil4" value="{{number_format($pphtidakfinal->hasil4)}}"
                                                    type="text" min="0" class="form-control" placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                            <div class="col-sm-9">
                                                <input required onkeyup="this.value=addcommas(this.value);" required autocomplete="off" value="{{number_format($pphtidakfinal->potongan_pph)}}" id="potongan_pph" name="potongan_pph"
                                                    type="text" min="0" class="form-control" placeholder="Masukkan Jumlah Potongan PPH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div></div>
                                        @if($pphtidakfinal->attribute3==2)
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
</script>
