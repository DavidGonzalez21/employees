<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function index(){
    	return view('content.login');
    }

    public function login(){

    	$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			}
			else {
				 $userdata = array(
			        'email'     => Input::get('email'),
			        'password'  => Input::get('password')
    			);
				 
				 if(Auth::attempt($userdata)){
				 	 return Redirect::to('/');
				 	}else{
				 		return "error";
				 	}
			}


    }
}
