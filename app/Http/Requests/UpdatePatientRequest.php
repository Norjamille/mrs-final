<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'address' => 'required',
            'purok_id' => 'required',
            'email' => 'required|email|unique:patients,email,'.$this->id,
            'contact_number' => 'required|numeric|digits:11',
            'date_of_birth' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'purok_id' => 'purok',
        ];
    }
}
