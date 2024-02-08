<?php

namespace App\Http\Controllers\OpenDataJabar;

use App\Http\Controllers\Controller;
use App\Models\OpenDataJabar\PondSaltProductions;
use App\Http\Requests\OpenDataJabar\PondSaltProductionsRequest;
use App\Http\Resources\OpenDataJabar\PondSaltProductionsResource;
use Database\Seeders\OpenDataJabar\PondSaltProductionsSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Iluminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

/**
 * @OA\Schema(
 *     schema="PondSaltProductions",
 *     title="Pond Salt Productions",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="CodeRegency", type="integer"),
 *     @OA\Property(property="RegencyName", type="string"),
 *     @OA\Property(property="CodeSubdisctrict", type="integer"),
 *     @OA\Property(property="NameSubdistrict", type="string"),
 *     @OA\Property(property="ValueOfSaltProductions", type="string"),
 *     @OA\Property(property="Unit", type="string"),
 *     @OA\Property(property="Year", type="string"),
 *     @OA\Property(property="created_at", type="string"),
 *     @OA\Property(property="updated_at", type="string"),
 * )
 */

class PondSaltProductionsController extends Controller
{
    //
    /**
     * @OA\Get(
     *     path="/api/OpenDataJabar/PondSaltProductions",
     *     tags={"Pond Salt Productions"},
     *     summary="Get a paginated list of Pond  Salt Productions.",
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
     *             @OA\Items(ref="#/components/schemas/PondSaltProductions"),
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
        $pondSaltProductions = PondSaltProductions::paginate(10);
        return PondSaltProductionsResource::collection($pondSaltProductions);
    }

     /**
     * @OA\Get(
     *     path="/api/PondSaltProductions/{id}",
     *     summary="Get details of an inflation rate",
     *     tags={"Pond Salt Productions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the Pond Salt Productions to retrieve",
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="CodeRegency", type="integer", example="3215"),
     *             @OA\Property(property="RegencyName", type="string", example="KARAWANG"),
     *             @OA\Property(property="CodeSubdisctrict", type="integer", example="3215010"),
     *             @OA\Property(property="NameSubdistrict", type="string", example="PANGKALAN"),
     *             @OA\Property(property="ValueOfSaltProductions", type="string", example="0"),
     *             @OA\Property(property="Unit", type="string", example="RIBU RUPIAH"),
     *             @OA\Property(property="Year", type="string", example="2020"),
     *             @OA\Property(property="created_at", type="string", example="2024-01-24 13:47:57"),
     *             @OA\Property(property="updated_at", type="string", example="2024-01-24 13:47:57"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Pond Salt Productions with the given ID not found",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */


    public function show(string $id)
    {
        $pondSaltProductions = PondSaltProductions::findOrFail($id);
        if(!$pondSaltProductions){
            return response()->json(['Message'=> 'Not Found!'], 404);
        }
        return new PondSaltProductionsResource($pondSaltProductions);
    }
 
     /**
     * @OA\Post(
     *     path="/api/Pond Salt Productions",
     *     summary="Create a new Pond Salt Productions",
     *     tags={"Pond Salt Productions"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to create a new Pond Salt Productions",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                  property="CodeRegency",
     *                  type="integer"
     *              ),
     *             @OA\Property(
     *                  property="RegencyName",
     *                  type="string",
     *              ),
     *
     *             @OA\Property(
     *                  property="CodeSubdsictrict",
     *                  type="integer"
     *              ),
     *             @OA\Property(
     *                  property="NameSubdistrict",
     *                  type="string",
     *              ),
     *             
     *             @OA\Property(
     *                  property="ValueOfSaltProductions",
     *                  type="integer"
     *              ),
     *             @OA\Property(
     *                  property="Unit",
     *                  type="string",
     *              ),
     *             @OA\Property(
     *                  property="Year",
     *                  type="string",
     *              ),
     *               example={
     *                     "CodeRegency":"example CodeRegency",
     *                     "RegencyName":"example RegencyName",
     *                     "CodeSubdistrict":"example CodeSubdistrict",
     *                     "NameSubdistrict":"example NameSubdistrict",
     *                     "ValueOfSaltProductions":"example ValueOfSaltProductions",
     *                     "Unit":"example Unit",
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
     *             @OA\Property(property="CodeRegency", type="integer", example="3215"),
     *             @OA\Property(property="RegencyName", type="string", example="KARAWANG"),
     *             @OA\Property(property="CodeSubdisctrict", type="integer", example="3215010"),
     *             @OA\Property(property="NameSubdistrict", type="string", example="PANGKALAN"),
     *             @OA\Property(property="ValueOfSaltProductions", type="string", example="0"),
     *             @OA\Property(property="Unit", type="string", example="RIBU RUPIAH"),
     *             @OA\Property(property="Year", type="string", example="2020"),
     *             @OA\Property(property="created_at", type="string", example="2024-01-24 13:47:57"),
     *             @OA\Property(property="updated_at", type="string", example="2024-01-24 13:47:57"),
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

    public function store(PondSaltProductionsRequest $request)
    {
        return (new PondSaltProductionsResource(PondSaltProductions::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }
    /**
     * @OA\Delete(
     *     path="/api/PondSaltProductions/{id}",
     *     summary="Delete an Pond Salt Productions",
     *     tags={"Pond Salt Productions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the Pond Salt Productions to delete",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pond Salt Produtions deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Deleted Successfully"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Not Found. Pond Salt Productions with the given ID not found",
     *     ),
     * )
     */

    public function destroy($id)
    {
        $pondSaltProductions = PondSaltProductions::findOrFail($id);

        $pondSaltProductions->delete();
        return response()->json(['Messsage'=> 'Deleted Successfully'], 200);
    }
     /**
     * @OA\Put(
     *     path="/api/pondsaltproductions/{id}",
     *     summary="Update an existing pondsaltproductions",
     *     tags={"Pond Salt Productions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the pond salt productions to update",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Data to update an existing pond salt productions",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="CodeRegency", type="integer", example="3215"),
     *             @OA\Property(property="RegencyName", type="string", example="KARAWANG"),
     *             @OA\Property(property="CodeSubdisctrict", type="integer", example="3215010"),
     *             @OA\Property(property="NameSubdistrict", type="string", example="PANGKALAN"),
     *             @OA\Property(property="ValueOfSaltProductions", type="string", example="0"),
     *             @OA\Property(property="Unit", type="string", example="RIBU RUPIAH"),
     *             @OA\Property(property="Year", type="string", example="2020"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="pond salt productions updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="CodeRegency", type="integer"),
     *             @OA\Property(property="RegencyName", type="string"),
     *             @OA\Property(property="CodeSubdistrict", type="integer"),
     *             @OA\Property(property="NameSubdistrict", type="string"),
     *             @OA\Property(property="ValueOfSaltProductions", type="ValueOfSaltProductions"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found. Pond Salt Productions with the given ID not found",
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

    public function update(PondSaltProductionsRequest $request, $id)
    {
        $pondSaltProductions = PondSaltProductions::findOrFail($id)->update($request->validated());

        return (new PondSaltProductionsResource(PondSaltProductions::findOrFail($id)))->response()->header('Message', 'Updated Susccessfully');
    }
}
