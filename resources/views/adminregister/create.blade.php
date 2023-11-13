@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Register
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="">Register</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Buat</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Register</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('adminregister/store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select onchange="pilih()" id="status" name="status" class="default-select form-control wide">
                                                    <option value="1">Dosen</option>
                                                    <option value="">Mahasiswa</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nama_lengkap" name="nama_lengkap"
                                                    type="text" class="form-control" placeholder="Masukkan Lengkap">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Panggilan</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="name" name="name"
                                                    type="text" class="form-control" placeholder="Masukkan Panggilan">
                                            </div>
                                        </div>
                                        <div class="mb-12 row">
                                            <label class="col-sm-3 col-form-label"></label>

                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        type="radio" name="gender" value="1"checked>
                                                    <label class="form-check-label">
                                                        Laki-Laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        type="radio" name="gender" value="2">
                                                    <label class="form-check-label">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nomor Induk</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nim" name="nim"
                                                    type="text" class="form-control" placeholder="Masukkan Nomor Induk">
                                            </div>
                                        </div>
                                        <div id="hidden_kelas" style="display:none;">
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kelas</label>
                                                    <div class="col-sm-9">
                                                        <select id="kelas" name="kelas"
                                                            class="dropdown-groups">
                                                            @foreach ($kelas as $row)
                                                                <option value="{{ $row->id }}">
                                                                    {{ $row->nama_kelas }}</option>
                                                            @endforeach
                                                        </select>            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="hidden_dosen_pengampu" style="display:none;">
                                            <div class="row">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Dosen Pengampu</label>
                                                    <div class="col-sm-9">
                                                        <select id="dosen_pembimbing" name="dosen_pembimbing"
                                                            class="dropdown-groups">
                                                            @foreach ($dosen as $row)
                                                                <option value="{{ $row->id }}">
                                                                    {{ $row->nama_lengkap }}</option>
                                                            @endforeach
                                                        </select>                                                             
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="password" name="password"
                                                    type="text" class="form-control" placeholder="Masukkan Password">
                                                <span id="errorpassword" style="color: red;"></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div></div>
                                        <button class="btn btn-primary btn-submit" id="add_all" type="submit"><i data-feather='save'></i>
                                            {{ 'Simpan' }}
                                        </button>
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
    function pilih() {
        var status = document.getElementById("status");
        var kelas = document.getElementById("hidden_kelas");
        var dosen = document.getElementById("hidden_dosen_pengampu");
       
        if (status.value === "") {
            kelas.style.display = 'block';
            dosen.style.display = 'block';
        } else {
            kelas.style.display = 'none';
            dosen.style.display = 'none';
        }
    }
</script>