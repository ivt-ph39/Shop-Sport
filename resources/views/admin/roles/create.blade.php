@extends('admin.main')
@section('content')
<h1>Create Role</h1>
<form action="{{route('admin.roles.store')}}" method="post" style="width: 50%;">
    {{@csrf_field()}} 
    <div class="form-group">
        <label for="">Name:</label>
        <input type="text" name="name" id="" class="form-control">
        @if($errors->has('name'))
        <p style="color:red">{{$errors->first('name')}}</p>
        @endif
    </div>

    <input type="submit" value="Create role" class="btn btn-primary">
</form>
@endsection

@section('script')
 <script>
    window.onbeforeunload = function(event) {
    event.returnValue = "Write something clever here..";
    };
    </script>

@endsection

