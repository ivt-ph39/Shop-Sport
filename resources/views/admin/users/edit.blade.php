@extends('admin.main')
@section('content')
<h1>Edit user</h1>
<form action="{{route('admin.users.update',$user->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control">

    <label>Email</label>
    <input type="text" name="email" value="{{$user->email}}" class="form-control">

    <label>Address</label>
    <input type="text" name="address" value="{{$user->address}}" class="form-control">

    <label>Phone</label>
    <input type="text" name="phone" value="{{$user->phone}}" class="form-control">

    
    <input type="submit" value="Update" class="btn btn-dark">
</div>
</form>

@endsection