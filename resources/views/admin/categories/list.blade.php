@extends('layouts.master')

@section('content')
<h1>List Category</h1>
<button type="button" class="btn btn-dark">
    <a href="{{route('admin.categories.create')}}">Add Category</a></button>
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('admin.categories.list-product',$category->id)}}" 
            id="{{$category->id}}" class="abc">
                    {{$category->name}}</a></td>
            <td><a href="{{route('admin.categories.edit',$category->id)}}" 
            class="btn btn-dark" role="button">Edit</a></td>
            <td>
                <form action="{{route('admin.categories.delete',$category->id)}}" method="post">
                    {{@csrf_field()}}
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<div id="show-list-product"></div>
<!-- js -->
<!-- @section('js') -->

<!-- @endsection -->

@endsection