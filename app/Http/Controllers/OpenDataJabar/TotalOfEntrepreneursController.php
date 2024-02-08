<?php

namespace App\Http\Controllers\OpenDataJabar;

use App\Http\Controllers\Controller;
use App\Models\OpenDataJabar\TotalOfEntrepreneurs;
use App\Http\Requests\OpenDataJabar\TotalOfEntrepreneursRequest;
use App\Http\Resources\OpenDataJabar\TotalOfEntrepreneursResources;
use Database\Seeders\OpenDataJabar\TotalOfEntrepreneursSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

/**
 * @OA\Schema(
 *     schema="TotalOfEntrepreneurs",
 *     title="Total Of Entrepreneurs",
 *     @OA\Property(property="CodeProvinces", type="string"),
 *     @OA\Property(property="ProvincesName", type="string"),
 *     @OA\Property(property="CodeRegencyCity", type="integer"),
 *     @OA\Property(property="RegencyNameCity", type="string"),
 *     @OA\Property(property="TypeOfBusiness", type="string"),
 *     @OA\Property(property="TotalEntrepreneurs", type="integer"),
 *     @OA\Property(property="Entity", type="string"),
 *     @OA\Property(property="Year", type="string"),
 * )
 */

class TotalOfEntrepreneursController extends Controller
{
    //
    /**
     * @OA\Get(
     *     path="/api/OpenDataJabar/TotalOfEntrepreneurs",
     *     tags={"Total Of Entrepreneurs"},
     *     summary="Get a paginated list of Total Of Entrepreneurs.",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number for pagination.",
     *         required=false,
     *         @OA\Schema(type="integer", default=1),
     *     ),
     *
     * @OA\Parameter(
     *     name="perPage",
     *     in="query",
     *     description="Number of items per page.",
     *     required=false,
     *     @OA\Schema(type="integer", default=10)
     * ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/TotalOfEntrepreneurs"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *     )
     * )
     *
     */
    public function index()
    {
        $totalOfEntrepreneurs = TotalOfEntrepreneurs::paginate(10);
        return TotalOfEntrepreneursResources::collection($totalOfEntrepreneurs);
    }

    /**
     * @OA\Get(
     *     path="/api/TotalOfEntrepreneurs/{id}",
     *     summary="Get details of an total of entrepreneurs",
     *     tags={"Total Of Entrepreneurs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the Total Of Entrepreneurs to retrieve",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *          type="object",
     *             @OA\Property(property="CodeProvinces", type="string", example="32"),
     *             @OA\Property(property="ProvincesName", type="string", example="Jawa Barat"),
     *             @OA\Property(property="CodeRegencyCity", type="integer", example=3274),
     *             @OA\Property(property="RegencyNameCity", type="string", example="Kota Cirebon"),
     *             @OA\Property(property="TypeOfBusiness", type="string", example="PENGUSAHA KECIL"),
     *             @OA\Property(property="TotalEntrepreneurs", type="integer",example=593),
     *             @OA\Property(property="Entity", type="string", example="UNIT"),
     *             @OA\Property(property="Year", type="string", example="Year"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Total Of Entrepreneurs with the given ID not found",
     * ),
     * )
     */
    public function show(string $id)
    {
        $totalOfEntrepreneurs = TotalOfEntrepreneurs::findOrFail($id);
        if (!$totalOfEntrepreneurs) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new totalOfEntrepreneursResources($totalOfEntrepreneurs);
    }

