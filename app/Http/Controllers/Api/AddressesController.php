<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $addresses= Address::all();
        return response()->json(['addresses'=>$addresses], 200);
    }
     public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'city' => 'required|string|max:150',
            'street' => 'required|string|max:150',
            'postal_code' => 'required|string|max:150',
        ]);

        $validated['user_id'] = User::inRandomOrder()->value('id');

        $address = Address::create( $validated);

        return response()->json(['message' => 'Address created', 'Address' => $address], 201);
    }
     public function show($id)
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        return response()->json($address, 200);
    }
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $address = Address::find($id);
        if (!$address) return response()->json(['message' => 'Address not found'], 404);

        $validated = $request->validate([
            'city' => 'required|string|max:150',
            'street' => 'required|string|max:150',
            'postal_code' => 'required|string|max:150',
            'user_id' => 'sometimes|exists:users,id',

        ]);
        $address->update($validated);

        return response()->json(['message' => 'Address updated', 'address' => $address], 200);
    }
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $address= Address::find($id);
        if (!$address) return response()->json(['message' => 'Address not found'], 404);

        $address->delete();

        return response()->json(['message' => 'Address deleted'], 200);
    }
}
