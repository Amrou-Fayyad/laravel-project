<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class Order_itemsController extends Controller
{

    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $items= OrderItem::all();
          return response()->json(['order_items' => $items], 200);
    }
     public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'quantity' => 'required|integer',
        ]);
        $validated['price'] = rand(10, 100);
        $validated['order_id'] = Order::inRandomOrder()->value('id');
        $validated['product_id'] = Product::inRandomOrder()->value('id');

        $item = OrderItem::create( $validated);

        return response()->json(['message' => 'Order_Item created', 'order_item' => $item], 201);
    }
     public function show($id)
    {
        $item = OrderItem::find($id);

        if (!$item) {
            return response()->json(['message' => 'Order_Item not found'], 404);
        }

        return response()->json($item, 200);
    }
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $item = OrderItem::find($id);
        if (!$item) return response()->json(['message' => 'Order_Item not found'], 404);

        $validated = $request->validate([
            'quantity' => 'required|integer',
            'price' => 'required|numeric|min:10',
            'order_id' => 'sometimes|exists:orders,id',
            'product_id' => 'sometimes|exists:products,id'

        ]);
        $item->update($validated);

        return response()->json(['message' => 'Order_Item updated', 'order_item' => $item], 200);
    }
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $item= OrderItem::find($id);
        if (!$item) return response()->json(['message' => 'Order_Item not found'], 404);

        $item->delete();

        return response()->json(['message' => 'Order_Item deleted'], 200);
    }
}
