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
        $validatedData = $request->validated();

        $consumsionTaxs = ConsumsionTaxs::create($validatedData);
        return (new ConsumsionTaxsResource($consumsionTaxs))->response()->header('Message', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $consumsionTaxs = ConsumsionTaxs::find($id);

        if (!$consumsionTaxs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $consumsionTaxs->delete();
        return response()->json(['Message' => 'Data berhasil dihapus'], 200);
    }

    public function show(string $id)
    {
        try {
            $consumsionTaxs = ConsumsionTaxs::findOrFail($id);
            return new ConsumsionTaxsResource($consumsionTaxs);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }

    public function update(ConsumsionTaxsRequest $request, $id)
    {
        $validatedData = $request->validated();

        $consumsionTaxs = ConsumsionTaxs::find($id);

        if (!$consumsionTaxs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $consumsionTaxs->update($validatedData);
        return (new ConsumsionTaxsResource($consumsionTaxs))->response()->header('Message', 'data berhasil diperbarui');
    }
}
