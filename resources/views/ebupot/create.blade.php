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
                    <li class="breadcrumb-item active"><a href="{{ route('dokumenreferensi') }}">PPH 22</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">CREATE</a></li>
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
                                                    class="default-select form-control wide">
                                                    <option value="0">PPH</option>
                                                    <option value="1">PPH</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Pilih Transaksi</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="transaksi_npwp" name="transaksi_npwp" type="text"
                                                    class="form-control" placeholder="Masukkan Transaksi NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Telp</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="no_telp" name="no_telp" type="number" class="form-control"
                                                    placeholder="Masukkan Nomor Telepone">
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
                                                        <select name="column1[]" id="jenis_pph" class="form-control">
                                                            @foreach ($dokref as $row)
                                                                <option value="{{ $row->id }}">
                                                                    {{ $row->jenis_dokumen }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input autocomplete="off" type="text" name="column2[]" class="form-control"></td>
                                                    <td><input type="date" name="column3[]" class="form-control"></td>
                                                    <td><button type="button" class="btn btn-light btn-submit"><i
                                                                class="fa fa-trash"></i></button></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <p></p>
                                        <div class="d-flex justify-content-between">
                                            <div></div>
                                            <button class="btn btn-primary btn-submit"name='action' value="create"
                                                id="addRow" type="button"><i data-feather='save'></i>
                                                {{ 'Tambah Dokumen' }}</button>
                                        </div>
                                        <p></p>
                                        <h5 class="card-title">Fasilitas</h5>
                                        <hr>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Pilih Fasilitas</label>
                                            <div class="col-sm-9">
                                                <select id="fasilitas"
                                                    name="fasilitas"class="default-select form-control wide">
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
                                                <input id="tgl_bukti_potong" name="tgl_bukti_potong" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-9">
                                                <input id="periode_pajak" name="periode_pajak" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <select id="kode_objek_pajak" name="kode_objek_pajak"
                                                    class="default-select form-control wide">
                                                    @foreach ($kodepajak as $row)
                                                        <option value="{{ $row->id }}">{{ $row->kode_objek_pajak }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Bruto</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="jumlah_bruto" name="jumlah_bruto" type="number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="tarif" name="tarif" type="number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" id="potongan_pph" name="potongan_pph" type="number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penandatanganan</label>
                                            <div class="col-sm-9">
                                                <select id="penandatanganan" name="penandatanganan"
                                                    class="default-select form-control wide">
                                                    <option selected>ttd</option>
                                                    <option>ttd</option>
                                                </select>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $("#addRow").click(function() {
            var newRow = `
            <tr>
                <td width="auto"> 
                    <select name="column1[]" id="jenis_pph" class="default-select form-control wide">
                        @foreach ($dokref as $row)
                            <option value="{{ $row->id }}">{{ $row->jenis_dokumen }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input autocomplete="off" type="text" name="column2[]" class="form-control"></td>
                <td><input type="date" name="column3[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn-submit remove"><i class="fa fa-trash"></i></button></td>
            </tr>
            `;
            $("#example5 tbody").append(newRow);

        });

        $("table").on("click", ".remove", function() {
            $(this).closest("tr").remove();
        });
    });
</script>
