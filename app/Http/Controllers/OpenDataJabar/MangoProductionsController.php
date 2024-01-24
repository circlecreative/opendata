<?php

namespace App\Http\Controllers\OpenDataJabar;

use App\Http\Requests\OpenDataJabar\MangoProductionsRequest;
use App\Models\OpenDataJabar\MangoProductions;
use App\Http\Resources\OpenDataJabar\MangoProductionsResource;
use Database\Seeders\OpenDataJabar\MangoProductionsSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

/**
 * @OA\Schema(
 *     schema="MangoProductions",
 *     @OA\Property(property="CodeProvince", type="integer"),
 *     @OA\Property(property="ProvinceName", type="string"),
 *     @OA\Property(property="CodeRegencyCity", type="integer"),
 *     @OA\Property(property="RegencyNameCity", type="string"),
 *     @OA\Property(property="MangoProductions", type="string"),
 *     @OA\Property(property="Unit", type="string"),
 *     @OA\Property(property="Year", type="string"),
 * )
 */
class MangoProductionsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/OpenDataJabar/MangoProductions",
     *     tags={"Mango Productions"},
     *     summary="Get a paginated list of Mango Productions.",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number for pagination.",
     *         required=false,
     *         @OA\Schema(type="integer", default=1),
     *     ),
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Number of items per page.",
     *         required=false,
     *         @OA\Schema(type="integer", default=10),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/MangoProductions"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *     ),
     * )
     * 
     */
    public function index()
    {
        $mangoProductions = MangoProductions::paginate(10);
        return MangoProductionsResource::collection($mangoProductions);
    }

    /**
     *
     * @OA\Post(
     *     path="/api/OpenDatajabar",
     *     tags={"Mango Productions"},
     *     summary="Create a new Mango Productions record.",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to be added",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="CodeProvince",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="ProvinceName",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="CodeRegencyCity",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="RegencyNameCity",
     *                  type="string"
     *              ),
     *
     *              @OA\Property(
     *                  property="MangoProductions",
     *                  type="integer"
     *              ),
     *
     *              @OA\Property(
     *                  property="Unit",
     *                  type="string"
     *              ),
     *
     *              @OA\Property(
     *                  property="Year",
     *                  type="string"
     *              ),
     *
     *                  example={
     *                     "CodeProvince":"example CodeProvince",
     *                     "ProvinceName":"example ProvinceName",
     *                     "CodeRegencyCity":"example CodeRegencyCity",
     *                     "RegencyCityName":"Example RegencyCityName",
     *                     "MangoProductions":"Example MangoProductions",
     *                     "Unit":"Example Unit",
     *                     "Year":"Example Year"
     *                }
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data added successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="CodeProvince", type="integer", example="32"),
     *             @OA\Property(property="ProvinceName", type="string", example="Jawa Barat"),
     *             @OA\Property(property="CodeRegencyCity", type="integer", example=3201),
     *             @OA\Property(property="RegencyCityName", type="string", example="Kabupaten Bogor"),
     *             @OA\Property(property="MangoProductions", type="integer", example=29405),
     *             @OA\Property(property="Unit", type="string", example="KUINTAL"),
     *             @OA\Property(property="Year", type="string", example="2021"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Validation error"),
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object", example={"fieldName": {"Error message"}}),
     *         ),
     *     ),
     * )
     *
     */

    public function store(MangoProductionsRequest $request)
    {
        return (new MangoProductionsResource(MangoProductions::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    /**
     *
     * @OA\Delete(
     *     path="/api/OpenDataJabar/MangoProductions/{id}",
     *     tags={"Mango Productions"},
     *     summary="Delete a Mango Productions record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Mango Productions record to be deleted.",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully deleted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="Message", type="string", example="Deleted Successfully"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *     ),
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy($id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);

        $mangoProductions->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/OpenDataJabar/MangoProductions/{id}",
     *     tags={"Mango Productions"},
     *     summary="Get a specific Mango Productions by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Mango Productions record to be retrieved.",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", ref="#/components/schemas/MangoProductions"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="Message", type="string", example="Not Found!"),
     *         ),
     *     ),
     * )
     *
     */

    public function show(string $id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);
        if (!$mangoProductions) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new MangoProductionsResource($mangoProductions);
    }

    /**
     *
     * @OA\Put(
     *      path="/api/OpenDataJabar/MangoProductions/{id}",
     *      operationId="updateMangoProductions",
     *      tags={"Mango Productions"},
     *      summary="Update MangoProductions",
     *      description="Update Mango Productions based on the given ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the Mango Productions data to be updated",
     *          @OA\Schema(
     *            type="object",
     *              @OA\Property(
     *                  property="CodeProvince",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="ProvinceName",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="CodeRegencyCity",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="RegencyNameCity",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="MangoProductions",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="Unit",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="Year",
     *                  type="string"
     *              ),
     *
     *                  example={
     *                     "CodeProvince":"example CodeProvince",
     *                     "ProvinceName":"example ProvinceName",
     *                     "CodeRegencyCity":"example CodeRegencyCity",
     *                     "RegencyNameCity":"Example RegencyNameCity",
     *                     "MangoProduction":"Example MangoProductions",
     *                     "Unit":"Example Unit",
     *                     "Year":"Example Year"
     *                }
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Updated Mango Productions data",
     *          @OA\JsonContent(
     *
     *          )
     *      ),
     *           @OA\Response(
     *                response=200,
     *                description="Mango Productions data updated successfully",
     *                @OA\JsonContent(
     *                 type="object",
     *                 @OA\Property(property="CodeProvince", type="integer", example="32"),
     *                 @OA\Property(property="ProvinceName", type="string", example="Jawa Barat"),
     *                 @OA\Property(property="CodeRegencyCity", type="integer", example=3201),
     *                 @OA\Property(property="RegencyNameCity", type="string", example="Kabupaten Bogor"),
     *                 @OA\Property(property="MangoProduction", type="integer", example=29405),
     *                 @OA\Property(property="Unit", type="string", example="KUINTAL"),
     *                 @OA\Property(property="Year", type="string", example="2013"),
     *              ),
     *          ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Mango Productions data not found",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Not Found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The given data was invalid.")
     *          )
     *      ),
     * )
     */

    public function update(MangoProductionsRequest $request, $id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);
        $mangoProductions->update($request->validated());

        return (new MangoProductionsResource(MangoProductions::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
