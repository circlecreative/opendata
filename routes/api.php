<?php


use App\Http\Resources\BPS\RiceProductionByDistrictsResource;
use App\Http\Resources\BPS\InflationRatesResource;
use App\Http\Resources\OpenDataJabar\MangoProductionsResource;
use App\Http\Controllers\BPS\RiceProductionByDistrictsController;
use App\Http\Controllers\BPS\InflationRatesController;
use App\Http\Controllers\OpenDataJabar\MangoProductionsController;
use App\Models\BPS\RiceProductionByDistricts;
use App\Models\BPS\InflationRates;
use App\Models\OpenDataJabar\MangoProductions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





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

Route::get('/BPS/RiceProductionByDistricts', [RiceProductionByDistrictsController::class, 'index']);
Route::get('/BPS/RiceProductionByDistricts/{id}', [RiceProductionByDistrictsController::class, 'show']);
Route::post('/BPS/RiceProductionByDistricts', [RiceProductionByDistrictsController::class, 'store']);
Route::put('/BPS/RiceProductionByDistricts/{id}', [RiceProductionByDistrictsController::class, 'update']);
Route::delete('/BPS/RiceProductionByDistricts/{id}', [RiceProductionByDistrictsController::class, 'destroy']);


Route::get('/BPS/InflationRates', [InflationRatesController::class, 'index']);
Route::get('/BPS/InflationRates/{id}', [InflationRatesController::class, 'show']);
Route::post('/BPS/InflationRates', [InflationRatesController::class, 'store']);
Route::put('/BPS/InflationRates/{id}', [InflationRatesController::class, 'update']);
Route::delete('/BPS/InflationRates/{id}', [InflationRatesController::class, 'destroy']);

Route::get('/OpenDataJabar/MangoProductions', [MangoProductionsController::class, 'index']);
Route::get('/OpenDataJabar/MangoProductions/{id}', [MangoProductionsController::class, 'show']);
Route::post('/OpenDataJabar/MangoProductions', [MangoProductionsController::class, 'store']);
Route::put('/OpenDataJabar/MangoProductions/{id}', [MangoProductionsController::class, 'update']);
Route::delete('/OpenDataJabar/MangoProductions/{id}', [MangoProductionsController::class, 'destroy']);
