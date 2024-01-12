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
