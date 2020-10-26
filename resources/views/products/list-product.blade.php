@extends('layouts.homepage-master')
@section('title','Sport Shop')
@section('content')



<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach($products as $pro)
                    <div class="col-sm-4">
                    
                        <div class="product-image-wrapper">

                            <div class="single-products">

                                <div class="productinfo text-center">
                                    <img style="width:250px; height:250px" src="  @foreach($pro->images as $key=>$image)  
                                                @if($key ==0) 
                                                     {{$image['path']}} 
                                                @endif
                                                @endforeach" alt="" />
                                    @if($pro['sale_id'] == null)
                                    <h4></h4>
                                    <h2>${{$pro['price']}} </h2>
                                    @else
                                    <h4 style="text-decoration:line-through;">${{$pro['price']}}</h4>
                                    <h2>${{ (1-$pro->sale->discount)*$pro['price'] }}</h2>
                                    @endif
                                    <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{route('product-details',$pro['id'])}}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        @if($pro['sale_id'] == null )
                                        <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                        @else
                                        <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{(1-$pro->sale->discount)*$pro['price']}}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                        @endif
                                    </div>
                                </div>
                                @if ($pro['created_at'] >= now()->modify("-14 Days")) <img src="images/new.png" class="new" alt=""> @endif
                                @if($pro['sale_id'] != null)<img src="images/sale.png" class="sale" alt="">@endif
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>

                <!--features_items-->
                <p>Có {{$products->total()}} sản phẩm</p>
                {{ $products->links()  }}
            </div>

        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
@endsection