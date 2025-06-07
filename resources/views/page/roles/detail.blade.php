@extends('index')
@section('title', 'Role Detail')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $role->name }}</h5>
            <p class="card-text"><strong>Created At:</strong> {{ $role->created_at->format('Y-m-d H:i') }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $role->updated_at->format('Y-m-d H:i') }}</p>
            <hr>
            <h6>Permissions:</h6>
            <ul>
                @forelse($role->permissions as $permission)
                    <li>{{ $permission->name }}</li>
                @empty
                    <li>No permissions assigned.</li>
                @endforelse
            </ul>
            <a href="{{ route('roles.view') }}" class="btn btn-secondary mt-3">Back to Roles</a>
        </div>
    </div>
</div>
@endsection