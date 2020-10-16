@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@endsection
<div class="container">
    <div class="row w-100">
        <div class="col-xl-9 col-md-9 col-sm-9 column productbox">
            <div class="row">
                <div class="col-xl-12">
                    <div class="center">
                        <img src="http://placehold.it/300x200/e67e22/ffffff&text=HTML5" class="img-responsive">
                    </div>
                    <div class="producttitle">{{$product->name}}</div>
                    <div class="productprice">
                        <div class="pull-right">
                            <a href="#" id="btnBuy" class="btn btn-danger btn-sm" data-id="{{$product->id}}" data-price="{{$product->price}}" data-name="{{$product->name}}" role="button">BUY</a></div>
                        <div class="pricetext">${{$product->price}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-3 column bg-primary">
            <a href="{{route('cart')}}" class="btn btn-dark">Cart</a>
        </div>
    </div>
</div>
@section('script')
<!-- <script src="{{asset('js/addToCart.js')}}"></script> -->
<script src="{{asset('js/cart.js')}}"></script>

@endsection
@endsection