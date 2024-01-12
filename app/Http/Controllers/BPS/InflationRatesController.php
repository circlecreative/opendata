<?php

namespace App\Http\Controllers\BPS;

use App\Http\Requests\BPS\InflationRatesRequest;
use App\Http\Controllers\Controller;
use App\Models\BPS\InflationRates;
use App\Http\Resources\BPS\InflationRatesResource;
use Database\Seeders\BPS\InflationRatesSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facedes\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;
class InflationRatesController extends Controller
{

    //
 
    public function index()
    {
        $inflationRates = InflationRates::paginate(10);
        return InflationRatesResource::collection($inflationRates);
    }

    public function store(InflationRatesRequest $request)
    {
        return (new InflationRatesResource(InflationRates::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    public function destroy($id)
    {
        $inflationRates = InflationRates::findOrFail($id);

        $inflationRates->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    public function show(string $id)
    {
        $inflationRates= InflationRates::findOrFail($id);
        if (!$inflationRates) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new InflationRatesResource($inflationRates);
    }

    public function update(InflationRatesRequest $request, $id)
    {
        $inflationRates = InflationRates::findOrFail($id)->update($request->validated());

        return (new InflationRatesResource(InflationRates::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
