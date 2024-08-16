<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Contact</title>
</head>
<body>
    <form action="{{ route('contacts.store') }}" method="POST">

        <label for="name">Enter Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>


        <label for="email">Enter Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <br>


        <label for="phone">Enter Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        <br>


        <label for="address">Enter Address</label>
        <textarea name="address"  id="address" cols="30" rows="10">{{ old('address') }}</textarea>
        <br>

        @csrf
        <button type="submit" >Save</button>
    </form>

    <a href="{{ route('contacts.index') }}">Dashboard</a>
    {{-- check for errors --}}
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>
