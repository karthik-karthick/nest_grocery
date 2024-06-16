<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function shop_list()
    {
        $product = Product::all();
        return view('user.product.product_list', compact('product'));
    }

    public function compare()
    {
        return view('user.product.compare');
    }
    public function account()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $address = Address::where('user_id', $user->id)->first();
            $order = Order::where('user_id', $user->id)->get();
            return view('user.account.my_account', compact('order', 'address'));
        } else {

            return redirect()->route('login');
        }
    }
    public function product_detail($id)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $product = Product::find($id);
            $iswishlist = Wishlist::where('user_id', $user->id)->first();
            return view('user.product.prod_detail', compact('product', 'iswishlist'));
        } else {
            $user = Auth::user();
            $product = Product::find($id);
            return view('user.product.prod_detail', compact('product'));
        }
    }
    public function search_suggestion(Request $request)
    {
        $query = $request->input('query');
        $suggestions = Product::where('product_name', 'like', '%' . $query . '%')->pluck('product_name');
        return response()->json($suggestions,);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $user = Auth::user();
        $product = Product::where('product_name', 'like', '%' . $query . '%')->get();
        return view('user.product.product_list', compact('product'));
    }
}
