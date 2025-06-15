@extends('layouts.layout')

@section('content')
    <h2>{{ isset($user) ? 'Edit User' : 'Create User' }}</h2>

    <form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            <label for="email" class="form-label">User Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="customer" {{ isset($user) && $user->role == 'customer' ? 'selected' : '' }}>customer</option>
                <option value="user" {{ isset($user) && $user->role == 'user' ? 'selected' : '' }}>user</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
