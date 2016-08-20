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
use App\Position;
use Carbon\Carbon;
use App\Role;
use App\Payroll;
use DB;
use Hash;


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
        $payrolls = Payroll::with('employees')->get();
        $statuses = Status::lists('name','id');
        $positions = Position::lists('name','id');
        return view('employees.index', compact(
            'employees',
            'user',
            'statuses',
            'payrolls',
            'positons'));
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
        $positions = Position::lists('name','id');
         $roles = Role::lists('display_name','id');
        return view('employees.create', compact('statuses','positions','employees','roles'));
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
        $employee->payrolls()->create($request->all());
        $employee->statuses()->attach($request->input('status_list'));
        $employee->positions()->attach($request->input('position_list'));

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
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $statuses = Status::lists('name','id');
        $positions = Position::lists('name','id');
        $roles = Role::lists('display_name','id');
        return view('employees.edit', compact(
            'positions',
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
        $employee->positions()->sync((!$request->input('position_list') ? [] : $request->input('position_list')));


        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/avatar/' . $filename ) ); 
            $employee->avatar = $filename;
            $employee->save();
        }


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }


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
