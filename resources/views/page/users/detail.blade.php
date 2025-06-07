@extends('index')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email</strong></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label"><strong>Role</strong></label>
                    <select class="form-control" id="role" name="role" {{auth()->user()->getRoleNames()->contains('administrator') ? '' : 'disabled'}}>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ (old('role', $user->getRoleNames()->first()) == $role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Created At</strong></label>
                    <input type="text" class="form-control" value="{{ $user->created_at->format('Y-m-d H:i') }}" readonly>
                </div>
                <a href="{{ route('users.view') }}" class="btn btn-secondary">Back to Users</a>
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection