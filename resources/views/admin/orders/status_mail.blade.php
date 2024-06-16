<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update</title>
</head>

<body>
    
        <h1>Our, Order was {{ $details['statuses'] }}...! :)</h1>

        <h3>Hello, {{ $details['username'] }}!</h3>

        <p>Your Order item has been Successfully {{ $details['statuses'] }}.</p>
        @forelse ($details['products'] as $product)
        <p>Product Name :<b> {{ $product['product_name'] }}</b></p>
        <p>Brand : <b> {{ $product['brand'] }}</b></p>
        <p>Order ID: {{  $product['order_id'] }}</p>
        <p>Order status : <b> {{ $product['status'] }}</b></p>
    @empty
        <p>No products available.</p>
    @endforelse

    <p><b>Track Your Shipment:</b></p>
    <h4>Track your order status <a href="{{ route('view.order', ['id' => $product['order_id']]) }}"> Nest Grocery , Track order</a></h4>

    <p>Thank you for choosing Nest Grocery! If you have any questions or concerns regarding your order, please don't hesitate to contact our customer support.</p>

    <p>Best regards,</p>
        
    <p> The Nest Grocery Team.</p>        
</body>

</html>