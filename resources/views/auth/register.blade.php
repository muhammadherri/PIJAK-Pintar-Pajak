@extends('layouts.reg')
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div></div>
                <ul class="navbar-nav header-right">
                    <p><a href="{{route('login')}}">Login</a></p>
                </ul>
            </div>
        </nav>
    </div>
</div>
@section('register')
    <div class="col-md-6 contents">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <h3>{{ __('REGISTER') }}</h3>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group first">
                        <input placeholder="Nama Lengkap" id="nama_lengkap" type="text"
                            class="form-control" name="nama_lengkap"
                            required autocomplete="off">
                    </div>
                    <div class="form-group first">
                        <input placeholder="Nama Panggilan"id="name" type="text"autocomplete="off"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group first">
                        <input placeholder="NIM" id="email" type="number"
                            class="form-control" name="email"
                            required autocomplete="off">
                    </div>
                    <div class="form-group first">
                        <input placeholder="Kelas" id="kelas" type="text"
                            class="form-control" name="kelas"
                            required autocomplete="off">
                    </div>
                    <div class="form-group first">
                        <input placeholder="Dosen Pembimbing" id="dosen_pembimbing" type="text"
                            class="form-control" name="dosen_pembimbing"
                            required autocomplete="off">
                    </div>
                    {{-- <div class="form-group first">
                        <input placeholder="NIM" id="email" type="number"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                        @error('email ')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="form-group first">
                        <input placeholder="password" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group first">
                        <input placeholder="Password Confirm" id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
