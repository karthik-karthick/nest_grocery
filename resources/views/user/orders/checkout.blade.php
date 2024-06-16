@extends('user.layouts.layouts')
@section('user_layout')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='{{route('/')}}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop
            <span></span> Checkout
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Checkout</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span class="text-brand">@php
                    $count = $product->count();

                @endphp
                {{$count}}</span> products in your cart</h6>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('cart.checkout')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="is_cart" value="is_cart">
    <div class="row">
        <div class="col-lg-7">
            <div class="row mb-50">
                <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                                        
                </div>
                <div class="col-lg-6">
                    <p  class="apply-coupon">
                        <input type="text" placeholder="Enter Coupon Code...">
                        <button class="btn  btn-md" name="login">Apply Coupon</button>
                    </p>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-30">Billing Details</h4>
                @if($address)
                @foreach ($address as $add)      
                             

                <div class="form-check">                    
                    <input class="form-check-input" type="checkbox" name="address_id" id="flexCheckDefault" value="{{$add->id}}" >
                    <label class="form-check-label" for="flexCheckDefault">  <span class="fs-5">{{$add->first_name}} {{$add->last_name}},{{$add->phone_no}},<br>
                        {{$add->email}},{{$add->district}},{{$add->city}},<br>{{$add->street}},{{$add->landmark}},{{$add->state}},{{$add->pincode}},</span>
                  </label>
                </div>
                                         
                @endforeach
               
                        <div class="ship_detail">
                        <div class="form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different address?</span></label>
                                </div>
                            </div>
                        </div>
                        <div id="collapseAddress" class="different_address collapse in">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text"  name="first_name" placeholder="First name *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text"name="last_name" placeholder="Last name *">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <input type="number" name="phone" placeholder="Phone *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="custom_select w-100">
                                        <input type="email" name="email" placeholder="Email Address *">

                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="form-group col-lg-6">
                                    <input type="text" name="district"  placeholder="district *">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="state" placeholder="State / County *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="city" placeholder="City / Town *">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="street" placeholder="Street *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="landmark" placeholder="Landmark *">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="pin" placeholder="Postcode / ZIP *">
                                </div>
                            </div>
                        </div>
                    </div>            
                @else
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" required="" name="first_name" placeholder="First name *">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" required="" name="last_name" placeholder="Last name *">
                    </div>
                </div>
                <div class="row shipping_calculator">
                    <div class="form-group col-lg-6">
                        <input required="phone" type="text" name="phone" placeholder="Phone *">
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="custom_select w-100">
                            <input required="" type="email" name="email" placeholder="Email Address *">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="district" required="" placeholder="district *">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input required="" type="text" name="state" placeholder="State / County *">
                    </div>
                    <div class="form-group col-lg-6">
                        <input required="" type="text" name="city" placeholder="City / Town *">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input required="" type="text" name="street" placeholder="Street *">
                    </div>
                    <div class="form-group col-lg-6">
                        <input required="" type="text" name="landmark" placeholder="Landmark *">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input required="" type="text" name="pin" placeholder="Postcode / ZIP *">
                    </div>
                </div>
                    @endif
            </div>
        </div>
        <div class="col-lg-5">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Your Order</h4>
                    <h6 class="text-muted">Subtotal</h6>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>
                            @foreach ($product as $products)                    
                            <tr>
                                <td class="image product-thumbnail"><img src="/{{$products->product->product_image}}" alt="#"></td>
                                <td>
                                    <h6 class="w-160 mb-5"><a class='text-heading' href='shop-product-full.html'>{{$products->product->product_name}}</a></h6></span>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="text-muted pl-20 pr-20">x {{$products->cart_quantity}}</h6>
                                </td>
                                <td>
                                    <h4 class="text-brand">&#8377; {{$products->product->selling_price}}</h4>
                                </td>
                            </tr> 
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="payment ml-30">
                <h4 class="mb-30">Payment</h4>
                <div class="payment_option">
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="checkout_payment_method" id="exampleRadios3" disabled>
                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                    </div>
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="checkout_payment_method" id="exampleRadios4" value="cash on delivery" >
                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                    </div>
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="checkout_payment_method" id="exampleRadios5" value="online payment">
                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                    </div>
                </div>
                <div class="payment-logo d-flex">
                    <img class="mr-15" src="{{ asset('user/assets/imgs/theme/icons/payment-paypal.svg')}}" alt="">
                    <img class="mr-15" src="{{ asset('user/assets/imgs/theme/icons/payment-visa.svg')}}" alt="">
                    <img class="mr-15" src="{{ asset('user/assets/imgs/theme/icons/payment-master.svg')}}" alt="">
                    <img src="{{ asset('user/assets/imgs/theme/icons/payment-zapper.svg')}}" alt="">
                </div>
                <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection