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
                    <li class="breadcrumb-item active"><a href="{{ route('invoice') }}">Penjualan</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('invoice') }}">Invoice</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
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
                                                <div class="row">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Pembeli</label>
                                                        <div class="col-sm-9">
                                                            <select id="vendor_invoice" name="vendor_invoice"
                                                                class="default-select form-control wide">
                                                                @foreach ($vendor as $row)
                                                                    <option value="{{ $row->id }}" {{ $inv->pembeli == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->no_id_vendor }} - {{ $row->nama_vendor }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <h5 class="card-title">Detil Faktur</h5>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">No. Faktur Komersial</label>
                                                        <div class="col-sm-9">
                                                            <input readonly value="{{$inv->no_faktur}}" autocomplete="off" id="faktur_komersial"
                                                                name="faktur_komersial" type="text" class="form-control"
                                                                placeholder="Masukkan No. Faktur Komersial">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Tanggal Faktur</label>
                                                        <div class="col-sm-3">
                                                            <input readonly value="{{date('d-M-Y',strtotime($inv->tgl_faktur))}}" id="tgl_faktur" name="tgl_faktur" type="text"
                                                                class="form-control"
                                                                placeholder="Masukkan No. Faktur Komersial">
                                                        </div>
                                                        <label class="col-sm-3 col-form-label">Jatuh Tempo</label>
                                                        <div class="col-sm-3">
                                                            <input readonly value="{{date('d-M-Y',strtotime($inv->tgl_faktur))}}" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" type="text"
                                                                class="form-control"
                                                                placeholder="Masukkan No. Faktur Komersial">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Termin Pembayaran</label>
                                                        <div class="col-sm-9">
                                                            <select id="termin_pembayaran" name="termin_pembayaran"
                                                                class="default-select form-control wide">
                                                                @if($inv->termin_pembayaran==0)
                                                                    <option value="0">Normal</option>
                                                                    <option value="1">Uang Muka</option>
                                                                    <option value="2">Pelunasan</option>
                                                                @elseif($inv->termin_pembayaran==1)
                                                                    <option value="1">Uang Muka</option>
                                                                    <option value="0">Normal</option>
                                                                    <option value="2">Pelunasan</option>
                                                                @else
                                                                    <option value="2">Pelunasan</option>
                                                                    <option value="1">Uang Muka</option>
                                                                    <option value="0">Normal</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <p></p>
                                                    <table id="invoicedataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Barang</th>
                                                                <th>Kuantitas</th>
                                                                <th>Harga Satuan</th>
                                                                <th>Total Diskon</th>
                                                                <th>Total Harga</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="sales_order_detail_container">
                                                            @foreach($invline as $key =>$row)
                                                            <tr>
                                                                <td width="auto">
                                                                    <select name="namabarang_inv[]" id="namabarang"
                                                                        class="form-control">
                                                                        <option value="0">nama barang</option>
                                                                        <option value="1">nama barang</option>
                                                                    </select>
                                                                </td>
                                                                <td><input readonly value="{{$row->kuantitas}}" autocomplete="off" type="number" name="angka1[]" min="0"
                                                                        class="form-control" /></td>
                                                                <td><input readonly value="{{$row->harga_satuan}}" autocomplete="off" type="number" name="angka2[]" min="0"
                                                                        class="form-control" /></td>
                                                                <td><input readonly value="{{$row->total_diskon}}" autocomplete="off" type="number" name="angka3[]" min="0"
                                                                        class="form-control sub_totpot" /></td>
                                                                <td><input readonly value="{{$row->total_harga}}" autocomplete="off" type="text" name="hasil[]"
                                                                        class="form-control sub_total"readonly /></td>
                                                                <td><button type="button" class="btn btn-light btn-submit"><i
                                                                            class="fa fa-trash"></i></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                {{-- <td colspan="3">
                                                                    <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="btn-add" type="button"><i
                                                                            data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button>
                                                                </td> --}}
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                    <div class="mb-3 row">
                                                        <label class="col-sm-6 col-form-label"></label>
                                                        <label class="col-sm-3 col-form-label">Nilai Transaksi</label>
                                                        <div class="col-sm-3">
                                                            <input readonly value="{{$inv->nilai_transaksi}}" id="nilaitransaksi" type="number"
                                                                name="nilaitransaksi" class="form-control nilaitrx">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-6 col-form-label"></label>
                                                        <label class="col-sm-3 col-form-label">Potongan Harga</label>
                                                        <div class="col-sm-3">
                                                            <input readonly value="{{$inv->potongan_harga}}" id="potonganharga" name="potonganharga"
                                                                type="text" class="form-control nilaihargapot">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-6 col-form-label"></label>
                                                        <label class="col-sm-3 col-form-label">PPn %</label>
                                                        <div class="col-sm-3">
                                                            <input step="any" readonly value="{{$inv->ppn}}" id="ppn" name="ppn" type="text"
                                                                class="form-control nilai_ppn">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-6 col-form-label"></label>
                                                        <label class="col-sm-3 col-form-label">Total</label>
                                                        <div class="col-sm-3">
                                                            <input readonly readonly value="{{$inv->total}}" id="totaltrx" name="totaltrx" type="text"
                                                                class="form-control total_trx">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                            <label class="col-sm-3 col-form-label">Catatan</label>
                                                            <textarea readonly value="" autocomplete="off" placeholder="Silakan masukkan catatan untuk pembeli Anda..." class="form-control"
                                                                rows="4" id="catatan" name="catatan">{{$inv->catatan}}</textarea>
                                                        </div>

                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                            <label class="col-sm-3 col-form-label">Informasi Pembayaran</label>
                                                            <textarea readonly value="" autocomplete="off" placeholder="Contoh:Harap pembayaran dilakukan ke Rekening BCA..." class="form-control"
                                                                rows="4" id="informasi_pembayaran" name="informasi_pembayaran">{{$inv->informasi_pembayaran}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        {{-- TAB INVOICE --}}
                                        {{-- TAB E-FAKTUR --}}
                                        <div class="tab-pane fade" id="nav-priceList" role="tabpanel"
                                            aria-labelledby="nav-priceList-tab">
                                                <div class="row">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Pembeli</label>
                                                        <div class="col-sm-9">
                                                            <select id="vendor_efaktur"name="vendor_efaktur"
                                                                class="default-select form-control wide">
                                                                @foreach ($vendor as $row)
                                                                    <option value="{{ $row->id }}" {{ $faktur->pembeli == $row->id ? 'selected' : '' }}>
                                                                        {{ $row->no_id_vendor }} - {{ $row->nama_vendor }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <h5 class="card-title">Pengaturan Faktur Pajak</h5>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                                        @if($faktur->jenis_dok==1)
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="jenisdokumen" class="form-check-input"
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
                                                        @else
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="jenisdokumen" class="form-check-input"
                                                                        type="radio" name="jenisdokumen" value="1">
                                                                    <label class="form-check-label">
                                                                        Faktur Pajak Normal
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="dokumenlainlain" class="form-check-input"
                                                                        type="radio" name="jenisdokumen" value="0" checked>
                                                                    <label class="form-check-label">
                                                                        Dokumen Lain
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div id="hiddendokumen" style="display:none;" class="mb-3 row">
                                                        @if($faktur->dok_lain==1)
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="dokumenlainlain" class="form-check-input"
                                                                        type="radio" name="dokumenlainlain" value="1"
                                                                        checked>
                                                                    <label class="form-check-label">
                                                                        Faktur Pajak
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="dokumenlainlain" class="form-check-input"
                                                                        type="radio" name="dokumenlainlain" value="0">
                                                                    <label class="form-check-label">
                                                                        Ekspor Barang (PEB)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="dokumenlainlain" class="form-check-input"
                                                                        type="radio" name="dokumenlainlain" value="1">
                                                                    <label class="form-check-label">
                                                                        Faktur Pajak
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input id="dokumenlainlain" class="form-check-input"
                                                                        type="radio" name="dokumenlainlain" value="0" checked>
                                                                    <label class="form-check-label">
                                                                        Ekspor Barang (PEB)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-3 col-form-label">No Seri Faktur</label>
                                                        <div class="col-sm-3">
                                                            <select id="no_seri" name="no_seri"
                                                                class="default-select form-control wide">
                                                                <option value="0">Seri 1</option>
                                                                <option value="1">Seri 2</option>
                                                                <option value="2">Seri 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input autocomplete="off" readonly value="{{$faktur->no_dok}}" type="text" id="no_dokumen" name="no_dokumen"
                                                                class="form-control" placeholder="Masukkan No Dokumen...">
                                                        </div>
                                                    </div>
                                                    <p></p>
                                                    <table id="efakturtable">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Barang</th>
                                                                <th>Kuantitas</th>
                                                                <th>Harga Satuan</th>
                                                                <th>Total Diskon</th>
                                                                <th>Total Harga</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="sales_order_detail_container">
                                                            @foreach($fktrline as $key => $row)
                                                            <tr>
                                                                <td width="auto">
                                                                    <select name="namabarang_fktr[]" id="namabarang_fktr"
                                                                        class="form-control">
                                                                        <option value="0">nama barang</option>
                                                                        <option value="1">nama barang</option>
                                                                    </select>
                                                                </td>
                                                                <td><input readonly value="{{$row->kuantitas}}" autocomplete="off" type="number" name="angka4[]" min="0"
                                                                        class="form-control" /></td>
                                                                <td><input readonly value="{{$row->harga_satuan}}" autocomplete="off" type="number" name="angka5[]" min="0"
                                                                        class="form-control" /></td>
                                                                <td><input readonly value="{{$row->total_diskon}}" autocomplete="off" type="number" name="angka6[]" min="0"
                                                                        class="form-control sub_totpot" /></td>
                                                                <td><input readonly value="{{$row->total_harga}}" autocomplete="off" type="text" name="hasil2[]"
                                                                        class="form-control"readonly /></td>
                                                                <td><button type="button" class="btn btn-light btn-submit"><i
                                                                            class="fa fa-trash"></i></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td>
                                                                    {{-- <button class="btn btn-primary btn-submit"name='action'
                                                                        value="create" id="addRowefaktur" type="button"><i
                                                                            data-feather='save'></i>
                                                                        {{ 'Tambah Item' }}</button> --}}
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <p></p>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-12">
                                                            <label required class="col-sm-3 col-form-label">Catatan</label>
                                                            <textarea placeholder="Silakan masukkan catatan untuk pembeli Anda..." class="form-control" rows="4"
                                                                id="catatan_efaktur" name="catatan_efaktur">{{$faktur->catatan}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
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
        const tableInv = document.querySelector('#invoicedataTable tbody');
        const addInvBtn = document.querySelector('#btn-add');

        addInvBtn.addEventListener('click', function() {
            const newRow = `
                <tr>
                    <td width="auto">
                        <select name="namabarang_inv[]" id="namabarang_inv"
                            class="default-select form-control wide">
                            <option value="0">nama barang</option>
                            <option value="1">nama barang</option>
                        </select>
                    </td>
                    <td><input autocomplete="off" type="number" name="angka1[]" min="0" class="form-control"/></td>
					<td><input autocomplete="off" type="number" name="angka2[]" min="0" class="form-control"/></td>
					<td><input autocomplete="off" type="number" name="angka3[]" min="0" class="form-control sub_totpot"/></td>
					<td><input autocomplete="off" type="text" name="hasil[]" class="form-control sub_total"readonly /></td>
                    <td><button type="button" class="btn btn-danger btn-remove"><i class="fa fa-trash"></i></button></td>

                </tr>
            `;
            tableInv.insertAdjacentHTML('beforeend', newRow);
        });

        tableInv.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {
                const row = target.closest('tr');
                const angka1 = parseFloat(row.querySelector('input[name="angka1[]"]').value) || 0;
                const angka2 = parseFloat(row.querySelector('input[name="angka2[]"]').value) || 0;
                const angka3 = parseFloat(row.querySelector('input[name="angka3[]"]').value) || 0;
                const hasilInput = row.querySelector('input[name="hasil[]"]');
                const sum = angka1 * angka2 - angka3;
                hasilInput.value = sum;
                var totalhar = 0
                var totalpot = 0

                $(".sub_total").each(function() {
                    totalhar += +$(this).val();
                });
                $(".sub_totpot").each(function() {
                    totalpot += +$(this).val();
                });
             
                $('.nilaitrx').val(totalhar);
                $('.nilaihargapot').val(totalpot);
                $('.nilai_ppn').val((totalhar-totalpot)*11/100);
                var totalall =(totalhar-totalpot)*11/100;
                $('.total_trx').val((totalhar-totalpot)+totalall);
            }
        });

        tableInv.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const tableFktr = document.querySelector('#efakturtable tbody');
        const addFktrBtn = document.querySelector('#addRowefaktur');

        addFktrBtn.addEventListener('click', function() {
            const newRow = `
                <tr>
                    <td width="auto">
                        <select name="namabarang_fktr[]" id="namabarang_fktr"
                            class="default-select form-control wide">
                            <option value="0">nama barang</option>
                            <option value="1">nama barang</option>
                        </select>
                    </td>
                    <td><input autocomplete="off" type="number" name="angka4[]" min="0" class="form-control"/></td>
					<td><input autocomplete="off" type="number" name="angka5[]" min="0" class="form-control"/></td>
					<td><input autocomplete="off" type="number" name="angka6[]" min="0" class="form-control"/></td>
					<td><input autocomplete="off" type="text" name="hasil2[]" class="form-control"readonly /></td>
                    <td><button type="button" class="btn btn-danger btn-remove"><i class="fa fa-trash"></i></button></td>

                </tr>
            `;
            tableFktr.insertAdjacentHTML('beforeend', newRow);
        });

        tableFktr.addEventListener('input', function(event) {
            const target = event.target;
            if (target.tagName === 'INPUT' && target.name.startsWith('angka')) {
                const row = target.closest('tr');
                const angka1 = parseFloat(row.querySelector('input[name="angka4[]"]').value) || 0;
                const angka2 = parseFloat(row.querySelector('input[name="angka5[]"]').value) || 0;
                const angka3 = parseFloat(row.querySelector('input[name="angka6[]"]').value) || 0;
                const hasilInput = row.querySelector('input[name="hasil2[]"]');
                const sum = angka1 * angka2 - angka3;
                hasilInput.value = sum;
            }
        });

        tableFktr.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove')) {
                const row = event.target.closest('tr');
                row.remove();
            }
        });
    });
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
</script>
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}

