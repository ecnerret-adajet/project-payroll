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
        $payrolls = Payroll::all();
        $sum = 0;
        $gross = 0;
        $total = 0;
        $ssspay = 0;
        $pagpay = 0;
        $basics = Basic::all();
        $users = User::all();
        $quantities = Quantity::all();
        $perdays = Perday::all();
        $employees = Employee::all();
        $attendances = attendance::with('employees');
        $salaries = Salary::all(); 
        return view('payrolls.show',compact(
            'employees',
            'attendances',
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
