@extends('admin.main')
@section('content')
<h1>Create user</h1>
<form action="{{route('admin.users.store')}}" method="post" style="width: 50%;">

    {{@csrf_field()}}

   
    <div class="form-group">
        <label for="">Name:</label>
        <input type="text" name="name" id="" class="form-control">
        @if($errors->has('name'))
        <p style="color:red">{{$errors->first('name')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Email:</label>
        <input type="email" name="email" id="" class="form-control">
        @if($errors->has('email'))
        <p style="color:red">{{$errors->first('email')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Address:</label>
        <input type="text" name="address" id="" class="form-control">
        @if($errors->has('address'))
        <p style="color:red">{{$errors->first('address')}}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="">Phone:</label>
        <input type="text" name="phone" id="" class="form-control">
        @if($errors->has('phone'))
        <p style="color:red">{{$errors->first('phone')}}</p>
        @endif
    </div>
    {{-- <div class="form-group">
        <label for="">Price:</label>
        <input type="number" name="price" id="" class="form-control">
        @if($errors->has('price'))
        <p style="color:red">{{$errors->first('price')}}</p>
        @endif
    </div> --}}
    

       
    </div>
    
    

    <input type="submit" value="Create user" class="btn btn-primary">
</form>
@endsection

