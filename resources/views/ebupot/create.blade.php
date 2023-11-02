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
                    <li class="breadcrumb-item active"><a href="{{ route('ebupot') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('ebupot') }}">e-Bupot</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">E-Bupot</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('ebupot/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis PPH</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_pph" name="jenis_pph"
                                                    class="dropdown-groups">
                                                    @foreach ($jenispph as $row)
                                                        <option value="{{ $row->id }}">
                                                            {{ $row->jenis_pph }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Pilih Transaksi</label>
                                            <div class="col-sm-9">
                                                <input required autocomplete="off" id="transaksi_npwp" name="transaksi_npwp"
                                                    type="text" class="form-control"
                                                    placeholder="Masukkan Transaksi NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Telp</label>
                                            <div class="col-sm-9">
                                                <input required min="0" autocomplete="off" id="no_telp" name="no_telp" type="number"
                                                    class="form-control" placeholder="Masukkan Nomor Telepone">
                                            </div>
                                        </div>
                                        <h5 class="card-title">Dasar Pemotongan</h5>
                                        <hr>
                                        <table id="example5">
                                            <thead>
                                                <tr>
                                                    <th>Dokumen Referensi</th>
                                                    <th>No.Dokumen</th>
                                                    <th>Tanggal Dokumen</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sales_order_detail_container">
                                                <tr>
                                                    <td width="auto">
                                                        <input required min="0" autocomplete="off" type="text" name="column1[]"
                                                            class="form-control"></td>
                                                        {{-- <select name="column1[]" id="jenis_pph" class="form-control">
                                                            @foreach ($dokref as $row)
                                                                <option value="{{ $row->id }}">
                                                                    {{ $row->jenis_dokumen }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </td>
                                                    <td><input required min="0" autocomplete="off" type="text" name="column2[]"
                                                            class="form-control"></td>
                                                    <td><input required type="date" name="column3[]" class="form-control"></td>
                                                    <td><button type="button" class="btn btn-light btn-submit"><i
                                                                class="fa fa-trash"></i></button></td>
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">
                                                        <button class="btn btn-primary btn-submit"name='action'
                                                            value="create" id="addRow" type="button"><i
                                                                data-feather='save'></i>
                                                            {{ 'Tambah Dokumen' }}</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <p></p>
                                        <h5 class="card-title">Fasilitas</h5>
                                        <hr>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Pilih Fasilitas</label>
                                            <div class="col-sm-9">
                                                <select id="fasilitas"
                                                    name="fasilitas"class="dropdown-groups">
                                                    @foreach ($fasilitas as $row)
                                                        <option value="{{ $row->id }}">
                                                            {{ $row->no }}-{{ $row->jenis_fasilitas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <h5 class="card-title">Objek Pajak</h5>
                                        <hr>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggal Bukti Potong</label>
                                            <div class="col-sm-9">
                                                <input id="tgl_bukti_potong" required name="tgl_bukti_potong" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-9">
                                                <input id="periode_pajak" required name="periode_pajak" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <select id="kode_objek_pajak" name="kode_objek_pajak"
                                                    class="dropdown-groups">
                                                    @foreach ($kodepajak as $row)
                                                        <option value="{{ $row->id }}">{{ $row->kode_objek_pajak }}-{{$row->keterangan}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Bruto</label>
                                            <div class="col-sm-9">
                                                <input required min="0" onkeyup="this.value=sprator(this.value);" placeholder="Masukkan Jumlah Bruto" autocomplete="off"
                                                    id="jumlah_bruto" name="jumlah_bruto" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-3">
                                                <input required min="0" onkeyup="this.value=sprator(this.value);" 
                                                placeholder="Masukkan Tarif" autocomplete="off" id="tarif"
                                                    name="tarif" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                            <div class="col-sm-9">
                                                <input placeholder="Masukkan Potongan PPh" readonly autocomplete="off"
                                                    id="potongan_pph" name="potongan_pph" type="text"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penandatanganan</label>
                                            <div class="col-sm-9">
                                                <select id="penandatanganan" name="penandatanganan"
                                                    class="dropdown-groups">
                                                    @foreach ($penandatanganan as $row)
                                                        <option value="{{ $row->id }}">{{ $row->npwp }} - {{$row->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-submit"name='action' value="create"
                                            id="add_all" onclick="resetFormebupot()" type="button"><i
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
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    function sprator(x) {
        //remove commas
        retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;
        const jumlah_bruto = $('#jumlah_bruto').val();
        const tarif = $('#tarif').val();
        console.log(retVal);

        const resultpotongan_pph = document.getElementById('potongan_pph');

        retValjumlah_bruto =jumlah_bruto ? parseFloat(jumlah_bruto.replace(/,/g, '')) : 0;
        retValtarif =tarif ? parseFloat(tarif.replace(/,/g, '')) : 0;
        const potonganpph = (retValjumlah_bruto*retValtarif)/100;
        resultpotongan_pph.value = potonganpph.toLocaleString();
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    }
    $(document).ready(function() {

        $("#addRow").click(function() {
            var newRow = `
            <tr>
                <td width="auto"> 
                    <input required min="0" autocomplete="off" type="text" name="column1[]"
                                                            class="form-control"></td>
                </td>
                <td><input required min="0" autocomplete="off" type="text" name="column2[]" class="form-control"></td>
                <td><input required min="0" type="date" name="column3[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn-submit remove"><i class="fa fa-trash"></i></button></td>
            </tr>
            `;
            $("#example5 tbody").append(newRow);

        });

        $("table").on("click", ".remove", function() {
            $(this).closest("tr").remove();
        });

    });
    // document.addEventListener('DOMContentLoaded', function() {
    //     const inputjumlah_bruto = document.getElementById('jumlah_bruto');
    //     const inputtarif = document.getElementById('tarif');
    //     const result = document.getElementById('potongan_pph');
    //     [inputjumlah_bruto, inputtarif].forEach(input => {
    //         input.addEventListener('input', updateResult);
    //     });

    //     function updateResult() {
    //         const jumbruto = parseFloat(inputjumlah_bruto.value) || 0;
    //         const tarif = parseFloat(inputtarif.value) || 0;
    //         const jumlah = jumbruto * tarif / 100;
    //         result.value = jumlah;

    //     }
    // });

    function resetFormebupot() {
        var jumlah_bruto = document.getElementById("jumlah_bruto");
        var tarif = document.getElementById("tarif");
        var potongan_pph = document.getElementById("potongan_pph");
        jumlah_bruto.value = '';
        tarif.value = '';
        potongan_pph.value = '';
    }
</script>
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}
