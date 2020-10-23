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
						<td class="total">Total</td>
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
			<form action="#" method="post">
				@if(!Auth::check())
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name">Name: </label>
						<input type="name" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label for="email">Email address: </label>
						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="phone">Phone: </label>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" id="address" placeholder="Address">
					</div>
				</div>
				@else
				<div class="col-sm-6">
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
							<li>Cart Sub Total <span id="total"></span></li>
						</ul>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Checkout</button>
			</form>
		</div>
	</div>
</section>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
<script type="text/javascript">
	showCart();
</script>




<!--/#do_action-->

@endsection