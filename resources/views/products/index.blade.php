@extends('layouts.layout');
@section('content')
 <h2>Products</h2>
 <a href="{{ route(name: 'products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Stock</th><th>Category_id</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id }}</td>
                    <td>{{$product->name }}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('products.delete', $product->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection