<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PayrollRequest extends Request
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
             'start_period' => 'required',
             'end_period' => 'required',
             'employee.*.dozen' => 'string',
             'employee.*.employee_id' => 'string'
        ];

         
    }
}
