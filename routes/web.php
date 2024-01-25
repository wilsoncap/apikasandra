<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicOffersController;

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
Route::get('search_offers_academis', [AcademicOffersController::class, 'searchOffersAcademis'])->name('search_offers_academis');

