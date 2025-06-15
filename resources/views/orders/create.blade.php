@extends('layouts.layout')

@section('content')
    <h2>{{ isset($order) ? 'Edit Order' : 'Create Order' }}</h2>

    <form method="POST" action="{{ isset($order) ? route('orders.update', $order) : route('orders.store') }}">
        @csrf
        @if(isset($order))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="total price" class="form-label">Total Price</label>
            <input type="number" name="total_price" id="total price" step="0.01" class="form-control" value="">
            <label for="status" class="form-label">Order Status</label>
           <select name="status" class="form-select">
                <option value="shipped">shipped</option>
                <option value="pending">pending</option>
                <option value="delivered">delivered</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
