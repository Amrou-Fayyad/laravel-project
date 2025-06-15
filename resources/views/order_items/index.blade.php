@extends('layouts.layout');
@section('content')
 <h2>Order Items</h2>
 <a href="{{ route(name: 'order_items.create') }}" class="btn btn-primary mb-3">Add Order Items</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Order_id</th><th>Product_id</th><th>Quantity</th><th>Price</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id }}</td>
                    <td>{{$item->order_id }}</td>
                    <td>{{$item->product_id}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <a href="{{ route('order_items.edit', $item->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('order_items.delete', $item->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection