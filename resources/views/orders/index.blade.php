@extends('layouts.layout');
@section('content')
 <h2>Orders</h2>
 <a href="{{ route(name: 'orders.create') }}" class="btn btn-primary mb-3">Add Orders</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>User_id</th><th>Total_price</th><th>Status</th><th>Address_id</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id }}</td>
                    <td>{{$order->user_id }}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->address_id}}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('orders.delete', $order->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection