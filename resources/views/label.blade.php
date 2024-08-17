<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiqueta</title>
    <style>
        .label {
            width: 10cm;
            height: 10cm;
            border: 1px solid black;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .barcode, .qrcode {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="label">
        <div class="barcode">
            {!! $barcode !!}
        </div>
        <div class="qrcode">
            {!! $qrCode !!}
        </div>
    </div>
</body>
</html>
