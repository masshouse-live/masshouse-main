<!DOCTYPE html>
<html>

<head>
    <title>New Contact Message</title>
</head>

<body>
    <h2>New Contact Message from {{ $contact->name }}</h2>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Category:</strong> {{ $contact->category }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contact->message }}</p>

    <br>
    <p>Regards,</p>
    <p>Your {{ config('app.name') }}</p>
</body>

</html>
