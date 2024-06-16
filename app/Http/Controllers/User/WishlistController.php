<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->get();
        return view('user.product.wishlist', compact('wishlist'));
    }
    public function addToWishlist($id)
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $product = Product::find($id);

                if (!$product) {
                    return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
                }

                $existingWishlist = Wishlist::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first();

                if ($existingWishlist) {
                    $existingWishlist->delete();
                    return response()->json(['success' => true, 'message' => 'Product removed from wishlist successfully']);
                }

                $wishlist = new Wishlist();
                $wishlist->user_id = $user->id;
                $wishlist->product_id = $product->id;
                $wishlist->save();

                return response()->json(['success' => true, 'message' => 'Product added to wishlist successfully']);
            } else {
                $message = 'Login to Add Wishlist';
                return response()->json(['error' => false, 'message' => $message], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Error occurred while processing the request.'], 500);
        }
    }

    public function get_wishlist()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $wishlist = Wishlist::with('product')->where('user_id', $user->id)->get();
            return response()->json(['html' => $wishlist]);
        } else {
            return redirect()->route('login');
        }
    }
}
