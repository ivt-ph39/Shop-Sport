@extends('layouts.homepage-master')
@section('title','Product Details')
@section('content')



<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img id="img" src="@foreach($product->images as $key=>$image) @if($key ==0) {{$image['path']}} @endif @endforeach" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->

                            <div class="carousel-inner">

                                <div class="item active">
                                    @foreach($product->images as $key=>$image)
                                    <a href="#"> <img src="{{$image['path']}}" alt="" onclick="changeImage('{{$image->path}}');"> </a>
                                    @endforeach

                                </div>

                                <!--<div class="item">
                                    <a href=""><img src="{{$image['path']}}" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                </div> -->
                                <!--<div class="item active">
                                    
                                    <a href=""><img src="{{ asset('images/puma1.jpg') }}" alt=""></a>
                                    <a href=""><img src="{{ asset('images/puma2.jpg') }}" alt=""></a>
                                    
                                </div> -->

                            </div>


                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>

                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
                            @if ($product['created_at'] >= now()->modify("-14 Days")) <img src="/images/new.jpg" class="newarrival" alt="" /> @endif
                            <h2>{{$product['name']}}</h2>
                            <span>
                                @if($product['sale_id'] != null)
                                    @if($product->sale['start_day'] <= now() && now() <=$product->sale['end_day'])
                                        <h4 style="text-decoration:line-through;">${{$product['price']}}</h4>
                                        <span>${{ (1-$product->sale->discount)*$product['price'] }}</span>
                                        <b  data-id="{{$product['id']}}" data-name="{{$product['name']}}" data-price="{{(1-$product->sale->discount)*$product['price']}}" type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                    @else
                                        <span>US ${{$product['price']}}</span>
                                        <b data-id="{{$product['id']}}" data-name="{{$product['name']}}" data-price="{{$product['price']}}" type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                    @endif
                                @else
                                    <span>US ${{$product['price']}}</span>
                                    <b data-id="{{$product['id']}}" data-name="{{$product['name']}}" data-price="{{$product['price']}}" type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </b>
                                @endif
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <label>Quantity: {{$product['quantity']}}</label>
                            <p><b>Brand:</b> {{$product->brand['name']}}</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{$product->feedbacks->count()}})</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details">

                        </div>
                        <div class="tab-pane fade" id="tag">
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                            @if(Auth::check())
                                @foreach($feedbacks as $f)
                                @if($product['id'] == $f['product_id'])
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>{{$f->user['name']}}</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>{{$f->user['created_at']->toTimeString()}}</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>{{$f->user['created_at']->toFormattedDateString()}}</a></li>
                                </ul>
                                <p>{{$f['content']}}</p>
                                @endif
                                @endforeach
                                <p><b>Write Your Review</b></p>
                                <form action="{{ route('feedbacks') }}" method="POST" id="feedbacks">
                                    @csrf
                                    <span>
                                        <input type="hidden" name="user_id" value="{{Auth::id()}}" />
                                        <input type="hidden" name="product_id" value="{{$product['id']}}" />
                                    </span>
                                    <textarea form="feedbacks" name="content"></textarea>
                                    <!-- <b>Rating: </b> <img src="images/product-details/rating.png" alt="" /> -->
                                    <button type="submit" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            @else
                                @foreach($feedbacks as $f)
                                @if($product['id'] == $f['product_id'])
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>{{$f->user['name']}}</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>{{$f->user['created_at']->toTimeString()}}</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>{{$f->user['created_at']->toFormattedDateString()}}</a></li>
                                </ul>
                                <p>{{$f['content']}}</p>
                                @endif
                                @endforeach
                                <a type="button" class="btn btn-danger" href="{{route('login')}}">Login member to write your review</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/category-tab-->
                <!-- <div class="recommended_items">
                    <!--recommended_items
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items

                </div> -->
            </div>
        </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    function changeImage(a) {
        $("#img").attr('src', a);
    }
</script>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>

@endsection