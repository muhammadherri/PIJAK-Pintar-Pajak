@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{ __('Create Transaksi') }}
                        </h6>

                    </div>

                    <div class="card-body">
                        <form id="formship" action="{{ route('transaksi/store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                       
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Jenis Transaksi</label>
                                            
                                            <select type="text" id="jenis_transaksi" name="jenis_transaksi" class="form-control" required>
                                                <option value="0" >Pemasukan</option>
                                                <option value="1" >Pengeluaran</option>
                                            </select>
                                           

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Kategori</label>
                                            <input type="text" id="kategori" name="kategori" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Nominal</label>
                                            <input type="text" id="nominal" name="nominal" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Deskripsi</label>
                                            <input type="text" id="deskripsi" name="deskripsi" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <button class="btn btn-primary btn-submit" value="create" type="submit"><i
                                        data-feather='save'></i> {{ trans('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
