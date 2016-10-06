<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PayrollRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Payroll;
use App\Salary;
use App\User;
use App\Perday;
use App\Employee;
use App\Basic;
use App\Role;
use App\Quantity;
use App\Attendance;
use Image;
use DB;

class PayrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrolls = Payroll::all();
        $employees = Employee::all();
        $attendances = Attendance::where('time_in', '=', 'time_out')->count();
        return view('payrolls.index', compact('payrolls','employees','attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::lists('first_name','id');
        $employeesx = Employee::all();
        $salaries = Salary::with('employees');
        return view('payrolls.create', compact(
            'salaries',
            'employeesx',
            'employees'))
        ->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayrollRequest $request)
    {
   
        $payroll = Auth::user()->payrolls()->create($request->all()); 
        $payroll->employees()->attach($request->input('employee_list'));

        return redirect('payrolls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        $sum = 0;
        $total_hour = 0;
        $total_minutes = 0;
        $hourly_rate = 0;
        $total_perday = 0;
        $gross = 0;
        $total = 0;
        $ssspay = 0;
        $pagpay = 0;
        $allowance = 0;
        $attendance1 = 0;


      

        $attendances = Attendance::where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'),'>=',$payroll->start_period)
            ->where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'),'<=',$payroll->end_period)
            ->get();


        foreach($attendances as $attendance)
        {
            $total_hour += $attendance->time_in->diffInHours( $attendance->time_out);
        }

        foreach($attendances as $attendance)
        {
            $total_minutes += $attendance->time_in->diffInMinutes( $attendance->time_out);
        }

        $employees = Employee::all();
        foreach($payroll->employees as $employee)
        {
            $employee->salaries->basic_pay;
        }



        $hourly_rate = $employee->salaries->basic_pay / 8;


        $perdays = Perday::where(DB::raw('DATE_FORMAT(publish_date,"%Y-%m-%d")'),'>=',$payroll->start_period)
            ->where(DB::raw('DATE_FORMAT(publish_date,"%Y-%m-%d")'),'<=',$payroll->end_period)
            ->get();

        foreach($perdays as $perday){
            $total_perday += $perday->total_quantity;
        }

      

        return view('payrolls.show',compact(
            'per_quantity',
            'total_hour',
            'total_perday',
            'hourly_rate',
            'total_minutes',
            'employees',
            'attendances',
            'attendance',
            'attendancesx',
            'users',
            'quantities',
            'sum',
            'total',
            'basics',
            'ssspay',
            'pagpay',
            'gross',
            'perdays',
            'salaries',
            'payrolls',
            'allowance',
            'payroll'));
    }


   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
