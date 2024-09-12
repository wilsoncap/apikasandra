<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class LabelController extends Controller
{
    public function generateLabel()
    {
        // Crear una instancia de DNS1D
        $d = new DNS1D();

        // Generar código de barras
        $barcode = $d->getBarcodeSVG('123456789', 'C128', 3, 33);

        // Generar código QR
        $qrCode = QrCode::size(250)->generate('https://www.example.com');

        // Retornar la vista con la etiqueta
        return view('label', compact('barcode', 'qrCode'));
    }

    public function generateLabel2()
    {
        // Crear una instancia de DNS1D
        $d = new DNS1D();
        
        // Generar código de barras en SVG y convertir a base64
        $barcodeSvg = $d->getBarcodeSVG('123456789', 'C128', 3, 33);
        $barcodeBase64 = 'data:image/svg+xml;base64,' . base64_encode($barcodeSvg);

        $barcodeSvg2 = $d->getBarcodeSVG('123456987669', 'C128', 3, 33);
        $barcodeBase642 = 'data:image/svg+xml;base64,' . base64_encode($barcodeSvg);

        // Generar código QR y convertir a base64
        $qrCodeSvg = QrCode::size(250)->generate('https://www.example.com');
        $qrCodeBase64 = 'data:image/svg+xml;base64,' . base64_encode($qrCodeSvg);

        // Crear la vista y pasar las imágenes base64
        $pdf = Pdf::loadView('label2', compact('barcodeBase64', 'barcodeBase642'))
           // ->setPaper([0, 0, 283.46, 283.46]); // 283.46px es 10cm en 72DPI
           ->setPaper([0, 0, 283.46, 170.08]);

        // Retornar el PDF como una descarga o mostrar en el navegador
        return $pdf->stream('etiqueta.pdf');
    }
}
