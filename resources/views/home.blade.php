@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Saldo') }}</div>

                <div class="card-body">
                  {{ $totalsaldo}}
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengeluaran') }}</div>

                <div class="card-body">
                  {{ $subtotalpengeluaran}}
                   
                </div>
            </div>
        </div>
        <hr>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pemasukan') }}</div>

                <div class="card-body">
                  {{ $subtotalpemasukan}}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
