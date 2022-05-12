<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'departement_id' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'string', 'max:255'],
            'state_id' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'max:255'],
            'date_hired' => ['required', 'string', 'max:255'],
        ];
    }
}
