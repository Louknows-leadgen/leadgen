<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonFormRequest extends FormRequest
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
            'person.first_name' => 'sometimes|required',
            'person.middle_name' => 'sometimes|required',
            'person.last_name' => 'sometimes|required',
            'person.mobile_1' => 'sometimes|required|numeric',
            'person.mobile_2' => 'sometimes|nullable|numeric',
            'person.email' => 'sometimes|required|email',
            'person.age' => 'sometimes|required|numeric',
            'person.birthday' => 'sometimes|required|date_format:m/d/Y',
            'person.city_address' => 'sometimes|required|string',
            'person.father_name' => 'sometimes|nullable',
            'person.mother_name' => 'sometimes|nullable',
            'spouses.*.first_name' => 'sometimes|required|regex:/[A-z]+/',
            'spouses.*.middle_name' => 'sometimes|nullable|regex:/[A-z]+/',
            'spouses.*.last_name' => 'sometimes|required|regex:/[A-z]+/',
            'spouses.*.birthday' => 'sometimes|required|date_format:m/d/Y',
            'spouses.*.contact_no' => array('sometimes','nullable', 'regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'emergency_contacts.*.full_name' => 'sometimes|required',
            'emergency_contacts.*.contact_no' => array('sometimes','required', 'regex:/^[0-9]+$|^\d{3}-\d{4}$/'),
            'emergency_contacts.*.relationship' => 'sometimes|required',
            'dependents.*.full_name' => 'sometimes|required',
            'dependents.*.birthday' => 'sometimes|required|date_format:m/d/Y',
            'schools.*.school_name' => 'sometimes|required',
            'schools.*.graduated_date' => 'sometimes|required|numeric',
            'work_exp.*.employer' => 'sometimes|required',
            'work_exp.*.role_name' => 'sometimes|required',
            'work_exp.*.start_date' => 'sometimes|required|date_format:m/d/Y|before:end_date',
            'work_exp.*.end_date' => 'sometimes|required|date_format:m/d/Y|after:start_date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field is required.',
            'numeric' => 'This field should only contain numbers.',
            'email' => 'This field should be in email format.',
            'regex' => 'This field should be a string.',
            'spouses.*.contact_no.regex' => 'Should follow the correct format.',
            'emergency_contacts.*.contact_no.regex' => 'Should follow the correct format.',
            'date_format' => 'Date format should be mm/dd/yyyy'
        ];
    }

}
