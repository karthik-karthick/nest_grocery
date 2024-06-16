<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\RazorpayController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use App\Models\Business_setting;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

$appStatus = Business_setting::where('key', 'app_status')->first();
if ($appStatus->value == 1) {
    Route::get('/', function () {
        return view('maintainance.comming_soon');
    });
} else {
    Route::get('/', function () {
        if (session()->has('is_admin') && session()->get('is_admin')) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/home');
        }
    });

    Route::get('/home', [UserController::class, 'index'])->name('/');

    // User Controller
    Route::get('/about', [UserController::class, 'about'])->name('about');
    Route::get('/blog', [UserController::class, 'blog'])->name('blog');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/terms', [UserController::class, 'terms'])->name('terms');
    Route::get('/purchase', [UserController::class, 'purchase'])->name('purchase');
    Route::get('/privacy', [UserController::class, 'privacy'])->name('privacy');
    Route::get('/error', [UserController::class, 'error'])->name('error');
    Route::get('/vendor/list', [UserController::class, 'vendor'])->name('vendor.list');

    // Product Controller
    Route::get('/shop/list', [ProductController::class, 'shop_list'])->name('shop.list');
    Route::get('/compare', [ProductController::class, 'compare'])->name('compare');
    Route::get('/account', [ProductController::class, 'account'])->name('account');
    Route::get('product/detail/{id}', [ProductController::class, 'product_detail'])->name('prod.detail');
    Route::get('/search-suggestions', [ProductController::class, 'search_suggestion']);
    Route::get('/search/product', [ProductController::class, 'search'])->name('search.product');

    // Login Controller
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/forget/password', [LoginController::class, 'forget_password'])->name('forget.password');
    Route::get('/reset/password', [LoginController::class, 'reset_password'])->name('reset.password');

    // Google Login
    Route::get('/redirect/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

    // Register Controller
    Route::get('/register', [RegisterController::class, 'register'])->name('register');

    // Wishlist Controller
    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'addToWishlist']);
    Route::get('/getwishlist', [WishlistController::class, 'get_wishlist']);

    // Cart Controller
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/add/cart/{id}', [CartController::class, 'add_cart']);
    Route::get('/getcart', [CartController::class, 'getcart']);
    Route::get('/deletecartitem', [CartController::class, 'cart_item_delete']);
    Route::get('/cartdecrease', [CartController::class, 'cart_decress']);
    Route::get('/cartincrease', [CartController::class, 'cart_increase']);
    Route::get('/checkout/cart', [CartController::class, 'checkout'])->name('check.out');

    // Order Controller
    Route::post('/checkout', [UserOrderController::class, 'cart_order'])->name('cart.checkout');
    Route::get('/order/success', [UserOrderController::class, 'order_success'])->name('order.success');
    Route::get('/order/details/{id}', [UserOrderController::class, 'order_detail'])->name('get.details');
    Route::post('/order/cancel', [UserOrderController::class, 'cancel_order'])->name('order.cancel');
    Route::post('/order/return/{id}', [UserOrderController::class, 'return_order'])->name('order.return');
    Route::get('/invoice/view/{id}', [UserOrderController::class, 'view_invoice'])->name('invoice.view');
    Route::get('/invoice/download/{id}', [UserOrderController::class, 'download_invoice'])->name('invoice.download');

    // Razorpay Controller
    Route::get('razorpay-payment', [RazorpayController::class, 'index']);
    Route::post('razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');
}
// Admin Controller
Route::middleware(['isAdmin'])->group(function () {

    // Admin Controller
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

    //Product Controller
    Route::get('/add/product', [AdminProductController::class, 'add_product'])->name('add.product');
    Route::get('/product/list', [AdminProductController::class, 'product_list'])->name('product.list');
    Route::get('/get-subcategories', [AdminProductController::class, 'getSubcategories']);
    Route::get('/get-subcategory-sku', [AdminProductController::class, 'getSubcategorySku']);
    Route::post('/product/submit', [AdminProductController::class, 'product_submit'])->name('product.submit');
    Route::get('/products', [AdminProductController::class, 'getproducts']);
    Route::get('/edit/product/{id}', [AdminProductController::class, 'edit_product'])->name('edit.product');
    Route::post('/del/product', [AdminProductController::class, 'del_product'])->name('del.product');

    // Category Controller
    Route::get('/category/list', [CategoryController::class, 'category'])->name('category.list');
    Route::post('/add/category', [CategoryController::class, 'add_category'])->name('add.category');
    Route::get('/categories', [CategoryController::class, 'get_category']);
    Route::post('/del/category', [CategoryController::class, 'del_category'])->name('del.category');
    Route::get('/get-category', [CategoryController::class, 'get_category_id']);
    Route::post('/change/category/status', [CategoryController::class, 'change_status']);

    // SubCategory Controller
    Route::get('/subcategory/list', [SubcategoryController::class, 'subcategory_list'])->name('subcategory.list');
    Route::post('/add/subcategory', [SubcategoryController::class, 'add_subcategory'])->name('add.subcategory');
    Route::get('/subcategories', [SubcategoryController::class, 'getsubCategories']);
    Route::post('/del/subcategory', [SubcategoryController::class, 'del_subcategory'])->name('del.subcategory');
    Route::post('/change/subcategory/status', [SubcategoryController::class, 'change_status']);
    Route::get('/get-subcategory', [SubcategoryController::class, 'getSubcategory']);

    // Brand Controller
    Route::get('/brands/list', [BrandController::class, 'brands'])->name('list.brands');
    Route::post('/add/brands', [BrandController::class, 'add_brand'])->name('add.brand');
    Route::get('/brands', [BrandController::class, 'getBrands']);
    Route::post('del/brand', [BrandController::class, 'del_brand'])->name('del.brand');
    Route::get('/get/brand', [BrandController::class, 'getBrand']);

    // Order Controller
    Route::get('/order/list', [OrderController::class, 'order_list'])->name('order.list');
    Route::get('/orders', [OrderController::class, 'getorders']);
    Route::get('/view/order/{id}', [OrderController::class, 'view_order'])->name('view.order');
    Route::post('/status/update', [OrderController::class, 'status_update'])->name('status.update');

    // Report Controller
    Route::get('/in/stock', [ReportController::class, 'in_stock'])->name('in.stock');
    Route::get('/out/of/stock', [ReportController::class, 'out_of_stock'])->name('outof.stock');
    Route::get('/get/in/stock', [ReportController::class, 'get_in_stock']);
    Route::get('/get/outof/stock', [ReportController::class, 'get_outof_stock']);
    Route::post('/edit/stock/{id}', [ReportController::class, 'edit_stock'])->name('edit.stock');

    // Settings Controller

    Route::get('/terms/setting', [SettingsController::class, 'terms_setting'])->name('terms.setting');
    Route::post('/add/terms', [SettingsController::class, 'add_terms'])->name('add.terms');

    Route::get('/privacy/policy', [SettingsController::class, 'privacy_policy'])->name('privacy.policy');
    Route::post('/add/privacy', [SettingsController::class, 'add_privacy'])->name('add.privacy');

    Route::get('/return/policy', [SettingsController::class, 'return_policy'])->name('return.policy');
    Route::post('/add/return', [SettingsController::class, 'add_return'])->name('add.return');

    Route::get('/support/policy', [SettingsController::class, 'support_policy'])->name('support.policy');
    Route::post('/add/suport', [SettingsController::class, 'add_support'])->name('add.support');

    Route::get('/edit/about', [SettingsController::class, 'about_us'])->name('edit.about');
    Route::post('/add/about', [SettingsController::class, 'add_about'])->name('add.about');

    Route::get('/app/ettings', [SettingsController::class, 'app_settings'])->name('app.setting');
    Route::post('/setup', [SettingsController::class, 'business_setup'])->name('business.setup');

    Route::get('/payment/method', [SettingsController::class, 'payment_method'])->name('payment.method');
    Route::post('/razorpay/status', [SettingsController::class, 'razorpay_status'])->name('razorpay.status');

    Route::get('/maintenance', [SettingsController::class, 'app_main'])->name('app.main');
    Route::post('/app/status', [SettingsController::class, 'app_main_status'])->name('app.status');

    // Error
    Route::get('/error', [AdminController::class, 'error'])->name('get.error');
});
