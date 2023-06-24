@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{ __('Kategori Pemasukan') }}
                        </h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="btn btn-primary" href="{{ route('categories/create') }}">

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
                                    <th style="width: 10%">Gaji</th>
                                    <th>Tunjangan</th>
                                    <th>Bonus</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $key => $category)
                                    <tr>

                                        <td style="width: 0%">
                                            <h6>
                                                {{ $no++ }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->gaji ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->tunjangan ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->bonus ?? '' }}
                                            </h6>
                                        </td>
                                        <td style='font-size:11px'>
                                            <h6>
                                                {{ $category->created_at ?? '' }}
                                            </h6>
                                        </td>
                                        <td>
                                            <form action="categories/{{ $category->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <a class="btn btn-primary" href="{{ route('categories/show', $category->id) }}">
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
