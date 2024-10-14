<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="number"],
input[type="text"] {
    width: 100%;
    padding: 10px 1px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="number"]:focus,
input[type="text"]:focus {
    border-color: #5cb85c;
    outline: none;
}

.btn {
    width: 100%;
    padding: 10px;
    background-color: #5cb85c;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.btn:hover {
    background-color: #4cae4c;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Vehículo</h1>
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="brand">Marca:</label>
                <input type="text" id="brand" name="brand" required>
            </div>

            <div class="form-group">
                <label for="type">Tipo:</label>
                <input type="text" id="type" name="type" required>
            </div>

            <button type="submit" class="btn">Registrar Vehículo</button>
        </form>
    </div>
</body>
</html>