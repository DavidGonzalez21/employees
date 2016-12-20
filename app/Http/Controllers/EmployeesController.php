<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Employee;
use App\Holidays;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array('employees' =>  Employee::all()->sortBy('first_name'));
        return view('content.panel_employees', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'other_name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'cell_phone' => 'required|numeric',
          'user_skype' => 'required|max:255',
          'birth_date' => 'required|date|date_format:Y-m-d',
          'hire_date' => 'required|date|date_format:Y-m-d',
          'profile_photo' => 'mimes:jpeg,bmp,png'
      ]);

      if ($validator->fails()) {
          return redirect('/employees')
                      ->withErrors($validator)
                      ->withInput()
                      ->with('status_create','fail_create');
      }

      if(Input::hasFile('profile_photo')){
        $current = Carbon::now();
        $image = Input::file('profile_photo');
        $upload = base_path().'/public/images/employees/';
        $filename = Input::file('profile_photo')->getClientOriginalName();
        $image->move($upload, $filename);
        $path = 'images/employees/'.$filename;
      }else
      {
        $path = 'images/employees/default.png';
      }

      Employee::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'other_name' => $request['other_name'],
        'email' => $request['email'],
        'phone' => $request['cell_phone'],
        'user_skype' => $request['user_skype'],
        'date_of_birth' => $request['birth_date'],
        'hire_date' => $request['hire_date'],
        'profile_photo' => $path
      ]);

      return redirect('/employees')->with('success', $request['first_name'] . ' has been added successfuly!..');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'first_name' => 'max:255',
          'last_name' => 'max:255',
          'other_name' => 'max:255',
          'email' => 'email|max:255',
          'cell_phone' => 'numeric',
          'user_skype' => 'max:255',
          'birth_date' => 'date|date_format:Y-m-d',
          'hire_date' => 'date|date_format:Y-m-d',
          'profile_photo' => 'mimes:jpeg,bmp,png'
      ]);

      if ($validator->fails()) {
          return redirect('/employees')
                      ->withErrors($validator)
                      ->withInput()
                      ->with('status_update','fail_update');
      }
      //upload image
      if(Input::hasFile('profile_photo')){
        $current = Carbon::now();
        $image = Input::file('profile_photo');
        $upload = base_path().'/public/images/';
        $filename = Input::file('profile_photo')->getClientOriginalName().$current;
        $image->move($upload, $filename);
        $path = 'images/'.$filename;
      }else
      {
        $path = '';
      }
      $id = $request['action_button'];
      $update = Employee::find($id);
      $request['first_name'] != '' ? $update->first_name = $request['first_name'] : $update->first_name = $update->first_name;
      $request['last_name'] != '' ? $update->last_name = $request['last_name'] : $update->last_name = $update->last_name;
      $request['other_name'] != '' ? $update->other_name = $request['other_name'] : $update->other_name = $update->other_name;
      $request['email'] != '' ? $update->email = $request['email'] : $update->email = $update->email;
      $request['cell_phone'] != '' ? $update->phone = $request['cell_phone'] : $update->phone = $update->phone;
      $request['user_skype'] != '' ? $update->user_skype = $request['user_skype'] : $update->user_skype = $update->user_skype;
      $request['birth_date'] != '' ? $update->date_of_birth = $request['birth_date'] : $update->date_of_birth = $update->date_of_birth;
      $request['hire_date'] != '' ? $update->hire_date = $request['hire_date'] : $update->hire_date = $update->hire_date;
      $path != '' ? $update->profile_photo = $path : $update->profile_photo = $update->profile_photo;
      if($update->save()) {
        return redirect('/employees')->with('success', $request['first_name'] . ' has been updated successfuly');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = Employee::find($id);

      if($user->delete()) {
        return redirect('/employees')->with('success', 'Employee has been removed successfuly');
      }
    }

    /**
     * loads the profile of employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
      $user = Employee::find($id);
      $holidays = Holidays::all();
        return view('content.profile_employee', array('employee' => $user, 'holidays' => $holidays));

    }
}
