@extends('admin.main')
@section('content')
<h1>Create Product</h1>
<form action="{{route('admin.products.store')}}" method="post" style="width: 50%;">

    {{@csrf_field()}}

   
    <div class="form-group">
        <label for="">Name:</label>
        <input type="text" name="name" id="" class="form-control">
        @if($errors->has('name'))
        <p style="color:red">{{$errors->first('name')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Quantity:</label>
        <input type="number" name="quantity" id="" class="form-control">
        @if($errors->has('quantity'))
        <p style="color:red">{{$errors->first('quantity')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Price:</label>
        <input type="number" name="price" id="" class="form-control">
        @if($errors->has('price'))
        <p style="color:red">{{$errors->first('price')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Image:</label>
        <input type="file" name="image" id="" class="form-control">
        @if($errors->has('image'))
        <p style="color:red">{{$errors->first('image')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Category</label>
        
        
        <select name="category_id">
           
        @foreach($categories as $category)
        <option  value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>

       
    </div>
    
    

    <input type="submit" value="Create Product" class="btn btn-primary">
</form>
@endsection

