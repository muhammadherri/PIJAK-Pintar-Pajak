@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Latihan
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('latihan') }}">Latihan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('latihan') }}">Keuangan Fiskal</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Keuangan Fiskal</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('latihan/update',[$jurnalmanual->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <h5>Neraca</h5>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Akun</label>
                                            <div class="col-sm-9">
                                                @if($jurnalmanual->attribute4==0)
                                                <input type="text" id="no_akun" value="{{$jurnalmanual->no_akun_debit}}" readonly class="form-control" name="no_akun">
                                                @else
                                                <input type="text" id="no_akun" value="{{$jurnalmanual->no_akun_kredit}}" readonly class="form-control" name="no_akun">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Akun</label>
                                            <div class="col-sm-9">
                                                @if($jurnalmanual->attribute4==0)
                                                <input type="text" id="nama_akun" value="{{$jurnalmanual->nama_akun_debit}}" readonly class="form-control" name="nama_akun">
                                                @else
                                                <input type="text" id="nama_akun" value="{{$jurnalmanual->nama_akun_kredit}}" readonly class="form-control" name="nama_akun">
                                                @endif
                                            </div>
                                        </div>
                                        @if($jurnalmanual->attribute4==0)
                                        <div class="mb-12 row">
                                            <label class="col-sm-3 col-form-label"> </label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        type="radio" name="check" value="0"checked>
                                                    <label class="form-check-label">
                                                        Positif
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        type="radio" name="check" value="1">
                                                    <label class="form-check-label">
                                                        Negatif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="mb-12 row">
                                            <label class="col-sm-3 col-form-label"> </label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        type="radio" name="check" value="0">
                                                    <label class="form-check-label">
                                                        Positif
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        type="radio" name="check" value="1"checked>
                                                    <label class="form-check-label">
                                                        Negatif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nilai</label>
                                            <div class="col-sm-9">
                                                @if($jurnalmanual->attribute4==0)
                                                    <input required min="0" onkeyup="this.value=addcommas(this.value);" value="{{number_format($jurnalmanual->nilai_debit)}}" autocomplete="off" type="text" id="nilai_debet"
                                                        name="nilai" class="form-control"
                                                        placeholder="Masukkan Nilai Debet">
                                                @else
                                                    <input required min="0" onkeyup="this.value=addcommas(this.value);"  value="{{number_format($jurnalmanual->nilai_kredit)}}" autocomplete="off" type="text" id="nilai_kredit"
                                                    name="nilai" class="form-control"
                                                    placeholder="Masukkan Nilai Kredit">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea required min="0" autocomplete="off" id="keterangan" name="keterangan"
                                                    type="text" class="form-control"
                                                    placeholder="Masukkan Keterangan">{{$jurnalmanual->keterangan}}</textarea>
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
<script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#no_akun_debet').on('change', function() {
            let akundebet = $('#no_akun_debet').val();
            $.ajax({
                url: "{{ route('get.nokredit') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    akundebet: akundebet,
                },
                success: function(data) {
                    $('#no_akun_kredit').empty();
                    $.each(data, function(key, value){
                        $('#no_akun_kredit').append($('<option>',{
                            value:value.no_akun,
                            text:value.no_akun,
                        }
                        ))
                    });
                }
            });
            $.ajax({
                url: "{{ route('get.namadebit') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    akundebet: akundebet,
                },
                success: function(data) {
                    $('#nama_akun_debet').empty();
                    $.each(data, function(key, value){
                        $('#nama_akun_debet').val(value.nama_akun);
                    });
                }
            });
            $.ajax({
                url: "{{ route('get.namakreditfirst') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    akundebet: akundebet,
                },
                success: function(data) {
                    $('#nama_akun_kredit').empty();
                    $.each(data, function(key, value){
                        $('#nama_akun_kredit').val(value.nama_akun);
                    });
                }
            });
        });
        $('#no_akun_kredit').on('change', function() {
            let akunkredit = $('#no_akun_kredit').val();
            $.ajax({
                url: "{{ route('get.namakredit') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    akunkredit: akunkredit,
                },
                success: function(data) {
                    $('#nama_akun_kredit').empty();
                    $.each(data, function(key, value){
                        $('#nama_akun_kredit').val(value.nama_akun);
                    });
                }
            });
        });
    });
</script>