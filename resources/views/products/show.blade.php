<!-- resources/views/products/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>Price: ${{ $product->price }}</p>
    
    <form action="/sale/{{ $product->id }}" method="POST">
        @csrf
        <label for="discount_type">Select Discount Type:</label>
        <select name="discount_type" id="discount_type">
            <option value="percentage">Percentage Discount</option>
            <option value="fixed">Fixed Discount</option>
            <!-- Agregar opciones para otros tipos de descuento aquí -->
        </select>
        <button type="submit">Apply Discount</button>
    </form>
</body>
</html>

