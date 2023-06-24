@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{ __('Create Kategori Pemasukan') }}
                        </h6>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('categories/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Gaji Bulan Ini</label>
                                            <input type="text" id="gaji" name="gaji" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Tunjangan</label>
                                            <input type="text" id="tunjangan" name="tunjangan" class="form-control"
                                                required autocomplete="off">

                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="segment1">Bonus</label>
                                            <input type="text" id="bonus" name="bonus" class="form-control"
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
