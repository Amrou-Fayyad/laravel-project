@extends('layouts.layout')

@section('content')
    <h2>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>

    <form method="POST" action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
