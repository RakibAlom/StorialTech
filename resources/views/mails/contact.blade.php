<!DOCTYPE html>
<html>
<head>
    <title>Message From StorialTech</title>
</head>
<body>
    <h5>NAME: {{ $contact->name }}</h5>
    <h5>FROM: {{ $contact->email }}</h5>
    <h5>PHONE: {{ $contact->phone }}</h5>
    <br>
    <p>
        {!! $contact->message !!}
    </p>
</body>
</html>
