<?php

namespace App\Http\Controllers;

use App\Models\ConsumsionTax;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Throwable;

class ConsumsionTaxController extends Controller
{
    //
    public function index()
    {
        $consumsion = ConsumsionTax::all();

        if ($consumsion->isEmpty()) {
            return response()->json(
                [
                    'message' => 'Data tidak ditemukan',
                    'status' => false,
                ],
                404,
            );
        }
        return response()->json(
            [
                'data' => $consumsion,
                'message' => 'Success',
                'status_code' => 200,
                'status' => true,
            ],
            200,
        );
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
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

            $payload = [
                'code_province' => request('code_province'),
                'province_name' => request('province_name'),
                'code_regency_city' => request('code_regency_city'),
                'regency_name_city' => request('regency_name_city'),
                'number_score_pph' => request('number_score_pph'),
                'unit' => request('unit'),
                'year' => request('year'),
            ];

            $DBCreate = ConsumsionTax::create($payload);
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

    public function update(string $id)
    {
        try {
            $consumsion = ConsumsionTax::where('id', $id)->first();

            if (!$consumsion) {
                return response()->json(['message' => 'Data not found!'], 404);
            }

            $consumsion->update(request()->all());
            return response()->json(
                [
                    'data' => $consumsion,
                    'message' => 'Success',
                    'status_code' => 201,
                    'status' => 'Data berhasil diubah!',
                ],
                201,
            );
        } catch (Throwable $th) {
            return response()->json(['message' => 'Update failed!', 'error' => $th], 500);
        }
    }

    public function destroy(string $id)
    {
        $consumsion = ConsumsionTax::where('id', $id)->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 201);
    }

    public function create()
    {
        return view('consumsion.create');
    }

    public function show(string $id)
    {
        $consumsion = ConsumsionTax::where('id', $id)->first();

        if ($consumsion->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan', 'status' => false], 404);
        }
        return response()->json(
            [
                'data' => $consumsion,
                'message' => 'Success',
                'status_code' => 201,
                'status' => 'Data berhasil ditampilkan!',
            ],
            201,
        );
    }

    public function edit($id)
    {
        $consumsion = ConsumsionTax::find($id);
        return view('ConsumsionTax.edit', compact('consumsion'));
    }
}
