<?php

namespace App\Http\Controllers\OpenDataJabar;

use App\Http\Requests\OpenDataJabar\MangoProductionsRequest;
use App\Models\OpenDataJabar\MangoProductions;
use App\Http\Resources\OpenDataJabar\MangoProductionsResource;
use Database\Seeders\OpenDataJabar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class MangoProductionsController extends Controller
{
    //
    public function index()
    {
        $mangoProductions = MangoProductions::paginate(10);
        return MangoProductionsResource::collection($mangoProductions);
    }

    public function store(MangoProductionsRequest $request)
    {
        return (new MangoProductionsResource(MangoProductions::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    public function destroy($id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);

        $mangoProductions->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    public function show(string $id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);
        if (!$mangoProductions) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new MangoProductionsResource($mangoProductions);
    }

    public function update(MangoProductionsRequest $request, $id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);
        $mangoProductions->update($request->validated());

        return (new MangoProductionsResource(MangoProductions::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
