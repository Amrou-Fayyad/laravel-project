@extends('layouts.layout');
@section('content')
 <h2>Cart Items</h2>
 <a href="{{ route(name: 'cart_items.create') }}" class="btn btn-primary mb-3">Add Cart Item</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Cart_id</th><th>Product_id</th><th>Quantity</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id }}</td>
                    <td>{{$item->cart_id }}</td>
                    <td>{{$item->product_id}}</td>
                    <td>{{$item->quantity}}</td>
                     <td>
                        <a href="{{ route('cart_items.edit', $item->id ) }}" class="btn btn-sm btn-warning">Edit</a> 
                        <a href="{{ route('cart_items.delete', $item->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection