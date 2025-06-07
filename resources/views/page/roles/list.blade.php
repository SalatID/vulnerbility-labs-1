@extends('index')

@section('title', 'Roles List')

@section('content')
<div class="container">
    <h1 class="mb-4">Roles List</h1>
    <a href="{{ route('roles.store') }}" class="btn btn-primary mb-3">Add New Role</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php($salt="saltsangatrahasia")
            @forelse($roles as $index => $role)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <a href="{{ route('roles.detail', base64_encode($salt.'.'.$role->id.'.'.$salt)) }}" class="btn btn-sm btn-success">Detail</a>
                        {{-- <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No roles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection