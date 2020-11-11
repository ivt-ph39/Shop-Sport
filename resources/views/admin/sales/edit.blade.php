@extends('admin.main')
@section('content')
<h1>Edit sale</h1>
<form action="{{route('admin.sales.update',$sale->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{$sale->title}}" class="form-control">

    <label>Content</label>
    <input type="text" name="content" value="{{$sale->content}}" class="form-control">

    <label>Discount</label>
    <input type="text" name="discount" value="{{$sale->discount}}" class="form-control">

    <label>Start Day</label>
    <input type="text" name="start_day" value="{{$sale->start_day}}" class="form-control">

    <label>End day</label>
    <input type="text" name="end_day" value="{{$sale->end_day}}" class="form-control">

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