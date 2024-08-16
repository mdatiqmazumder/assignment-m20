<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts Dashboard</title>
</head>

<body>
    <h1>Contacts Dashboard</h1>
    <br>
    <form action="{{ route('contacts.index') }}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search">
        <button type="submit">Search</button>
    </form>
    <br>
    <a href="{{ route('contacts.index') }}">Dashboard</a> | <a href="{{ route('contacts.create') }}">Create New
        Contact</a> | <a href="{{ route('contacts.index', ['sort' => 'name']) }}">sort by name</a>| <a
        href="{{ route('contacts.index', ['sort' => 'created_at']) }}">sort by creation date</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th colspan="3">Actions</th>
        </tr>
        @if (count($contacts) > 0)
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact) }}">View</a>
                    </td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">No contacts found</td>
            </tr>
        @endif
    </table>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>

</html>
