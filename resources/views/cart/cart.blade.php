@extends('layouts.homepage-master')
@section('title','Shopping Cart')
@section('content')



<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</section>
<!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<form action="{{ route('checkout') }}" method="post">
			<input id="token" name="_token" type="hidden" value="{{csrf_token()}}"> 
				@if(!Auth::check())
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name">Name: </label>
						<input type="name" class="form-control" name="name" id="name">
					</div>
					<div class="form-group">
						<label for="email">Email address: </label>
						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
					</div>
					<div class="form-group">
						<label for="phone">Phone: </label>
						<input type="text" class="form-control" name="phone" id="phone">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" id="address">
					</div>
				</div>
				@else
				<div class="col-sm-6">
					<!-- <input type="text" name="total" class="total" > -->
					<input type="hidden" name="user_id" id="id" value="{{Auth::id()}}">
					<div class="form-group">
						<label for="name">Name: </label>
						<input type="name" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label for="email">Email address: </label>
						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
					</div>
					<div class="form-group">
						<label for="phone">Phone: </label>
						<input type="text" class="form-control" name="phone" id="phone" value="{{Auth::user()->phone}}">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->address}}">
					</div>
				</div>
				@endif

				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span name="total" class="total"></span></li>
						</ul>
					</div>
				</div>
				<button class="submit" type="submit" class="btn btn-primary">Checkout</button>
			</form>
		</div>
	</div>
</section>

<!-- <script type="text/javascript">
	if (typeof(Storage) !== "undefined") {
		var data = localStorage.getItem('cart');
		alert(data);
	} else {
		alert('Trình duyệt của bạn đã quá cũ. Hãy nâng cấp trình duyệt ngay!');
	}
</script> -->

@endsection

@section('script')
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
<script type="text/javascript">
	showCart();
</script>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function() {
		if (JSON.parse(localStorage.getItem('cart'))) {
			cart = JSON.parse(localStorage.getItem('cart'));
		} else {
			var cart = [];
		};
		$(".submit").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/api/order',
				data: {"cart" : cart,
					'_token' : $("#token").val(),
					'name' : $("#name").val(),
					'email' : $("#email").val(),
					'address' : $("#address").val(),
					'phone' : $("#phone").val(),
				
				},
				success: function(res) {
					console.log('Submission was successful.');
					console.log(res);
					console.log(cart);
					alert(res);
				},
				error: function(data) {
					console.log(JSON.stringify(data));
					alert(data);
					console.log(cart);
				},
			});

		});
	});
</script>




<!--/#do_action-->

@endsection