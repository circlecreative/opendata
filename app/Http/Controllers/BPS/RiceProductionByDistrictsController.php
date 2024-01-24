<?php

namespace App\Http\Controllers\BPS;

use App\Http\Requests\BPS\RiceProductionByDistrictsRequest;
use App\Models\BPS\RiceProductionByDistricts;
use App\Http\Resources\BPS\RiceProductionByDistrictsResource;
use Database\Seeders\BPS\RiceProductionByDistrictsSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;
/**
 * @OA\Schema(
 *     schema="RiceProductionByDistricts",
 *     @OA\Property(property="CodeProvince", type="string"),
 *     @OA\Property(property="ProvinceName", type="string"),
 *     @OA\Property(property="CodeDistricts", type="integer"),
 *     @OA\Property(property="DistrictsName", type="string"),
 *     @OA\Property(property="TonsIn2020", type="integer"),
 *     @OA\Property(property="TonsIn2021", type="integer"),
 *     @OA\Property(property="TonsIn2022", type="integer"),
 *     @OA\Property(property="TonsIn2023", type="integer"),
 * )
 */

class RiceProductionByDistrictsController extends Controller
{
    /**
     *
     * @OA\Get(
     *     path="/api/BPS/RiceProductionByDistricts",
     *     tags={"Rice Production"},
     *     summary="Get a paginated list of rice production data by districts.",
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
     *             @OA\Items(ref="#/components/schemas/RiceProductionByDistricts"),
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
        $riceProductionByDistricts = RiceProductionByDistricts::paginate(10);
        return RiceProductionByDistrictsResource::collection($riceProductionByDistricts);
    }

    /**
     *
     * @OA\Post(
     *     path="/api/BPS",
     *     tags={"Rice Production"},
     *     summary="Create a new rice production record.",
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
     *                  property="CodeDistrict",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="DistrictName",
     *                  type="string"
     *              ),  
     *           
     *                  example={
     *                     "CodeProvince":"example CodeProvince",
     *                     "ProvinceName":"example ProvinceName",
     *                     "CodeDistrict":"example CodeDistrict",
     *                     "DistrictName":"Example DistrictName",
     *                     "TonsIn2020":"Example TonsIn2020",
     *                     "TonsIn2021":"Example TonsIn2021",
     *                     "TonsIn2022":"Example TonsIn2022",
     *                     "TonsIn2023":"Example TonsIn2023"
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
     *             @OA\Property(property="CodeDistricts", type="integer", example=3201),
     *             @OA\Property(property="DistrictsName", type="string", example="Bogor"),
     *             @OA\Property(property="TonsIn2020", type="integer", example=0),
     *             @OA\Property(property="TonsIn2021", type="integer", example=28515),
     *             @OA\Property(property="TonsIn2022", type="integer", example=299893.8),
     *             @OA\Property(property="TonsIn2023", type="integer", example=281153),
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

    public function store(RiceProductionByDistrictsRequest $request)
    {
        return (new RiceProductionByDistrictsResource(RiceProductionByDistricts::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }
    /**
     *
     * @OA\Delete(
     *     path="/api/BPS/RiceProductionByDistricts/{id}",
     *     tags={"Rice Production"},
     *     summary="Delete a rice production record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the rice production record to be deleted.",
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
        $riceProductionByDistricts = RiceProductionByDistricts::findOrFail($id);

        $riceProductionByDistricts->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/BPS/RiceProductionByDistricts/{id}",
     *     tags={"Rice Production"},
     *     summary="Get a specific rice production record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the rice production record to be retrieved.",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", ref="#/components/schemas/RiceProductionByDistricts"),
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
        $riceProductionByDistricts = RiceProductionByDistricts::findOrFail($id);
        if (!$riceProductionByDistricts) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new RiceProductionByDistrictsResource($riceProductionByDistricts);
    }

    /**
     *
     * @OA\Put(
     *      path="/api/BPS/rice-production/{id}",
     *      operationId="updateRiceProductionByDistricts",
     *      tags={"Rice Production"},
     *      summary="Update rice production data by districts",
     *      description="Update rice production data by districts based on the given ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the rice production data to be updated",
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
     *                  property="CodeDistrict",
     *                  type="integer"
     *              ),
     *              @OA\Property(
     *                  property="DistrictName",
     *                  type="string"
     *              ),  
     *           
     *                  example={
     *                     "CodeProvince":"example CodeProvince",
     *                     "ProvinceName":"example ProvinceName",
     *                     "CodeDistrict":"example CodeDistrict",
     *                     "DistrictName":"Example DistrictName",
     *                     "TonsIn2020":"Example TonsIn2020",
     *                     "TonsIn2021":"Example TonsIn2021",
     *                     "TonsIn2022":"Example TonsIn2022",
     *                     "TonsIn2023":"Example TonsIn2023"
     *                }
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Updated rice production data",
     *          @OA\JsonContent(
     *              
     *          )
     *      ),
     *           @OA\Response(
     *                response=200,
     *                description="Rice production data updated successfully",
     *                @OA\JsonContent(
     *                  type="object",
     *                  @OA\Property(property="CodeProvince", type="string", description="Province code", example="32"),
     *                  @OA\Property(property="ProvinceName", type="string", description="Province name", example="Jawa Barat"),
     *                  @OA\Property(property="CodeDistricts", type="integer", description="Districts code", example=3201),
     *                  @OA\Property(property="DistrictsName", type="string", description="Districts name", example="Sukabumi"),
     *                  @OA\Property(property="TonsIn2020", type="integer", description="Tons in 2020", example=0),
     *                  @OA\Property(property="TonsIn2021", type="integer", description="Tons in 2021", example=492926.3),
     *                  @OA\Property(property="TonsIn2022", type="integer", description="Tons in 2022", example=508220.48),
     *                  @OA\Property(property="TonsIn2023", type="integer", description="Tons in 2023", example=515136),
     *              ),
     *          ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Rice production data not found",
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

     /**
 * @OA\Schema(
 *     schema="ValidationError",
 *     @OA\Property(property="message", type="string", description="Error message"),
 *     @OA\Property(property="errors", type="object", description="Validation errors"),
 * )
 */

    public function update(RiceProductionByDistrictsRequest $request, $id)
    {
        $riceProductionByDistricts = RiceProductionByDistricts::findOrFail($id);
        $riceProductionByDistricts->update($request->validated());

        return (new RiceProductionByDistrictsResource(RiceProductionByDistricts::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
