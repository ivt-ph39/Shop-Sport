@extends('admin.main')
@section('content')
<h1>Edit Product</h1>
<form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label >Name</label>
    <input type="text" name="name" value="{{$product->name}}" class="form-control">

    <label >Quantity</label>
    <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control">

    <label >Price</label>
    <input type="text" name="price" value="{{$product->price}}" class="form-control">

    <label >Image</label>
    <input type="file" name="img_product"  class="form-control"><br>
    
    <select name="id" id="">
        @foreach ($product->images as $key=>$img)
        <option value="{{$img->id}}">{{$img->path}}</option>
        @endforeach
    </select>
    <br><br>
    <input type="submit" value="Update" class="btn btn-dark">
</div>
</form>

@endsection