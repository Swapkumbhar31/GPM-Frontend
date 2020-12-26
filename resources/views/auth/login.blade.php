@extends('layouts.app')

@section('content')
<div id="login"
    class="h-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12 bg-gray p-2">
                <form method="POST"
                    action="/login">
                    @csrf
                    <fieldset>
                        <legend align="center">
                            <strong>Login</strong>
                        </legend>
                        <div class="row justify-content-center sm-modal-view">
                            @if ($errors->has('email'))
                            <div class="col-lg-9 col-sm-10 col-10 alert alert-danger">
                                <div>{{ $errors->first('email') }}</div>
                            </div>
                            @endif

                            @if ($errors->has('password'))
                            <div class="col-lg-9 col-sm-10 col-10 alert alert-danger">
                                <div>{{ $errors->first('password') }}</div>
                            </div>
                            @endif
                            <div class="col-md-9 col-sm-10 text-center">
                                <label>Email</label>
                                <input type="email"
                                    name="email"
                                    formControlName="email"
                                    class="form-control"
                                    placeholder="Enter your email">
                            </div>
                            <div class="col-md-9 col-sm-10 text-center mt-2 ">
                                <label>Password</label>
                                <input type="password"
                                    name="password"
                                    formControlName="password"
                                    class="form-control"
                                    placeholder="Enter your password">
                                <div class="row mt-1">
                                    <small class="col-6 text-muted text-left">*Password is case sensitive</small>
                                    <div class="col-6 text-right">
                                        <a class="text-danger danger-fontfamily"
                                            href="/forgot-password">
                                            Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 text-center mt-5">
                                <button class="btn btn-danger text-uppercase">Log in</button>
                            </div>
                            <div class="col-9 text-center m-3">
                                <span class="para">Don't have an account?
                                    <a href="/register"
                                        class="text-danger danger-fontfamily">Register Now</a>
                                </span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection