<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $orders= Order::all();
        return response()->json(['orders'=>$orders], 200);
    }
     public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'total_price' => 'required|numeric|min:0',
            'status' => 'nullable|in:delivered,shipped,pending',
        ]);
        $validated['user_id'] = User::inRandomOrder()->value('id');
        $validated['address_id'] = Address::inRandomOrder()->value('id');

        $order = Order::create( $validated);

        return response()->json(['message' => 'Order created', 'order' => $order], 201);
    }
     public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order, 200);
    }
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $order = Order::find($id);
        if (!$order) return response()->json(['message' => 'Order not found'], 404);

        $validated = $request->validate([
            'total_price' => 'required|numeric|min:0',
            'status' => 'nullable|in:delivered,shipped,pending',
            'user_id' => 'sometimes|exists:users,id',
            'address_id' => 'sometimes|exists:addresses,id'

        ]);
        $order->update($validated);

        return response()->json(['message' => 'Order updated', 'order' => $order], 200);
    }
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $order= Order::find($id);
        if (!$order) return response()->json(['message' => 'Order not found'], 404);

        $order->delete();

        return response()->json(['message' => 'Order deleted'], 200);
    }
}
