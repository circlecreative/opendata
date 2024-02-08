<?php


use App\Http\Resources\BPS\RiceProductionByDistrictsResource;
use App\Http\Resources\BPS\InflationRatesResource;
use App\Http\Resources\BPS\TotalExpenditurePercapitasResource;
use App\Http\Resources\Kominfo\UmkmGoOnlinesResource;
use App\Http\Resources\OpenDataJabar\MangoProductionsResource;
use App\Http\Resources\OpenDataJabar\ConsumsionTaxsResource;
use App\Http\Resources\OpenDataJabar\PondSaltProductionsResource;
use App\Http\Resources\OpenDataJabar\TotalOfEntrepreneursResources;
use App\Http\Controllers\BPS\RiceProductionByDistrictsController;
use App\Http\Controllers\BPS\InflationRatesController;
use App\Http\Controllers\BPS\TotalExpenditurePercapitasController;
use App\Http\Controllers\Kominfo\UmkmGoOnlinesController;
use App\Http\Controllers\OpenDataJabar\PondSaltProductionsController;
use App\Http\Controllers\OpenDataJabar\MangoProductionsController;
use App\Http\Controllers\OpenDataJabar\ConsumsionTaxsController;
use App\Http\Controllers\OpenDataJabar\TotalOfEntrepreneursController;
use App\Models\BPS\RiceProductionByDistricts;
use App\Models\BPS\InflationRates;
use App\Models\BPS\TotalExpenditurePercapitas;  
use App\Models\Kominfo\UmkmGoOnlines;
use App\Models\OpenDataJabar\MangoProductions;
use App\Models\OpenDataJabar\ConsumsionTaxs;
use App\Models\OpenDataJabar\PondSaltProductions;
use App\Models\OpenDataJabar\TotalOfEntrepreneurs;
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

Route::get('/download-swagger', 'SwaggerController@downloadSwagger');

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



Route::get('/BPS/TotalExpenditurePercapitas', [TotalExpenditurePercapitasController::class, 'index']);
Route::get('/BPS/TotalExpenditurePercapitas/{id}', [TotalExpenditurePercapitasController::class, 'show']);
Route::post('/BPS/TotalExpenditurePercapitas', [TotalExpenditurePercapitasController::class, 'store']);
Route::put('/BPS/TotalExpenditurePercapitas/{id}', [TotalExpenditurePercapitasController::class, 'update']);
Route::delete('/BPS/TotalExpenditurePercapitas/{id}', [TotalExpenditurePercapitasController::class, 'destroy']);


Route::get('/OpenDataJabar/MangoProductions', [MangoProductionsController::class, 'index']);
Route::get('/OpenDataJabar/MangoProductions/{id}', [MangoProductionsController::class, 'show']);
Route::post('/OpenDataJabar/MangoProductions', [MangoProductionsController::class, 'store']);
Route::put('/OpenDataJabar/MangoProductions/{id}', [MangoProductionsController::class, 'update']);
Route::delete('/OpenDataJabar/MangoProductions/{id}', [MangoProductionsController::class, 'destroy']);


Route::get('/OpenDataJabar/ConsumsionTaxs', [ConsumsionTaxsController::class, 'index']);
Route::get('/OpenDataJabar/ConsumsionTaxs/{id}', [ConsumsionTaxsController::class, 'show']);
Route::post('/OpenDataJabar/ConsumsionTaxs', [ConsumsionTaxsController::class, 'store']);
Route::put('/OpenDataJabar/ConsumsionTaxs/{id}', [ConsumsionTaxsController::class, 'update']);
Route::delete('/OpenDataJabar/ConsumsionTaxs/{id}', [ConsumsionTaxsController::class, 'destroy']);


Route::get('/Kominfo/UmkmGoOnlines', [UmkmGoOnlinesController::class, 'index']);
Route::get('/Kominfo/UmkmGoOnlines/{id}', [UmkmGoOnlinesController::class, 'show']);
Route::post('/Kominfo/UmkmGoOnlines', [UmkmGoOnlinesController::class, 'store']);
Route::put('/Kominfo/UmkmGoOnlines/{id}', [UmkmGoOnlinesController::class, 'update']);
Route::delete('/Kominfo/UmkmGoOnlines/{id}', [UmkmGoOnlinesController::class, 'destroy']);


Route::get('/OpenDataJabar/PondSaltProductions', [PondSaltProductionsController::class, 'index']);
Route::get('/OpenDataJabar/PondSaltProductions/{id}', [PondSaltProductionsController::class, 'show']);
Route::post('/OpenDataJabar/PondSaltProductions', [PondSaltProductionsController::class, 'store']);
Route::put('/OpenDataJabar/PondSaltProductions/{id}', [PondSaltProductionsController::class, 'update']);
Route::delete('/OpenDataJabar/PondSaltProductions/{id}', [PondSaltProductionsController::class, 'destroy']);


Route::get('/OpenDataJabar/TotalOfEntrepreneurs', [TotalOfEntrepreneursController::class, 'index']);
Route::get('/OpenDataJabar/TotalOfEntrepreneurs/{id}', [TotalOfEntrepreneursController::class, 'show']);
Route::post('/OpenDataJabar/TotalOfEntrepreneurs', [TotalOfEntrepreneursController::class, 'store']);
Route::put('/OpenDataJabar/TotalOfEntrepreneurs/{id}', [TotalOfEntrepreneursController::class, 'update']);
Route::delete('/OpenDataJabar/TotalOfEntrepreneurs/{id}', [TotalOfEntrepreneursController::class, 'destroy']);