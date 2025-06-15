@extends('layouts.layout');
@section('content')
 <h2>Address</h2>
 <a href="{{ route(name: 'addresses.create') }}" class="btn btn-primary mb-3">Add Address</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>User_id</th><th>City</th><th>Street</th><th>Postal_code</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addresses as $address)
                <tr>
                    <td>{{ $address->id }}</td>
                    <td>{{ $address->user_id }}</td>
                    <td>{{ $address->city}}</td>
                    <td>{{ $address->street}}</td>
                    <td>{{ $address->postal_code}}</td>
                    <td>
                        <a href="{{ route('addresses.edit', $address->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('addresses.delete', $address->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection