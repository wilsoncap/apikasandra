<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola mundo</h1>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Adjunte archivo</label>
        <input type="file" name="excel_file" id="excel_file">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>