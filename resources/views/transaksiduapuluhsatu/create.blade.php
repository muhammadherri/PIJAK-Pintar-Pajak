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
                    <li class="breadcrumb-item active"><a href="{{ route('transaksipph21') }}">PPH 21</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">CREATE</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PPH 21</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('transaksipph21/store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <h5>Personal</h5>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status NPWP</label>
                                            <div class="col-sm-9">
                                                <select onchange="toggleInput()" id="npwp"name="npwp"
                                                    class="default-select form-control wide">
                                                    <option value="0">NPWP</option>
                                                    <option value="1">Non NPWP</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="input_wajib_pajak" name="input_wajib_pajak" type="text"
                                                    class="form-control" placeholder="Masukkan Nama NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No NPWP</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="no_npwp" name="no_npwp" type="number" class="form-control"
                                                    placeholder="Masukkan Nomor NPWP">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status Pernikahan</label>
                                            <div class="col-sm-9">
                                                <select id="status_pernikahan" name="status_pernikahan"
                                                    class="default-select form-control wide">
                                                    <option selected value="0">Belum Menikah</option>
                                                    <option value="1">Sudah Menikah</option>
                                                    <option value="2">Berpisah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggungan</label>
                                            <div class="col-sm-9">
                                                <select id="tanggungan" name="tanggungan"
                                                    class="default-select form-control wide">
                                                    <option value="0" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa Penghasilan</label>
                                            <div class="col-sm-4">
                                                <input autocomplete="off" id="masa_penghasilan" name="masa_penghasilan" type="date"
                                                    class="form-control">
                                            </div>
                                            <label class="col-sm-1 col-form-label">s/d</label>

                                            <div class="col-sm-4">
                                                <input autocomplete="off" type="date" id="masa_penghasilan_end" name="masa_penghasilan_end"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <h5>Konfigurasi</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan Pajak</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input onchange="grossup()" id="gross_up" class="form-check-input"
                                                        type="radio" name="gross" value="1">
                                                    <label class="form-check-label">
                                                        Gross-Up
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input onchange="grossup()" id="nongross_up" class="form-check-input"
                                                        type="radio" name="gross" value="0"checked>
                                                    <label class="form-check-label">
                                                        Non Gross-Up
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Ketentuan PTKP</label>
                                            <div class="col-sm-9">
                                                <select id="ketentuan_ptkp" name="ketentuan_ptkp"
                                                    class="default-select form-control wide">
                                                    <option value="0" selected>Mulai</option>
                                                    <option value="1">Mulai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Ketentuan Tarif</label>
                                            <div class="col-sm-9">
                                                <select id="ketentuan_tarif" name="ketentuan_tarif"
                                                    class="default-select form-control wide">
                                                    <option value="0"selected>Tarif 2022</option>
                                                    <option value="1">Tarif Sebelum 2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h5>Penghasilan</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Gaji/Pensiun</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="gajidanpensiun" name="gajidanpensiun"
                                                    class="form-control" placeholder="Masukkan Gaji / Pensiun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan PPh</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="tunjangan_pph" name="tunjangan_pph" type="number"
                                                    class="form-control" placeholder="Masukkan Tunjangan PPh">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan Lain</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="tunjanganlain" name="tunjanganlain"
                                                    class="form-control"
                                                    placeholder="Masukkan Uang Lembur, dan sebagainya">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Honorarium</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="honorarium" name="honorarium"
                                                    class="form-control" placeholder="Masukkan Imbalan Lainnya">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Premi Asuransi</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="premi_asuransi" name="premi_asuransi"
                                                    class="form-control" placeholder="Masukkan Premi Asuransi">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Natura</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="natura" name="natura" class="form-control"
                                                    placeholder="Masukkan Natura">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tantiem</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="tantiem" name="tantiem" class="form-control"
                                                    placeholder="Masukkan Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Bruto</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="penghasilan_bruto" name="penghasilan_bruto"
                                                    class="form-control" placeholder="Masukkan Penghasilan Bruto">
                                            </div>
                                        </div>
                                        <h5>Pengurang</h5>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Biaya Jabatan</label>
                                            <div class="col-sm-9">
                                                <input readonly type="number" id="biaya_jabatan" name="biaya_jabatan"
                                                    class="form-control" placeholder="Masukkan Biaya Jabatan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Iuran Pensiun</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="iuran_pensiun" name="iuran_pensiun"
                                                    class="form-control"
                                                    placeholder="Masukkan Iuran Pensiun atau Iuran THT/JHT">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Total Pengurang</label>
                                            <div class="col-sm-9">
                                                <input readonly type="number" id="total_pengurang" name="total_pengurang"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <h5>Perhitungan PPh Pasal 21</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Netto</label>
                                            <div class="col-sm-9">
                                                <input readonly type="number" id="penghasilan_netto" name="penghasilan_netto"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Netto Masa Sebelumnya</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" type="number" id="penghasilan_netto_ms" name="penghasilan_netto_ms"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Netto Pertahun</label>
                                            <div class="col-sm-9">
                                                <input readonly type="number" id="netto_pertahun" name="netto_pertahun"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PTKP</label>
                                            <div class="col-sm-9">
                                                <select id="fasilitas"
                                                    name="fasilitas"class="default-select form-control wide">
                                                    {{-- @foreach ($fasilitas as $row)
                                                        <option value="{{ $row->id }}">
                                                            {{ $row->no }}-{{ $row->jenis_fasilitas }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="potongantarif1" name="potongantarif1"
                                                    class="form-control" placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="tarif1" name="tarif1" class="form-control"
                                                    placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" readonly type="number" id="totaltarif1" name="totaltarif1"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="potongantarif2" name="potongantarif2"
                                                    class="form-control" placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="tarif2" name="tarif2" class="form-control"
                                                    placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" readonly type="number" id="totaltarif2" name="totaltarif2"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="potongantarif3" name="potongantarif3"
                                                    class="form-control" placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="tarif3" name="tarif3" class="form-control"
                                                    placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" readonly type="number" id="totaltarif3" name="totaltarif3"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="potongantarif4" name="potongantarif4"
                                                    class="form-control" placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" type="number" id="tarif4" name="tarif4" class="form-control"
                                                    placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" readonly type="number" id="totaltarif4" name="totaltarif4"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPH 21 PKP</label>
                                          
                                            <div class="col-sm-9">
                                                <input autocomplete="off" readonly type="number" id="jumlahtotal" name="jumlahtotal"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPH 21 Potongan</label>
                                          
                                            <div class="col-sm-9">
                                                <input autocomplete="off" readonly type="number" id="pph21potongan" name="pph21potongan"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPH 21 Terutang</label>
                                          
                                            <div class="col-sm-9">
                                                <input autocomplete="off" readonly type="number" id="pph21terutang" name="pph21terutang"
                                                    class="form-control">
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
    document.addEventListener('DOMContentLoaded', function() {
        const inputpotongantarif1 = document.getElementById('potongantarif1');
        const inputtarif1 = document.getElementById('tarif1');
        const resulttotaltarif1 = document.getElementById('totaltarif1');

        const inputpotongantarif2 = document.getElementById('potongantarif2');
        const inputtarif2 = document.getElementById('tarif2');
        const resulttotaltarif2 = document.getElementById('totaltarif2');

        const inputpotongantarif3 = document.getElementById('potongantarif3');
        const inputtarif3 = document.getElementById('tarif3');
        const resulttotaltarif3 = document.getElementById('totaltarif3');

        const inputpotongantarif4 = document.getElementById('potongantarif4');
        const inputtarif4 = document.getElementById('tarif4');
        const resulttotaltarif4 = document.getElementById('totaltarif4');

        const resultjumlahtotal = document.getElementById('jumlahtotal');

        const biaya_jabatan = document.getElementById('biaya_jabatan');
        const iuran_pensiun = document.getElementById('iuran_pensiun');
        const resulttotal_pengurang = document.getElementById('total_pengurang');

        const inputgajipensiun = document.getElementById('gajidanpensiun');
        const resultbiaya_jabatan = document.getElementById('biaya_jabatan');

        const inputpenghasilan_bruto = document.getElementById('penghasilan_bruto');
        const resultpenghasilan_netto = document.getElementById('penghasilan_netto');
        const resultnetto_pertahun = document.getElementById('netto_pertahun');

        [inputpenghasilan_bruto,inputgajipensiun,biaya_jabatan,iuran_pensiun,inputpotongantarif1, inputtarif1, inputpotongantarif2, inputtarif2, inputpotongantarif3, inputtarif3,
            inputpotongantarif4, inputtarif4
        ].forEach(input => {
            input.addEventListener('input', updateResult);
        });

        function updateResult() {

            const gaji = parseFloat(inputgajipensiun.value) || 0;
            const biayajabatan = gaji*5/100;
            if(biayajabatan>='500000'){
                resultbiaya_jabatan.value = '500000';
            }else{
                resultbiaya_jabatan.value = biayajabatan;
            }

            const inputbiaya_jabatan = parseFloat(biaya_jabatan.value) || 0;
            const inputiuran_pensiun = parseFloat(iuran_pensiun.value) || 0;
            const resulttotpeng = inputbiaya_jabatan + inputiuran_pensiun;
            resulttotal_pengurang.value = resulttotpeng;

            const potongantarif1 = parseFloat(inputpotongantarif1.value) || 0;
            const tarif1 = parseFloat(inputtarif1.value) || 0;
            const potongandiskon1 = tarif1 * potongantarif1;
            const hasilpotongandiskon1 = potongandiskon1 / 100;
            const result1 = tarif1 - hasilpotongandiskon1;
            resulttotaltarif1.value = hasilpotongandiskon1;
            
            const potongantarif2 = parseFloat(inputpotongantarif2.value) || 0;
            const tarif2 = parseFloat(inputtarif2.value) || 0;
            const potongandiskon2 = tarif2 * potongantarif2;
            const hasilpotongandiskon2 = potongandiskon2 / 100;
            const result2 = tarif2 - hasilpotongandiskon2;
            resulttotaltarif2.value = hasilpotongandiskon2;

            const potongantarif3 = parseFloat(inputpotongantarif3.value) || 0;
            const tarif3 = parseFloat(inputtarif3.value) || 0;
            const potongandiskon3 = tarif3 * potongantarif3;
            const hasilpotongandiskon3 = potongandiskon3 / 100;
            const result3 = tarif3 - hasilpotongandiskon3;
            resulttotaltarif3.value = hasilpotongandiskon3;

            const potongantarif4 = parseFloat(inputpotongantarif4.value) || 0;
            const tarif4 = parseFloat(inputtarif4.value) || 0;
            const potongandiskon4 = tarif4 * potongantarif4;
            const hasilpotongandiskon4 = potongandiskon4 / 100;
            const result4 = tarif4 - hasilpotongandiskon4;
            resulttotaltarif4.value = hasilpotongandiskon4;
            resultjumlahtotal.value = hasilpotongandiskon1 + hasilpotongandiskon2 + hasilpotongandiskon3 + hasilpotongandiskon4;
            // resultjumlahtotal.value = result1 + result2 + result3 + result4;

            const penghasilan_bruto = parseFloat(inputpenghasilan_bruto.value) || 0;
            const resultnetto = penghasilan_bruto-resulttotpeng;
            
            if(resultnetto<='0'){
                resultpenghasilan_netto.value = '0';
                resultnetto_pertahun.value = '0';
            }else{
                resultpenghasilan_netto.value = resultnetto;
                resultnetto_pertahun.value = resultnetto*12;
            }
        }
    });

    function resetForm() {
        var input_wajib_pajak = document.getElementById("input_wajib_pajak");
        var no_npwp = document.getElementById("no_npwp");
        var status_pernikahan = document.getElementById("status_pernikahan");
        var tanggungan = document.getElementById("tanggungan");
        var masa_penghasilan = document.getElementById("masa_penghasilan");
        var masa_penghasilan_end = document.getElementById("masa_penghasilan_end");
        var ketentuan_ptkp = document.getElementById("ketentuan_ptkp");
        var ketentuan_tarif = document.getElementById("ketentuan_tarif");
        var gajidanpensiun = document.getElementById("gajidanpensiun");
        var tunjangan_pph = document.getElementById("tunjangan_pph");
        var tunjanganlain = document.getElementById("tunjanganlain");
        var honorarium = document.getElementById("honorarium");
        var premi_asuransi = document.getElementById("premi_asuransi");
        var natura = document.getElementById("natura");
        var tantiem = document.getElementById("tantiem");
        var penghasilan_bruto = document.getElementById("penghasilan_bruto");
        var biaya_jabatan = document.getElementById("biaya_jabatan");
        var iuran_pensiun = document.getElementById("iuran_pensiun");
        var penghasilan_netto_ms = document.getElementById("penghasilan_netto_ms");

        var potongantarif1 = document.getElementById("potongantarif1");
        var potongantarif2 = document.getElementById("potongantarif2");
        var potongantarif3 = document.getElementById("potongantarif3");
        var potongantarif4 = document.getElementById("potongantarif4");

        var tarif1 = document.getElementById("tarif1");
        var tarif2 = document.getElementById("tarif2");
        var tarif3 = document.getElementById("tarif3");
        var tarif4 = document.getElementById("tarif4");

        var totaltarif1 = document.getElementById("totaltarif1");
        var totaltarif2 = document.getElementById("totaltarif2");
        var totaltarif3 = document.getElementById("totaltarif3");
        var totaltarif4 = document.getElementById("totaltarif4");
        var jumlahtotal = document.getElementById("jumlahtotal");

        potongantarif1.value = '';
        tarif1.value = '';
        totaltarif1.value = '';

        potongantarif2.value = '';
        tarif2.value = '';
        totaltarif2.value = '';

        potongantarif3.value = '';
        tarif3.value = '';
        totaltarif3.value = '';

        potongantarif4.value = '';
        tarif4.value = '';
        totaltarif4.value = '';
        jumlahtotal.value = '';

        input_wajib_pajak.value = '';
        no_npwp.value = '';
        status_pernikahan.value = '';
        tanggungan.value = '';
        masa_penghasilan.value = '';
        masa_penghasilan_end.value = '';
        ketentuan_ptkp.value = '';
        ketentuan_tarif.value = '';
        gajidanpensiun.value = '';
        tunjangan_pph.value = '';
        tunjanganlain.value = '';
        honorarium.value = '';
        premi_asuransi.value = '';
        natura.value = '';
        tantiem.value = '';
        penghasilan_bruto.value = '';
        biaya_jabatan.value = '';
        iuran_pensiun.value = '';
    }

    function toggleInput() {
        var npwp = document.getElementById("npwp");
        var no_npwp = document.getElementById("no_npwp");
        console.log(npwp.value);

        if (npwp.value === "1") {
            no_npwp.disabled = true;
            no_npwp.value = '';
        } else {
            no_npwp.disabled = false;
        }
    }

    function grossup() {
        document.getElementById('gross_up').addEventListener('click', function() {
            console.log('tes disable');
            document.getElementById('tunjangan_pph').disabled = true;
            document.getElementById('tunjangan_pph').value = '';
        });
        document.getElementById('nongross_up').addEventListener('click', function() {

            console.log('tes enable');
            document.getElementById('tunjangan_pph').disabled = false;
        });
    }
</script>
