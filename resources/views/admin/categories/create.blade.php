@extends('admin.main')
@section('content')
<h1>Create Category</h1>
<form action="{{route('admin.categories.store')}}" method="post" style="width: 50%;">

{{@csrf_field()}}


<div class="form-group">
    <label for="">Name:</label>
    <input type="text" name="name" id="" class="form-control">
    <select name="parent_id" id="">
        <option value="0">None</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}} -{{$category->parent_id}}</option>
        @endforeach
    </select>
    @if($errors->has('name'))
        <p style="color:red">{{$errors->first('name')}}</p>
        @endif
</div>


<input type="submit" value="Create Category" class="btn btn-primary">
</form>
@endsection