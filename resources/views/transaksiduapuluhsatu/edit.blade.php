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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
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
                                <form action="{{ route('transaksipph21/update', [$pph21->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
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
                                                <input value="{{$pph21->nama_wajib_pajak}}" required autocomplete="off" id="input_wajib_pajak" name="input_wajib_pajak"
                                                    type="text" class="form-control" placeholder="Masukkan Nama NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No NPWP</label>
                                            <div class="col-sm-9">
                                                <input required value="{{$pph21->no_npwp}}" autocomplete="off" id="no_npwp" name="no_npwp" type="number"
                                                    class="form-control" placeholder="Masukkan Nomor NPWP">
                                                    <span id="errorText" style="color: red;"></span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status Pernikahan</label>
                                            <div class="col-sm-9">
                                                <select id="status_pernikahan" name="status_pernikahan"
                                                    class="default-select form-control wide">
                                                    @foreach ($status_pernikahan as $row)
                                                        <option value="{{ $row->kode_ptkp }}" {{ $pph21->status_pernikahan == $row->kode_ptkp ? 'selected' : '' }}>
                                                            {{ $row->status_pernikahan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggungan</label>
                                            <div class="col-sm-9">
                                                <select id="tanggungan" name="tanggungan"
                                                    class="default-select form-control wide">
                                                    @foreach ($tanggungan as $row)
                                                        <option value="{{ $row->tanggungan }}"{{ $pph21->tanggungan == $row->tanggungan ? 'selected' : '' }}>{{ $row->tanggungan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa Penghasilan</label>
                                            <div class="col-sm-4">
                                                <input autocomplete="off" id="masa_penghasilan" name="masa_penghasilan"
                                                    type="date" class="form-control">
                                            </div>
                                            <label class="col-sm-1 col-form-label">s/d</label>

                                            <div class="col-sm-4">
                                                <input autocomplete="off" type="date" id="masa_penghasilan_end"
                                                    name="masa_penghasilan_end" class="form-control">
                                            </div>
                                        </div>
                                        <h5>Konfigurasi</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan Pajak</label>
                                            <div class="col-sm-9">
                                                <select onchange="tunjangan()" id="tunjangan_pajak"name="tunjangan_pajak"
                                                    class="default-select form-control wide">
                                                    <option value="0">Non Gross-up</option>
                                                    <option value="1">Gross-up</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Ketentuan PTKP</label>
                                            <div class="col-sm-9">
                                                <select id="ketentuan_ptkp" name="ketentuan_ptkp"
                                                    class="default-select form-control wide">
                                                    @php
                                                        $tahunsekarang = date('Y');
                                                    @endphp
                                                    {{-- @for ($tahun = $tahunsekarang; $tahun >= $tahunsekarang - 10; $tahun--) --}}
                                                    <option value="{{ $tahunsekarang }}">Sekarang - {{ $tahunsekarang }}
                                                    </option>
                                                    {{-- @endfor --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Ketentuan Tarif</label>
                                            <div class="col-sm-9">
                                                <select id="ketentuan_tarif" name="ketentuan_tarif"
                                                    class="default-select form-control wide">
                                                    <option value="{{ $tahunsekarang }}">{{ $tahunsekarang }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <h5>Penghasilan</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Gaji/Pensiun</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->gaji_pensiun}}" required min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="gajidanpensiun"
                                                    name="gajidanpensiun" class="form-control"
                                                    placeholder="Masukkan Gaji / Pensiun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan PPh</label>
                                            <div class="col-sm-9">
                                                <input required value="{{$pph21->tunjangan_pph}}" min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" id="tunjangan_pph" name="tunjangan_pph"
                                                    type="text" class="form-control"
                                                    placeholder="Masukkan Tunjangan PPh">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan Lain</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->tunjangan_lain}}" autocomplete="off" onkeyup="this.value=sprator(this.value);" type="text" id="tunjanganlain"
                                                    name="tunjanganlain" class="form-control"
                                                    placeholder="Masukkan Uang Lembur, dan sebagainya">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Honorarium</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->honorarium}}" required min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="honorarium"
                                                    name="honorarium" class="form-control"
                                                    placeholder="Masukkan Imbalan Lainnya">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Premi Asuransi</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->premi_asuransi}}" required min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="premi_asuransi"
                                                    name="premi_asuransi" class="form-control"
                                                    placeholder="Masukkan Premi Asuransi">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Natura</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->natura}}" required min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="natura" name="natura"
                                                    class="form-control" placeholder="Masukkan Natura">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tantiem</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->tantiem}}"  required min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="tantiem" name="tantiem"
                                                    class="form-control"
                                                    placeholder="Masukkan Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Bruto</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->penghasilan_bruto}}" value="{{$pph21->penghasilan_bruto}}" required min="0" readonly autocomplete="off" type="text" id="penghasilan_bruto"
                                                    name="penghasilan_bruto" class="form-control"
                                                    placeholder="Masukkan Penghasilan Bruto">
                                            </div>
                                        </div>
                                        <h5>Pengurang</h5>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Biaya Jabatan</label>
                                            <div class="col-sm-9">
                                                <input  value="{{$pph21->biaya_jabatan}}" required min="0" autocomplete="off" onkeyup="this.value=sprator(this.value);" type="text" id="biaya_jabatan" name="biaya_jabatan"
                                                    class="form-control" placeholder="Masukkan Biaya Jabatan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Iuran Pensiun</label>
                                            <div class="col-sm-9">
                                                <input  value="{{$pph21->tht_jht}}"  required min="0" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="iuran_pensiun"
                                                    name="iuran_pensiun" class="form-control"
                                                    placeholder="Masukkan Iuran Pensiun atau Iuran THT/JHT">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Total Pengurang</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->total_pengurangan}}" placeholder="Masukkan Total Pengurang" readonly type="text" id="total_pengurang"
                                                    name="total_pengurang" class="form-control">
                                            </div>
                                        </div>
                                        <h5>Perhitungan PPh Pasal 21</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Netto</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->penghasilan_netto}}" placeholder="Masukkan Penghasilan Netto" autocomplete="off" onkeyup="this.value=sprator(this.value);" type="text" id="penghasilan_netto"
                                                    name="penghasilan_netto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Netto Masa
                                                Sebelumnya</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->netto_massa}}" required min="0" onkeyup="this.value=sprator(this.value);" 
                                                placeholder="Masukkan Penghasilan Netto Masa Sebelumnya" autocomplete="off" 
                                                type="text" id="penghasilan_netto_ms"
                                                    name="penghasilan_netto_ms" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Netto Pertahun</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->netto_setahun}}" placeholder="Masukkan Netto Pertahun" autocomplete="off" 
                                                onkeyup="this.value=sprator(this.value);"
                                                 type="text" id="netto_pertahun" name="netto_pertahun"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PTKP</label>
                                            <div class="col-sm-9">
                                                <select id="pilih_ptkp" class="form-control" name="pilih_ptkp">
                                                    <option value="">Pilih Besaran PTKP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PKP</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->pkp}}" placeholder="Masukkan Nilai PKP" onkeyup="this.value=sprator(this.value);"
                                                 autocomplete="off" type="text" id="input_pkp" name="input_pkp"
                                                class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-3">
                                                <input required min="0" onkeyup="this.value=sprator(this.value);"
                                                 autocomplete="off" type="text" id="potongantarif1" value="{{$pph21->masukan_tarif1}}"
                                                    name="potongantarif1" class="form-control"
                                                    placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input required min="0" autocomplete="off" value="{{$pph21->pkp1}}"
                                                onkeyup="this.value=sprator(this.value);" type="text" id="tarif1" name="tarif1"
                                                    class="form-control" placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input value="{{$pph21->tarif1}}" autocomplete="off" readonly type="text" id="totaltarif1"
                                                    name="totaltarif1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required min="0" value="{{$pph21->masukan_tarif2}}" onkeyup="this.value=sprator(this.value);" autocomplete="off" type="text" id="potongantarif2"
                                                    name="potongantarif2" class="form-control"
                                                    placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input required min="0" value="{{$pph21->pkp2}}" autocomplete="off" onkeyup="this.value=sprator(this.value);"
                                                 type="text" id="tarif2" name="tarif2"
                                                    class="form-control" placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" value="{{$pph21->tarif2}}" readonly type="text" id="totaltarif2"
                                                    name="totaltarif2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required min="0" value="{{$pph21->masukan_tarif3}}" autocomplete="off" onkeyup="this.value=sprator(this.value);"
                                                 type="text" id="potongantarif3"
                                                    name="potongantarif3" class="form-control"
                                                    placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input required min="0" value="{{$pph21->pkp3}}" autocomplete="off" onkeyup="this.value=sprator(this.value);"
                                                 type="text" id="tarif3" name="tarif3"
                                                    class="form-control" placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" value="{{$pph21->tarif3}}" readonly type="text" id="totaltarif3"
                                                    name="totaltarif3" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <input required min="0" value="{{$pph21->masukan_tarif4}}" autocomplete="off" onkeyup="this.value=sprator(this.value);"
                                                 type="text" id="potongantarif4"
                                                    name="potongantarif4" class="form-control"
                                                    placeholder="Masukkan Tarif">
                                            </div>
                                            <div class="col-sm-3">
                                                <input required min="0" value="{{$pph21->pkp4}}" autocomplete="off" onkeyup="this.value=sprator(this.value);"
                                                 type="text" id="tarif4" name="tarif4"
                                                    class="form-control" placeholder="Masukkan PKP">
                                            </div>
                                            <div class="col-sm-3">
                                                <input autocomplete="off" value="{{$pph21->tarif4}}" readonly type="text" id="totaltarif4"
                                                    name="totaltarif4" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPH 21 PKP</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->pph21ataspkp}}" placeholder="Masukkan Nilai PPH 21 PKP" autocomplete="off" readonly type="text" id="jumlahtotal"
                                                    name="jumlahtotal" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPH 21 Potongan</label>
                                            <div class="col-sm-9">
                                                <input required min="0" value="{{$pph21->pph21_dipotong_sebelumnya}}" placeholder="Masukkan Nilai PPH 21 Potongan" onkeyup="this.value=sprator(this.value);"
                                                 autocomplete="off" type="text" id="pph21potongan"
                                                    name="pph21potongan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">PPH 21 Terutang</label>
                                            <div class="col-sm-9">
                                                <input value="{{$pph21->pph21_terutang}}" placeholder="Masukkan Nilai PPH 21 Terutang" autocomplete="off" readonly type="text" id="pph21terutang"
                                                    name="pph21terutang" class="form-control">
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
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    function sprator(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
        const gajidanpensiun = $('#gajidanpensiun').val();
        const tunjangan_pph = $('#tunjangan_pph').val();
        const tantiem = $('#tantiem').val();
        const natura = $('#natura').val();
        const premi_asuransi = $('#premi_asuransi').val();
        const honorarium = $('#honorarium').val();
        const tunjanganlain = $('#tunjanganlain').val();
        const resultpenghasilan_bruto = document.getElementById('penghasilan_bruto');

        const biaya_jabatan = $('#biaya_jabatan').val();
        const iuran_pensiun = $('#iuran_pensiun').val();
        const resulttotal_pengurang = document.getElementById('total_pengurang');

        const potongantarif1 = $('#potongantarif1').val();
        const tarif1 = $('#tarif1').val();
        const resulttotaltarif1 = document.getElementById('totaltarif1');

        const potongantarif2 = $('#potongantarif2').val();
        const tarif2 = $('#tarif2').val();
        const resulttotaltarif2 = document.getElementById('totaltarif2');

        const potongantarif3 = $('#potongantarif3').val();
        const tarif3 = $('#tarif3').val();
        const resulttotaltarif3 = document.getElementById('totaltarif3');

        const potongantarif4 = $('#potongantarif4').val();
        const tarif4 = $('#tarif4').val();
        const resulttotaltarif4 = document.getElementById('totaltarif4');

        const resultjumlahtotal = document.getElementById('jumlahtotal');
        
        const pph21potongan = $('#pph21potongan').val();
        const resultpph21terutang = document.getElementById('pph21terutang');

        retValgajidanpensiun =gajidanpensiun ? parseFloat(gajidanpensiun.replace(/,/g, '')) : 0;
        retValtunjangan_pph =tunjangan_pph ? parseFloat(tunjangan_pph.replace(/,/g, '')) : 0;
        retValtantiem =tantiem ? parseFloat(tantiem.replace(/,/g, '')) : 0;
        retValnatura =natura ? parseFloat(natura.replace(/,/g, '')) : 0;
        retValpremi_asuransi =premi_asuransi ? parseFloat(premi_asuransi.replace(/,/g, '')) : 0;
        retValhonorarium =honorarium ? parseFloat(honorarium.replace(/,/g, '')) : 0;
        retValtunjanganlain =tunjanganlain ? parseFloat(tunjanganlain.replace(/,/g, '')) : 0;
        
        retValbiaya_jabatan =biaya_jabatan ? parseFloat(biaya_jabatan.replace(/,/g, '')) : 0;
        retValiuran_pensiun =iuran_pensiun ? parseFloat(iuran_pensiun.replace(/,/g, '')) : 0;
        //apply formatting
        const hasil= retValgajidanpensiun+retValtunjangan_pph+retValtantiem+retValnatura+retValpremi_asuransi+retValhonorarium+retValtunjanganlain;
        resultpenghasilan_bruto.value = hasil.toLocaleString();
        
        const jumlahpengurang = retValbiaya_jabatan+retValiuran_pensiun;
        resulttotal_pengurang.value = jumlahpengurang.toLocaleString();

        retValpotongantarif1 =potongantarif1 ? parseFloat(potongantarif1.replace(/,/g, '')) : 0;
        retValinputtarif1 =tarif1 ? parseFloat(tarif1.replace(/,/g, '')) : 0;
        const hasiltarif1 = retValpotongantarif1*retValinputtarif1/100;
        resulttotaltarif1.value = hasiltarif1.toLocaleString();
        
        retValpotongantarif2 =potongantarif2 ? parseFloat(potongantarif2.replace(/,/g, '')) : 0;
        retValinputtarif2 =tarif2 ? parseFloat(tarif2.replace(/,/g, '')) : 0;
        const hasiltarif2 = retValpotongantarif2*retValinputtarif2/100;
        resulttotaltarif2.value = hasiltarif2.toLocaleString();

        retValpotongantarif3 =potongantarif3 ? parseFloat(potongantarif3.replace(/,/g, '')) : 0;
        retValinputtarif3 =tarif3 ? parseFloat(tarif3.replace(/,/g, '')) : 0;
        const hasiltarif3 = retValpotongantarif3*retValinputtarif3/100;
        resulttotaltarif3.value = hasiltarif3.toLocaleString();

        retValpotongantarif4 =potongantarif4 ? parseFloat(potongantarif4.replace(/,/g, '')) : 0;
        retValinputtarif4 =tarif4 ? parseFloat(tarif4.replace(/,/g, '')) : 0;
        const hasiltarif4 = retValpotongantarif4*retValinputtarif4/100;
        resulttotaltarif4.value = hasiltarif4.toLocaleString();
        
        const hasilpkp = hasiltarif1+hasiltarif2+hasiltarif3+hasiltarif4;
        resultjumlahtotal.value = hasilpkp.toLocaleString();
        
        retValpph21potongan =pph21potongan ? parseFloat(pph21potongan.replace(/,/g, '')) : 0;
        const hasilpotonganpkp = hasilpkp-retValpph21potongan;
        resultpph21terutang.value = hasilpotonganpkp.toLocaleString();

        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.getElementById('no_npwp');
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
   
    $(document).ready(function() {
        $('#tanggungan').on('change', function() {
            let tanggungan = $('#tanggungan').val();
            var status = $('#status_pernikahan').val();
            // var url = "/search/resultPtkp/" + status + tanggungan;
            $.ajax({
                // url: url,
                url: "{{ route('get.ptkp') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    tanggungan: tanggungan,
                    status: status,
                },
                success: function(data) {

                    $('#pilih_ptkp').empty();
                    $.each(data, function(key, value){
                        $('#pilih_ptkp').append($('<option>',{
                            value:value.besaran_ptkp,
                            text:value.besaran_ptkp,
                        }))
                    })
                }
            });
        });

    });
   
    function toggleInput() {
        var npwp = document.getElementById("npwp");
        var no_npwp = document.getElementById("no_npwp");
        // console.log(npwp.value);

        if (npwp.value === "1") {
            no_npwp.disabled = true;
            no_npwp.value = '';
        } else {
            no_npwp.disabled = false;
        }
    }
    function tunjangan() {
        var tunjangan_pajak = document.getElementById("tunjangan_pajak");
        var tunjangan_pph = document.getElementById("tunjangan_pph");
        // console.log(npwp.value);

        if (tunjangan_pajak.value === "1") {
            tunjangan_pph.disabled = true;
            tunjangan_pph.value = '';
        } else {
            tunjangan_pph.disabled = false;
        }
    }
    function grossup() {
        document.getElementById('gross_up').addEventListener('click', function() {
            document.getElementById('tunjangan_pph').disabled = true;
            document.getElementById('tunjangan_pph').value = '';
        });
        document.getElementById('nongross_up').addEventListener('click', function() {

            document.getElementById('tunjangan_pph').disabled = false;
        });
    }
</script>
