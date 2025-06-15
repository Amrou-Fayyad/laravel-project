@extends('layouts.layout')

@section('content')
    <h2>{{ isset($review) ? 'Edit Review' : 'Create Review' }}</h2>

    <form method="POST" action="{{ isset($review) ? route('reviews.update', $review) : route('reviews.store') }}">
        @csrf
        @if(isset($review))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <input type="text" name="comment" id="comment" class="form-control" value="">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
