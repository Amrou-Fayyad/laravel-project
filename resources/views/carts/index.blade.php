@extends('layouts.layout');
@section('content')
 <h2>Carts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>User_id</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{$cart->id }}</td>
                    <td>{{$cart->user_id }}</td>
                    <td>
                        <a href="{{ route('carts.delete', $cart->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection