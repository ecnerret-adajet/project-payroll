<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Status;
use App\Basic;
use App\Quantity;
use App\Salary;
use App\Role;
use Auth;
use Carbon\Carbon;
use App\Announcement;
use App\Attendance;
use App\Payroll;
use Input;
use DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $employees = Employee::latest()->get();
            $statuses = Status::all();
            $attendances = Attendance::orderBy('created_at','asc')->where('created_at', '<=', Carbon::now())->take(1)->get();
            $announcements = Announcement::orderBy('created_at','desc')->where('created_at', '<=', Carbon::now())->take(5)->get();
            $status = Status::with('employees')->get();
            $basics = Basic::lists('position','id');
            $quantities = Quantity::lists('position','id');
            $users = User::all();
            $roles = Role::all();


        return view('home', compact('employees',
                'statuses',
                'users',
                'roles',
                'status',
                'attendances',
                'announcements',
                'quantities',
                'basics'))
                ->with('i');
    }


    public function logs(){
        $employees = Employee::lists('id','id');
        return view('logs', compact('employees'));
    }


    public function timeIn(Request $request){

            $this->validate($request, [
            'time_in' => 'required',
            ]);


            $input = $request->all();
            $attendances = Attendance::create($input);

            return redirect('logs');

    }

    public function timeOut(Request $request){

            $this->validate($request, [
            'time_out' => 'required',
            ]);


            $input = $request->all();
            $attendances = Attendance::create($input);

            return redirect('logs');

    }

    public function getdata(Request $request)
    {
         $this->validate($request, [
           'start_period' => 'required',
            'end_period' => 'required'
        ]); 

         $employees = Employee::all();
         $start_period = $request->get('start_period');
         $end_period = $request->get('end_period');
       
        
        $attendances = Attendance::where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'),'>=',$start_period)
            ->where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'),'<=',$end_period)
            ->get();
        
        return view('payroll.create', compact(
            'attendances',
            'start_period',
            'end_period',
            'employees'
        ));
    }

    

    public function showpayslips(){
        $payrolls = Payroll::all();
        $employees = Employee::all();
        $attendances = Attendance::all();
        $salaries = Salary::all();
        return view('payrolls.showpayslips', compact(
            'employees',
            'attendances',
            'salaries',
            'payrolls'));
    }




}
