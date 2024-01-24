<?php

namespace App\Http\Requests\OpenDataJabar;

use Illuminate\Foundation\Http\FormRequest;

class PondSaltProductionsRequest extends FormRequest
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
            'CodeRegency' => 'required|integer',
            'RegencyName' => 'required|string',
            'CodeSubdistrict' => 'required|integer',
            'NameSubdistrict' => 'required|string',
            'ValueOfSaltProduction' => 'required|string',
            'Unit' => 'required|string',
            'Year' => 'required|string',
        ];
    }
}
