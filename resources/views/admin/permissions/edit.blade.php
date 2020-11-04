@extends('admin.main')
@section('content')
<h1>Edit permission</h1>
<form action="{{route('admin.permissions.update',$permission->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$permission->name}}" class="form-control">

    <input type="submit" value="Update" class="btn btn-dark">
</div>
</form>

@endsection