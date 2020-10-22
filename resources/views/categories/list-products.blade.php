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
                    <h2 class="title text-center">{{ $category['name'] }}</h2>
                    @foreach($products as $pro)
                    <div class="col-sm-4">

                        <div class="product-image-wrapper">

                            <div class="single-products">

                                <div class="productinfo text-center">
                                    <img src="  @foreach($pro->images as $key=>$image)  @if($key ==0) {{URL::to('/')}}/{{$image['path']}} @endif @endforeach" alt="" />
                                    <h2>${{$pro['price']}} </h2>
                                    <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{route('product-details',$pro['id'])}}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        <a id="button" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
                <!-- <ul class="pagination">
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">&raquo;</a></li>
                </ul> -->
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
@endsection