<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body>
    <h1>Thank you for your order, {{ $order->name }}!</h1>
    <p>Your order ID is {{ $order->order_id }}.</p>
    <p>Total Amount: kes.{{ $order->total }}</p>
    <p>We will notify you when your order is shipped.</p>
</body>

</html>
