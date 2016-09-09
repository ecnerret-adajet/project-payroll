<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
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
             'first_name' => 'required',
             'last_name' => 'required',
             'birthdate' => 'required',
             'civil_status' => 'required',
             'gender' => 'required',
             'mobile_no' => 'required',
             'address' => 'required',
             'date_hired' => 'required',
             'pagibig_no' => 'required',
             'salary_type' => 'required',
             'status_list' => 'required',
        ];
    }
}
