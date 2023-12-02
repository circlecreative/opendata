<?php

namespace App\Http\Controllers;
use App\Models\Consumsion_Taxs;
use App\Http\Resources\Consumsion_TaxsResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Throwable;

class Consumsion_TaxsController extends Controller
{
    //
    public function index()
    {
        $consumsion = Consumsion_Taxs::paginate(10);
        return Consumsion_TaxsResource::collection($consumsion);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code_province' => 'required|integer',
                'province_name' => 'required|string',
                'code_regency_city' => 'required|integer',
                'regency_name_city' => 'required|string',
                'number_score_pph' => 'required|integer',
                'unit' => 'required|string',
                'year' => 'required|integer',
            ]);

            if ($validator->fails()) {
                $errorMessage = $validator->errors()->first();
                return response()->json(['message' => $errorMessage], 422);
            }

            $payload = $request->only(['code_province', 'province_name', 'code_regency_city', 'regency_name_city', 'number_score_pph', 'unit', 'year']);

            $DBCreate = Consumsion_Taxs::create($payload);
            return response()->json(
                [
                    'data' => $DBCreate,
                    'message' => 'Success',
                    'status_code' => 201,
                    'status' => 'Data berhasil ditambah!',
                ],
                201,
            );
        } catch (Throwable $th) {
            return response()->json(['message' => 'Create position failed!', 'error' => $th], 500);
        }
    }

    public function destroy(string $id)
    {
        $consumsion = Consumsion_Taxs::find($id);

        if (!$consumsion) {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }

        $consumsion->delete();
        return response()->json(['message' => 'Data berhasil dihapus!'], 200);
    }

    public function create()
    {
        return view('consumsion.create');
    }

    public function show(string $id)
    {
        $consumsion = Consumsion_Taxs::find($id);

        if (!$consumsion) {
            return response()->json(['message' => 'Data tidak ditemukan', 'status' => false, 'data' => []], 200);
        }
        return response()->json(
            [
                'data' => $consumsion,
                'message' => 'success',
                'status' => 200,
                'status_code' => 'Data berhasil ditampilkan!',
            ],
            200,
        );
    }

    public function update(Request $request, $id)
    {
        $consumsion = Consumsion_Taxs::find($id);
        if (!$consumsion) {
            return response()->json(['message' => 'Data tidak ditemukan']);
        }
        $consumsion->fill($request->all());//update date dengan nilai dari request
        $consumsion->save();

        return response()->json(['message' => 'Data berhasil diupdate', 'data' => $consumsion]);
    }
}
