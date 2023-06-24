@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{ __('Kategori Pengeluaran') }}
                        </h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="btn btn-primary" href="{{ route('categorypengeluaran/create') }}">

                                    {{ __('Create') }}

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover datatable-Transaction datatable">
                            <thead>
                                <tr>

                                    <th>
                                        NO
                                    </th>
                                    <th style="width: 10%">Sewa Kos</th>
                                    <th>Makan</th>
                                    <th>Pakaian</th>
                                    <th>Nonton</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($CategoryPengeluaran as $key => $category)
                                    <tr>

                                        <td style="width: 0%">
                                            <h6>
                                                {{ $no++ }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->sewa_kos ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->makan ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->pakaian ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->nonton ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->created_at ?? '' }}
                                            </h6>
                                        </td>
                                        <td>
                                            <form action="categorypengeluaran/{{ $category->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <a class="btn btn-primary" href="{{ route('categorypengeluaran/show', $category->id) }}">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
