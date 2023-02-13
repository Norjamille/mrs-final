<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientPregnancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'age_of_gestation' => 'required|numeric|max:9|min:0',
            'baby_count' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'baby_count' => 'no. of baby',
        ];
    }
}
