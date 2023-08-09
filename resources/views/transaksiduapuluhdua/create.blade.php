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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">PPH 22</a></li>
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
                                <form>
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis PPH</label>
                                            <div class="col-sm-9">
                                                <select id="jenis_pph" class="default-select form-control wide">
                                                    <option value="0">PPH</option>
                                                    <option value="1">PPH</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Pilih Transaksi</label>
                                            <div class="col-sm-9">
                                                <input id="transaksi_npwp" type="text" class="form-control"
                                                    placeholder="Masukkan Transaksi NPWP">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No Telp</label>
                                            <div class="col-sm-9">
                                                <input id="no_telp" type="text" class="form-control"
                                                    placeholder="Masukkan Nomor Telepone">
                                            </div>
                                        </div>
                                        <h5 class="card-title">Dasar Pemotongan</h5>
                                        <hr>
                                        <table id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Dokumen Referensi</th>
                                                    <th></th>
                                                    <th>No.Dokumen</th>
                                                    <th></th>
                                                    <th>Tanggal Dokumen</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="sales_order_detail_container">
                                                <tr>
                                                    <td width="auto">
                                                        <select name="column1[]" id="jenis_pph" class="default-select form-control wide">
                                                            <option value="0">PPH</option>
                                                            <option value="1">PPH</option>
                                                        </select>
                                                    </td>
                                                    <td width="2%"></td>
                                                    <td><input type="text" name="column2[]" class="form-control"></td>
                                                    <td width="2%"></td>
                                                    <td><input type="date" name="column3[]" class="form-control"></td>
                                                    <td width="2%"></td>
                                                    <td><button type="button" class="btn btn-light btn-submit">X</button></td>
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
                                                <select id="inputState" class="default-select form-control wide">
                                                    <option selected>Fasilitas</option>
                                                    <option>Fasilitas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h5 class="card-title">Objek Pajak</h5>
                                        <hr>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggal Bukti Potong</label>
                                            <div class="col-sm-9">
                                                <input id="bukti_potong" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Periode Pajak</label>
                                            <div class="col-sm-9">
                                                <input id="periode_pajak" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Objek Pajak</label>
                                            <div class="col-sm-9">
                                                <select id="inputState" class="default-select form-control wide">
                                                    <option selected>Objek</option>
                                                    <option>Objek</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jumlah Bruto</label>
                                            <div class="col-sm-9">
                                                <input readonly id="jumlah_bruto" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tarif</label>
                                            <div class="col-sm-9">
                                                <input readonly id="tarif" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Potongan PPH</label>
                                            <div class="col-sm-9">
                                                <input readonly id="potongan_pph" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Penandatanganan</label>
                                            <div class="col-sm-9">
                                                <select id="inputState" class="default-select form-control wide">
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
                        <option value="0">PPH</option>
                        <option value="1">PPH</option>
                    </select>
                </td>
                <td width="2%"></td>
                <td><input type="text" name="column2[]" class="form-control"></td>
                <td width="2%"></td>
                <td><input type="date" name="column3[]" class="form-control"></td>
                <td width="2%"></td>
                <td><button type="button" class="btn btn-danger btn-submit remove">X</button></td>
            </tr>
            `;
            $("#myTable tbody").append(newRow);
        });

        $("table").on("click", ".remove", function() {
            $(this).closest("tr").remove();
        });
    });

    // document.addEventListener("DOMContentLoaded", function() {
    //     const addRowBtn = document.getElementById("addRowBtn");
    //     const dataTable = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
    //     let rowCount = 1;

    //     addRowBtn.addEventListener("click", function() {
    //         const newRow = dataTable.insertRow(dataTable.rows.length);
    //         const cell1 = newRow.insertCell(0);
    //         const cell2 = newRow.insertCell(1);
    //         const cell3 = newRow.insertCell(2);
    //         const cell4 = newRow.insertCell(3);
    //         const cell5 = newRow.insertCell(4);

    //         // cell1.innerHTML = rowCount;
    //         cell2.innerHTML = "<input class='form-control' type='text' name='document_referensi[]'>";
    //         cell3.innerHTML = "<input class='form-control' type='text' name='no_document[]'>";
    //         cell4.innerHTML = "<input class='form-control' type='date' name='tgl_document[]'>";
    //         cell5.innerHTML = "<button type='button' class='btn btn-ligth btn-sm' style='position: inherit;''>X</button>";

    //         rowCount++;
    //     });
    // });
</script>
