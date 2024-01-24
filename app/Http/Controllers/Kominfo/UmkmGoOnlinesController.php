<?php

namespace App\Http\Controllers\Kominfo;

use App\Http\Controllers\Controller;
use App\Models\Kominfo\UmkmGoOnlines;
use App\Http\Requests\Kominfo\UmkmGoOnlinesRequest;
use App\Http\Resources\Kominfo\UmkmGoOnlinesResource;
use Database\Seeders\Kominfo\UmkmGoOnlinesSeeder;
use Illumminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;

/**
 * @OA\Schema(
 *     schema="UmkmGoOnlines",
 *     @OA\Property(property="LocationOfMarketGrebegActivities", type="string"),
 *     @OA\Property(property="OnBoardingAchievments", type="integer"),
 * )
 */
class UmkmGoOnlinesController extends Controller
{
    //
    /**
     *
     * @OA\Get(
     *     path="/api/Kominfo/UmkmGoOnlines",
     *     tags={"Umkm Go Onlines"},
     *     summary="Get a paginated list of Umkm Go Onlines data from Kominfo.",
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
     *             @OA\Items(ref="#/components/schemas/UmkmGoOnlines"),
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
        $umkmGoOnlines = UmkmGoOnlines::paginate(10);
        return UmkmGoOnlinesResource::collection($umkmGoOnlines);
    }

    /**
     *
     * @OA\Post(
     *     path="/api/Kominfo",
     *     tags={"Umkm Go Onlines"},
     *     summary="Create a new Umkm Go Online record.",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to be added",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="LocationOfMarketGrebegActivities",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="OnBoardingAchievments",
     *                  type="ineteger"
     *              ),
     *
     *                  example={
     *                     "LocationOfMarketGrebegActivities":"example LocationOfMarketGrebegActivities",
     *                     "OnBoardingAchievments":"example OnBoardingAchievments"
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
     *             @OA\Property(property="LocationOfMarketGrebegActivities", type="string", example="Kota Jakarta"),
     *             @OA\Property(property="OnBoardingAchievments", type="integer", example="2011")
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

    public function store(UmkmGoOnlinesRequest $request)
    {
        return (new UmkmGoOnlinesResource(UmkmGoOnlines::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    /**
     *
     * @OA\Delete(
     *     path="/api/Kominfo/UmkmGoOnlines/{id}",
     *     tags={"Umkm Go Onlines"},
     *     summary="Delete a Umkm Go Onlines record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Umkm Go Onlines record to be deleted.",
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
        $umkmGoOnlines = UmkmGoOnlines::findOrFail($id);

        $umkmGoOnlines->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/Kominfo/UmkmGoOnlines/{id}",
     *     tags={"Umkm Go Onlines"},
     *     summary="Get a specific Umkm Go Onlines record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Umkm Go Onlines record to be retrieved.",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", ref="#/components/schemas/UmkmGoOnlines"),
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
        $umkmGoOnlines = UmkmGoOnlines::findOrFail($id);
        if (!$umkmGoOnlines) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new UmkmGoOnlinesResource($umkmGoOnlines);
    }

    /**
     *
     * @OA\Put(
     *      path="/api/Kominfo/UmkmGoOnlines/{id}",
     *      operationId="updateUmkmGoOnlines",
     *      tags={"Umkm Go Onlines"},
     *      summary="Update Umkm Go Onlines data by districts",
     *      description="Update Umkm Go Onlines data based on the given ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the Umkm Go Onlines data to be updated",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="LocationOfMarketGrebegActivities",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="OnBoardingAchievments",
     *                  type="integer"
     *              ),
     *                  example={
     *                     "LocationOfMarketGrebegActivities":"example LocationOfMarketGrebegActivities",
     *                     "OnBoardingAchievments":"example OnBoardingAchievments"
     *                }
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Umk Go Onlines data",
     *          @OA\JsonContent(
     *
     *          )
     *      ),
     *           @OA\Response(
     *                response=200,
     *                description="Umkm Go Onlines data updated successfully",
     *                @OA\JsonContent(
     *                  type="object",
     *                  @OA\Property(property="LocationOfMarketGrebegActivities", type="string", description="Location Of Market Grebeg Activities", example="Kota Jakarta"),
     *                  @OA\Property(property="OnBoardingAchievments", type="integer", description="On Boarding Achievments", example="2011")
     *              ),
     *          ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Umkm Go Onlines data not found",
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

    public function update(UmkmGoOnlinesRequest $request, $id)
    {
        $umkmGoOnlines = UmkmGoOnlines::findOrFail($id);
        $umkmGoOnlines->update($request->validated());

        return (new UmkmGoOnlinesResource(UmkmGoOnlines::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
