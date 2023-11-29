<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Consumsion_TaxsController;

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

Route::get('/Consumsion_Taxs', [Consumsion_TaxsController::class, 'index']);
Route::get('/Consumsion_Taxs/{id}', [Consumsion_TaxsController::class, 'show']);
Route::post('/Consumsion_Taxs', [Consumsion_TaxsController::class, 'store']);
Route::put('/Consumsion_Taxs/{id}', [Consumsion_TaxsController::class, 'update']);
Route::delete('/Consumsion_Taxs/{id}', [Consumsion_TaxsController::class, 'destroy']);

