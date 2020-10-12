@extends('layouts.homepage-master')
@section('title','Register')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New Customer Signup!</h2>
                    <form action="#">
                        <label>Your information</label>
                        <input type="text" placeholder="Name" />
                        <input type="text" placeholder="Address" />
                        <input type="text" placeholder="Phone" />
                        <label>Account</label>
                        <input type="email" placeholder="Email Address" />
                        <input type="password" placeholder="Password" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>

@endsection