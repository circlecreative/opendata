<?php

namespace App\Http\Requests\OpenDataJabar;

use Illuminate\Foundation\Http\FormRequest;

class TotalOfEntrepreneursRequest extends FormRequest
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
            'CodeProvinces' => 'required|string',
            'ProvincesName' => 'required|string',
            'CodeRegencyCity' => 'required|integer',
            'RegencyNameCity' => 'required|string',
            'TypeOfBusiness' => 'required|string',
            'TotalEntrepreneurs' => 'required|integer',
            'Entity' => 'required|string',
            'Year' => 'required|string',
        ];
    }
}
