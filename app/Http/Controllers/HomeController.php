<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

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
        $employees = Employees::all();
        $array = array();
        foreach ($employees as $employee) {
            //echo $employee->first_name; 
        }
        $data = array('employees' => $employees );
        return view('home', $data);
    }
}
