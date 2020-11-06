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
                            <td colspan="2">Day</th>
                            <td colspan="2">Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['created_at']->toFormattedDateString() }}</td>
                            @foreach($order->products as $pro)
                            <td><a href="{{ route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">{{ $pro['name']   }} </a></td>
                            @endforeach
                        </tr>
                        @endforeach

                        <!-- <tr>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h5>Your informantion</h5>
                <p> {{ Auth::user()->name }} </p>
                <p> {{ Auth::user()->email }} </p>
                <p> {{ Auth::user()->address }} </p>
                <p> {{ Auth::user()->phone }} </p>
                <a style="background: #FE980F;" class="btn btn-default" href="{{ route('account-edit',Auth::id()) }}">Edit your information</a>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
@endsection