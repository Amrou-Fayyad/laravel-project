<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
      public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $carts= Cart::all();
        return response()->json(['carts'=>$carts], 200);
    }

     public function show($id)
    {
        $carts = Cart::find($id);

        if (!$carts) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        return response()->json($carts, 200);
    }
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $carts= Cart::find($id);
        if (!$carts) return response()->json(['message' => 'Cart not found'], 404);

        $carts->delete();

        return response()->json(['message' => 'Cart deleted'], 200);
    }
}
