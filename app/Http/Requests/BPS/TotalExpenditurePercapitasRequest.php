<?php

namespace App\Http\Requests\BPS;

use Illuminate\Foundation\Http\FormRequest;

class TotalExpenditurePercapitasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        /**
         * @OA\Schema(
         *     schema="TotalExpenditurePercapitas",
         *     @OA\Property(property="CodeProvince", type="integer"),
         *     @OA\Property(property="ProvinceName", type="string"),
         *     @OA\Property(property="TotalExpenditurePercapitas", type="integer"),
         *     @OA\Property(property="Unit", type="string"),
         *     @OA\Property(property="Year", type="integer"),
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
            'TotalExpenditurePercapitas' => 'required|integer',
            'Unit' => 'required|string',
            'Year' => 'required|integer',
        ];
    }
}
