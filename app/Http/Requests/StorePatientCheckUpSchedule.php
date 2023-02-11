<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientCheckUpSchedule extends FormRequest
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
            'date_at'=>'required|after:yesterday',
            'description'=>'required|max:250'
        ];
    }

    public function attributes()
    {
        return [
            'date_at'=>'check up date',
        ];
    }
}
