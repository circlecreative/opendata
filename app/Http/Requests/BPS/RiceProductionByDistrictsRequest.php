<?php

namespace App\Http\Requests\BPS;

use Illuminate\Foundation\Http\FormRequest;

class RiceProductionByDistrictsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        /**
         * @OA\Schema(
         *     schema="RiceProductionByDistricts",
         *     @OA\Property(property="CodeProvince", type="integer"),
         *     @OA\Property(property="ProvinceName", type="string"),
         *     @OA\Property(property="CodeDistricts", type="integer"),
         *     @OA\Property(property="DistrictsName", type="string"),
         *     @OA\Property(property="TonsIn2020", type="integer"),
         *     @OA\Property(property="TonsIn2021", type="integer"),
         *     @OA\Property(property="TonsIn2022", type="integer"),
         *     @OA\Property(property="TonsIn2023", type="integer"),
         * )
         */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'CodeProvince' => 'required|integer',
            'ProvinceName' => 'required|string',
            'CodeDistricts' => 'required|integer',
            'DistrictsName' => 'required|string',
            'TonsIn2020' => 'required|integer',
            'TonsIn2021' => 'required|integer',
            'TonsIn2022' => 'required|integer',
            'TonsIn2023' => 'required|integer',
        ];
    }
}
