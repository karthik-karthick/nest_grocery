<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Invoice</title>

</head>

<body
    style="font-family: mulish, sans-serif;
padding: 0;
margin: 0;
font-size: 14px;
position: relative;
background: #f6f7fb;font-weight: 400;
    line-height: 1.5;
    color: #212529;">




    <section
        style="    

max-width: 720px;
padding-right: var(--bs-gutter-x, .75rem);
    padding-left: var(--bs-gutter-x, .75rem);
    margin-right: auto;
    margin-left: auto;
padding-top: 0 !important;
transition: .5s;
position: relative;
min-height: 100vh;
padding-bottom: 70px;
overflow: hidden;">



        <div
            style=" min-height: 68vh;
transition: .5s;
position: relative;
background: #f6f7fb;
margin: 0;
z-index: 22;
border-radius: 0;
padding: 30px;">
            <div style="    padding: 0 !important; margin-right: auto;
margin-left: auto;     width: 100%;
">


                <div
                    style="    --bs-gutter-x: 1.5rem;
--bs-gutter-y: 0;
display: flex;
flex-wrap: wrap;
margin-top: calc(var(--bs-gutter-y)* -1);
margin-right: calc(var(--bs-gutter-x)* -.5);
margin-left: calc(var(--bs-gutter-x)* -.5);">
                    <div style="flex: 0 0 auto;
width: 100%;">
                        <div
                            style="position: relative;
display: flex;
flex-direction: column;
min-width: 0;
word-wrap: break-word;
background-color: #fff;
background-clip: border-box;
border: 1px solid rgba(0, 0, 0, .125);
border-radius: .25rem;">
                            <div
                                style="padding: .5rem 1rem;
margin-bottom: 0;
background-color: rgba(0, 0, 0, .03);
border-bottom: 1px solid rgba(0, 0, 0, .125);">
                                <strong>Invoice No : {{ $order->id }}</strong>


                                <span style="float: right !important;"> <strong>Date:</strong>
                                    {{ $order->updated_at->format('d-m-Y') }}</span><br>
                                <span style="text-align:center !important; "> <strong>Status:</strong>
                                    {{ $order->status }}</span>

                            </div>
                            <div style="flex: 1 1 auto;
padding: 1rem 1rem;">
                                <div
                                    style="    --bs-gutter-x: 1.5rem;
--bs-gutter-y: 0;
display: flex;
flex-wrap: nowrap;
flex-direction: row;
margin-top: calc(var(--bs-gutter-y)* -1);
margin-right: calc(var(--bs-gutter-x)* -.5);
margin-left: calc(var(--bs-gutter-x)* -.5); margin-bottom: 1.5rem !important;
">
                                    <div style="flex: 0 0 auto;
padding: 10px 0 0 30px;
width: 50%;">
                                        <h6
                                            style="margin-bottom: 1rem !important;color: #474d58;
font-family: mulish, sans-serif;
font-weight: 600;
line-height: 0.5;font-size: 1rem;">
                                            From:</h6>
                                        <div>
                                            <strong>Nest Grocery</strong>
                                        </div>
                                        <div>England</div>
                                        <div>71-101 Szczecin, England</div>
                                        <div>Email: <a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="d7b3b2bab897b0bab6bebbf9b4b8ba">nest@groceery.com</a>
                                        </div>
                                        <div>Phone: +91 9678546984</div>
                                    </div>
                                    <div style="flex: 0 0 auto;
padding: 10px 0 0 30px;
width: 50%;">
                                        <h6
                                            style="margin-bottom: 1rem !important;color: #474d58;
font-family: mulish, sans-serif;
font-weight: 600;
line-height: 0.5;font-size: 1rem;">
                                            To:</h6>
                                        <div>
                                            <strong>{{ $order->address->first_name }}</strong>
                                        </div>
                                        <div>{{ $order->address->city }}</div>
                                        <div>{{ $order->address->address }}</div>
                                        <div>Email: <a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="294d4c4446694e44484045074a4644">{{ $order->address->email }}</a>
                                        </div>
                                        <div>Phone: +91{{ $order->address->phone_no }}</div>
                                    </div>
                                </div>
                                <div class="">
                                    <table
                                        style="aption-side: bottom;
