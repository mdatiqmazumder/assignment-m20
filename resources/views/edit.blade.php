<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Contact</title>
</head>
<body>
    <form action="{{ route('contacts.update',$contact) }}" method="POST">

        <label for="name">Enter Name</label>
        <input type="text" name="name" id="name" value="{{ $contact->name }}">
        <br>


        <label for="email">Enter Email</label>
        <input type="email" name="email" id="email" value="{{ $contact->email }}">
        <br>


        <label for="phone">Enter Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $contact->phone }}">
        <br>


        <label for="address">Enter Address</label>
        <textarea name="address"  id="address" cols="30" rows="10">{{ $contact->address }}</textarea>
        <br>

        @csrf
        @method('PUT')
        <button type="submit" >Save</button>
    </form>

    <a href="{{ route('contacts.index') }}">Back to dashboard</a>
    {{-- check for errors --}}
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>
