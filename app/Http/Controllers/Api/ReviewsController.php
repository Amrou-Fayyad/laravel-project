<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $reviews= Review::all();
        return response()->json(['reviews'=>$reviews], 200);
    }
     public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $validated['rating'] = rand(1, 10);
        $validated['user_id'] = User::inRandomOrder()->value('id');
        $validated['product_id'] = Product::inRandomOrder()->value('id');

        $review = Review::create( $validated);

        return response()->json(['message' => 'Review created', 'review' => $review], 201);
    }
     public function show($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($review, 200);
    }
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $review = Review::find($id);
        if (!$review) return response()->json(['message' => 'Review not found'], 404);

        $validated = $request->validate([
            'comment' => 'sometimes|required|string|max:255',
            'rating' => 'sometimes|integer',
            'user_id' => 'sometimes|exists:users,id',
            'product_id' => 'sometimes|exists:products,id'

        ]);
        $review->update($validated);

        return response()->json(['message' => 'Review updated', 'review' => $review], 200);
    }
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $review= Review::find($id);
        if (!$review) return response()->json(['message' => 'Review not found'], 404);

        $review->delete();

        return response()->json(['message' => 'Review deleted'], 200);
    }
}
