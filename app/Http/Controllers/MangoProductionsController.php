<?php

namespace App\Http\Controllers;

use App\Http\Requests\MangoProductionsRequest;
use App\Models\MangoProductions;
use App\Http\Resources\MangoProductionsResource;
use Database\Seeders\MangoProductionsSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
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
        return response()->json(['Message'=> 'Deleted Successfully'], 200);
    }

    public function show(string $id)
    {
        $mangoProductions = MangoProductions::findOrFail($id);
        if (!$mangoProductions){
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new MangoProductionsResource($mangoProductions);

    }

    public function update(MangoProductionsRequest $request, $id)
    {
        $mangoProductions = MangoProductions::findOrFail($id)->update($request->validated());

        return (new MangoProductionsResource(MangoProductions::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
