<?php

namespace App\Http\Requests\OpenDataJabar;

use Illuminate\Foundation\Http\FormRequest;

class ConsumsionTaxsRequest extends FormRequest
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
            'CodeProvince'=> 'required|integer',
            'ProvinceName'=> 'required|string',
            'CodeRegencyCity'=> 'required|integer',
            'RegencyNameCity'=> 'required|string',
            'NumberScorePPH'=> 'required|integer',
            'Unit'=> 'required|string',
            'Year'=> 'required|integer',
        ];
    }
}
