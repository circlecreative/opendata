<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumsionTaxController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ConsumsionTax', [ConsumsionTaxController::class, 'index']);
Route::get('/ConsumsionTax/{id}', [ConsumsionTaxController::class, 'show']);
Route::post('/ConsumsionTax', [ConsumsionTaxController::class, 'store']);
Route::put('/ConsumsionTax/{id}', [ConsumsionTaxController::class, 'update']);
Route::delete('/ConsumsionTax/{id}', [ConsumsionTaxController::class, 'destroy']);

