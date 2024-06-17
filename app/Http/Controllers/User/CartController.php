<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $carts = Cart::where('user_id', $user->id)->get();
                $cart = count($carts);

                return view('user.product.cart', compact('cart'));
            } else {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getcart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::with('product.brand')->where('user_id', $user->id)->get();

            return response()->json(['html' => $cart]);
        } else {
            return redirect()->route('login');
        }
    }
    public function add_cart($id)
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $product = Product::where('id', $id)->first();

                $existingCart = Cart::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first();
                if ($existingCart) {
                    return response()->json(['error' => false, 'message' => 'Item already in your cart']);
                } else {
                    $cart = new Cart();
                    $cart->user_id = $user->id;
                    $cart->product_id = $id;
                    $cart->product_price = $product->product_price;
                    $cart->discount_price = $product->selling_price;
                    $cart->cart_quantity = '1';
                    $cart->save();
                }
                return response()->json(['success' => true, 'message' => 'Item added to cart successfully']);
            } else {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return view('user.pages.error_page')->with('error', $e->getMessage());
        }
    }

    public function cart_decress(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $quantity = 1;
        $cart = Cart::find($cart_id);

        if ($cart->cart_quantity > 1) {
            $cart->cart_quantity = max(1, $cart->cart_quantity - $quantity);
            $cart->update();
            return response()->json(['message' => 'Cart quantity decreased successfully']);
        } else {
            return response()->json(['message' => 'Cart quantity cannot be less than 1'], 400);
        }
    }

    public function cart_increase(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $cart = Cart::find($cart_id);

        if ($cart) {
            $product = Product::find($cart->product_id);

            if ($product) {
                $quantity = 1;
                $new_quantity = $cart->cart_quantity + $quantity;

                if ($new_quantity <= $product->current_stock) {
                    $cart->cart_quantity = $new_quantity;
                    $cart->update();
                    return response()->json(['message' => 'Cart quantity increased successfully']);
                } else {
                    return response()->json(['message' => 'Cannot increase cart quantity beyond current stock'], 400);
                }
            } else {
                return response()->json(['message' => 'Product not found'], 404);
            }
        } else {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }

    public function cart_item_delete(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $cart = Cart::find($cart_id);
        $cart->delete();
        return response()->json(['success' => true, 'message' => 'Cart item Removed Successfully!!']);
    }
    public function checkout()
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $product = Cart::where('user_id', $user->id)->get();
                $count = count($product);
                if ($count != null) {
                    $address = Address::where('user_id', $user->id)->get();
                    return view('user.orders.checkout', compact('product', 'address'));
                } else {
                    return redirect()->route('shop.list');
                }
            } else {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return view('user.pages.error_page')->with('error', $e->getMessage());
        }
    }
}
