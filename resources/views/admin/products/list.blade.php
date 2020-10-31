@extends('admin.main')
@section('content')
<h1>List product </h1>

<button type="button" class="btn btn-light"><a href="{{route('admin.products.create')}}">Add Product</a></button>
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th colspan="2" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td><a href="{{route('admin.products.detail',$product->id)}}"
        data-id="{{$product->id}}"
        data-name="{{$product->name}}"
        data-price="{{$product->price}}">
        {{$product->name}}
        </a></td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td><div >
            
                @foreach($product->images as $key=>$img)
                @if($key ===0)
                 <img style=" height: 80px;width: 80px;" 
                    src="/{{$img->path}}" alt="">
                    @endif
                    @endforeach
     
                
                    
           
               
            
               

           </div>
        
        </td>
        <td><a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-dark" role="button">Edit</a></td>
        <td>
            <form action="{{route('admin.products.delete',$product->id)}}" method="post">
                {{@csrf_field()}}
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </td>
       
    </tr>
    @endforeach
    
    </tbody>
</table>
{{ $products->links() }}
@endsection