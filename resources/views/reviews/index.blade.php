@extends('layouts.layout');
@section('content')
 <h2>Reviews</h2>
 <a href="{{ route(name: 'reviews.create') }}" class="btn btn-primary mb-3">Add Review</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>User_id</th><th>Product_id</th><th>Rating</th><th>Comment</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{$review->id }}</td>
                    <td>{{$review->user_id }}</td>
                    <td>{{$review->product_id}}</td>
                    <td>{{$review->rating}}</td>
                    <td>{{$review->comment}}</td>
                    <td>
                        <a href="{{ route('reviews.edit', $review->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('reviews.delete', $review->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection