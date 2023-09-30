@extends('layouts.admin')
@section('header')
    <div class="header-left">
        <div class="dashboard_bar">
            Lainnya
        </div>
    </div>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('penandatanganan') }}">Lainnya</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penandatanganan') }}">Penandatanganan</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Penandatanganan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('penandatanganan/update',[$penandatanganan->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input value="{{$penandatanganan->name}}" autocomplete="off" required id="name" name="name"type="text" class="form-control"
                                                    placeholder="Masukkan Nama">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">No NPWP</label>
                                            <div class="col-sm-9">
                                                <input value="{{$penandatanganan->npwp}}" autocomplete="off" required id="npwp" name="npwp"type="number" class="form-control"
                                                    placeholder="Masukkan No NPWP">
                                                    <span id="errorText" style="color: red;"></span>
                                                
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
     document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.getElementById('npwp');
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
</script>
{{-- <script src="{{ asset('app-assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('app-assets/js/custom.min.js') }}"></script> --}}