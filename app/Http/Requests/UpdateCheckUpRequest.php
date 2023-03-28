<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCheckUpRequest extends FormRequest
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
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'age_of_gestation' => 'required|numeric',
            'blood_pressure' => 'required',
            'body_mass_index' => 'required',
            'laboratory_test_done' => 'required|max:250',
            'urinalysis' => 'required|max:250',
            'complete_blood_count' => 'required',
            'blood_typing' => 'required',
            'advice_and_services' => 'required|max:250',
            'name_of_service_worker' => 'required',
            'done_at' => 'required|date',
            'age_of_gestation_weeks' => 'required|numeric',
            'age_of_gestation_days' => 'required|numeric',
        ];
    }

    public function attributes()
    {
       return [
        'age_of_gestation' => 'Age of Gestation (Months)',
        'age_of_gestation_weeks' => 'Age of Gestation (Weeks)',
        'age_of_gestation_days' => 'Age of Gestation (Days)',
       ];
    }
}
