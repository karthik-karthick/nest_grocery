@extends('user.layouts.layouts')
@section('user_layout')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='{{route('/')}}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span> Shop</span>
            <span>Order Success</span> 
        </div>
    </div>
</div>
<div class="py-5">
    <h2 class="text-center"> Successfully Order Placed !!</h2>
</div>
<div class="text-center">
    <a class="btn btn-success" href="{{route('account')}}"> view Order</a>
</div>

@endsection