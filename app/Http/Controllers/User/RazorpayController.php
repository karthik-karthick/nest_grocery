<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\Cartorder_Placed;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('user.product.razorpayView');
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();

            $orderId = $input['order_id'];
            $razorpayPaymentId = $input['razorpay_payment_id'];
            $razorpayOrderId = $input['razorpay_order_id'];

            // Initialize Razorpay API
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Fetch the payment details using the payment ID
            $payment = $api->payment->fetch($razorpayPaymentId);

            $order = Order::where('order_id', $orderId)->first();

            // Capture the payment if not already captured
            if ($payment['status'] !== 'captured') {
                $payment = $payment->capture(['amount' => $payment['amount']]);
                if ($order) {
                    $order->payment_id = $razorpayPaymentId;
                    $order->razorpay_id = $razorpayOrderId;
                    $order->status = 'cancelled';
                    $order->payment_status = 'failed'; // Use the actual status from Razorpay
                    $order->save();
                    $order_details = OrderDetail::where('order_id', $order->id)->get();
                    foreach ($order_details as $order_detail) {
                        $order_detail->status = 'cancelled';
                        $order_detail->payment_status = 'failed';
                        $order_detail->save();
                    }
                }
                $errorMessage = 'payment Failed ... Try Again !!!';
                return view('user.pages.error_page')->with('error', $errorMessage);
            } else {
                $paymentStatus = $payment['status'];

                // Update your order table
                $order = Order::where('order_id', $orderId)->first();

                if ($order) {
                    $order->payment_id = $razorpayPaymentId;
                    $order->razorpay_id = $razorpayOrderId;
                    $order->status = 'Pending';
                    $order->payment_status = 'paid';
                    $order->save();
                    $order_details = OrderDetail::where('order_id', $order->id)->get();
                    foreach ($order_details as $order_detail) {
                        $order_detail->payment_status = 'paid';
                        $order_detail->status = 'Pending';
                        $order_detail->save();
                    }
                }

                // send email to order success
                $userId = Auth::id();
                $receiver = User::find($userId);
                $orderstatus = OrderDetail::where('order_id', $order->id)->get();

                $productDetails = [];

                foreach ($orderstatus as $orders) {
                    $product_id = $orders->product_id;
                    $product = Product::where('id', $product_id)->first();

                    $productDetails[] = [
                        'product_name' => $product->product_name,
                        'brand' => $product->brand->brand_name,
                        'status' => $orders->status,
                        'order_id' => $order->order_id,
                    ];
                }
                $details = [
                    'username' => $receiver->name,
                    'products' => $productDetails,
                ];
                try {
                    $orderPlacedMail = new Cartorder_Placed($details);
                    Mail::to($receiver->email)->send($orderPlacedMail);

                    // Event::listen(MessageFailed::class, function ($event) {
                    // });
                } catch (\Exception $e) {
                    return "Failed to send email. Error: " . $e->getMessage();
                }

                return redirect()->route('order.success');
            }
        } catch (\Exception $e) {
            return view('user.pages.error_page')->with('error', $e->getMessage());
        }
    }
}
