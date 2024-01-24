<?php

namespace App\Http\Requests\BPS;

use Illuminate\Foundation\Http\FormRequest;

class InflationRatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     /**
     * @OA\Schema(
     *     schema="InflationRates",
     *     type="object",
     *     required={
     *         "City",
     *         "2017PercentAmount",
     *         "2018PercentAmount",
     *         "2019PercentAmount",
     *         "2020PercentAmount",
     *         "2021PercentAmount"
     *     },
     *     @OA\Property(property="City", type="string"),
     *     @OA\Property(property="2017PercentAmount", type="string"),
     *     @OA\Property(property="2018PercentAmount", type="string"),
     *     @OA\Property(property="2019PercentAmount", type="string"),
     *     @OA\Property(property="2020PercentAmount", type="string"),
     *     @OA\Property(property="2021PercentAmount", type="string"),
     * )
     */
    public function rules(): array
    {
        return [

                //
                'City' => 'required|string',
                '2017PercentAmount' => 'required|string',
                '2018PercentAmount' => 'required|string',
                '2019PercentAmount' => 'required|string',
                '2020PercentAmount' => 'required|string',
                '2021PercentAmount' => 'required|string',
                
                
            ];
    }
}
