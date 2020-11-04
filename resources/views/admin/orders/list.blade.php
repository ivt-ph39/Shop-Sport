@extends('admin.main')

@section('content')
<h1>List Orders</h1>
<button type="button" class="btn btn-dark">
    {{-- <a href="{{route('.create')}}">Add Category</a></button> --}}
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Note</th>
            <th>Status</th>
            <th>UserID</th>
            <th>OrderDay</th>
            <th>ReceiptDay</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($ as $)
        <tr>
            <td>{{$->id}}</td>
            <td><a href="{{route('')}}" ></a></td>
            <td><a href="{{route('')}}" 
            class="btn btn-dark" role="button">Edit</a></td>
            <td>
                <form action="{{route('')}}" method="post">
                    {{@csrf_field()}}
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



<!-- js -->
<!-- @section('js') -->

<!-- @endsection -->

@endsection