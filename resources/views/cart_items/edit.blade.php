@extends('layouts.layout')

@section('content')
    <h2>{{ isset($item) ? 'Edit Cart Item' : 'Create Cart Item' }}</h2>

    <form method="POST" action="{{ isset($item) ? route('cart_items.update', $item) : route('cart_items.store') }}">
        @csrf
        @if(isset($item))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{$item->quantity}}">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
