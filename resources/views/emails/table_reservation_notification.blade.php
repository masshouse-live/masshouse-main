<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Reservation Confirmation</title>
</head>

<body>
    <h1>Hello, {{ $customerName }}!</h1>
    <p>Thank you for your reservation!</p>
    <p>Your table reservation details are as follows:</p>
    <ul>
        <li>Date: {{ $date }}</li>
        <li>From: {{ $fromTime }}</li>
        <li>To: {{ $toTime }}</li>
        <li>Table Index: {{ $tableIndex }}</li>
    </ul>
    <p>We look forward to serving you!</p>

    <p>You can add this reservation to your calendar or decline the invitation.</p>

</body>

</html>
