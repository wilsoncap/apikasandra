<?php

use App\Http\Controllers\AcademicOffersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestAptitudeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('auth/register', [AuthController::class, 'create']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::resource('departaments', DepartamentController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('employeesall', [EmployeeController::class, 'all']);
    Route::get('employeesbydepartament', [EmployeeController::class, 'empleyeeByDepartament']);
    Route::get('auth/logout', [AuthController::class, 'logout']);
});




// Route::middleware('cors')->group(function () {
//     // Rutas que requieren CORS
//     Route::post('academic_offers', [AcademicOffersController::class, 'academicOffers'])->name('academic_offers');
// });
// 
Route::post('academic_offers', [AcademicOffersController::class, 'academicOffers'])->name('academic_offers');
Route::post('result_test', [TestAptitudeController::class, 'resultTest'])->name('result_test');