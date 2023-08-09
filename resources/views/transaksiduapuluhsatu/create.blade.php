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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">PPH 21</a></li>
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
                                <form>
                                    <div class="row">

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status NPWP</label>
                                            <div class="col-sm-9">
                                                <select onchange="toggleInput()" id="npwp"
                                                    class="default-select form-control wide">
                                                    <option value="0">NPWP</option>
                                                    <option value="1">Non NPWP</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Wajib Pajak</label>
                                            <div class="col-sm-9">
                                                <input id="input_wajib_pajak" type="text" class="form-control"
                                                    placeholder="Masukkan Nama NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No NPWP</label>
                                            <div class="col-sm-9">
                                                <input id="no_npwp" type="text" class="form-control"
                                                    placeholder="Masukkan Nomor NPWP">
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status Pernikahan</label>
                                            <div class="col-sm-9">
                                                <select id="inputState" class="default-select form-control wide">
                                                    <option selected>Belum Menikah</option>
                                                    <option>Sudah Menikah</option>
                                                    <option>Berpisah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggungan</label>
                                            <div class="col-sm-9">
                                                <select id="inputState" class="default-select form-control wide">
                                                    <option selected>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Masa Penghasilan</label>
                                            <div class="col-sm-4">
                                                <input id="mdate" type="date" class="form-control"
                                                    placeholder="1234 Main St">
                                            </div>
                                            <label class="col-sm-1 col-form-label">s/d</label>

                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan Pajak</label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input onchange="grossup()" id="gross_up" class="form-check-input" type="radio" name="gross"
                                                        value="1" >
                                                    <label class="form-check-label">
                                                        Gross-Up
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input onchange="grossup()" id="nongross_up" class="form-check-input" type="radio" name="gross"
                                                        value="0"checked>
                                                    <label class="form-check-label">
                                                        Non Gross-Up
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Ketentuan PTKP</label>
                                            <div class="col-sm-9">
                                                <select id="inputState" class="default-select form-control wide">
                                                    <option selected>Mulai</option>
                                                    <option>Mulai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Ketentuan Tarif</label>
                                            <div class="col-sm-9">
                                                <select id="inputState" class="default-select form-control wide">
                                                    <option selected>Tarif 2022</option>
                                                    <option>Tarif Sebelum 2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Gaji/Pensiun</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Gaji / Pensiun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan PPh</label>
                                            <div class="col-sm-9">
                                                <input id="tunjangan_pph" name="tunjangan_pph" type="text" class="form-control"
                                                    placeholder="Masukkan Tunjangan PPh">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tunjangan Lain</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Uang Lembur, dan sebagainya">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Honorarium</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Imbalan Lainnya">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Premi Asuransi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Premi Asuransi">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Natura</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Masukkan Natura">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tantiem</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Tantiem, Bonus, Gratifikasi, Jasa Produksi dan THR">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penghasilan Bruto</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Penghasilan Bruto">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Biaya Jabatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Biaya Jabatan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Iuran Pensiun</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Iuran Pensiun atau Iuran THT/JHT">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div></div>
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
