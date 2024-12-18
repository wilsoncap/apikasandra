<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicOffersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestAptitudeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ProductManageController;
use App\Http\Controllers\WebScrapingController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\VehicleController;
use App\src\Country\Http\Controllers\ProcessController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
||
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('search_offers_academis', [AcademicOffersController::class, 'searchOffersAcademis'])->name('search_offers_academis');
Route::get('test_aptitud', [TestAptitudeController::class, 'testAptitud'])->name('test_aptitud');
Route::get('prueba_qr', [TestAptitudeController::class, 'pruebaQr'])->name('prueba_qr');
Route::get('test_one', [TestAptitudeController::class, 'testOne'])->name('test_one');
Route::get('test_two', [TestAptitudeController::class, 'testTwo'])->name('test_two');
Route::post('result_test', [TestAptitudeController::class, 'resultTest'])->name('result_test');

Route::get('scrape', [WebScrapingController::class, 'scrape'])->name('scrape');
Route::get('/label', [LabelController::class, 'generateLabel']);
Route::get('/label-pdf', [LabelController::class, 'generateLabel2']);


//inversion de dependencias
Route::get('create', [UserController::class, 'create'])->name('create');
Route::post('store', [UserController::class, 'store'])->name('store');

Route::get('/file', [UserController::class, 'file'])->name('file');
Route::post('import', [UserController::class, 'import'])->name('import');

// Abierto / Cerrado
Route::get('/products/{product}', [SaleController::class, 'show']);
Route::post('/sale/{product}', [SaleController::class, 'applyDiscount']);

// Rutas para ver productos (clientes)
Route::get('/products', [ProductViewController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductViewController::class, 'show'])->name('products.show2');

// Rutas para gestionar productos (administradores)
Route::post('/products', [ProductManageController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductManageController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductManageController::class, 'destroy'])->name('products.destroy');

Route::resource('vehicles', VehicleController::class);


Route::resource('process_country', ProcessController::class);


Route::resource('dashboard', DashboardController::class);


