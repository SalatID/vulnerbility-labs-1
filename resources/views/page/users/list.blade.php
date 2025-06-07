@extends('index')
@section('title', 'User List')

@section('content')
<div class="container">
    <h1 class="mb-4">User List</h1>
    <!-- Button trigger modal -->
    @if(auth()->user()->getRoleNames()->contains('administrator'))
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">
        Add New User
    </button>
    @endif

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at}}</td>
                <td>
                    @if(auth()->user()->getRoleNames()->contains('administrator'))
                    <a href="{{ route('user.detail', $user->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('users.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Create User</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection