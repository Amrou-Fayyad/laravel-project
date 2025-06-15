@extends('layouts.layout');
@section('content')
 <h2>Categories</h2>
 <a href="{{ route(name: 'categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('categories.delete', $category->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection