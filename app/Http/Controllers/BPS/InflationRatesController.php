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

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="opendataAPI",
 *     description="Open data API from open dataset",
 *     @OA\Contact(
 *         email="mellyniaramadhan762@gmail.com"
 *     ),
 *     @OA\License(
 *         name="mellyniaramadhan",
 *         url="http://your-license-url.com"
 *     )
 * )
 */

class InflationRatesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/BPS/InflationRates",
     *     summary="Get a list of inflation rates",
     *     tags={"Inflation Rates"},
     *     @OA\Response(
     *         response=200,
     *         description="List of inflation rates",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/InflationRates")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized. Authentication required",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */

    public function index()
    {
        $inflationRates = InflationRates::paginate(10);
        return InflationRatesResource::collection($inflationRates);
    }
    /**
     * @OA\Get(
     *     path="/api/inflation-rates/{id}",
     *     summary="Get details of an inflation rate",
     *     tags={"Inflation Rates"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the inflation rate to retrieve",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="city", type="string", example="Meulaboh"),
     *             @OA\Property(property="2017PercentAmount", type="string", example="4.76"),
     *             @OA\Property(property="2018PercentAmount", type="string", example="0.96"),
     *             @OA\Property(property="2019PercentAmount", type="string", example="4.28"),
     *             @OA\Property(property="2020PercentAmount", type="string", example="4.24"),
     *             @OA\Property(property="2021PercentAmount", type="string", example="2.07"),
     *             @OA\Property(property="created_at", type="string", example="2024-01-15 13:47:57"),
     *             @OA\Property(property="updated_at", type="string", example="2024-01-15 13:47:57"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Inflation rate with the given ID not found",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */

    public function show(int $id)
    {
        $inflationRates = InflationRates::findOrFail($id);
        if (!$inflationRates) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new InflationRatesResource($inflationRates);
    }
    /**
     * @OA\Post(
     *     path="/api/inflation-rates",
     *     summary="Create a new inflation rate",
     *     tags={"Inflation Rates"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to create a new inflation rate",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                  property="city",
     *                  type="number"
     *              ),
     *             @OA\Property(
     *                  property="year",
     *                  type="integer",
     *              ),
     *
     *               example={
     *                     "city":"example city",
     *                     "year":"example year"
     *                }
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inflation rate created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="city", type="string", example="Meulaboh"),
     *             @OA\Property(property="2017PercentAmount", type="string", example="4.76"),
     *             @OA\Property(property="2018PercentAmount", type="string", example="0.96"),
     *             @OA\Property(property="2019PercentAmount", type="string", example="4.28"),
     *             @OA\Property(property="2020PercentAmount", type="string", example="4.24"),
     *             @OA\Property(property="2021PercentAmount", type="string", example="2.07"),
     *             @OA\Property(property="created_at", type="string", example="2024-01-15 13:47:57"),
     *             @OA\Property(property="updated_at", type="string", example="2024-01-15 13:47:57"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity. Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object"),
     *         ),
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */

    public function store(InflationRatesRequest $request)
    {
        return (new InflationRatesResource(InflationRates::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    /**
     * @OA\Put(
     *     path="/api/inflation-rates/{id}",
     *     summary="Update an existing inflation rate",
     *     tags={"Inflation Rates"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the inflation rate to update",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to update an existing inflation rate",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="city", type="number", example=2.5),
     *             @OA\Property(property="year", type="integer", example=2022),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inflation rate updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="city", type="number"),
     *             @OA\Property(property="year", type="integer"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found. Inflation rate with the given ID not found",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity. Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized. Authentication required",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */

    public function update(InflationRatesRequest $request, $id)
    {
        $inflationRates = InflationRates::findOrFail($id)->update($request->validated());

        return (new InflationRatesResource(InflationRates::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }

      /**
     * @OA\Delete(
     *     path="/api/inflation-rates/{id}",
     *     summary="Delete an inflation rate",
     *     tags={"Inflation Rates"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the inflation rate to delete",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inflation rate deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Deleted Successfully"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Inflation rate with the given ID not found",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */
    public function destroy($id)
    {
        $inflationRates = InflationRates::findOrFail($id);

        $inflationRates->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }
}
