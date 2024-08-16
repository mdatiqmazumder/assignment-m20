<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details of {{ $contact['name'] }}</title>
</head>
<body>
    <h1>Details of {{ $contact['name'] }}</h1>
    <p>ID: {{ $contact['id'] }}</p>
    <p>Name: {{ $contact['name'] }}</p>
    <p>Email: {{ $contact['email'] }}</p>
    <p>Phone: {{ $contact['phone'] }}</p>
    <p>Address: {{ $contact['address'] }}</p>

    <hr>
    <p>Created At: {{ $contact['created_at'] }}</p>
    <p>Updated At: {{ $contact['updated_at'] }}</p>

    <br><br>
    <a href="{{ route('contacts.index') }}">Back to Dashboard</a>

</body>
</html>
