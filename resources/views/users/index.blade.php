@extends('layouts.layout');
@section('content')
 <h2>Users</h2>
 <a href="{{ route( 'users.create') }}" class="btn btn-primary mb-3">Add User</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id }}</td>
                    <td>{{$user->name }}</td>
                    <td>{{$user->email }}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('users.delete', $user->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
