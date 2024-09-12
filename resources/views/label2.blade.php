<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiqueta</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .label {
            width: 10cm;
            height: 6cm;
            border: 1px solid black;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            page-break-inside: avoid;
        }
        .barcode img, .qrcode img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="label">
        <br>
        <div class="barcode">
            <img src="{{ $barcodeBase64 }}" alt="Código de barras">
        </div>
        {{-- <div class="qrcode">
            <img src="{{ $qrCodeBase64 }}" alt="Código QR">
        </div> --}}
    </div>

    <div class="label">
        <br>
        <div class="barcode">
            <img src="{{ $barcodeBase642 }}" alt="Código de barras">
        </div>
        {{-- <div class="qrcode">
            <img src="{{ $qrCodeBase64 }}" alt="Código QR">
        </div> --}}
    </div>
</body>
</html>
