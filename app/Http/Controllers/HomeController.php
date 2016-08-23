<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Status;
use App\Basic;
use App\Quantity;
use App\Role;
use Auth;
use Carbon\Carbon;
use App\Announcement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $employees = Employee::latest()->get();
            $statuses = Status::all();
            $announcements = Announcement::orderBy('created_at','desc')->take(1)->get();
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
                'announcements',
                'quantities',
                'basics'));
    }


}
