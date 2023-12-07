<?php

namespace App\Http\Controllers;
use App\Models\ConsumsionTaxs;
use App\Http\Resources\ConsumsionTaxsResource;
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
        $ConsumsionTaxs = ConsumsionTaxs::paginate(10);
        return ConsumsionTaxsResource::collection($ConsumsionTaxs);
    }

    public function store(Request $request)
    {
    
        $ConsumsionTaxs = new ConsumsionTaxs(); // Instantiating the ConsumsionTaxs class

        // Assigning values from the request to the instantiated object
        $ConsumsionTaxs->CodeProvince = $request->input('CodeProvince');
        $ConsumsionTaxs->ProvinceName = $request->input('ProvinceName');
        $ConsumsionTaxs->CodeRegencyCity = $request->input('CodeRegencyCity');
        $ConsumsionTaxs->RegencyNameCity = $request->input('RegencyNameCity');
        $ConsumsionTaxs->NumberScorePPH = $request->input('NumberScorePPH');
        $ConsumsionTaxs->Unit = $request->input('Unit');
        $ConsumsionTaxs->Year = $request->input('Year');

        if($ConsumsionTaxs->save()) {
            return new ConsumsionTaxsResource($ConsumsionTaxs);
        }
    }


    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'code_province' => 'required|integer',
    //             'province_name' => 'required|string',
    //             'code_regency_city' => 'required|integer',
    //             'regency_name_city' => 'required|string',
    //             'number_score_pph' => 'required|integer',
    //             'unit' => 'required|string',
    //             'year' => 'required|integer',
    //         ]);

    //         if ($validator->fails()) {
    //             $errorMessage = $validator->errors()->first();
    //             return response()->json(['message' => $errorMessage], 422);
    //         }

    //         $payload = $request->only(['code_province', 'province_name', 'code_regency_city', 'regency_name_city', 'number_score_pph', 'unit', 'year']);

    //         $DBCreate = ConsumsionTaxs::create($payload);
    //         return response()->json(
    //             [
    //                 'data' => $DBCreate,
    //                 'message' => 'Success',
    //                 'status_code' => 201,
    //                 'status' => 'Data berhasil ditambah!',
    //             ],
    //             201,
    //         );
    //     } catch (Throwable $th) {
    //         return response()->json(['message' => 'Create position failed!', 'error' => $th], 500);
    //     }
    // }

    public function destroy($id)
    {
        $ConsumsionTaxs = ConsumsionTaxs::findOrFail($id);
        if($ConsumsionTaxs->delete()) {
            return new ConsumsionTaxsResource($ConsumsionTaxs);

        // if (!$ConsumsionTaxs) {
        //     return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        // }

        // $ConsumsionTaxs->delete();
        // return response()->json(['message' => 'Data berhasil dihapus!'], 200);

        }
    }

    public function create()
    {
        return view('consumsion.create');
    }

    public function show(string $id)
    {
        $ConsumsionTaxs = ConsumsionTaxs::findOrFail($id);
        return new ConsumsionTaxsResource($ConsumsionTaxs);
    }

        // if (!$ConsumsionTaxs) {
        //     return response()->json(['message' => 'Data tidak ditemukan', 'status' => false, 'data' => []], 200);
        // }
        // return response()->json(
        //     [
        //         'data' => $ConsumsionTaxs,
        //         'message' => 'success',
        //         'status' => 200,
        //         'status_code' => 'Data berhasil ditampilkan!',
        //     ],
        //     200,
        // );
    

    public function update(Request $request, $id)
    {
        $ConsumsionTaxs = ConsumsionTaxs::findOrFail($id);
        $ConsumsionTaxs->CodeProvince = $request->input('CodeProvince');
        $ConsumsionTaxs->ProvinceName = $request->input('ProvinceName');
        $ConsumsionTaxs->CodeRegencyCity = $request->input('CodeRegencyCity');
        $ConsumsionTaxs->RegencyNameCity = $request->input('RegencyNameCity');
        $ConsumsionTaxs->NumberScorePPH = $request->input('NumberScorePPH');
        $ConsumsionTaxs->Unit = $request->input('Unit');
        $ConsumsionTaxs->Year = $request->input('Year');

        if($ConsumsionTaxs->save()){
            return new ConsumsionTaxsResource($ConsumsionTaxs);
        //     ->response()
        //     ->setStatusCode(201)
        //     ->withMessagae('Data berhasil disimpan');
        // }else{
        //     return response()->json([
        //         'message'=>'gagal menyimpan data'
        //     ], 500);
        }
        // if (!$ConsumsionTaxs) {
        //     return response()->json(['message' => 'Data tidak ditemukan']);
        // }
        // $ConsumsionTaxs->fill($request->all());//update date dengan nilai dari request
        // $ConsumsionTaxs->save();

        // return response()->json(['message' => 'Data berhasil diupdate', 'data' => $ConsumsionTaxs]);
    }
}
