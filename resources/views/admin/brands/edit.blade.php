@extends('admin.main')
@section('content')
<h1>Edit brand</h1>
<form action="{{route('admin.brands.update',$brand->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label for="{{route('admin.brands.update',$brand->id)}}">Name</label>
    <input type="text" name="name" value="{{$brand->name}}" class="form-control">

    <input type="submit" value="Update" class="btn btn-dark">
</div>
</form>

@endsection
@section('script')
 <script>
    $(document).ready(function() {
    needToConfirm = false; 
    window.onbeforeunload = askConfirm;
});

function askConfirm() {
    if (needToConfirm) {
        // Put your custom message here 
        return "Your unsaved data will be lost."; 
    }
}

$("select,input,textarea").change(function() {
    needToConfirm = true;
});
    </script>

@endsection