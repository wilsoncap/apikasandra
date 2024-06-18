<!-- resources/views/sales/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Price</title>
</head>
<body>
    <h1>Final Price of {{ $product->name }}</h1>
    <p>Original Price: ${{ $product->price }}</p>
    <p>Discounted Price: ${{ $finalPrice }}</p>
</body>
</html>
