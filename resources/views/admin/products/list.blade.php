@extends('layouts.master')
@section('content')
<h1>List product </h1>
<button type="button" class="btn btn-light"><a href="{{route('products.create')}}">Add Product</a></button>
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th colspan="2" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td><a href="{{route('products.detail',$product->id)}}"
        data-id="{{$product->id}}"
        data-name="{{$product->name}}"
        data-price="{{$product->price}}">
        {{$product->name}}
        </a></td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-dark" role="button">Edit</a></td>
        <td><a href="{{route('products.delete',$product->id)}}" class="btn btn-dark" role="button">Delete</a></td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection