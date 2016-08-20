<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
    	'meal_allowance',
    	'transportation',
    	'taxable_allowance',
        'basic_pay',
    	'gross_pay',
    	'wilholding_tax',
    	'sss_contribution',
    	'philhealth_contribution',
    	'pagibig_contribution',
    	'total_deductions',
    	'net_pay'
    ];

    public function employees()
    {
    	return $this->belongsTo('App\Employee','employee_id','id');
    }


}
