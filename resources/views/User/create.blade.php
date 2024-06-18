<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>create user</title>
</head>
<body>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="name">name</label>
        <input type="text" id="name" name="name">
        <br>
        <br>
        <label for="email">email</label>
        <input type="text" id="email" name="email">
        <br>
        <br>
        <label for="password">passwor</label>
        <input type="text" id="password" name="password">
        <br>
        <br>
        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>