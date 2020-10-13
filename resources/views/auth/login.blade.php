@extends('layouts.homepage-master')
@section('title','Login')
@section('content')


    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form action="#">
                        <input type="email" placeholder="Email Address" />
                        <input type="password" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-md-1">
                <h2 class="or">Or</h2>
            </div>
            <div class="col-md-4 " >
                <button class="btn btn-danger" style="margin-top:80px"><a style="color:white;" href="{{route('show.register')}}"> Create Account</a></button>
            </div>
        </div>
    </div>

@endsection