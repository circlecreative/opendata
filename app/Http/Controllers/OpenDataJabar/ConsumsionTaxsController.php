<?php

namespace App\Http\Controllers\OpenDataJabar;

use App\Http\Requests\OpenDataJabar\ConsumsionTaxsRequest;
use App\Http\Controllers\Controller;
use App\Models\OpenDataJabar\ConsumsionTaxs;
use App\Http\Resources\OpenDataJabar\ConsumsionTaxsResource;
use Database\Seeders\OpenDataJabar\ConsumsionTaxsSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;

/**
 * @OA\Schema(
 *     schema="ConsumsionTaxs",
 *     @OA\Property(property="CodeProvince", type="integer"),
 *     @OA\Property(property="ProvinceName", type="string"),
 *     @OA\Property(property="CodeRegencyCity", type="integer"),
 *     @OA\Property(property="RegencyNameCity", type="string"),
 *     @OA\Property(property="NumberScorePPH", type="integer"),
 *     @OA\Property(property="Unit", type="string"),
 *     @OA\Property(property="Year", type="integer"),
 * )
 */
class ConsumsionTaxsController extends Controller
{
    /**
     *
     * @OA\Get(
     *     path="/api/OpenDataJabar/ConsumsionTaxs",
     *     tags={"Consumsion Taxs"},
     *     summary="Get a paginated list of Consumsion Taxs.",
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
     *             @OA\Items(ref="#/components/schemas/ConsumsionTaxs"),
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
        $consumsionTaxs = ConsumsionTaxs::paginate(10);
        return ConsumsionTaxsResource::collection($consumsionTaxs);
    }

    /**
     *
     * @OA\Post(
     *     path="/api/OpenDataJabar",
     *     tags={"Consumsion Taxs"},
     *     summary="Create a new Consumsion Taxs record.",
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
     *              @OA\Property(
     *                  property="NumberScorePPH",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="Unit",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="Year",
     *                  type="integer"
     *              ),
     *
     *
     *                  example={
     *                     "CodeProvince":"example CodeProvince",
     *                     "ProvinceName":"example ProvinceName",
     *                     "CodeRegencyName":"example CodeRegencyName",
     *                     "RegencyNameCity":"Example RegencyNameCity",
     *                     "NumberScorePPH":"Example NumberScorePPH",
     *                     "Unit":"Example Unit",
     *                     "Year":"Example Year"
     *                }
     *
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
     *             @OA\Property(property="CodeRegencyName", type="integer", example=3201),
     *             @OA\Property(property="RegencyNameCity", type="string", example="Kabupaten Bogor"),
     *             @OA\Property(property="NumberScorePPH", type="integer", example=81),
     *             @OA\Property(property="Unit", type="string", example="POINT"),
     *             @OA\Property(property="Year", type="integer", example=2021),
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
    public function store(ConsumsionTaxsRequest $request)
    {
        return (new ConsumsionTaxsResource(ConsumsionTaxs::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

     /**
     *
     * @OA\Delete(
     *     path="/api/OpenDataJabar/ConsumsionTaxs/{id}",
     *     tags={"Consumsion Taxs"},
     *     summary="Delete a Consumsion Taxs record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Consumsion Taxs record to be deleted.",
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
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id);

        $consumsionTaxs->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/Kominfo/ConsumsionTaxs/{id}",
     *     tags={"Consumsion Taxs"},
     *     summary="Get a specific Consumsion Taxs by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Consumsion Taxs record to be retrieved.",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", ref="#/components/schemas/ConsumsionTaxs"),
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
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id);
        return new ConsumsionTaxsResource($consumsionTaxs);
    }

    /**
     *
     * @OA\Put(
     *      path="/api/OpenDataJabar/ConsumsionTaxs/{id}",
     *      operationId="updateConsumsionTaxs",
     *      tags={"Consumsion Taxs"},
     *      summary="Update ConsumsionTaxs ",
     *      description="Update Consumsion Taxs based on the given ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the Consumsion Taxs data to be updated",
     *          @OA\Schema(
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
     *              @OA\Property(
     *                  property="NumberScorePPH",
     *                  type="integer"
     *              ),  
     *              @OA\Property(
     *                  property="Unit",
     *                  type="string"
     *              ),  
     *              @OA\Property(
     *                  property="Year",
     *                  type="integer"
     *              ),  
     *           
     *                  example={
     *                     "CodeProvince":"example CodeProvince",
     *                     "ProvinceName":"example ProvinceName",
     *                     "CodeRegencyName":"example CodeRegencyName",
     *                     "RegencyNameCity":"Example RegencyNameCity",
     *                     "NumberScorePPH":"Example NumberScorePPH",
     *                     "Unit":"Example Unit",
     *                     "Year":"Example Year"
     *                }
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Updated Consumsion Taxs data",
     *          @OA\JsonContent(
     *              
     *          )
     *      ),
     *           @OA\Response(
     *                response=200,
     *                description="Consumsion Taxs data updated successfully",
     *                @OA\JsonContent(
     *                  type="object",
     *                  @OA\Property(property="CodeProvince", type="integer", description="Province code", example="32"),
     *                  @OA\Property(property="ProvinceName", type="string", description="Province name", example="Jawa Barat"),
     *                  @OA\Property(property="CodeRegencyName", type="integer", description="CodeRegencyName", example=3201),
     *                  @OA\Property(property="RegencyNameCity", type="string", description="NameRegencyCity", example="Kota Bogor"),
     *                  @OA\Property(property="NumberScorePPH", type="integer", description="NumberScorePPH", example=81),
     *                  @OA\Property(property="Unit", type="string", description="Unit", example="POINT"),
     *                  @OA\Property(property="Year", type="integer", description="Year", example=2021),
     *              ),
     *          ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="ConsumsionTaxs data not found",
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

    public function update(ConsumsionTaxsRequest $request, $id)
    {
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id)->update($request->validated());

        return (new ConsumsionTaxsResource(ConsumsionTaxs::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
