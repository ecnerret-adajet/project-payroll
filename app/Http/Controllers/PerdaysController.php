<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PerdayRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\User;
use App\Employee;
use App\Perday;
use Carbon\Carbon;
use App\Quantity;
use DB;

class PerdaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perdays = Perday::orderBy('created_at','asc')->where('created_at', '<=', Carbon::now())->get();
        $employees = Employee::all();
        return view('perdays.index', compact(
            'employees',
            'perdays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
            $employees = Employee::lists('first_name','id');
         

        return view('perdays.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerdayRequest $request)
    {
         $perday = Auth::user()->perdays()->create($request->all()); 
         $perday->employees()->attach($request->input('employee_list'));

        return redirect('perdays');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perday $perday)
    {
        return view('perdays.show',compact('perday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perday $perday)
    {
        $employees = Employee::lists('first_name','id');
        return view('perdays.edit',compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerdayRequest $request, Perday $perday)
    {
         $perday->update($request->all());
         $perday->employees()->sync((!$request->input('employee_list') ? [] : $request->input('employee_list')));

         return redirect('perdays');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perday $perday)
    {
        $perday->delete();
        return redirect('perdays');
    }
}
