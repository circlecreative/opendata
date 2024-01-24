<?php

namespace App\Http\Requests\Kominfo;

use Illuminate\Foundation\Http\FormRequest;

class UmkmGoOnlinesRequest extends FormRequest
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
            'LocationOfMarketGrebegActivities'=> 'required|string',
            'OnBoardingAchievements'=> 'required|integer'
        ];
    }
}
