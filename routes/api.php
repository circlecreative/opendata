<?php

use App\Http\Resources\ConsumsionTaxsResource;
use App\Http\Resources\MangoProductionsResource;
use App\Http\Controllers\MangoProductionsController;
use App\Models\MangoProductions;
use App\Models\ConsumsionTaxs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumsionTaxsController;

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

Route::get('/ConsumsionTaxs', [ConsumsionTaxsController::class, 'index']);
Route::get('/ConsumsionTaxs/{id}', [ConsumsionTaxsController::class, 'show']);
Route::post('/ConsumsionTaxs', [ConsumsionTaxsController::class, 'store']);
Route::put('/ConsumsionTaxs/{id}', [ConsumsionTaxsController::class, 'update']);
Route::delete('/ConsumsionTaxs/{id}', [ConsumsionTaxsController::class, 'destroy']);

Route::get('/MangoProductions', [MangoProductionsController::class, 'index']);
Route::get('/MangoProductions/{id}', [MangoProductionsController::class, 'show']);
Route::post('/MangoProductions', [MangoProductionsController::class, 'store']);
Route::put('/MangoProductions/{id}', [MangoProductionsController::class, 'update']);
Route::delete('/MangoProductions/{id}', [MangoProductionsController::class, 'destroy']);

