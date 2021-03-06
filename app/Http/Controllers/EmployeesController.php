<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\User;
use App\Employee;
use Image;
use App\Status;
use App\Basic;
use App\Quantity;
use Carbon\Carbon;
use App\Role;
use App\Salary;
use DB;
use Hash;
use Flashy;
use App\Condition;


class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $user = User::all();
        $salaries = Salary::with('employees')->get();
        $statuses = Status::lists('name','id');
        $basics = Basic::lists('position','id');
        $quantities = Quantity::lists('position','id');
        return view('employees.index', compact(
            'employees',
            'user',
            'statuses',
            'salaries',
            'quantities',
            'basics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $statuses = Status::lists('name','id');
         $basics = Basic::lists('position','id')->all();
         $conditions = Condition::lists('name','id')->all();
        $quantities = Quantity::lists('position','id')->all();
         $roles = Role::lists('display_name','id');
        return view('employees.create', compact('statuses','basics','quantities','employees','roles','conditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {

         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        $employee = $user->employees()->create($request->all());
        $employee->salaries()->create($request->all());
        $employee->statuses()->attach($request->input('status_list'));
        $employee->basics()->attach((!$request->input('basic_list') ? [] : $request->input('basic_list')));
        $employee->conditions()->attach((!$request->input('condition_list') ? [] : $request->input('condition_list')));
        $employee->quantities()->attach((!$request->input('quantity_list') ? [] : $request->input('quantity_list')));

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/avatar/' . $filename ) ); 
            $employee->avatar = $filename;
            $employee->save();
        }


        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $user = User::all();
        $salaries = Salary::with('employees')->get();
        $statuses = Status::lists('name','id');
        $basics = Basic::lists('position','id');
        $quantities = Quantity::lists('position','id');
        return view('employees.show', compact(
            'employee',
            'user',
            'statuses',
            'salaries',
            'quantities',
            'basics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, User $user, Salary $salary)
    {
        $statuses = Status::lists('name','id');
        $basics = Basic::lists('position','id');
        $quantities = Quantity::lists('position','id');
        $roles = Role::lists('display_name','id');
        $conditions = Condition::lists('name','id');

        $salaries = Salary::with('employees')->get();

        $user = User::all();
       

        return view('employees.edit', compact(
            'user',
            'conditions',
            'roles',
            'userRole',
            'basics',
            'quantities',
            'salaries',
            'salary',
            'roles',
            'statuses',
            'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {

        $employee->update($request->all());
          $employee->statuses()->sync((!$request->input('status_list') ? [] : $request->input('status_list')));
          $employee->conditions()->sync((!$request->input('condition_list') ? [] : $request->input('condition_list')));


        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/avatar/' . $filename ) ); 
            $employee->avatar = $filename;
            $employee->save();
        }

        flashy()->success('Employee successfully updated!');

        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('employees');
    }
}
