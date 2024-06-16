<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '1')->get();
        $products = Product::get()->random(10);
        return view('user.index', compact('category', 'products'));
    }
    public function about()
    {
        return view('user.pages.about');
    }
    public function blog()
    {
        return view('user.pages.blog');
    }
    public function contact()
    {
        return view('user.pages.contact');
    }

    public function terms()
    {
        return view('user.pages.terms');
    }
    public function purchase()
    {
        return view('user.pages.purchase_guide');
    }
    public function privacy()
    {
        return view('user.pages.privacy_policy');
    }
    public function error()
    {
        return view('user.pages.error_page');
    }
    public function vendor()
    {
        $vendor = Brand::all();
        return view('user.pages.vendor', compact('vendor'));
    }
}
