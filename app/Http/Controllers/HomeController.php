<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Status;
use App\Position;
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
            $positions = Position::all();
            $users = User::all();
            $roles = Role::all();

        return view('home', compact('employees',
                'statuses',
                'users',
                'roles',
                'status',
                'announcements',
                'positions'));
    }


}
