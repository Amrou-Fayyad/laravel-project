@extends('layouts.layout')

@section('content')
    <h2>{{ isset($address) ? 'Edit Address' : 'Create Address' }}</h2>

    <form method="POST" action="{{ isset($address) ? route('addresses.update', $address) : route('addresses.store') }}">
        @csrf
        @if(isset($address))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{$address->city}}">
            <label for="street" class="form-label">Street</label>
            <input type="text" name="street" id="street" class="form-control" value="{{$address->street}}">
            <label for="postal_code" class="form-label">Postal_Code</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{$address->postal_code}}">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
