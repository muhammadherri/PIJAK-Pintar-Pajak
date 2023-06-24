@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{ __('Edit Kategori Pengeluaran') }}
                        </h6>

                    </div>

                    <div class="card-body">
                        <form id="formship" action="{{ route('categorypengeluaran/update', $category->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                       
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Sewa Kos</label>
                                            <input type="text"value="{{$category->sewa_kos}}" id="sewa_kos" name="sewa_kos" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Makan</label>
                                            <input type="text"value="{{$category->makan}}" id="makan" name="makan" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Pakaian</label>
                                            <input value="{{$category->pakaian}}" type="text" id="pakaian" name="pakaian" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Nonton</label>
                                            <input value="{{$category->nonton}}" type="text" id="nonton" name="nonton" class="form-control"
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
