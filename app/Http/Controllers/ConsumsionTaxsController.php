<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumsionTaxsRequest;
use App\Models\ConsumsionTaxs;
use App\Http\Resources\ConsumsionTaxsResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
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
        if (!$consumsionTaxs) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        return new ConsumsionTaxsResource($consumsionTaxs);
    }

    public function update(ConsumsionTaxsRequest $request, $id)
    {
        $consumsionTaxs = ConsumsionTaxs::findOrFail($id)->update($request->validated());

        return (new ConsumsionTaxsResource(ConsumsionTaxs::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
