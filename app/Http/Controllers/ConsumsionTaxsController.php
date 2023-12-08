<?php

namespace App\Http\Controllers;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'CodeProvince' => 'required|integer',
            'ProvinceName' => 'required|string',
            'CodeRegencyCity' => 'required|integer',
            'RegencyNameCity' => 'required|string',
            'NumberScorePPH' => 'required|integer',
            'Unit' => 'required|string',
            'Year' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Data gagal ditambah', 'errors' => $validator->errors()],400);
        }
        $consumsionTaxs = ConsumsionTaxs::create($request->all());
        return (new ConsumsionTaxsResource($consumsionTaxs))->response()->header('Message', 'Data berhasil ditambahkan');
    
    }

    public function destroy($id)
    {
        $consumsionTaxs = ConsumsionTaxs::find($id);

        if (!$consumsionTaxs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $consumsionTaxs->delete();
        return response()->json(['Message'=> 'Data berhasil dihapus'], 200);


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

    public function update(Request $request, $id)
    {
        $consumsionTaxs = ConsumsionTaxs::find($id);

        if (!$consumsionTaxs) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'CodeProvince' => 'required|integer',
            'ProvinceName' => 'required|string',
            'CodeRegencyCity' => 'required|integer',
            'RegencyNameCity' => 'required|string',
            'NumberScorePPH' => 'required|integer',
            'Unit' => 'required|string',
            'Year' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Data gagal diperbarui', 'errors'=> $validator->errors()], 400);
        }

        $consumsionTaxs->update($request->all());
        return (new ConsumsionTaxsResource($consumsionTaxs))->response()->header('Message', 'data berhasil diperbarui');
       
    }
}
