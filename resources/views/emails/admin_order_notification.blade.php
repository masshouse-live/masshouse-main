<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Notification</title>
</head>

<body>
    <h1>New Order Placed!</h1>
    <p>Order ID: {{ $order->order_id }}</p>
    <p>Customer Name: {{ $order->name }}</p>
    <p>Total Amount: kes.{{ $order->total }}</p>
    <p>Customer Email: {{ $order->email }}</p>
</body>

</html>
