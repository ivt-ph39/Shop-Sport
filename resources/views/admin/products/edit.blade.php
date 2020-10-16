@extends('layouts.master')
@section('content')
<h1>Edit Product</h1>
<form action="{{route('products.update',$product->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label >Name</label>
    <input type="text" name="name" value="{{$product->name}}" class="form-control">

    <label >Quantity</label>
    <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control">

    <label >Price</label>
    <input type="text" name="price" value="{{$product->price}}" class="form-control">

    <input type="submit" value="Update" class="btn btn-dark">
</div>
</form>

@endsection