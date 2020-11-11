@extends('admin.main')
@section('content')
<h1>Create brand</h1>
<form action="{{route('admin.brands.store')}}" method="post" style="width: 80%;">

{{@csrf_field()}}


<div class="form-group">
    <label for="">Name:</label>
    <input type="text" name="name" id="" class="form-control">
    
    @if($errors->has('name'))
        <p style="color:red">{{$errors->first('name')}}</p>
        @endif
</div>


<input type="submit" value="Create brand" class="btn btn-primary">
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