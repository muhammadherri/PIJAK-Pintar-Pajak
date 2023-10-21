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
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NIM</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="nim" name="nim"
                                                    type="text" class="form-control" placeholder="Masukkan Nomo Induk Mahasiswa">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kelas</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="kelas" name="kelas"
                                                    type="text" class="form-control" placeholder="Masukkan Kelas">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Dosen Pembimbing</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="dosen_pembimbing" name="dosen_pembimbing"
                                                    type="text" class="form-control" placeholder="Masukkan Dosen Pembimbing">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input autocomplete="off" required id="password" name="password"
                                                    type="text" class="form-control" placeholder="Masukkan Password">
                                                <span id="errorpassword" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select id="status" name="status" class="default-select form-control wide">
                                                    <option value="NULL">Mahasiswa</option>
                                                    <option value="1">Dosen</option>
                                                </select>                                            
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
    document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.getElementById('password');
        const errorPassword = document.getElementById('errorpassword');
        inputElement.addEventListener('input',function(){
            const inputValue = inputElement.value;
            if(inputValue.length < 8){
                inputElement.value = inputValue.slice(0,8);
                errorPassword.textContent = 'Minimal 8 digit';
            }else{
                errorText.textContent = '';
            }
        });
    });
</script>