<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Holidays;


class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Holidays::all();
        return view('content.panel_holidays', array('holidays' => $data ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'holiday_name' => 'required|max:255',
          'holiday_date' => 'required|date|date_format:Y-m-d'
      ]);

      if ($validator->fails()) {
          return redirect('/holidays')
                      ->withErrors($validator)
                      ->withInput()
                      ->with('status_create','fail_create');
      }
        $data = [
          'holiday_name' => $request['holiday_name'],
          'holiday_date' => $request['holiday_date'],
          'country' => $request['country']
        ];
        Holidays::create($data);

        return redirect('/holidays')->with('success', $request['holiday_name'] . ' has been added successfuly!..');
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
            'holiday_name' => 'required|max:255',
            'holiday_date' => 'required|date|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            return redirect('/holidays')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('status_update','fail_update');
        }

        $id = $request['action_button_h'];
        $update = Holidays::find($id);

        $request['holiday_name'] != '' ? $update->holiday_name = $request['holiday_name'] : $update->holiday_name = $update->holiday_name;
        $request['holiday_date'] != '' ? $update->holiday_date = $request['holiday_date'] : $update->holiday_date = $update->holiday_date;
        $update->country = $request['country'];
        if($update->save()) {
          return redirect('/holidays')->with('success', $request['holiday_name'] . ' has been updated successfuly');
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
        //
    }
}
