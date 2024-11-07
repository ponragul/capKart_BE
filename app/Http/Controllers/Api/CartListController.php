<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartList;
use Illuminate\Http\Request;

class CartListController extends Controller
{
    // Get all cart items
    public function index()
    {
        return CartList::all();
    }

    // Get a specific cart item by ID
    public function showByUserId($user_id)
    {
        // Fetch cart items for the given user_id
        $cartItems = CartList::where('user_id', $user_id)->get();
    
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'No cart items found for this user'], 404);
        }
    
        return response()->json($cartItems);
    }

    // Add a new cart item
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Assuming you have a 'products' table
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'pincode' => 'required|integer',
            'user_id' => 'required|string',
        ]);

        $cartItem = CartList::create($request->all());
        return response()->json($cartItem, 201); // Return the created cart item
    }

    // Update an existing cart item
    public function update(Request $request, $id)
    {
        $cartItem = CartList::find($id);
        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cartItem->update($request->all());
        return response()->json($cartItem);
    }

    // Delete a cart item
    public function destroy($id)
    {
        $cartItem = CartList::find($id);
        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cartItem->delete();
        return response()->json(['message' => 'Cart item deleted successfully']);
    }
}

