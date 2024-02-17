<?php

namespace App\Http\Controllers\BPS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BPS\TotalExpenditurePercapitasRequest;
use App\Http\Resources\BPS\TotalExpenditurePercapitasResource;
use App\Models\BPS\TotalExpenditurePercapitas;
use Database\Seeders\BPS\TotalExpenditurePercapitasSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;

/**
 * @OA\Schema(
 *     schema="TotalExpenditurePercapitas",
 *     @OA\Property(property="CodeProvince", type="integer"),
 *     @OA\Property(property="ProvinceName", type="string"),
 *     @OA\Property(property="TotalExpenditurePercapitas", type="integer"),
 *     @OA\Property(property="Unit", type="string"),
 *     @OA\Property(property="Year", type="integer"),
 * )
 */
class TotalExpenditurePercapitasController extends Controller
{
    //
    /**
     *
     * @OA\Get(
     *     path="/api/BPS/TotalExpenditurePercapitas",
     *     tags={"Total Expenditure Percapita"},
     *     summary="Get a paginated list of Total Expenditure Percapita.",
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
     *             @OA\Items(ref="#/components/schemas/TotalExpenditurePercapitas"),
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
        $totalExpendituresPercapitas = TotalExpenditurePercapitas::paginate(10);
        return TotalExpenditurePercapitasResource::collection($totalExpendituresPercapitas);
    }
    /**
     *
     * @OA\Post(
     *     path="/api/BPS/TotalExpenditurePercapitas",
     *     tags={"Total Expenditure Percapita"},
     *     summary="Create a new total expenditure percapita record.",
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
     *                  property="TotalExpenditurePercapitas",
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
     *                     "TotalExpenditurePercapitas":"example TotalExpenditurePercapitas",
     *                     "Unit":"Example Unit",
     *                     "Year":"Example Year",
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
     *             @OA\Property(property="CodeProvince", type="integer", example=1100),
     *             @OA\Property(property="ProvinceName", type="string", example="Aceh"),
     *             @OA\Property(property="TotalExpenditurePercapitas", type="integer", example=7933.73),
     *             @OA\Property(property="Unit", type="string", example="RIBU RUPIAH"),
     *             @OA\Property(property="Year", type="integer", example=2010),
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

    public function store(TotalExpenditurePercapitasRequest $request)
    {
        return (new TotalExpenditurePercapitasResource(TotalExpenditurePercapitas::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }
    /**
     *
     * @OA\Delete(
     *     path="/api/BPS/TotalExpenditurePercapitas/{id}",
     *     tags={"Total Expenditure Percapita"},
     *     summary="Delete a Total Expenditure Percapita record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the Total Expenditure Percapitas record to be deleted.",
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
        $totalExpenditurePercapitas = TotalExpenditurePercapitas::findOrFail($id);

        $totalExpenditurePercapitas->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/BPS/TotalExpenditurePercapitas/{id}",
     *     tags={"Total Expenditure Percapita"},
     *     summary="Get a specific total expenditure percapita record by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the total expenditure percapitas record to be retrieved.",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", ref="#/components/schemas/TotalExpenditurePercapitas"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Total Expenditure Percapita with the given ID not found",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */

    public function show(string $id)
    {
        $totalExpenditurePercapitas = TotalExpenditurePercapitas::findOrFail($id);
        if (!$totalExpenditurePercapitas) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new TotalExpenditurePercapitasResource($totalExpenditurePercapitas);
    }

    /**
     * @OA\Put(
     *     path="/api/BPS/TotalExpenditurePercapitas/{id}",
     *     summary="Update an existing total expenditure percapitas",
     *     tags={"Total Expenditure Percapita"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the total exependiture percapita to update",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to update an existing total expenditure percapitas",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="CodeProvince", type="integer", example=1100),
     *             @OA\Property(property="ProvinceName", type="string", example="Aceh"),
     *             @OA\Property(property="TotalExpenditurePercapitas", type="integer", example=7933.73),
     *             @OA\Property(property="Unit", type="string", example="RIBU RUPIAH"),
     *             @OA\Property(property="Year", type="integer", example=2010),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Total Expenditure Percapitas updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="CodeProvince", type="integer"),
     *             @OA\Property(property="ProvinceName", type="string"),
     *             @OA\Property(property="TotalExpenditurePercapitas", type="integer"),
     *             @OA\Property(property="Unit", type="string"),
     *             @OA\Property(property="Year", type="integer"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found. Total Expenditure Percapitas with the given ID not found",
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
     * )
     */

    public function update(TotalExpenditurePercapitasRequest $request, $id)
    {
        $totalExpenditurePercapitas = TotalExpenditurePercapitas::findOrFail($id);
        $totalExpenditurePercapitas->update($request->validated());

        return (new TotalExpenditurePercapitasResource(TotalExpenditurePercapitas::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
