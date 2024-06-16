<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update</title>
</head>

<body>
    <h1>Your Cart Order Has Been Successfully Placed</h1>

    <h3>Hello, {{ $details['username'] }}!</h3>

    <p>Your Cart Order has been placed Successfully.</p>

    @forelse ($details['products'] as $product)
        <p>
            Product Name: {{ $product['product_name'] }}<br>
            Brand: {{ $product['brand'] }}<br>
            Status: {{ $product['status'] }}<br>
            
            Order ID: {{  $product['order_id'] }}
        </p>
    @empty
        <p>No products available.</p>
    @endforelse

    <p><b>Track Your Shipment:</b></p>
    <p>Track your order status <a href="{{ route('view.order', ['id' => $details['products'][0]['order_id']]) }}">
            Nest Grocery, Track order</a></p>

    <p>Thank you for choosing Nest Grocery! If you have any questions or concerns regarding your order, please don't
        hesitate to contact our customer support.</p>

    <p>Best regards,</p>
    <p>The Nest Grocery Team</p>
</body>

</html>