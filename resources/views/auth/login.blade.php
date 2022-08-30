@extends('layouts.auth-master')
@section('css')
@section('content')
    <form method="post" action="{{ route('login.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <label for="floatingName">Email or Username</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>

            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">

            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="row">
            <div class="col-8">
                <div class="form-group mb-3">
                    <input type="checkbox" name="remember" value="1">
                    <label for="remember">Remember me</label>

              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-secondary btn-block">Log In</button>
            </div>
            <!-- /.col -->
        </div>

        <p class="mb-1">
        <a href="{{route('register.show')}}" class="btn btn-dark">Register an Account</a>
        </p>

        @include('auth.partials.copy')
    </form>
@endsection
