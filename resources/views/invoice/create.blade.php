@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Penjualan
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">INVOICE</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">CREATE</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-sales-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-sales" type="button" role="tab"
                                            aria-controls="nav-sales" aria-selected="true">
                                            <span class="bs-stepper-box"> Invoice<i data-feather="shopping-bag"
                                                    class="font-medium-3"></i></span></button>
                                        <button class="nav-link" id="nav-priceList-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-priceList" type="button" role="tab"
                                            aria-controls="nav-priceList" aria-selected="false">
                                            <span class="bs-stepper-box">e-Faktur
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                        </button>

                                    </div>
                                </nav>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="tab-content" id="nav-tabContent">
                                    {{-- TAB INVOICE --}}
                                    <div class="tab-pane fade show active" id="nav-sales" role="tabpanel"
                                        aria-labelledby="nav-sales-tab">
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pembeli</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_pph" class="default-select form-control wide">
                                                            <option value="0">pembeli</option>
                                                            <option value="1">pembeli</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h5 class="card-title">Detil Faktur</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">No. Faktur Komersial</label>
                                                    <div class="col-sm-9">
                                                        <input id="transaksi_npwp" type="text" class="form-control"
                                                            placeholder="Masukkan No. Faktur Komersial">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tanggak Faktur</label>
                                                    <div class="col-sm-3">
                                                        <input id="transaksi_npwp" type="date" class="form-control"
                                                            placeholder="Masukkan No. Faktur Komersial">
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">Jatuh Tempo</label>
                                                    <div class="col-sm-3">
                                                        <input id="transaksi_npwp" type="date" class="form-control"
                                                            placeholder="Masukkan No. Faktur Komersial">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Termin Pembayaran</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_pph" class="default-select form-control wide">
                                                            <option value="0">Normal</option>
                                                            <option value="1">Uang Muka</option>
                                                            <option value="2">Pelunasan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>
                                                <table id="invoicetable">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                            <th></th>
                                                            <th>Kuantitas</th>
                                                            <th></th>
                                                            <th>Harga Satuan</th>
                                                            <th></th>
                                                            <th>Total Diskon</th>
                                                            <th></th>
                                                            <th>Total Harga</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="sales_order_detail_container">
                                                        <tr>
                                                            <td width="auto">
                                                                <select name="column1[]" id="jenis_pph"
                                                                    class="default-select form-control wide">
                                                                    <option value="0">nama barang</option>
                                                                    <option value="1">nama barang</option>
                                                                </select>
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td><input type="number" id="kuantitas" name="column2[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td><input id="hargasatuan" type="number" name="column3[]"
                                                                    class="form-control"></td>
                                                            <td width="2%"></td>
                                                            <td><input id="totaldiskon" type="number" name="column4[]"
                                                                    class="form-control"></td>
                                                            <td width="2%"></td>
                                                            <td>
                                                                <input readonly id="totalharga" type="number"
                                                                    name="column4[]" class="form-control">
                                                                </span>
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td><button type="button"
                                                                    class="btn btn-light btn-submit">X</button></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <div class="d-flex justify-content-between">
                                                    <div></div>
                                                    <button class="btn btn-primary btn-submit"name='action'
                                                        value="create" id="addRowinvoice" type="button"><i
                                                            data-feather='save'></i>
                                                        {{ 'Tambah Item' }}</button>
                                                </div>
                                                <p></p>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-6 col-form-label"></label>
                                                    <label class="col-sm-3 col-form-label">Nilai Transaksi</label>
                                                    <div class="col-sm-3">
                                                        <input readonly id="nilaitransaksi" type="number"
                                                            name="column4[]" class="form-control">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-6 col-form-label"></label>
                                                    <label class="col-sm-3 col-form-label">Potongan Harga</label>
                                                    <div class="col-sm-3">
                                                        <input readonly id="potonganharga" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-6 col-form-label"></label>
                                                    <label class="col-sm-3 col-form-label">Total</label>
                                                    <div class="col-sm-3">
                                                        <input readonly id="nilaitransaksi" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-3 col-form-label">Catatan</label>
                                                        <textarea placeholder="Silakan masukkan catatan untuk pembeli Anda..." class="form-control" rows="4"
                                                            id="comment"></textarea>
                                                    </div>

                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-3 col-form-label">Informasi Pembayaran</label>
                                                        <textarea placeholder="Contoh:Harap pembayaran dilakukan ke Rekening BCA..." class="form-control" rows="4"
                                                            id="comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div></div>
                                                    <button class="btn btn-primary btn-submit"name='action'
                                                        value="create" id="add_all" type="submit"><i
                                                            data-feather='save'></i>
                                                        {{ 'Simpan' }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- TAB INVOICE --}}
                                    {{-- TAB E-FAKTUR --}}
                                    <div class="tab-pane fade" id="nav-priceList" role="tabpanel"
                                        aria-labelledby="nav-priceList-tab">
                                        <form action="">
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Pembeli</label>
                                                    <div class="col-sm-9">
                                                        <select id="jenis_pph" class="default-select form-control wide">
                                                            <option value="0">pembeli</option>
                                                            <option value="1">pembeli</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h5 class="card-title">Pengaturan Faktur Pajak</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input id="fakturpajaknormal" class="form-check-input"
                                                                type="radio" name="jenisdokumen" value="1"
                                                                checked>
                                                            <label class="form-check-label">
                                                                Faktur Pajak Normal
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input id="dokumenlainlain" class="form-check-input"
                                                                type="radio" name="jenisdokumen" value="0">
                                                            <label class="form-check-label">
                                                                Dokumen Lain
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hiddendokumen" style="display:none;" class="mb-3 row">
                                                    {{-- <label class="col-sm-3 col-form-label">Jenis Dokumen Lain</label> --}}
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input id="dokumenfakturpajak" class="form-check-input"
                                                                type="radio" name="dokumenlainlain" value="1"
                                                                checked>
                                                            <label class="form-check-label">
                                                                Faktur Pajak
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input id="barangekspor" class="form-check-input"
                                                                type="radio" name="dokumenlainlain" value="0">
                                                            <label class="form-check-label">
                                                                Ekspor Barang (PEB)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">No Seri Faktur</label>
                                                    <div class="col-sm-3">
                                                        <select id="jenis_pph" class="default-select form-control wide">
                                                            <option value="0">Seri 1</option>
                                                            <option value="1">Seri 2</option>
                                                            <option value="2">Seri 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" id="kode" name="kode[]"
                                                                    class="form-control" placeholder="Masukkan No Dokumen...">
                                                    </div>
                                                    
                                                </div>
                                                <p></p>
                                                <table id="efakturtable">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                            <th></th>
                                                            <th>Kuantitas</th>
                                                            <th></th>
                                                            <th>Harga Satuan</th>
                                                            <th></th>
                                                            <th>Total Diskon</th>
                                                            <th></th>
                                                            <th>Total Harga</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="sales_order_detail_container">
                                                        <tr>
                                                            <td width="auto">
                                                                <select name="column1[]" id="jenis_pph"
                                                                    class="default-select form-control wide">
                                                                    <option value="0">nama barang</option>
                                                                    <option value="1">nama barang</option>
                                                                </select>
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td><input type="number" id="kuantitas" name="column2[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td><input id="hargasatuan" type="number" name="column3[]"
                                                                    class="form-control"></td>
                                                            <td width="2%"></td>
                                                            <td><input id="totaldiskon" type="number" name="column4[]"
                                                                    class="form-control"></td>
                                                            <td width="2%"></td>
                                                            <td>
                                                                <input readonly id="totalharga" type="number"
                                                                    name="column4[]" class="form-control">
                                                                </span>
                                                            </td>
                                                            <td width="2%"></td>
                                                            <td><button type="button"
                                                                    class="btn btn-light btn-submit">X</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p></p>
                                                <div class="d-flex justify-content-between">
                                                    <div></div>
                                                    <button class="btn btn-primary btn-submit"name='action'
                                                        value="create" id="addRowefaktur" type="button"><i
                                                            data-feather='save'></i>
                                                        {{ 'Tambah Item' }}</button>
                                                </div>
                                                <p></p>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-12">
                                                        <label class="col-sm-3 col-form-label">Catatan</label>
                                                        <textarea placeholder="Silakan masukkan catatan untuk pembeli Anda..." class="form-control" rows="4"
                                                            id="comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div></div>
                                                    <button class="btn btn-primary btn-submit"name='action'
                                                        value="create" id="add_all" type="submit"><i
                                                            data-feather='save'></i>
                                                        {{ 'Simpan' }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- TAB E-FAKTUR --}}
                                </div>

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
    document.addEventListener('DOMContentLoaded', function() {
        const fakturpajaknormal = document.getElementById('fakturpajaknormal');
        const dokumenlainlain = document.getElementById('dokumenlainlain');
        const hiddendokumen = document.getElementById('hiddendokumen');

        dokumenlainlain.addEventListener('click', function() {
            hiddendokumen.style.display = 'block';
        });

        fakturpajaknormal.addEventListener('click', function() {
            hiddendokumen.style.display = 'none';
        });
    });
    $(document).ready(function() {
        $("#addRowinvoice").click(function() {
            var newRow = `
            <tr>
                <td width="auto">
                    <select name="column1[]" id="jenis_pph"
                        class="default-select form-control wide">
                        <option value="0">nama barang</option>
                        <option value="1">nama barang</option>
                    </select>
                </td>
                <td width="2%"></td>
                <td><input type="number" id="kuantitas" name="column2[]"
                        class="form-control">
                </td>
                <td width="2%"></td>
                <td><input id="hargasatuan" type="number" name="column3[]"
                        class="form-control"></td>
                <td width="2%"></td>
                <td><input id="totaldiskon" type="number" name="column4[]"
                        class="form-control"></td>
                <td width="2%"></td>
                <td>
                    <input readonly id="totalharga" type="number"
                        name="column4[]" class="form-control">
                    </span>
                </td>
                <td width="2%"></td>
            </tr>
            `;
            $("#invoicetable tbody").append(newRow);
        });

        $("table").on("click", ".remove", function() {
            $(this).closest("tr").remove();
        });
    });
    $(document).ready(function() {
        $("#addRowefaktur").click(function() {
            var newRow = `
            <tr>
                <td width="auto">
                    <select name="column1[]" id="jenis_pph"
                        class="default-select form-control wide">
                        <option value="0">nama barang</option>
                        <option value="1">nama barang</option>
                    </select>
                </td>
                <td width="2%"></td>
                <td><input type="number" id="kuantitas" name="column2[]"
                        class="form-control">
                </td>
                <td width="2%"></td>
                <td><input id="hargasatuan" type="number" name="column3[]"
                        class="form-control"></td>
                <td width="2%"></td>
                <td><input id="totaldiskon" type="number" name="column4[]"
                        class="form-control"></td>
                <td width="2%"></td>
                <td>
                    <input readonly id="totalharga" type="number"
                        name="column4[]" class="form-control">
                    </span>
                </td>
                <td width="2%"></td>
            </tr>
            `;
            $("#efakturtable tbody").append(newRow);
        });

        $("table").on("click", ".remove", function() {
            $(this).closest("tr").remove();
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const input1 = document.getElementById('kuantitas');
        const input2 = document.getElementById('hargasatuan');
        const input3 = document.getElementById('totaldiskon');
        const result = document.getElementById('totalharga');
        const resultnilaitransaksi = document.getElementById('nilaitransaksi');
        const resultpotonganharga = document.getElementById('potonganharga');

        [input1, input2, input3].forEach(input => {
            input.addEventListener('input', updateResult);
        });

        function updateResult() {
            const value1 = parseFloat(input1.value) || 0;
            const value2 = parseFloat(input2.value) || 0;
            const value3 = parseFloat(input3.value) || 0;
            const sum = value1 * value2 - value3;
            result.value = sum;
            
            resultnilaitransaksi.value = sum;
            resultpotonganharga.value = value3;


            if (sum < 0) {
                alert("Tidak Bisa Melebihi Harga");
            }
        }
    });
</script>
