<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicOffersController;
use App\Http\Controllers\TestAptitudeController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('search_offers_academis', [AcademicOffersController::class, 'searchOffersAcademis'])->name('search_offers_academis');
Route::get('test_aptitud', [TestAptitudeController::class, 'testAptitud'])->name('test_aptitud');
Route::get('test_one', [TestAptitudeController::class, 'testOne'])->name('test_one');
Route::get('test_two', [TestAptitudeController::class, 'testTwo'])->name('test_two');
Route::post('result_test', [TestAptitudeController::class, 'resultTest'])->name('result_test');

