<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $request)
    {
      // if(Input::hasFile('profile_photo')){
      //   $current = Carbon::now();
      //   $image = Input::file('profile_photo');
      //   $upload = base_path().'/public/images/';
      //   $filename = $request['last_name'].$current.'.png';
      //   $image->move($upload, $filename);
      //   $path = 'images/'.$filename;
      // }else
      // {
      //   $path = 'images/default.png';
      // }
      // return User::create([
      //     'first_name' => $request['first_name'],
      //     'last_name' => $request['last_name'],
      //     'middle_name' => $request['middle_name'],
      //     'email' => $request['email'],
      //     'password' => bcrypt($request['password']),
      //     'cell_phone' => $request['cell_phone'],
      //     'profile_photo' => $path
      // ]);
    }

    public function add_user(Request $request) {
      $this->validate($request, [
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'middle_name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:Users',
          'password' => 'required|min:6|confirmed',
          'cell_phone' => 'required|numeric',
          'profile_photo' => 'mimes:jpeg,bmp,png'
      ]);
    if(Input::hasFile('profile_photo')){
      $current = Carbon::now();
      $image = Input::file('profile_photo');
      $upload = base_path().'/public/images/';
      $filename = $request['last_name'].$current.'.png';
      $image->move($upload, $filename);
      $path = 'images/'.$filename;
    }else
    {
      $path = 'images/default.png';
    }
    User::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'middle_name' => $request['middle_name'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'cell_phone' => $request['cell_phone'],
        'profile_photo' => $path
    ]);

    return redirect('/users')->with('success', 'User created!');
    }

    public function get_user($id) {
      return User::find($id) != null ? response()->json(User::find($id)) : response()->json(['status' => 'ERROR', 'message' => 'not found']) ;
    }

    public function delete_user($id) {
      $user = User::find($id);

      if($user->delete()) {
        return redirect('/users')->with('success', 'User has been removed successfuly');
      }
    }

    public function update_user(Request $request) {

      $validator = Validator::make($request->all(), [
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'middle_name' => 'max:255',
            'email' => 'email|max:255',
            'password' => 'min:6|confirmed',
            'cell_phone' => 'numeric',
            'profile_photo' => 'mimes:jpeg,bmp,png'
        ]);

        if ($validator->fails()) {
            return redirect('/users')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status_update','fail_update');
        }

      if(Input::hasFile('profile_photo')){
        $current = Carbon::now();
        $image = Input::file('profile_photo');
        $upload = base_path().'/public/images/';
        $filename = $request['last_name'].$current.'.png';
        $image->move($upload, $filename);
        $path = 'images/'.$filename;
      }else
      {
        $path = '';
      }
      $id = $request['action_button'];
      $update = User::find($id);
      $request['first_name'] != '' ? $update->first_name = $request['first_name'] : $update->first_name = $update->first_name;
      $request['last_name'] != '' ? $update->last_name = $request['last_name'] : $update->last_name = $update->last_name;
      $request['middle_name'] != '' ? $update->middle_name = $request['middle_name'] : $update->middle_name = $update->middle_name;
      $request['cell_phone'] != '' ? $update->cell_phone = $request['cell_phone'] : $update->cell_phone = $update->cell_phone;
      $request['email'] != '' ? $update->email = $request['email'] : $update->email = $update->email;
      $request['password'] != '' ? $update->password = $request['password'] : $update->password = $update->password;
      $path != '' ? $update->profile_photo = $path : $update->profile_photo = $update->profile_photo;
      if($update->save()) {
        return redirect('/users')->with('success', 'User has been updated successfuly');
      }
    }
}
