@extends('layouts.app')
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div></div>
                <ul class="navbar-nav header-right">
                    <p><a href="{{route('registers')}}">Register</a></p>
                </ul>
            </div>
        </nav>
    </div>
</div>
@section('content')
    <div class="col-md-6 contents">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <h3><strong>{{ __('LOGIN') }}</strong></h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group first">
                        <label for="username"><strong>NIM</strong></label>
                        <input id="email"  type="text" class="form-control"
                            name="email" required autocomplete="on" autofocus>
                        {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-group last mb-4">
                        <label><strong>Password</strong></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <button type="submit" name='action' value="login" class="btn btn-block btn-primary">
                        {{ __('Login') }}
                    </button>
                    
                </form>
            </div>
        </div>

    </div>
@endsection
