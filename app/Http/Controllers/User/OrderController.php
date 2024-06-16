<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    public function order_success()
    {
        return view('user.orders.order_success');
    }
    public function cart_order(Request $request)
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                if ($request->address_id == NULL) {
                    $validator = Validator::make($request->all(), [

                        'first_name' => 'required|string',
                        'last_name' => 'required|string',
                        'email' => 'required|string',
                        'phone' => 'required|string',
                        'state' => 'required|string',
                        'district' => 'required|string',
                        'city' => 'required|string',
                        'street' => 'required|string',
                        'landmark' => 'required|string',
                        'pin' => 'required|string',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                    $address = new Address();
                    $address->user_id = $user->id;
                    $address->first_name = $request->first_name;
                    $address->last_name = $request->last_name;
                    $address->phone_no = $request->phone;
                    $address->email = $request->email;
                    $address->state = $request->state;
                    $address->district = $request->district;
                    $address->city = $request->city;
                    $address->street = $request->street;
                    $address->landmark = $request->landmark;
                    $address->pincode = $request->pin;
                    $address->save();

                    $new_address_id = $address->id;
                } else {
                    $new_address_id = $request->address_id;
                }
            } else {
                return redirect()->route('login');
            }
            if ($request->is_cart === 'is_cart') {

                if ($request->checkout_payment_method === 'online payment') {

                    $cart = Cart::where('user_id', $user->id)->get();
                    $total = 0;
                    $shiping = 0;
                    $quantity = 0;

                    foreach ($cart as $carts) {
                        $subtotal = $carts->cart_quantity * $carts->discount_price;
                        $total += $subtotal;
                        $shiping += $carts->product->shipping_price;
                        $quantity += $carts->cart_quantity;
                    }
                    $final_total = $shiping + $total;

                    $request->validate([

                        'checkout_payment_method' => 'required',
                    ]);

                    $order = new Order();
                    $order->user_id =  $user->id;
                    $order->product_id = 'cart order';
                    $order->subtotal = $total;
                    $order->shiping = $shiping;
                    $order->quantity = $quantity;
                    $order->grandtotal = $final_total;
                    $order->payment_method = 'Razorpay';
                    $order->payment_status = 'Un_paid';
                    $order->status = 'Cancelled';
                    $order->save();

                    $newOrderId = $order->id;
                    $cartItem = Cart::where('user_id', $user->id)->get();
                    foreach ($cartItem as $carts) {
                        try {
                            $product = Product::where('id', $carts->product_id)->first();
                            // Update product quantity
                            $productId = $product->id;
                            $orderedQuantity = $carts->cart_quantity;
                            $products = Product::find($productId);
                            if ($products) {
                                $currentQuantity = $products->current_stock;
                                if ($currentQuantity >= $orderedQuantity) {
                                    $products->current_stock = $currentQuantity - $orderedQuantity;
                                    $products->save();
                                } else {
                                    return redirect()->back()->with('error', 'Insufficient quantity in stock.');
                                }
                            } else {
                                return redirect()->back()->with('error', 'Product not found.');
                            }

                            if ($product) {
                                $product_id = $product->id;
                                $subtotals = $carts->discount_price * $carts->cart_quantity;
                                $quantity = $carts->cart_quantity;
                                $grand_total = $subtotals + $product->shipping_price;

                                $order_detail = new OrderDetail();
                                $order_detail->order_id = $newOrderId;
                                $order_detail->user_id = $user->id;
                                $order_detail->product_id = $product_id;
                                $order_detail->product_name = $product->product_name;
                                $order_detail->sub_total = $subtotals;
                                $order_detail->quantity = $quantity;
                                $order_detail->shiping = $product->shipping_price;
                                $order_detail->grandtotal = $grand_total;
                                $order_detail->payment_method = 'Rozerpay';
                                $order_detail->status = 'Cancelled';
                                $order_detail->payment_status = 'Un_paid';
                                $order_detail->address_id = $new_address_id;
                                $order_detail->save();

                                if ($carts) {
                                    $carts->delete();
                                }
                            } else {
                                return redirect()->back()->with('error', 'product not fount');
                            }
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'something else' . $e->getMessage());
                        }
                    }

                    // Razorpay Integration
                    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                    $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    $receipt_id = "RAZ_" . $newOrderId . $randomDigits;
                    $razorpayOrder = $api->order->create([
                        'receipt' => $receipt_id,
                        'amount' => $final_total * 100,
                        'currency' => 'INR'
                    ]);

                    $razorpayOrderId = $razorpayOrder['id'];


                    $order_update = Order::where('id', $newOrderId)->first();
                    $order_update->order_id = $receipt_id;
                    $order_update->save();

                    return view('user.product.razorpayView', compact('razorpayOrderId', 'final_total', 'receipt_id'));
                }
                if ($request->checkout_payment_method === 'cash on delivery') {

                    $cart = Cart::where('user_id', $user->id)->get();

                    $total = 0;
                    $shiping = 0;
                    $quantity = 0;

                    foreach ($cart as $carts) {
                        $subtotal = $carts->cart_quantity * $carts->discount_price;
                        $total += $subtotal;
                        $shiping += $carts->product->shipping_price;
                        $quantity += $carts->cart_quantity;
                    }
                    $grand_total = $shiping + $total;
                    $request->validate([

                        'checkout_payment_method' => 'required',
                    ]);

                    $order = new Order();
                    $order->user_id =  $user->id;
                    $order->product_id = 'cart order';
                    $order->subtotal = $total;
                    $order->shiping = $shiping;
                    $order->quantity = $quantity;
                    $order->grandtotal = $grand_total;
                    $order->payment_method = $request->checkout_payment_method;
                    $order->save();

                    $newOrderId = $order->id;

                    $cartItem = Cart::where('user_id', $user->id)->get();
                    foreach ($cartItem as $carts) {
                        try {
                            $product = Product::where('id', $carts->product_id)->first();
                            // Update product quantity
                            $productId = $product->id;
                            $orderedQuantity = $carts->cart_quantity;
                            $products = Product::find($productId);
                            if ($products) {
                                $currentQuantity = $products->current_stock;
                                if ($currentQuantity >= $orderedQuantity) {
                                    $products->current_stock = $currentQuantity - $orderedQuantity;
                                    $products->save();
                                } else {
                                    return redirect()->back()->with('error', 'Insufficient quantity in stock.');
                                }
                            } else {
                                return redirect()->back()->with('error', 'Product not found.');
                            }

                            if ($product) {
                                $product_id = $product->id;
                                $subtotals = $carts->discount_price * $carts->cart_quantity;
                                $quantity = $carts->cart_quantity;
                                $grand_total = $subtotals + $product->shipping_price;

                                $order_detail = new OrderDetail();
                                $order_detail->order_id = $newOrderId;
                                $order_detail->user_id = $user->id;
                                $order_detail->product_id = $product_id;
                                $order_detail->product_name = $product->product_name;
                                $order_detail->sub_total = $subtotals;
                                $order_detail->quantity = $quantity;
                                $order_detail->shiping = $product->shipping_price;
                                $order_detail->grandtotal = $grand_total;
                                $order_detail->payment_method = $request->checkout_payment_method;
                                $order_detail->address_id = $new_address_id;
                                $order_detail->save();
                                if ($carts) {
                                    $carts->delete();
                                }
                                $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                                $receipt_id = "COD_" . $newOrderId . $randomDigits;
                                $order_update = Order::where('id', $newOrderId)->first();
                                $order_update->order_id = $receipt_id;
                                $order_update->save();
                            } else {
                                return redirect()->back()->with('error', 'product not fount');
                            }
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'something else' . $e->getMessage());
                        }
                    }

                    return redirect()->route('order.success');
                }
            } else {
                if ($request->checkout_payment_method === 'online payment') {
                    $product = Product::find($request->product_id);
                    $order = new Order();
                    $order->user_id = $user->id;
                    $order->product_id = $request->product_id;
                    $suptotal = $request->quantity * $product->selling_price;
                    $order->subtotal = $suptotal;
                    $order->shiping = $product->shipping_price;
                    $order->quantity = $request->quantity;
                    $grant_total = $suptotal + $product->shipping_price;
                    $order->grandtotal = $grant_total;
                    $order->payment_method = 'Rozerpay';
                    $order->payment_status = 'Un_paid';
                    $order->status = 'Cancelled';
                    $order->save();

                    $newOrderId =  $order->id;

                    $order_detail = new OrderDetail();
                    $order_detail->user_id = $user->id;
                    $order_detail->product_id = $request->product_id;
                    $order_detail->product_name = $product->product_name;
                    $order_detail->sub_total = $request->quantity * $product->selling_price;
                    $order_detail->quantity = $request->quantity;
                    $order_detail->shiping = $product->shipping_price;
                    $grandtotal =  $product->selling_price * $request->quantity;
                    $final_total = $grandtotal  + $product->shipping_price;
                    $order_detail->grandtotal = $final_total;
                    $order_detail->payment_method = 'Rozerpay';
                    $order_detail->payment_status = 'Un_paid';
                    $order_detail->status = 'Cancelled';
                    $order_detail->address_id = $request->address_id;


                    // Razorpay Integration
                    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                    $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    $receipt_id = "RAZ_" . $newOrderId . $randomDigits;
                    $razorpayOrder = $api->order->create([
                        'receipt' => $receipt_id,
                        'amount' => $final_total * 100,
                        'currency' => 'INR'
                    ]);
                    $razorpayOrderId = $razorpayOrder['id'];
                    $order_detail->order_id = $newOrderId;
                    $order_detail->save();

                    $order_update = Order::where('id', $newOrderId)->first();
                    $order_update->order_id = $receipt_id;
                    $order_update->save();

                    return view('user.product.razorpayView', compact('razorpayOrderId', 'final_total', 'receipt_id'));
                }
                if ($request->checkout_payment_method === 'cash on delivery') {
                    $product = Product::find($request->product_id);
                    $order = new Order();
                    $order->user_id = $user->id;
                    $order->product_id = $request->product_id;
                    $suptotal = $request->quantity * $product->selling_price;
                    $order->subtotal = $suptotal;
                    $order->shiping = $product->shipping_price;
                    $order->quantity = $request->quantity;
                    $grant_total = $suptotal + $product->shipping_price;
                    $order->grandtotal = $grant_total;
                    $order->payment_method = $request->checkout_payment_method;
                    $order->save();

                    $newOrderId =  $order->id;

                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $newOrderId;
                    $order_detail->user_id = $user->id;
                    $order_detail->product_id = $request->product_id;
                    $order_detail->product_name = $product->product_name;
                    $order_detail->sub_total = $request->quantity * $product->selling_price;
                    $order_detail->quantity = $request->quantity;
                    $order_detail->shiping = $product->shipping_price;
                    $grandtotal =  $product->selling_price * $request->quantity;
                    $final_total = $grandtotal  + $product->shipping_price;
                    $order_detail->grandtotal = $final_total;
                    $order_detail->payment_method = $request->checkout_payment_method;
                    $order_detail->address_id = $request->address_id;
                    $order_detail->save();

                    $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    $receipt_id = "COD_" . $newOrderId . $randomDigits;

                    $order_update = Order::where('id', $newOrderId)->first();
                    $order_update->order_id = $receipt_id;
                    $order_update->save();

                    $update_product = Product::find($request->product_id);
                    $reduce_quantity = $update_product->current_stock - $request->quantity;
                    $update_product->current_stock = $reduce_quantity;
                    $update_product->update();

                    return redirect()->route('order.success');
                }
            }
        } catch (\Exception $e) {
            return view('user.pages.error_page')->with('error', $e->getMessage());
        }
    }

    public function order_detail($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $order_detail = Order::find($id);
            $order = OrderDetail::where('order_id', $order_detail->id)->get();
            $order_count = count($order);
            $orders = OrderDetail::where('order_id', $order_detail->id)->first();
            $address = Address::where('id', $orders->address_id)->first();
            return view('user.orders.order_detail', compact('order', 'orders', 'order_count'));
        } else {
            return redirect()->route('login');
        }
    }
    public function cancel_order(Request $request)
    {
        try {
            if ($request->iscart == null) {
                if ($request->order_id) {
                    $order = OrderDetail::where('id', $request->order_id)->first();
                    $order->status = $request->status;
                    $order->update();

                    $orders = Order::where('id', $order->order_id)->first();
                    $orders->status = $request->status;
                    $orders->update();

                    $product = Product::where('id', $orders->product_id)->first();
                    $quantity = $product->quantity;
                    $order_quantity = $orders->quantity;
                    $product->quantity = $quantity + $order_quantity;
                    $product->update();
                    return redirect()->back()->with('success', 'Successfully Order Cancelled');
                } else {
                    return redirect()->back()->with('error', 'Order Cannot Found');
                }
            } else {
                // dd($request->input());

                if ($request->order_id) {
                    $order = OrderDetail::where('order_id', $request->order_id)->first();
                    $orders = Order::where('id', $order->order_id)->first();
                    $orders->status = $request->status;
                    $orders->update();

                    $order_details = OrderDetail::where('order_id', $request->order_id)->get();
                    foreach ($order_details as $order_detail) {
                        $order_detail->status = $request->status;
                        $order_detail->update();

                        $product = Product::where('id', $order_detail->product_id)->first();
                        $quantity = $product->current_stock;
                        $order_quantity = $order_detail->quantity;
                        $product->current_stock = $quantity + $order_quantity;
                        $product->update();
                    }
                    return redirect()->back()->with('success', 'Successfully Order Cancelled');
                } else {
                    return redirect()->back()->with('error', 'Order Cannot Found');
                }
            }
        } catch (\Exception $e) {
            return view('user.pages.error_page')->with('error', $e->getMessage());
        }
    }
    public function return_order(Request $request, $id)
    {
        try {
            $order = Order::where('id', $id)->first();
            if ($request->status === $order->status) {
                return redirect()->back()->with('error', 'Already return requested');
            } else {
                if ($id) {
                    $order = Order::where('id', $id)->first();
                    $order->status = $request->status;
                    $order->update();
                    $order_detail = OrderDetail::where('order_id', $id)->get();
                    foreach ($order_detail as $orders) {
                        $orders->status = $request->status;
                        $orders->reason = $request->reason;
                        $orders->custom_reason = $request->custom_reason;
                        $orders->update();
                    }
                    return redirect()->back()->with('success', 'Successfully Return requested');
                } else {
                    return redirect()->back()->with('error', 'No orders found');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    public function view_invoice($id)
    {

        $order = OrderDetail::with('address')->find($id);
        $orders = OrderDetail::with('product')->where('order_id', $order->order_id)->get();
        $pdf = Pdf::loadView('user/orders/invoice', compact('order', 'orders'));
        return $pdf->stream("invoice.pdf");
    }
    public function download_invoice($id)
    {
        $order = OrderDetail::with('address')->find($id);
        $orders = OrderDetail::with('product')->where('order_id', $order->order_id)->get();
        $pdf = Pdf::loadView('user/orders/invoice', compact('order', 'orders'));
        return $pdf->download("invoice.pdf");
    }
}
