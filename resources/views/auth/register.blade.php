@extends('layouts.master.auth')

@section('content')
    <form method="post" action="{{ route('register.save') }}" class="needs-validation" novalidate>
        @csrf

        <div class="form-group">
            <label class="text-dark">Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="text-dark">Email</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}">

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="text-dark">Password</label>
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">

            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <input type="submit" value="Register" class="btn btn-block btn-success">
        <p class="mt-3">
            Already have an account?
            <a class="btn-link" href="{{ route('login') }}">Login Now</a>
        </p>
    </form>
@endsection
