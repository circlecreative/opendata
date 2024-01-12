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
class ConsumsionTaxsController extends Controller
{
    //
    public function index()
    {
        $consumsionTaxs = ConsumsionTaxs::paginate(10);
        return ConsumsionTaxsResource::collection($consumsionTaxs);
    }

    public function store(ConsumsionTaxsRequest $request)
    {
        return (new ConsumsionTaxsResource(ConsumsionTaxs::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    public function destroy($id)
    {
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id);

        $consumsionTaxs->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    public function show(string $id)
    {
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id);
        return new ConsumsionTaxsResource($consumsionTaxs);
    }

    public function update(ConsumsionTaxsRequest $request, $id)
    {
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id)->update($request->validated());

        return (new ConsumsionTaxsResource(ConsumsionTaxs::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
