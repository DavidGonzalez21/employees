<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class RegisterController extends Controller
{
    public function index() {
      return view('content.register');
    }

    public function create(Request $request) {
      $this->validate($request, [
          'first_name' => 'bail|required',
          'last_name' => 'bail|required',
          'other_name' => 'bail|required',
          'email' => 'bail|required',
          'password' => 'bail|required',
          'cell_phone' => 'bail|required'
        ]);
        $data = [ 'first_name' => $request->input('first_name'),
                  'last_name' => $request->input('last_name'),
                  'middle_name' => $request->input('middle_name'),
                  'email' => $request->input('email'),
                  'password' => bcrypt($request->input('password')),
                  'cell_phone' => $request->input('cell_phone'),
      ];
        //store new user in db
        User::create($data);

        return redirect('/');
    }
}