    /**
     * @OA\Post(
     *     path="/api/TotalOfEntrepreneurs",
     *     summary="Create a new total of entrepreneurs",
     *     tags={"Total Of Entrepreneurs"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to create a new Total of Entrepreneurs",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                  property="CodeProvinces",
     *                  type="string"
     *              ),
     *             @OA\Property(
     *                  property="ProvincesName",
     *                  type="string",
     *              ),
     *
     *             @OA\Property(
     *                  property="CodeRegencyCity",
     *                  type="integer"
     *              ),
     *             @OA\Property(
     *                  property="RegencyNameCity",
     *                  type="string",
     *              ),
     *
     *             @OA\Property(
     *                  property="TypeOfBusiness",
     *                  type="string"
     *              ),
     *             @OA\Property(
     *                  property="TotalEntrepreneurs",
     *                  type="integer",
     *              ),
     *             @OA\Property(
     *                  property="Entity",
     *                  type="string",
     *              ),
     *             @OA\Property(
     *                  property="Year",
     *                  type="string",
     *              ),
     *               example={
     *                     "CodeProvinces":"example CodeProvinces",
     *                     "ProvincesName":"example ProvincesName",
     *                     "CodeRegencyCity":"example CodeRegencyCity",
     *                     "RegencyNameCity":"example RegencyNameCity",
     *                     "TypeOfBusiness":"example TypeOfBusiness",
     *                     "TotalEntrepreneurs":"example TotalEntrepreneurs",
     *                     "Entity":"example Entity",
     *                     "Year":"example Year",
     *                }
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="PondSaltProductions created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="CodeProvinces", type="string", example="32"),
     *             @OA\Property(property="ProvincesName", type="string", example="Jawa Barat"),
     *             @OA\Property(property="CodeRegencyCity", type="integer", example="3274"),
     *             @OA\Property(property="RegencyNameCity", type="string", example="Kota Cirebon"),
     *             @OA\Property(property="TypeOfBusiness", type="string", example="PENGUSAHA KECIL"),
     *             @OA\Property(property="TotalEntrepreneurs", type="string", example="593"),
     *             @OA\Property(property="Entity", type="string", example="UNIT"),
     *             @OA\Property(property="Year", type="string", example="2020"),
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
     * )
     */

    public function store(TotalOfEntrepreneursRequest $request)
    {
        $totalOfEntrepreneurs = TotalOfEntrepreneurs::create($request->validated());
        return (new TotalOfEntrepreneursResources($totalOfEntrepreneurs))->response()->header('Message', 'Data Added Successfully');
    }

    /**
     * @OA\Delete(
     *     path="/api/TotalOfEntrepreneurs/{id}",
     *     summary="Delete an Total Of Entrepreneurs",
     *     tags={"Total Of Entrepreneurs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the Total Of Entrepreneurs to delete",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Total Of Entrepreneurs deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Deleted Successfully"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Total Of Entrepreneurs with the given ID not found",
     *     ),
     * )
     */

    public function destroy($id)
    {
        $totalOfEntrepreneurs = TotalOfEntrepreneurs::findOrFail($id);

        $totalOfEntrepreneurs->delete();
        return response()->json(['Messsage' => 'Deleted Successfully'], 200);
    }

    /**
     * @OA\Put(
     *     path="/api/totalofentrepreneurs/{id}",
     *     summary="Update an existing totalofentrepreneurs",
     *     tags={"Total Of Entrepreneurs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the total of entrepreneurs to update",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to update an existing total of entrepreneurs",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="CodeProvinces", type="string", example="32"),
     *             @OA\Property(property="ProvincesName", type="string", example="Jawa Barat"),
     *             @OA\Property(property="CodeRegencyCity", type="integer", example=3274),
     *             @OA\Property(property="RegencyNameCity", type="string", example="Kota Cirebon"),
     *             @OA\Property(property="TypeOfBusiness", type="string", example="PENGUSAHA KECIL"),
     *             @OA\Property(property="TotalEntrepreneurs", type="integer",example=593),
     *             @OA\Property(property="Entity", type="string", example="UNIT"),
     *             @OA\Property(property="Year", type="string", example="Year"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="total of entrepreneurs updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="CodeProvinces", type="string"),
     *             @OA\Property(property="ProvincesName", type="string"),
     *             @OA\Property(property="CodeRegencyCity", type="integer"),
     *             @OA\Property(property="RegencyNameCity", type="string"),
     *             @OA\Property(property="TypeOfBusiness", type="string"),
     *             @OA\Property(property="TotalEntrepreneurs", type="integer"),
     *             @OA\Property(property="Entity", type="string"),
     *             @OA\Property(property="Year", type="string"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found. total of entrepreneurs with the given ID not found",
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

    public function update(TotalOfEntrepreneursRequest $request, $id)
    {
        $totalOfEntrepreneurs = TotalOfEntrepreneurs::findOrFail($id)->update($request->validated());

        return (new TotalOfEntrepreneursResources(TotalOfEntrepreneurs::findOrFail($id)))->response()->header('Message', 'Updated Susccessfully');
    }
}
