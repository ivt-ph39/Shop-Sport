@extends('admin.main')
@section('content')
<h1>Assign permission role</h1>
<form action="{{ route('admin.roles.assign', $role->id) }}" method="post">
{{@csrf_field()}}
 
     {{$role->getPermissionNames()}}
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$role->name}}" class="form-control" disabled>
    <label>Permission Name</label>
    <div class="container" style="border:2px solid #ccc; width:500px; height: 200px; overflow-y: scroll;">
        
        @foreach ($permissions as $item)
                  @if ($role->getPermissionNames()->contains($item->name))
                  <div class="checkbox">
                    <label><input type="checkbox" name="permissions[]" value="{{$item->name}}" checked > {{$item->name}}</label>
                  </div>
                    @else 
                    <div class="checkbox">
                        <label><input type="checkbox" name="permissions[]" value="{{$item->name}}"> {{$item->name}}</label>
                      </div>
                  @endif
                 

        @endforeach
    </div>

    <input type="submit" value="Assign" class="btn btn-dark">
</div>
</form>

@endsection