<!-- resources/views/products/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
</body>
</html>
