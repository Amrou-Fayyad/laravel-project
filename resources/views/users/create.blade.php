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
            <input type="text" name="name" id="name" class="form-control" value="">
            <label for="email" class="form-label">User Email</label>
            <input type="email" name="email" id="email" class="form-control" value="">
                    <label for="password" class="form-label">User Password</label>
            <input type="password" name="password" id="password" class="form-control" value="">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="admin">admin</option>
                   <option value="customer">customer</option>
                   <option value="user">user</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
