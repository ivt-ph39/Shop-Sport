@extends('layouts.homepage-master')
@section('title','Sport Shop')
@section('content')



<section>
    <div class="container">
        <h2>Your Account Information</h2>
        <p>Welcome {{ Auth::user()->name }} </p>
        <div class="row">
            <div class="col-md-9">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h5>Your informantion</h5>
                <p> {{ Auth::user()->name }} </p>
                <p> {{ Auth::user()->email }} </p>
                <p> {{ Auth::user()->address }} </p>
                <p> {{ Auth::user()->phone }} </p>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
@endsection