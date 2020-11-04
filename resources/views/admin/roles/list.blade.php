@extends('admin.main')

@section('content')
    <h1>List Role</h1>


    <button type="button" class="btn btn-dark">
        <a href="{{ route('admin.roles.create') }}">Add Role</a>
    </button>
    
    <table class="table table-bordered" style="width: 100%;margin-top: .5em">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role name</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td><a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-dark" role="button">Edit</a>
                    </td>
                    <td> <a href="{{ route('admin.roles.assign.list' ,$role->id) }}" class="btn btn-dark">Assign Permission</a></td>
                    <td> <a href="{{ route('admin.roles.revoke.list',$role->id) }}" class="btn btn-dark">Revoke Permission</a></td>
                    <td>
                        <form action="{{ route('admin.roles.delete', $role->id) }}" method="post">
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
        {{ $roles->links() }}
    </div>
@endsection
