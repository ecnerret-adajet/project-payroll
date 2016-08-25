<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerdayRequest extends Request
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
               'total_quantity' => 'integer|required',
               'employee_list' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
            'employee_list.required' => 'This field is required',
            'total_quantity.required' => 'This field is required'
        ];
    }

    
    
}
