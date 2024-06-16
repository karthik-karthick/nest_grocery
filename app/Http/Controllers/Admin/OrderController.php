<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Status_Update;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function order_list()
    {
        return view('admin.orders.order_list');
    }
    public function getOrders()
    {

        $orders = Order::with('product')->select(['id', 'order_id', 'user_id', 'product_id', 'subtotal', 'shiping', 'quantity', 'grandtotal', 'payment_method', 'razorpay_id', 'payment_id', 'payment_status', 'status'])->get();

        return datatables()->of($orders)
            ->addColumn('action', function ($row) {
                // Create action buttons (edit and delete)

                $viewUrl = route('view.order', ['id' => $row->id]);

                $html = '<a class="btn btn-sm btn-primary" href="' . $viewUrl . '">View</a>';
                return $html;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function view_order($id)
    {

        $orders = Order::find($id);
        $order = OrderDetail::where('order_id', $id)->get();
        $order_details = OrderDetail::where('order_id', $id)->first();
        $address = Address::where('id', $order_details->address_id)->first();

        return view('admin.orders.view_order', compact('orders', 'order', 'address'));
    }

    public function status_update(Request $request)
    {
        // dd($request->input());
        try {
            $request->validate([
                'order_id' => 'required',
                'status' => 'required',
            ]);
            $orders = Order::where('id', $request->order_id)->first();
            $orders->status = $request->status;
            $orders->update();

            $order = OrderDetail::where('order_id', $request->order_id)->get();

            foreach ($order as $order_detail) {
                $order_detail->status = $request->status;
                $order_detail->update();
            }
            if ($request->status === "Shipped" || $request->status === "Delivered" || $request->status === "Cancelled") {
                // Send mail when order is delivered
                $receiver = User::find($order_detail->user_id);
                $orderstatus = OrderDetail::where('order_id', $request->order_id)->get();

                $productDetails = [];

                foreach ($orderstatus as $order) {
                    $product_id = $order->product_id;
                    $product = Product::where('id', $product_id)->first();

                    $productDetails[] = [
                        'product_name' => $product->product_name,
                        'brand' => $product->brand->brand_name,
                        'status' => $request->status,
                        'order_id' => $orders->order_id,
                    ];
                }
                // dd($receiver->email);
                $details = [
                    'username' => $receiver->name,
                    'statuses' => $request->status,
                    'products' => $productDetails,
                ];
                try {
                    $orderPlacedMail = new Status_Update($details);
                    Mail::to($receiver->email)->send($orderPlacedMail);
                } catch (\Exception $e) {
                    return view('admin.contents.error')->with('error', $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Status update successfully');
        } catch (\Exception $e) {
            return view('admin.contents.error')->with('error', $e->getMessage());
        }
    }
}
