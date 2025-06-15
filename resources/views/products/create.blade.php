@extends('layouts.layout')

@section('content')
    <h2>{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h2>

    <form method="POST" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="">
            <label for="description" class="form-label">Product Description</label>
            <input type="text" name="description" id="description" class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