border-collapse: collapse;    margin-bottom: 0 !important;padding-top: 20px;background: #fff;
    border-radius: 10px;color: #212529;
    vertical-align: top;
    border-color: #dee2e6;    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;">
                                        <thead>
                                            <tr>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    S.no</th>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    Item</th>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    Description</th>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    Product price</th>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    Shiping price</th>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    Qty</th>
                                                <th
                                                    style="white-space: nowrap;
padding-left: 0;
border-bottom: 1px solid rgba(130, 139, 178, .3) !important;font-weight: 400;
    padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                    Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $shiping = 0;
                                                $total = 0;
                                                $dis_price = 0;
                                                $main_price = 0;
                                                $sub_main = 0;
                                            @endphp
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $loop->iteration }}</td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 1px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $order->product->product_name }}</td>
                                                    <td
                                                        style="padding-top: 20px;    font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 1px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $order->product->description }}</td>
                                                    <td
                                                        style="    padding-top: 20px;font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 17px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $order->product->product_price }}</td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 17px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $order->product->shipping_price }}</td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $order->quantity }}</td>
                                                    @php
                                                        $total = $order->product->product_price * $order->quantity;
                                                        $sub_main = $order->quantity * $order->product->selling_price;
                                                    @endphp
                                                    <td
                                                        style="    padding-top: 20px;font-size: 12px;
font-weight: 400;
border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-color: inherit;
    border-style: solid;
    border-width: 0;text-align: center;">
                                                        {{ $total }}</td>
                                                    @php

                                                        $shiping += $order->product->shipping_price;
                                                        $main_price += $total;
                                                        $dis_price += $sub_main;
                                                    @endphp
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    style="--bs-gutter-x: 1.5rem;
--bs-gutter-y: 0;
display: flex;
flex-wrap: wrap;
margin-top: calc(var(--bs-gutter-y)* -1);
margin-right: calc(var(--bs-gutter-x)* -.5);
margin-left: calc(var(--bs-gutter-x)* -.5);">
                                    <div
                                        style="flex: 0 0 auto;
    width: 33.33333333%;max-width: 100%;
    padding-right: calc(var(--bs-gutter-x)* .5);
    padding-left: calc(var(--bs-gutter-x)* .5);
    margin-top: var(--bs-gutter-y);">
                                    </div>
                                    <div style="margin-left: auto !important;flex: 0 0 auto;
    width: 33.33333333%;">
                                        <table class="table table-clear QA_table"
                                            style="    margin-bottom: 0 !important;background: #fff;
    border-radius: 10px;
    caption-side: bottom;
    border-collapse: collapse;

    padding-top: 20px;--bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    
    color: #212529;
    vertical-align: top;
    border-color: #dee2e6;">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);background-color: var(--bs-table-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;background-color: var(--bs-table-bg);    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        {{ $main_price }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);background-color: var(--bs-table-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        @php
                                                            $difference = $main_price - $dis_price;
                                                            $percentage_change = ($difference / $dis_price) * 100;
                                                        @endphp
                                                        <strong>Discount ({{ round($percentage_change) }}%)</strong>
                                                    </td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;background-color: var(--bs-table-bg);    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        -{{ $difference }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);background-color: var(--bs-table-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        <strong>Shiping </strong>
                                                    </td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;background-color: var(--bs-table-bg);    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        + {{ $shiping }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);background-color: var(--bs-table-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td
                                                        style="padding-top: 20px;font-size: 12px;
    font-weight: 400;
    border-bottom: 0;padding: 10px 15px;
    vertical-align: middle;border-top: 0 !important;background-color: var(--bs-table-bg);    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);border-color: inherit;
    border-style: solid;
    border-width: 0;">
                                                        <strong>Rs. {{ $shiping + $dis_price }}</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>

</html>
