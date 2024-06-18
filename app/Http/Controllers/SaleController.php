<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contracts\DiscountInterface;
use App\Models\Product;
// utilizamos los descuentos en nuestro controlador sin preocuparnos por los detalles de implementación específicos.
class SaleController extends Controller
{

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function applyDiscount(Request $request, Product $product) {
        // Obtener el tipo de descuento seleccionado
        $discountType = $request->input('discount_type');

        // Crear una instancia del tipo de descuento seleccionado
        $discount = $this->createDiscount($discountType);

        // Calcular el precio final
        $finalPrice = $discount->calculate($product->price);

        // Mostrar la vista con el precio final y el producto
        return view('sales.show', compact('finalPrice', 'product'));
    }

    // En este ejemplo, el usuario puede seleccionar el tipo de descuento que desea aplicar al producto y luego se mostrará
    // el precio final después de aplicar el descuento en una vista separada.

    private function createDiscount($discountType): DiscountInterface {
        // Crear una instancia del tipo de descuento seleccionado
        switch ($discountType) {
            case 'percentage':
                return app()->makeWith(\App\Services\PercentageDiscount::class, ['percentage' => 10]);
            case 'fixed':
                return app()->makeWith(\App\Services\FixedDiscount::class, ['amount' => 5]);
            // Agregar casos para otros tipos de descuento aquí
            default:
                throw new \InvalidArgumentException("Tipo de descuento no soportado");
        }
    }


}
