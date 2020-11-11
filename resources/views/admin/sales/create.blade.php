@extends('admin.main')
@section('content')
<h1>Create sale</h1>
<form action="{{route('admin.sales.store')}}" method="post" style="width: 80%;">

{{@csrf_field()}}

<div class="form-group">
    <label for="">Title:</label>
    <input type="text" name="title" id="" class="form-control">
    @if($errors->has('namtitlee'))
        <p style="color:red">{{$errors->first('title')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">Content:</label>
    <input type="text" name="content" id="" class="form-control">
    @if($errors->has('content'))
        <p style="color:red">{{$errors->first('content')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">Discount:</label>
    <input type="text" name="discount" id="" class="form-control">
    @if($errors->has('discount'))
        <p style="color:red">{{$errors->first('discount')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">Start day:</label>
    <input type="text" name="start_day" id="" class="form-control">
    @if($errors->has('start_day'))
        <p style="color:red">{{$errors->first('start_day')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">End day:</label>
    <input type="text" name="end_day" id="" class="form-control">
    @if($errors->has('end_day'))
        <p style="color:red">{{$errors->first('end_day')}}</p>
        @endif
</div>


<input type="submit" value="Create Sale" class="btn btn-primary">
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