@extends('admin.layouts.layout')
@section('admin_layout')
<style>
    ul.list-unstyled li {
        margin-bottom: 4px;
    }

    ul.list-unstyled li b {
        font-weight: bold;
    }

    ul.list-unstyled li span {
        font-weight: bold;
    }

    .btn-group .dropdown-menu a.dropdown-item:hover {
        background-color: #007bff;
        color: #fff;
    }

    :root {
        --arrow-icon: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg);
    }

    select {
        appearance: none;
        border: 0;
        outline: 0;
        font: inherit;
        /* Personalize */
        width: 20rem;
        padding: 1rem 4rem 1rem 1rem;
        background: var(--arrow-icon) no-repeat right 0.8em center / 1.4em,
            linear-gradient(to right, rgba(255, 0, 0, 0), rgba(255, 0, 0, 1)) !important;
        color: white;
        border-radius: 0.25em;
        box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.2);
        cursor: pointer;

        &::-ms-expand {
            display: none;
        }

        &:focus {
            outline: none;
        }
    }
</style>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
        </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Details</h4>
                        </div>
                        <div class="border rounded-1 p-4" style="box-shadow: 0px 5px 30px 0px rgba(13,12,13,0.2);">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="row text-center">
                                       <div class="border col-6 p-2  ">
                                           {{--}} @php
                                                $logo = App\Models\BusinessSetting::where('key', 'business_logo')->first();
        
                                            @endphp--}}
                                            <img class="img-fluid float-center" src="{{ asset('admin/assets/images/logo-img.png') }}" >
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-8 ps-5 pt-5 ">
                                            <h4> Shipping Address</h4>
                                            <hr>
                                            <ul class="list-unstyled">
                                                <li><b>Name:</b> <span>{{ $address->first_name }}
                                                        {{ $address->last_name }}</span></li>
                                                <li><b>Email:</b> {{ $address->email }}</li>
                                                <li><b>Street:</b> {{ $address->street }}</li>
                                                <li><b>City:</b> {{ $address->city }}</li>
                                                <li><b>Landmark:</b> {{ $address->landmark }}</li>
                                                <li><b>District:</b> {{ $address->district }}</li>
                                                <li><b>State:</b>{{ $address->state }}</li>
                                                <li><b>Phone:</b> {{ $address->phone_no }}</li>
                                                <li><b>Pin code:</b> {{ $address->pincode }}</li>
                                            </ul>
                                        </div>
        
        
                                        <div class="dropdown col-4 px-5 pt-5 ">
                                            <form method="POST" action="{{ route('status.update') }}">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $orders->id }}">
        
                                                <select class="form-select" style="width: 200px;" name="status"
                                                    aria-label="Default select example">
                                                    <option selected disabled selected>{{ $orders->status }}</option>
                                                    @if ($orders->status == 'Returned')
                                                    @elseif ($orders->status == 'Cancelled')
        
                                                    @elseif($orders->status == 'Delivered' || $orders->status == 'Return request')
                                                        <option value="Returned">Returned</option>
                                                    @else
                                                        <option value="Pending">Pending</option>
                                                        <option value="Shipped">Shipped</option>
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                    @endif
                                                </select>
                                                <br>
                                                <div>
                                                    <button class="btn btn-primary">Apply</button>
                                                </div>
                                            </form>
        
        
                                            <div class="pt-4">
                                                <ul class="list-unstyled">
                                                    <li><b>Payment type : </b> {{ $orders->payment_method }}</li>
                                                    <li><b>Razorpay Id : </b>{{ $orders->payment_id }} </li>
                                                    <li><b>Razorpay Payment Id : </b> {{ $orders->razorpay_id }}</li>
                                                    <li><b>Razorpay payment Status : </b>{{ $orders->payment_status }} </li>
        
                                                    <div class="pt-2  pb-4">
                                                        @php
                                                            function getStatusBadgeClass($status)
                                                            {
                                                                switch ($status) {
                                                                    case 'Pending':
                                                                        return 'text-bg-warning'; // or any other Bootstrap contextual class
                                                                    case 'Shipped':
                                                                        return 'text-bg-primary';
                                                                    case 'Delivered':
                                                                        return 'text-bg-success';
                                                                    case 'Cancelled':
                                                                        return 'text-bg-danger';
                                                                    default:
                                                                        return 'text-bg-info'; // Default or fallback class
                                                                }
                                                            }
                                                        @endphp
                                                        <li>
                                                            <span
                                                                class="fs-6 badge badge-pill {{ getStatusBadgeClass($orders->status) }}">{{ $orders->status }}</span>
                                                        </li>
        
                                                    </div>
                                                    @if ($orders->status == 'Returned')
                                                        <li><span><b>Reason:</b> {{ $orders->reason }}</span></li>
                                                        <li><span><b>Custom Reason:</b> {{ $orders->custom_reason }}</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
        
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col-1">S.no</th>
                                                        <th scope="col-1">Order Id</th>
                                                        <th scope="col-1">Product image</th>
                                                        <th scope="col-1">Date</th>
                                                        <th scope="col-1">Product Name</th>
                                                        <th scope="col-1">Category Name</th>
                                                        <th scope="col-1">Brand</th>
                                                        <th scope="col-1">Color</th>
                                                        <th scope="col-1">Quantity</th>
                                                        <th scope="col-1">Discount_price</th>
                                                        <th scope="col-1">Shiping_price</th>
                                                    </tr>
                                                </thead>
                                                {{-- {{dd($order)}} --}}
                                                @foreach ($order as $orderses)
                                                    <tbody class="text-left">
                                                        <tr class="odd">
                                                            <td class="sorting_1">{{ $loop->iteration }}</td>
                                                            <td class="sorting_1">{{ $orderses->order->order_id }}</td>
                                                            <td><img src="{{ optional($orderses->product)->product_image ? asset($orderses->product->product_image) : asset('assets/img/gallery/11697.jpg') }}"
                                                                    height="40" width="50" alt="Product Image">
        
                                                            </td>
                                                            <td>{{ $orderses->created_at->format('d-m-Y') }} </td>
                                                            <td>{{ $orderses->product_name }}</td>
                                                            <td>{{ $orderses->product->category->category_name }}</td>
                                                            <td>{{ $orderses->product->brand->brand_name }}</td>
                                                            <td>{{ $orderses->product->color->color_name }}</td>
                                                            <td>{{ $orderses->quantity }}</td>
                                                            <td>{{ $orderses->sub_total }}</td>
                                                            <td>{{ $orderses->shiping }}</td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row pt-3 pe-4">
                                        <div class="col-9 ps-4"></div>
                                        <div class="col-2 pe-5 ">
                                            <h6 class="my-0 pb-4 fw-bold ">Product Price Details</h6>
                                            <li class="pb-2  d-flex justify-content-between">
                                                <div class="list-unstyled ">
                                                    <h6 class="my-0">Product Price :</h6>
                                                </div>
                                                <span>&#8377; {{ $orders->subtotal }}</span>
                                            </li>
                                            <li class="pb-2  d-flex justify-content-between">
                                                <div class="list-unstyled ">
                                                    <h6 class="my-0">Quantity :</h6>
        
                                                </div>
                                                <span>{{ $orders->quantity }}</span>
                                            </li>
                                            <li class="pb-2  d-flex justify-content-between">
                                                <div class="list-unstyled ">
                                                    <h6 class="my-0">Shipping Price :</h6>
                                                </div>
        
                                                <span>&#8377; {{ $orders->shiping }}</span>
                                            </li>
                                            <li class="pb-2  d-flex justify-content-between">
                                                <div class="list-unstyled ">
                                                    <h6 class="my-0">Packing Fees :</h6>
        
                                                </div>
                                                <span>&#8377; 0</span>
                                            </li>
                                            <hr>
                                            <li class="pb-2  d-flex justify-content-between">
                                                <div class="list-unstyled ">
                                                    <h6 class="my-0 fw-bold ">Total Price :</h6>
                                                </div>
                                                <span>&#8377; {{ $orders->grandtotal }}</span>
                                            </li>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
@endsection