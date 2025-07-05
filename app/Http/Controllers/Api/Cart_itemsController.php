<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class Cart_itemsController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $items= CartItem::all();
        return response()->json(['cart_items'=>$items], 200);
    }
     public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'quantity' => 'required|integer',
        ]);
        $validated['cart_id'] = Cart::inRandomOrder()->value('id');
        $validated['product_id'] = Product::inRandomOrder()->value('id');

        $item = CartItem::create( $validated);

        return response()->json(['message' => 'Cart_Item created', 'cart_item' => $item], 201);
    }
     public function show($id)
    {
        $item = CartItem::find($id);

        if (!$item) {
            return response()->json(['message' => 'Cart_Item not found'], 404);
        }

        return response()->json($item, 200);
    }
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $item = CartItem::find($id);
        if (!$item) return response()->json(['message' => 'Cart_Item not found'], 404);

        $validated = $request->validate([
            'quantity' => 'required|integer',
            'cart_id' => 'sometimes|exists:carts,id',
            'product_id' => 'sometimes|exists:products,id'

        ]);
        $item->update($validated);

        return response()->json(['message' => 'Cart_Item updated', 'cart_item' => $item], 200);
    }
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $item= CartItem::find($id);
        if (!$item) return response()->json(['message' => 'Cart_Item not found'], 404);

        $item->delete();

        return response()->json(['message' => 'Cart_Item deleted'], 200);
    }
}
