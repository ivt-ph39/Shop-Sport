@extends('admin.main')

@section('content')
    <h1>List Role</h1>


    <button type="button" class="btn btn-dark">
        <a href="{{ route('admin.permissions.create') }}">Add Permission</a></button>
   
    <table class="table table-bordered" style="width: 50%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role name</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($permissions as $permission)
                <tr>

                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>


                    <td><a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-dark"
                            role="button">Edit</a>
                    </td>
                    <td><a href="{{ route('admin.roles.create') }}">Assign Role</a></td>
                    <td> <a href="{{ route('admin.roles.create') }}">Revoke Role</a></td>
                    <td>
                        <form action="{{ route('admin.permissions.delete', $permission->id) }}" method="post">
                            {{ @csrf_field() }}
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div>
        {{ $permissions->links() }}
    </div>
@endsection
