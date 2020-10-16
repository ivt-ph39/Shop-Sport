@extends('layouts.master')
@section('content')
<h1>Edit Category</h1>
<form action="{{route('admin.categories.update',$category->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label for="{{route('admin.categories.update',$category->id)}}">Name</label>
    <input type="text" name="name" value="{{$category->name}}" class="form-control">

    <input type="submit" value="Update" class="btn btn-dark">
</div>
</form>

@endsection